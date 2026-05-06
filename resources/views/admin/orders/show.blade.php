@extends('home')

@section('content')
<div class="container-fluid py-4">
    {{-- <div class="mb-3">
        <a href="{{ url('/admin/orders') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> ย้อนกลับ
        </a>
    </div> --}}

    <div class="row">
        {{-- รายการสินค้า --}}
        <div class="col-md-8">
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 15px;">
                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold mb-0">รายการสินค้าในออเดอร์: {{ $order->order_number }}</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">สินค้า</th>
                                <th>ราคา/หน่วย</th>
                                <th>จำนวน</th>
                                <th>รวม</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($details as $item)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $item->image_path) }}" width="50" class="rounded me-3 border">
                                        <span class="fw-bold">{{ $item->item_name }}</span>
                                    </div>
                                </td>
                                <td>{{ number_format($item->price, 2) }}</td>
                                <td>{{ $item->qty }}</td>
                                <td class="fw-bold">{{ number_format($item->price * $item->qty, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- สรุปข้อมูลลูกค้าและยอดเงิน --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-3" style="border-radius: 15px;">
                <h5 class="fw-bold mb-3 border-bottom pb-2">สรุปข้อมูล</h5>
                <p class="mb-1 text-muted small">ชื่อลูกค้า:</p>
                <p class="fw-bold">{{ $order->customer_name }}</p>
                
                <hr>
                
                <div class="d-flex justify-content-between mb-2">
                    <span>ยอดรวมทั้งหมด:</span>
                    <span class="h4 fw-bold text-primary">{{ number_format($order->total_price, 2) }} ฿</span>
                </div>

                {{-- คุณสามารถทำปุ่มเปลี่ยนสถานะออเดอร์ตรงนี้ได้ในอนาคต --}}
                {{-- <div class="d-grid gap-2 mt-4">
                    <button class="btn btn-success">ยืนยันการชำระเงิน</button>
                    <button class="btn btn-outline-danger">ยกเลิกออเดอร์</button>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection