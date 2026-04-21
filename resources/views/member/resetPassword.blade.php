@extends('home')

@section('css_before')
@endsection

@section('header')
@endsection

@section('sidebarMenu')
@endsection

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-sm-12">

            <h3> :: form Reset Password  :: </h3>


<form action="/member/reset/{{ $member_id }}" method="post">
@csrf
@method('put')

<div class="form-group row mb-2">
    <label class="col-sm-2"> User Name </label>
    <div class="col-sm-6">
        <input type="text" class="form-control" disabled value="{{ $member_username }}">
    </div>
</div>

<div class="form-group row mb-2">
    <label class="col-sm-2"> Name </label>
    <div class="col-sm-6">
        <input type="text" class="form-control" disabled value="{{ $member_name }}">
    </div>
</div>


{{-- // form ต้องกรอก--}}
<div class="form-group row mb-2">
    <label class="col-sm-2"> New Password </label>
    <div class="col-sm-6">
        <input type="password" class="form-control" name="new_password" required placeholder="New Password" minlength="6">
        @if(isset($errors))
            @if($errors->has('new_password'))
                <div class="text-danger"> {{ $errors->first('new_password') }}</div>
            @endif 
        @endif
    </div>
</div>

<div class="form-group row mb-2">
    <label class="col-sm-2"> Confirm Password </label>
    <div class="col-sm-6">
        <input type="password" class="form-control" name="confirm_password" required placeholder="Confirm Password" minlength="6">
        @if(isset($errors))
            @if($errors->has('confirm_password'))
                <div class="text-danger"> {{ $errors->first('confirm_password') }}</div>
            @endif 
        @endif
    </div>
</div>


<div class="form-group row mb-2">
    <label class="col-sm-2">  </label>
    <div class="col-sm-5">
       <button type="submit" class="btn btn-primary"> Reset Password  </button>
       <a href="/member" class="btn btn-danger">cancel</a>
    </div>
</div>

</form>
</div> <!--  / <div class="col-sm-9 col-md-9"> -->


    @endsection

@section('footer')
@endsection

@section('js_before')
@endsection

@section('js_before')
@endsection