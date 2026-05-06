@extends('frontend')

@section('css_before')
@endsection

@section('showProduct')
<div class="container py-5">
    <div class="mb-3">
        <a href="{{ url('/my-orders') }}" class="text-muted text-decoration-none">
            <i class="fas fa-arrow-left"></i> กลับไปที่รายการทั้งหมด
        </a>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold">รายละเอียดใบสั่งซื้อ: {{ $order->order_number }}</h5>
            <p class="text-muted mb-0">สั่งซื้อเมื่อ: {{ $order->created_at }} | สถานะ: <span class="text-primary">{{ $order->status }}</span></p>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>สินค้า</th>
                        <th class="text-end">ราคา</th>
                        <th class="text-center">จำนวน</th>
                        <th class="text-end">รวม</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/'.$item->image_path) }}" width="50" class="rounded me-3">
                                <span class="fw-bold">{{ $item->item_name }}</span>
                            </div>
                        </td>
                        <td class="text-end">{{ number_format($item->price, 2) }}</td>
                        <td class="text-center">{{ $item->qty }}</td>
                        <td class="text-end fw-bold">{{ number_format($item->price * $item->qty, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end fw-bold h5">ยอดสุทธิ</td>
                        <td class="text-end text-primary fw-bold h5">{{ number_format($order->total_price, 2) }} ฿</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection