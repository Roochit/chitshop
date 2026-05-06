<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class ItemController extends Controller
{
    /**
     * แสดงรายการสินค้าทั้งหมด
     */
    public function index()
    {
        Paginator::useBootstrap();
        // ดึงข้อมูลโดยใช้ item_id เป็นหลัก
        $products = ItemModel::orderBy('item_id', 'desc')->paginate(5);
        return view('item.list', compact('products'));
    }

    /**
     * หน้าฟอร์มเพิ่มสินค้า
     */
    public function adding()
    {
        return view('item.create');
    }

    /**
     * บันทึกสินค้าใหม่ลงฐานข้อมูล
     */
    public function create(Request $request)
    {
        $messages = [
            'item_name.required' => 'กรุณากรอกชื่อสินค้า',
            'description.required' => 'กรุณากรอกรายละเอียด',
            'price.required' => 'กรุณากรอกราคา',
            'price.numeric' => 'ราคาต้องเป็นตัวเลขเท่านั้น',
            'image_path.image' => 'ไฟล์ที่อัปโหลดต้องเป็นรูปภาพ',
            'image_path.max' => 'ขนาดรูปภาพห้ามเกิน 5MB',
        ];

        $validator = Validator::make($request->all(), [
            'item_name' => 'required|min:3',
            'description' => 'required|min:10',
            'price' => 'required|numeric|min:0',
            'review' => 'nullable|integer|min:0|max:5',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ], $messages);

        if ($validator->fails()) {
            return redirect('item/adding')->withErrors($validator)->withInput();
        }

        try {
            $imagePath = null;
            if ($request->hasFile('image_path')) {
                $imagePath = $request->file('image_path')->store('uploads/product', 'public');
            }

            ItemModel::create([
                'item_name'   => strip_tags($request->item_name),
                'description' => strip_tags($request->description),
                'price'       => $request->price,
                'review'      => $request->review ?? 0,
                'image_path'  => $imagePath,
            ]);
            $this->recordLog('Add Product', 'เพิ่มสินค้าใหม่: ' . $request->item_name);
            Alert::success('สำเร็จ', 'เพิ่มสินค้าใหม่เรียบร้อยแล้ว');
            return redirect('/item');

        } catch (\Exception $e) {
            return view('errors.404');
        }
    }

    /**
     * หน้าฟอร์มแก้ไขสินค้า
     */
    public function edit($id)
    {
        try {
            $product = ItemModel::findOrFail($id);
            return view('item.edit', compact('product'));
        } catch (\Exception $e) {
            return view('errors.404');
        }
    }

    /**
     * อัปเดตข้อมูลสินค้า
     */
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_name'   => 'required|min:3',
            'description' => 'required|min:3',
            'price'       => 'required|numeric|min:0',
            'review'      => 'nullable|integer|min:0|max:5',
            'image_path'  => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect('item/' . $id)->withErrors($validator)->withInput();
        }

        try {
            $product = ItemModel::findOrFail($id);

            // จัดการรูปภาพใหม่
            if ($request->hasFile('image_path')) {
                if ($product->image_path) {
                    Storage::disk('public')->delete($product->image_path);
                }
                $product->image_path = $request->file('image_path')->store('uploads/product', 'public');
            }

            $product->item_name   = strip_tags($request->item_name);
            $product->description = strip_tags($request->description);
            $product->price       = $request->price;
            $product->review      = $request->review ?? 0;
            $product->save();

            Alert::success('สำเร็จ', 'อัปเดตข้อมูลสินค้าเรียบร้อย');
            return redirect('/item');

        } catch (\Exception $e) {
            return view('errors.404');
        }
    }

    /**
     * ลบสินค้า
     */
    public function remove($id)
    {
        try {
            $product = ItemModel::find($id);
            if ($product) {
                if ($product->image_path) {
                    Storage::disk('public')->delete($product->image_path);
                }
                $product->delete();
                Alert::success('สำเร็จ', 'ลบสินค้าเรียบร้อยแล้ว');
            }
            return redirect('/item');
        } catch (\Exception $e) {
            Alert::error('เกิดข้อผิดพลาด', 'ไม่สามารถลบข้อมูลได้');
            return redirect('/item');
        }
    }
}

