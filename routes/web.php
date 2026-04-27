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

//หน้าเเรก
Route::get('/', [AuthController::class, 'login']);

//home page
// Route::get('/home', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/detail/{id}',  [HomeController::class, 'detail']);

//test crud
Route::get('/test', [TestController::class, 'index']);
Route::get('/test/adding',  [TestController::class, 'adding']);
Route::post('/test',  [TestController::class, 'create']);
Route::get('/test/{id}',  [TestController::class, 'edit']);
Route::put('/test/{id}',  [TestController::class, 'update']);
Route::delete('/test/remove/{id}',  [TestController::class, 'remove']);

// Member crud
Route::get('/member', [MemberController::class, 'index']);
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
Route::get('/item', [ItemController::class, 'index']);
Route::get('/item/adding',  [ItemController::class, 'adding']);
Route::post('/item',  [ItemController::class, 'create']);
Route::get('/item/{id}',  [ItemController::class, 'edit']);
Route::put('/item/{id}',  [ItemController::class, 'update']);
Route::delete('/item/remove/{id}',  [ItemController::class, 'remove']);

