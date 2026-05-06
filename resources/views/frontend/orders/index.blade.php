@extends('frontend')

@section('css_before')
@endsection

@section('showProduct')
<div class="container py-5">
    <h3 class="fw-bold mb-4">ประวัติการสั่งซื้อของฉัน</h3>
    
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">เลขที่สั่งซื้อ</th>
                        <th>วันที่</th>
                        <th>ยอดรวม</th>
                        <th>สถานะ</th>
                        <th class="text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="ps-4 fw-bold">{{ $order->order_number }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td class="text-primary fw-bold">{{ number_format($order->total_price, 2) }} ฿</td>
                        <td>
                            <span class="badge {{ $order->status == 'pending' ? 'bg-warning text-dark' : 'bg-success' }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ url('/my-orders/'.$order->order_id) }}" class="btn btn-outline-primary btn-sm">
                                ดูรายละเอียด
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection