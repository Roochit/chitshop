<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

// บรรทัดนี้สำคัญมาก ต้องมี!
use Illuminate\Routing\Controller as BaseController; 
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\LogModel; // สำหรับระบบ Log ที่เราเพิ่งทำ
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    // สร้างฟังก์ชันกลางไว้เรียกใช้
    public function recordLog($action, $detail = null)
    {
        LogModel::create([
            'user_id' => Auth::check() ? Auth::user()->member_id : null,
            'action' => $action,
            'detail' => $detail,
            'ip_address' => request()->ip()
        ]);
    }
}