<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MemberModel extends Authenticatable
{
    protected $table = 'tbl_member';
    protected $primaryKey = 'member_id'; // ตั้งให้ตรงกับชื่อจริงใน DB
    protected $fillable = ['member_name','member_username','password','role'];
    public $incrementing = true; // ถ้า primary key เป็นตัวเลข auto increment
    public $timestamps = false;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ระบุชื่อคอลัมน์ให้ตรงกับที่ Laravel ใช้ตรวจสอบ
    public function getAuthPassword()
    {
        return $this->password; // คอลัมน์ที่เก็บรหัสผ่านที่ bcrypt ไว้
    }
}
