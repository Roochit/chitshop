@extends('frontend')
@section('css_before')
@section('navbar')
@endsection

@section('showProduct')

    @foreach($products as $data)
    <div class="col-12 col-sm-4 col-md-4 col-lg-3 mb-2">
      <div class="card" style="width: 100%;">
        <a href="/detail/{{ $data->item_id}}">
          <img src="{{ asset('storage/' . $data->image_path) }}" class="card-img-top">
        </a>
        <div class="card-body">
          <a>
            @if($data->review)
                        <span class="text-warning">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa{{ $i <= $data->review ? 's' : 'r' }} fa-star"></i>
                            @endfor
                        </span>
                        ({{ $data->review }}/5)
                    @else
                        <small class="text-muted">ไม่มีรีวิว</small>
                    @endif
          </a>
          <h5 class="card-title">
            <a href="/detail/{{ $data->item_id}}" class="link-offset-2 link-underline link-underline-opacity-0">
              {{ $data->item_name}}
            </a>
          </h5>
          <p class="card-text">{{ $data->price}} THB.</p>
          <div align="center"> <a href="/detail/{{ $data->item_id}}" class="btn btn-primary">more detail click...</a> </div>
        </div>
      </div>
    </div>
    @endforeach



  <div class="row mt-2 mb-2">
    <!-- Pagination links -->
    <div class="col-sm-5 col-md-5"></div>
    <div class="col-sm-3 col-md-3">
      <center>
        {{ $products->links() }}
      </center>
    </div>
</div>




@endsection

@section('footer')
@endsection

@section('js_before')
@endsection
