@extends('login') {{-- ใช้ Layout เดียวกับหน้า Login เพื่อให้คุม Theme เดียวกัน --}}

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <div class="card shadow-sm border-0 p-5" style="border-radius: 20px; background-color: #ffffff;">
                <div class="card-body">
                    {{-- ไอคอนเครื่องหมายถูก --}}
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-info" style="font-size: 100px;"></i>
                    </div>
                    
                    <h2 class="fw-bold mb-3" style="color: #333;">สร้างบัญชีสำเร็จ!</h2>
                    <p class="text-muted mb-4">
                        ยินดีต้อนรับเข้าสู่ระบบ <strong>Chit Shop</strong><br>
                        ขณะนี้บัญชีของคุณพร้อมใช้งานแล้ว กรุณาเข้าสู่ระบบเพื่อเริ่มใช้งาน
                    </p>
                    
                    <hr class="my-4">
                    
                    {{-- ปุ่มกลับไปหน้า Login --}}
                    <div class="d-grid gap-2">
                        <a href="/" class="btn btn-info text-white py-3 fw-bold" style="border-radius: 12px; font-size: 18px;">
                            <i class="fas fa-sign-in-alt me-2"></i> ไปหน้าเข้าสู่ระบบ
                        </a>
                    </div>
                </div>
            </div>
            
            <p class="mt-4 text-muted small">© 2026 Chit Shop Project</p>
        </div>
    </div>
</div>
@endsection