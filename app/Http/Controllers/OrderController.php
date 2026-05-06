<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function checkout()
    {
        // 1. ตรวจสอบสถานะการ Login และดึง ID ของสมาชิก
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'กรุณาเข้าสู่ระบบก่อนสั่งซื้อ');
        }

        $member_id = Auth::user()->member_id;

        // 2. ดึงข้อมูลสินค้าในตะกร้า (Join กับ tbl_items เพื่อเอาชื่อและราคาปัจจุบัน)
        // ใช้ item_id และ image_path ตามโครงสร้างที่คุณตั้งไว้
        $cartItems = CartModel::where('member_id', $member_id)
            ->join('tbl_items', 'tbl_carts.product_id', '=', 'tbl_items.item_id')
            ->select(
                'tbl_carts.*', 
                'tbl_items.item_name', 
                'tbl_items.price', 
                'tbl_items.image_path'
            )
            ->get();

        // ถ้าตะกร้าว่างให้เด้งกลับ
        if ($cartItems->isEmpty()) {
            Alert::error('ผิดพลาด', 'ไม่พบสินค้าในตะกร้าของคุณ');
            return back();
        }

        // 3. เริ่มกระบวนการบันทึกข้อมูลแบบ Transaction (ถ้าพังจุดไหนจะยกเลิกทั้งหมด)
        DB::beginTransaction();

        try {
            // คำนวณราคารวมทั้งหมด
            $total_price = 0;
            foreach ($cartItems as $item) {
                $total_price += ($item->price * $item->cart_qty);
            }

            // 4. บันทึกลงตาราง tbl_orders (หัวเอกสาร)
            $order = OrderModel::create([
                'order_number' => 'CHIT-' . date('Ymd') . '-' . strtoupper(uniqid()),
                'member_id'    => $member_id,
                'total_price'  => $total_price,
                'status'       => 'pending' // สถานะเริ่มต้น
            ]);

            // 5. บันทึกลงตาราง tbl_order_details (รายการสินค้าแต่ละชิ้น)
            foreach ($cartItems as $item) {
                OrderDetailModel::create([
                    'order_id'   => $order->order_id,
                    'product_id' => $item->product_id,
                    'qty'        => $item->cart_qty,
                    'price'      => $item->price // บันทึกราคา ณ วันที่ซื้อจริง
                ]);
            }

            // 6. เคลียร์ตะกร้าสินค้าของ User นี้ออกให้หมด
            CartModel::where('member_id', $member_id)->delete();

            // ถ้าทุกอย่างโอเค ยืนยันการบันทึก
            DB::commit();

            $this->recordLog('Create Order', 'สร้างใบสั่งซื้อเลขที่ ' . $order->order_number);
            Alert::success('สั่งซื้อสำเร็จ', 'ขอบคุณที่ใช้บริการ Chit Shop ครับ');
            return redirect('/home');

        } catch (\Exception $e) {
            // หากเกิด Error ให้ยกเลิกข้อมูลที่บันทึกไปทั้งหมด
            DB::rollback();
            return back()->with('error', 'เกิดข้อผิดพลาดในการสั่งซื้อ: ' . $e->getMessage());
        }
    }

    // ดูรายการทั้งหมด
    public function adminIndex() {
        $orders = OrderModel::join('tbl_member', 'tbl_orders.member_id', '=', 'tbl_member.member_id')
                    ->select('tbl_orders.*', 'tbl_member.member_name as customer_name') // แก้ชื่อคอลัมน์ให้ตรงกับ DB ของคุณ
                    ->orderBy('tbl_orders.order_id', 'desc')
                    ->get();
        return view('admin.orders.index', compact('orders'));
    }

    // ดูรายละเอียด
    public function show($id) {
        $order = OrderModel::join('tbl_member', 'tbl_orders.member_id', '=', 'tbl_member.member_id')
                    ->select('tbl_orders.*', 'tbl_member.member_name as customer_name')
                    ->where('tbl_orders.order_id', $id)
                    ->first();

        $details = OrderDetailModel::join('tbl_items', 'tbl_order_details.product_id', '=', 'tbl_items.item_id')
                    ->select('tbl_order_details.*', 'tbl_items.item_name', 'tbl_items.image_path')
                    ->where('tbl_order_details.order_id', $id)
                    ->get();

        return view('admin.orders.show', compact('order', 'details'));
    }

    // ดูรายการคำสั่งซื้อทั้งหมดของตัวเอง
    public function myOrders()
    {
        $member_id = Auth::user()->member_id;
        
        $orders = OrderModel::where('member_id', $member_id)
                    ->orderBy('order_id', 'desc')
                    ->get();

        return view('frontend.orders.index', compact('orders'));
    }

    // ดูรายละเอียดสินค้าข้างในออเดอร์นั้นๆ
    public function myOrderDetail($id)
    {
        $member_id = Auth::user()->member_id;

        // ตรวจสอบว่าเป็นออเดอร์ของตัวเองจริงๆ เพื่อความปลอดภัย
        $order = OrderModel::where('order_id', $id)
                    ->where('member_id', $member_id)
                    ->firstOrFail();

        $details = OrderDetailModel::join('tbl_items', 'tbl_order_details.product_id', '=', 'tbl_items.item_id')
                    ->select('tbl_order_details.*', 'tbl_items.item_name', 'tbl_items.image_path')
                    ->where('order_id', $id)
                    ->get();

        return view('frontend.orders.show', compact('order', 'details'));
    }
}