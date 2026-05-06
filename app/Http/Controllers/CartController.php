<?php

namespace  App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartModel;
use App\Models\ItemModel; // สมมติว่าตารางสินค้าชื่อ ItemModel
use App\Models\MemberModel; // สมมติว่าตารางสินค้าชื่อ MemberModel
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class CartController extends Controller
{

    // ฟังก์ชันเพิ่มสินค้าลงตะกร้า
    public function add(Request $request, $id)
    {
        // 1. ใช้ Class Auth แทน helper เพื่อความชัวร์
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $member_id = Auth::user()->member_id;

        // 2. ค้นหาสินค้าโดยใช้ item_id ให้ตรงกับโครงสร้างตารางที่คุณตั้งไว้
        $item = \App\Models\ItemModel::where('item_id', $id)->first();

        if (!$item) {
            return back()->with('error', 'ไม่พบสินค้าชิ้นนี้');
        }

        // 3. ตรวจสอบในตะกร้า
        $cartItem = \App\Models\CartModel::where('member_id', $member_id)
                                        ->where('product_id', $id)
                                        ->first();

        if ($cartItem) {
            $cartItem->increment('cart_qty');
        } else {
            \App\Models\CartModel::create([
                'member_id' => $member_id,
                'product_id' => $id,
                'cart_qty' => 1
            ]);
        }

        return redirect('/cart')->with('success', 'เพิ่มสินค้าลงตะกร้าแล้ว'); 

    }


    // ฟังก์ชันแสดงหน้าตะกร้าสินค้า
    public function index()
    {
        $member_id = Auth::user()->member_id;
        
        // ดึงข้อมูลตะกร้าพร้อม Join ข้อมูลสินค้า
        $cartItems = CartModel::where('member_id', $member_id)
            // เปลี่ยนจาก product_id เป็น item_id ให้ตรงกับรูป Screenshot 
            ->join('tbl_items', 'tbl_carts.product_id', '=', 'tbl_items.item_id') 
            ->select(
                'tbl_carts.*', 
                'tbl_items.item_name as product_name', 
                'tbl_items.price as price', 
                'tbl_items.image_path as image' // ในรูปของคุณคือ image_path
            )
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    // ฟังก์ชันลบสินค้าออกจากตะกร้า
    public function delete($id)
    {
        CartModel::where('cart_id', $id)->delete();
        return back();
    }

}
