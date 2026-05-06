<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MemberModel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

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
                $this->recordLog('Login', 'ผู้ใช้เข้าสู่ระบบ');
                return redirect()->intended('/item'); // ไปหลังบ้าน
            }
            $this->recordLog('Login', 'ผู้ใช้เข้าสู่ระบบ');
            return redirect()->intended('/home'); // ไปหน้าแรกผู้ใช้
        }

        return back()->withErrors(['member_username' => 'ข้อมูลไม่ถูกต้อง'])->withInput();
    }

    public function logout(Request $request)
    {
        $this->recordLog('logout', 'ผู้ใช้ออกจากสู่ระบบ');
        Auth::logout(); // ลบสถานะการล็อกอินในระบบ

        $request->session()->invalidate(); // ล้างข้อมูล Session ทั้งหมด
        $request->session()->regenerateToken(); // ป้องกันการโจมตีแบบ CSRF

        return redirect('/'); // ย้อนกลับไปหน้า Login
    }

    public function showRegistrationForm() {
        return view('auth.create');
    }


   public function create(Request $request)
    {
        // 1. กำหนดข้อความแจ้งเตือน (Validation Messages)
        $messages = [
            'member_username.required' => 'กรุณากรอกข้อมูล',
            'member_username.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'member_username.min' => 'กรอกข้อมูลขั้นต่ำ :min ตัวอักษร',
            'member_username.unique' => 'ชื่อซ้ำ เพิ่มใหม่อีกครั้ง',
            'member_name.required' => 'กรุณากรอกข้อมูล',
            'member_name.min' => 'กรอกข้อมูลขั้นต่ำ :min ตัวอักษร',
            'password.required' => 'กรุณากรอกข้อมูล',
            'password.min' => 'กรอกข้อมูลขั้นต่ำ :min ตัวอักษร',
        ];

        // 2. กำหนดกฎการตรวจสอบ (Validation Rules)
        // หมายเหตุ: ตัด 'role' ออกจากกฎ เพราะเราจะ Fix ค่าใน Controller เอง
        $validator = Validator::make($request->all(), [
            'member_username' => 'required|email|min:3|unique:tbl_member',
            'member_name' => 'required|min:3',
            'password' => 'required|min:6',
        ], $messages);

        if ($validator->fails()) {
            return back() // ใช้ back() เพื่อให้เด้งกลับหน้าเดิมที่ส่งมา
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // 3. บันทึกข้อมูลพร้อม Fix ค่า Role เป็น 'user'
            MemberModel::create([
                'member_name' => strip_tags($request->input('member_name')),
                'member_username' => strip_tags($request->input('member_username')),
                'password' => bcrypt($request->input('password')), 
                'role' => 'user', // กำหนดเป็น user โดยตรงเพื่อความปลอดภัย
            ]);

            // Alert::success('สมัครสมาชิกเสร็จสิ้น');
            
            // 4. หลังจากสมัครเสร็จ ให้ส่งไปหน้า Login
            // Alert::success('สำเร็จ', 'บัญชีของคุณถูกสร้างเรียบร้อยแล้ว');
            // return redirect('/');
            return view('auth.success');
            
        } catch (\Exception $e) {
            return view('errors.404');
        }
    }

} //class
