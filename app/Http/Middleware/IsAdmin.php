<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <--- ต้องมีบรรทัดนี้ครับ

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // เช็คว่าผู้ใช้ล็อกอินอยู่หรือไม่
        if (!Auth::check()) {
            return redirect('/');
        }

        // เช็คสิทธิ์ (Role)
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'หน้าสำหรับแอดมินเท่านั้น');
        }

        return $next($request);
    }
}
