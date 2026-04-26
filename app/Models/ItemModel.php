<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    protected $table = 'tbl_items';
    protected $primaryKey = 'item_id'; // ตั้งให้ตรงกับชื่อจริงใน DB
    protected $fillable = [ 'item_name',
                            'description',
                            'price', 
                            'review',
                            'image_path' , 
                            'dateCreate'];
    public $incrementing = true; // ถ้า primary key เป็นตัวเลข auto increment
    public $timestamps = false; // ใส่บรรทัดนี้ถ้าไม่มี created_at, updated_at
}



