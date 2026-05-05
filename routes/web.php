<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\AuthController; 



// Route::get('/', function () {
//     return view('welcome');
// });

//หน้าเเรก ให้ผู้ใช้ล็อกอินถ้าไม่มีไอดีบังคับสมัคร เราจะไม่ให้ใครเข้ามาดูเว็ปเราฟรีๆ
// Route::get('/', [AuthController::class, 'login']);
// หน้าล็อกอิน
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'checkLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/create_account', [AuthController::class, 'showRegistrationForm']);
Route::post('/create_account', [AuthController::class, 'create']);
// ตัวอย่างการใช้ Middleware แยกกลุ่ม
// ป้องกันการเข้าถึงหน้าอื่นถ้ายังไม่ได้ Login
// Route::middleware(['auth'])->group(function () {
    
//     // แยกสิทธิ์ใน Controller หรือจะใช้ Middleware เสริมก็ได้
//     Route::get('/home', [HomeController::class, 'index']);
    
//     // กลุ่มจัดการระบบ (Backend)
//     Route::get('/item', [ItemController::class, 'index']);
//     //Route::get('/member', [MemberController::class, 'index']);
//     Route::get('/test', [TestController::class, 'index']);
//     // ... route อื่นๆ
// })
// --- กลุ่มที่ต้องล็อกอินก่อน (User ทั่วไปเข้าได้) ---
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
});

// --- กลุ่มที่ต้องเป็น Admin เท่านั้นถึงจะเข้าได้ (ใช้ is_admin) ---
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/member', [MemberController::class, 'index']);
    Route::get('/item', [ItemController::class, 'index']);
    Route::get('/test', [TestController::class, 'index']);
    // ... route อื่นๆ ที่เป็นหลังบ้าน ...
});

//home page
// Route::get('/home', [HomeController::class, 'index']);
//Route::get('/home', [HomeController::class, 'index']);
Route::get('/detail/{id}',  [HomeController::class, 'detail']);

//test crud
//Route::get('/test', [TestController::class, 'index']);
Route::get('/test/adding',  [TestController::class, 'adding']);
Route::post('/test',  [TestController::class, 'create']);
Route::get('/test/{id}',  [TestController::class, 'edit']);
Route::put('/test/{id}',  [TestController::class, 'update']);
Route::delete('/test/remove/{id}',  [TestController::class, 'remove']);

// Member crud
// Route::get('/member', [MemberController::class, 'index']);
Route::get('/member/adding',  [MemberController::class, 'adding']);
Route::post('/member',  [MemberController::class, 'create']);
// แก้ข้อมูลสมาชิค
Route::get('/member/{id}',  [MemberController::class, 'edit']);
Route::put('/member/{id}',  [MemberController::class, 'update']);
// Route::delete('/member/remove/{id}',  [MemberController::class, 'remove']);
Route::delete('/member/remove/{id}', [MemberController::class, 'remove']);
// แก้รหัสผ่าน
Route::get('/member/reset/{id}',  [MemberController::class, 'reset']);
Route::put('/member/reset/{id}',  [MemberController::class, 'resetPassword']);

//item crud
//Route::get('/item', [ItemController::class, 'index']);
Route::get('/item/adding',  [ItemController::class, 'adding']);
Route::post('/item',  [ItemController::class, 'create']);
Route::get('/item/{id}',  [ItemController::class, 'edit']);
Route::put('/item/{id}',  [ItemController::class, 'update']);
Route::delete('/item/remove/{id}',  [ItemController::class, 'remove']);

