@extends('layouts.frontend')

@section('css_before')
@endsection

@section('navbar')
@endsection
{{-- ตัวอย่างการแสดงชื่อใน Navbar หรือ Sidebar --}}
@auth
    <div class="user-info p-3 text-center">
        <p class="mb-0">สวัสดีคุณ: <strong>{{ Auth::user()->member_name }}</strong></p>
        <small class="text-muted">สิทธิ์การใช้งาน: {{ Auth::user()->role }}</small>
    </div>
@endauth
 
 
@section('showProduct')    
@endsection

@section('footer')
@endsection

@section('js_before')
@endsection
