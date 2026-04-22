<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MemberModel;
use Illuminate\Pagination\Paginator;
// use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{

public function index()
{
    try {
        Paginator::useBootstrap();
        $memberList = MemberModel::orderBy('member_id', 'desc')->paginate(5); //order by & pagination
        return view('member.list', compact('memberList'));
    } catch (\Exception $e) {
       // \Log::error('Admin list error: '.$e->getMessage());
         return view('errors.404');
    }
}

    public function adding() {
        return view('member.create');
    }

    public function create(Request $request)
    {
        // echo '<pre>';
        // dd($_POST);
        // exit();

        //vali msg 
        $messages = [
            //user name
            'member_username.required' => 'กรุณากรอกข้อมูล',
            'member_username.min' => 'กรอกข้อมูลขั้นต่ำ :min ตัวอักษร',
            'member_username.unique' => 'ชื่อซ้ำ เพิ่มใหม่อีกครั้ง',

            // name
            'member_name.required' => 'กรุณากรอกข้อมูล',
            'member_name.min' => 'กรอกข้อมูลขั้นต่ำ :min ตัวอักษร',

            // Password
            'password.required' => 'กรุณากรอกข้อมูล',
            'password.min' => 'กรอกข้อมูลขั้นต่ำ :min ตัวอักษร',

            // Role 
            'role.required' => 'กรุณาเลือกสิทธิ์การใช้งาน',

        ];

        //rule 
        $validator = Validator::make($request->all(), [
            'member_username' => 'required|min:3|unique:tbl_member',
            'member_name' => 'required|min:3',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,user',
        ], $messages);

        //check vali 
        if ($validator->fails()) {
            return redirect('member/adding')
                ->withErrors($validator)
                ->withInput();
        }

        try {

            //ปลอดภัย: กัน XSS ที่มาจาก <script>, <img onerror=...> ได้
            MemberModel::create([
                'member_name' => strip_tags($request->input('member_name')),
                'member_username' => strip_tags($request->input('member_username')),
                'password' => bcrypt($request->input('password')), // เข้ารหัสผ่านตรงนี้ 
                'role' => $request->input('role'), // เพิ่มการบันทึก Role
            ]);
            // แสดง Alert ก่อน return
            Alert::success('เพิ่มข้อมูลเสร็จสิ้น');
            return redirect('/member');
        } catch (\Exception $e) {
            //return response()->json(['error' => $e->getMessage()], 500); //สำหรับ debug
            return view('errors.404');
        }
    } //fun create

    public function edit ($id)
    {
        try {
            // ค้นหาข้อมูลด้วย member_id
            $member = MemberModel::findOrFail($id); 

            // ตรวจสอบว่ามีข้อมูลจริง (ใช้ $member แทน $test)
            if ($member) {
                $member_id = $member->member_id;
                $member_name = $member->member_name;
                $member_username = $member->member_username;
                $member_role = $member->role;

                // แก้ไขชื่อตัวแปรใน compact ให้ถูกต้อง
                return view('member.edit', compact('member_id', 'member_name', 'member_username' , 'member_role'));
            }
        } catch (\Exception $e) {
            // ถ้าไม่เจอข้อมูลให้เด้งกลับพร้อมแจ้งเตือน (สไตล์ SweetAlert ที่เราตั้งไว้)
            Alert::error('ไม่พบข้อมูล', 'ไม่พบรายชื่อผู้ใช้งานนี้ในระบบ');
            return redirect('/member');
        }
    } //func edit
    


 public function update($id, Request $request)
    {

        // echo '<pre>';
        // dd($_POST);
        // exit();

        
                //vali msg 
        $messages = [
            //user name
            'member_username.required' => 'กรุณากรอกข้อมูล',
            'member_username.min' => 'กรอกข้อมูลขั้นต่ำ :min ตัวอักษร',
            'member_username.unique' => 'ชื่อซ้ำ เพิ่มใหม่อีกครั้ง',

            // name
            'member_name.required' => 'กรุณากรอกข้อมูล',
            'member_name.min' => 'กรอกข้อมูลขั้นต่ำ :min ตัวอักษร',

            // Password
            // 'password.required' => 'กรุณากรอกข้อมูล',
            // 'password.min' => 'กรอกข้อมูลขั้นต่ำ :min ตัวอักษร',

            // Role 
            'role.required' => 'กรุณาเลือกสิทธิ์การใช้งาน',

        ];

        //rule
        $validator = Validator::make($request->all(), [
            'member_username' => [
                    'required',
                    'min:3',
                        Rule::unique('tbl_member', 'member_username')->ignore($id, 'member_id'), //ห้ามแก้ซ้ำ
            ],
            'member_name' => 'required','min:3',
            'role' => 'required|in:admin,user',
    ], $messages);

    //check 
        if ($validator->fails()) {
            return redirect('member/' . $id)
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $member = MemberModel::find($id);
            $member->update([
                    'member_username' => strip_tags($request->input('member_username')), //column update 
                    'member_name' => strip_tags($request->input('member_name')), //column update 
                    'role' => $request->input('role'),
                ]);
            // แสดง Alert ก่อน return
            Alert::success('Update Successfully');
            return redirect('/member');
        } catch (\Exception $e) {
            //return response()->json(['error' => $e->getMessage()], 500); //สำหรับ debug
            return view('errors.404');
        }
    } //fun update 


    public function reset ($id)
    {
        try {
            // ค้นหาข้อมูลด้วย member_id
            $member = MemberModel::findOrFail($id); 

            // ตรวจสอบว่ามีข้อมูลจริง (ใช้ $member แทน $test)
            if ($member) {
                $member_id = $member->member_id;
                $member_name = $member->member_name;
                $member_username = $member->member_username;

                // แก้ไขชื่อตัวแปรใน compact ให้ถูกต้อง
                return view('member.resetPassword', compact('member_id', 'member_name', 'member_username'));
            }
        } catch (\Exception $e) {
            // ถ้าไม่เจอข้อมูลให้เด้งกลับพร้อมแจ้งเตือน (สไตล์ SweetAlert ที่เราตั้งไว้)
            Alert::error('ไม่พบข้อมูล', 'ไม่พบรายชื่อผู้ใช้งานนี้ในระบบ');
            return redirect('/member');
        }
    } //func reset

    public function resetPassword($id, Request $request)
    {

        // echo '<pre>';
        // dd($_POST);
        // exit();

        //vali msg 
        $messages = [
            'new_password.required' => 'กรุณากรอกข้อมูล',
            'new_password.min' => 'กรอกข้อมูลขั้นต่ำ :min ตัวอักษร',
            'new_password.same' => 'รหัสผ่านไม่ตรงกัน',  //ป้องกันแก้ซ้ำกับ row อื่นๆ จ้าาา

            'confirm_password.required' => 'กรุณากรอกข้อมูล',
            'confirm_password.min' => 'กรอกข้อมูลขั้นต่ำ :min ตัวอักษร',
        ];

        //rule
        $validator = Validator::make($request->all(), [
            'new_password' => 'required','min:6','same:confirm_password',
            'confirm_password' => 'required','min:6',
    ], $messages);

    //check 
        if ($validator->fails()) {
            return redirect('member/reset/' . $id)
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $member = MemberModel::find($id);
            $member->update([
                    'password' => bcrypt($request->input('confirm_password')), //column update 
                ]);
            // แสดง Alert ก่อน return
            Alert::success('แก้ไขรหัสผ่านเสร็จสิ้น');
            return redirect('/member');
        } catch (\Exception $e) {
            //return response()->json(['error' => $e->getMessage()], 500); //สำหรับ debug
            return view('errors.404');
        }
    } //fun update 


    public function remove($member_id)
    {
        try {
        // 1. ใช้ตัวพิมพ์ใหญ่ให้ตรงกับชื่อ Class Model
        // 2. ใช้ findOrFail เพื่อให้ระบบโยน Exception ไปที่ catch ทันทีถ้าหา ID ไม่เจอ
        $member = MemberModel::findOrFail($member_id); 
        
        $member->delete();
        
        Alert::success('ลบข้อมูลเสร็จสิ้น');
        return redirect('/member');
        
        } catch (\Exception $e) {
            // หากลบไม่ได้ ให้แจ้งเตือน Error แทนการส่ง JSON (เพื่อให้ User เข้าใจง่ายตามสไตล์อาจารย์)
            Alert::error('เกิดข้อผิดพลาด', 'ไม่สามารถลบข้อมูลได้: ' . $e->getMessage());
            return redirect('/member');
        }
    } //remove 


} //class
