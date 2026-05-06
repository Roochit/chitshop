@extends('home') {{-- เปลี่ยนเป็นชื่อ Layout Admin ของคุณ --}}

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm border-0" style="border-radius: 15px;">
        <div class="card-header bg-white py-3">
            <h5 class="fw-bold mb-0"><i class="fas fa-clipboard-list me-2 text-primary"></i> รายการสั่งซื้อทั้งหมด</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>เลขที่สั่งซื้อ</th>
                            <th>ชื่อลูกค้า</th>
                            <th>ยอดรวมสุทธิ</th>
                            <th>วันที่สั่งซื้อ</th>
                            <th>สถานะ</th>
                            <th class="text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="fw-bold text-dark">{{ $order->order_number }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td class="fw-bold text-primary">{{ number_format($order->total_price, 2) }} ฿</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                @if($order->status == 'pending')
                                    <span class="badge bg-warning text-dark">รอดำเนินการ</span>
                                @elseif($order->status == 'paid')
                                    <span class="badge bg-success">ชำระเงินแล้ว</span>
                                @else
                                    <span class="badge bg-secondary">{{ $order->status }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ url('/admin/orders/'.$order->order_id) }}" class="btn btn-info btn-sm text-white">
                                    <i class="fas fa-eye"></i> รายละเอียด
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection