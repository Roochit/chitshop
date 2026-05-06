<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'tbl_orders';
    protected $primaryKey = 'order_id'; // ตามที่คุณตั้งใน DB
    public $timestamps = true; // เปิดไว้เพื่อเก็บ created_at (วันที่สั่งซื้อ)
    
    protected $fillable = [
        'order_number', 
        'member_id', 
        'total_price', 
        'status'
    ];
}
