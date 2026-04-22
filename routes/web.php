<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\MemberController;

// Route::get('/', function () {
//     return view('welcome');
// });

//home page
Route::get('/', [TestController::class, 'index']);

//test crud
Route::get('/test', [TestController::class, 'index']);
Route::get('/test/adding',  [TestController::class, 'adding']);
Route::post('/test',  [TestController::class, 'create']);
Route::get('/test/{id}',  [TestController::class, 'edit']);
Route::put('/test/{id}',  [TestController::class, 'update']);
Route::delete('/test/remove/{id}',  [TestController::class, 'remove']);

//Member crud
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