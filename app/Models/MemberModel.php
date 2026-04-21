<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    protected $table = 'tbl_member';
    protected $primaryKey = 'member_id'; // ตั้งให้ตรงกับชื่อจริงใน DB
    protected $fillable = ['member_name','member_username','password','role'];
    public $incrementing = true; // ถ้า primary key เป็นตัวเลข auto increment
    public $timestamps = false;
}
