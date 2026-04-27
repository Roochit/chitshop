<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    /**
     * แสดงรายการสินค้าทั้งหมด
     */
    public function index()
    {
        Paginator::useBootstrap();
        // ดึงข้อมูลโดยใช้ item_id เป็นหลัก
        $products = ItemModel::orderBy('item_id', 'desc')->paginate(8);
        return view('home.product_index', compact('products'));
    }


    public function detail($id)
    {
        try {
            $product = ItemModel::findOrFail($id);
            $id = $product->item_id;
            $item_name = $product->item_name;
            $description = $product->description;
            $price = $product->price;
            $review = $product->review;
            $image_path = $product->image_path;
            $DateCreate = $product->DateCreate;

            return view('home.product_detail', compact('id','item_name','description','price','review','image_path','DateCreate'));


        } catch (\Exception $e) {
            return view('errors.404');
        }
    }

}

