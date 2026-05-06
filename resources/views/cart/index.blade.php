@extends('frontend') {{-- ปรับให้ตรงกับชื่อไฟล์ layout ของคุณ --}}

@section('css_before')
@endsection

@section('showProduct')
<div class="container py-5">
    <h2 class="mb-4 fw-bold"><i class="fas fa-shopping-cart me-2"></i> ตะกร้าสินค้าของคุณ</h2>

    @if($cartItems->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-box-open text-muted mb-3" style="font-size: 80px;"></i>
            <h4>ตะกร้าของคุณยังว่างอยู่</h4>
            <a href="{{ url('/home') }}" class="btn btn-primary mt-3">ไปเลือกซื้อสินค้า</a>
        </div>
    @else
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 mb-4" style="border-radius: 15px;">
                    <div class="card-body p-0"> {{-- ปรับ p-0 เพื่อให้ตารางชิดขอบการ์ดสวยๆ --}}
                        <table class="table align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4">สินค้า</th>
                                    <th>ราคา</th>
                                    <th style="width: 120px;">จำนวน</th>
                                    <th>รวม</th>
                                    <th class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach($cartItems as $item)
                                @php $subtotal = $item->price * $item->cart_qty; @endphp
                                <tr>
                                   <td>
                                        <div class="d-flex align-items-center">
                                            {{-- ใช้ Path เดียวกับหน้า Item List คือ storage/ --}}
                                            @if($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" 
                                                    style="width: 70px; height: 70px; object-fit: cover;" 
                                                    class="rounded border shadow-sm me-3">
                                            @else
                                                <div class="me-3 bg-light d-flex align-items-center justify-content-center rounded" 
                                                    style="width: 70px; height: 70px;">
                                                    <small class="text-muted">No Image</small>
                                                </div>
                                            @endif
                                            <div>
                                                <span class="fw-bold d-block">{{ $item->product_name }}</span>
                                                <small class="text-muted">ID: {{ $item->product_id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ number_format($item->price, 2) }} ฿</td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm text-center" 
                                               value="{{ $item->cart_qty }}" readonly>
                                    </td>
                                    <td class="fw-bold text-primary">{{ number_format($subtotal, 2) }} ฿</td>
                                    <td class="text-center">
                                        {{-- เปลี่ยนเป็นปุ่มกดง่ายๆ --}}
                                        <a href="{{ url('/cart/delete/'.$item->cart_id) }}" 
                                        class="btn btn-danger btn-sm" 
                                        onclick="return confirm('ลบรายการนี้ใช่หรือไม่?')">
                                            ลบทิ้ง
                                        </a>
                                    </td>
                                </tr>
                                @php $total += $subtotal; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- ส่วนสรุปยอดเงิน --}}
            <div class="col-md-4">
                <div class="card shadow-sm border-0 p-4" style="border-radius: 15px; background-color: #ffffff;">
                    <h5 class="fw-bold mb-4 border-bottom pb-2">สรุปการสั่งซื้อ</h5>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">ยอดรวมสินค้า</span>
                        <span class="fw-bold">{{ number_format($total, 2) }} บาท</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">ค่าจัดส่ง</span>
                        <span class="text-success fw-bold">ฟรี</span>
                    </div>
                    <div class="py-3 my-3 border-top border-bottom">
                        <div class="d-flex justify-content-between">
                            <span class="h5 fw-bold mb-0">ยอดสุทธิ</span>
                            <span class="h5 fw-bold text-primary mb-0">{{ number_format($total, 2) }} บาท</span>
                        </div>
                    </div>
                    
                    {{-- ปุ่มยืนยันการสั่งซื้อ --}}
                    <div class="d-grid gap-2">
                        <a href="{{ url('/checkout') }}" class="btn btn-success btn-lg py-3 fw-bold shadow-sm" 
                           style="border-radius: 12px;"
                           onclick="return confirm('ยืนยันการสั่งซื้อสินค้าทั้งหมดใช่หรือไม่?')">
                            สั่งซื้อสินค้าตอนนี้ <i class="fas fa-check-circle ms-2"></i>
                        </a>
                        <a href="{{ url('/home') }}" class="btn btn-light text-muted">เลือกซื้อสินค้าเพิ่ม</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection