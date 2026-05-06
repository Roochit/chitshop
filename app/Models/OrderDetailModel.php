<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    protected $table = 'tbl_order_details';
    protected $primaryKey = 'detail_id';
    public $timestamps = false; // ตารางนี้อาจจะไม่ต้องใช้ timestamps
    
    protected $fillable = [
        'order_id', 
        'product_id', 
        'qty', 
        'price'
    ];
}
