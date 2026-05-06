<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\CartController;

// --- หน้าสาธารณะ (ไม่ต้องล็อกอิน) ---
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'checkLogin']);
Route::get('/create_account', [AuthController::class, 'showRegistrationForm']);
Route::post('/create_account', [AuthController::class, 'create']);

// --- กลุ่มที่ต้องล็อกอินเท่านั้น (Auth Middleware) ---
Route::middleware(['auth'])->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/detail/{id}', [HomeController::class, 'detail']);

    // ระบบตะกร้าสินค้า (Cart)
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/cart/add/{id}', [CartController::class, 'add']);
    Route::get('/cart/delete/{id}', [CartController::class, 'delete']);
    // เพิ่ม Route สำหรับอัปเดตจำนวนสินค้าในตะกร้า (ถ้าต้องการ)
    Route::post('/cart/update', [CartController::class, 'updateQty']);
});

// --- กลุ่มที่ต้องเป็น Admin เท่านั้น (Admin Backend) ---
Route::middleware(['auth', 'is_admin'])->group(function () {
    
    // Member Management
    Route::get('/member', [MemberController::class, 'index']);
    Route::get('/member/adding', [MemberController::class, 'adding']);
    Route::post('/member', [MemberController::class, 'create']);
    Route::get('/member/{id}', [MemberController::class, 'edit']);
    Route::put('/member/{id}', [MemberController::class, 'update']);
    Route::delete('/member/remove/{id}', [MemberController::class, 'remove']);
    Route::get('/member/reset/{id}', [MemberController::class, 'reset']);
    Route::put('/member/reset/{id}', [MemberController::class, 'resetPassword']);

    // Item Management
    Route::get('/item', [ItemController::class, 'index']);
    Route::get('/item/adding', [ItemController::class, 'adding']);
    Route::post('/item', [ItemController::class, 'create']);
    Route::get('/item/{id}', [ItemController::class, 'edit']);
    Route::put('/item/{id}', [ItemController::class, 'update']);
    Route::delete('/item/remove/{id}', [ItemController::class, 'remove']);

    // Test Management
    Route::get('/test', [TestController::class, 'index']);
    Route::get('/test/adding', [TestController::class, 'adding']);
    Route::post('/test', [TestController::class, 'create']);
    Route::get('/test/{id}', [TestController::class, 'edit']);
    Route::put('/test/{id}', [TestController::class, 'update']);
    Route::delete('/test/remove/{id}', [TestController::class, 'remove']);
});