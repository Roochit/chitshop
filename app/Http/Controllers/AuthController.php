<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MemberModel;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{

    public function login() {
        return view('auth.login');
    }

    public function checkLogin(Request $request)
    {
        $credentials = [
            'member_username' => $request->member_username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // แยกเส้นทางตาม Role
            if ($user->role === 'admin') {
                return redirect()->intended('/item'); // ไปหลังบ้าน
            }
            return redirect()->intended('/home'); // ไปหน้าแรกผู้ใช้
        }

        return back()->withErrors(['member_username' => 'ข้อมูลไม่ถูกต้อง'])->withInput();
    }

public function logout(Request $request)
{
    Auth::logout(); // ลบสถานะการล็อกอินในระบบ

    $request->session()->invalidate(); // ล้างข้อมูล Session ทั้งหมด
    $request->session()->regenerateToken(); // ป้องกันการโจมตีแบบ CSRF

    return redirect('/'); // ย้อนกลับไปหน้า Login
}


} //class
