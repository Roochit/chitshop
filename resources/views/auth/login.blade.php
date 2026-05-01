@extends('login')

@section('css_before')
@endsection

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-sm-12 text-center">

            <h3> :: form login :: </h3>


<form action="" method="post">
@csrf


<div class="form-group row mb-2">
    <div class="col-sm-2"></div>
    <label class="col-sm-3"> User Name </label>
    <div class="col-sm-5">
        <input type="email" class="form-control" name="member_username" required placeholder="User Name" minlength="3"  value="{{ old('member_username') }}">
        @if(isset($errors))
            @if($errors->has('member_username'))
                <div class="text-danger"> {{ $errors->first('member_username') }}</div>
            @endif 
        @endif
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row mb-2">
    <div class="col-sm-2"></div>
    <label class="col-sm-3"> Password </label>
    <div class="col-sm-5">
        <input type="password" class="form-control" name="password" required placeholder="Password" minlength="6">
        @if(isset($errors))
            @if($errors->has('password'))
                <div class="text-danger"> {{ $errors->first('password') }}</div>
            @endif 
        @endif
    </div>
    <div class="col-sm-2"></div>
</div>


<div class="form-group row mt-3 mb-3">
    <label class="col-sm-3">  </label>
    <div class="col-sm-5">
       
       <button type="submit" class="btn btn-primary"> Insert  </button> 
       <a href="/member" class="btn btn-danger">cancel</a>
    </div>
</div>

</form>

</div> 


@endsection
{{-- 
@section('footer')
@endsection --}}

@section('js_before')
@endsection

@section('js_before')
@endsection