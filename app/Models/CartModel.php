<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    protected $table = 'tbl_carts';
    protected $primaryKey = 'cart_id';
    protected $fillable = ['member_id', 'product_id', 'cart_qty'];

    public $incrementing = true; // ถ้า primary key เป็นตัวเลข auto increment
    public $timestamps = false;
}
