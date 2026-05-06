<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function adminLogs()
    {
        // ดึง Log ล่าสุดขึ้นก่อน และ Join กับตารางสมาชิกเพื่อดูชื่อคนทำ
        $logs = \App\Models\LogModel::leftJoin('tbl_member', 'tbl_logs.user_id', '=', 'tbl_member.member_id')
                    ->select('tbl_logs.*', 'tbl_member.member_name as user_name')
                    ->orderBy('tbl_logs.log_id', 'desc')
                    ->get();

        return view('admin.logs.index', compact('logs'));
    }
}