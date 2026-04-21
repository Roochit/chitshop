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
            'member_name.required' => 'กรุณากรอกข้อมูล',
            'member_name.min' => 'กรอกข้อมูลขั้นต่ำ :min ตัวอักษร',

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



 public function edit($id)
    {
        try {
            //query data for form edit 
            $test = TestModel::findOrFail($id); // ใช้ findOrFail เพื่อให้เจอหรือ 404
            if (isset($test)) {
                $id = $test->id;
                $name = $test->name;
                $name2 = $test->name2;
                return view('test.edit', compact('id', 'name' , 'name2'));
            }
        } catch (\Exception $e) {
            //return response()->json(['error' => $e->getMessage()], 500); //สำหรับ debug
            return view('errors.404');
        }
    } //func edit


 public function update($id, Request $request)
    {
        //vali msg 
        $messages = [
            'name.required' => 'กรุณากรอกข้อมูล',
            'name.min' => 'กรอกข้อมูลขั้นต่ำ :min ตัวอักษร',
            'name.unique' => 'ชื่อนี้ถูกใช้งานแล้ว',  //ป้องกันแก้ซ้ำกับ row อื่นๆ จ้าาา

            'name2.required' => 'กรุณากรอกข้อมูล',
            'name2.min' => 'กรอกข้อมูลขั้นต่ำ :min ตัวอักษร',
        ];

        //rule
        $validator = Validator::make($request->all(), [
            'name' => [
                    'required',
                    'min:3',
                        Rule::unique('tbl_test', 'name')->ignore($id, 'id'), //ห้ามแก้ซ้ำ
            ],
            'name2' => 'required','min:3',
    ], $messages);

    //check 
        if ($validator->fails()) {
            return redirect('test/' . $id)
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $test = TestModel::find($id);
            $test->update([
                    'name' => strip_tags($request->input('name')), //column update 
                    'name2' => strip_tags($request->input('name2')), //column update 
                ]);
            // แสดง Alert ก่อน return
            Alert::success('Update Successfully');
            return redirect('/test');
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
