@extends('layouts.backend')

@section('css_before')
@endsection

@section('header')
@endsection
{{-- ตัวอย่างการแสดงชื่อใน Navbar หรือ Sidebar --}}
@auth
    <div class="user-info p-3 text-center">
        <p class="mb-0">สวัสดีคุณ: <strong>{{ Auth::user()->member_name }}</strong></p>
        <small class="text-muted">สิทธิ์การใช้งาน: {{ Auth::user()->role }}</small>
    </div>
@endauth
 
@section('sidebarMenu')    
@endsection

@section('content')
@endsection

@section('footer')
@endsection

@section('js_before')
@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">