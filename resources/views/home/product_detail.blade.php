@extends('frontend')
@section('css_before')
@section('navbar')
@endsection
@section('showProduct')


<div class="col-12 col-sm-3 col-md-3 mb-2">
    <div class="card" style="width: 100%;">
        <img src="{{ asset('storage/' . $image_path) }}" class="card-img-top" alt="devbanban.com">
    </div>
</div>
<div class="col-12 col-sm-8 col-md-8 mb-2">
    <h5 class="card-title">{{ $item_name }}, Price {{ number_format($price) }} THB. </h5>
    <p>
        product detail
        <br>
        {{ $description }}
    </p>
    <a>
        วันที่เผยแพร่ : {{ date('d/m/Y' , strtotime($DateCreate)) }}
    </a>
</div>

@endsection

@section('footer')
@endsection

@section('js_before')
@endsection

{{-- devbanban.com --}}