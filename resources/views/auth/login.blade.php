@extends('home')

@section('css_before')
@endsection

{{-- @section('header')
@endsection --}}
{{-- 
@section('sidebarMenu')
@endsection --}}

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-sm-9">

            <h3> :: form login :: </h3>


<form action="" method="post">
@csrf


{{-- <div class="form-group row mb-2">
    <label class="col-sm-2"> Name </label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="member_name" required placeholder="Name" minlength="3"  value="{{ old('member_name') }}">
        @if(isset($errors))
            @if($errors->has('member_name'))
                <div class="text-danger"> {{ $errors->first('member_name') }}</div>
            @endif 
        @endif
    </div>
</div> --}}

<div class="form-group row mb-2">
    <label class="col-sm-2"> User Name </label>
    <div class="col-sm-6">
        <input type="email" class="form-control" name="member_username" required placeholder="User Name" minlength="3"  value="{{ old('member_username') }}">
        @if(isset($errors))
            @if($errors->has('member_username'))
                <div class="text-danger"> {{ $errors->first('member_username') }}</div>
            @endif 
        @endif
    </div>
</div>
{{-- Role (Select Option) --}}
{{-- <div class="form-group row mb-2">
    <label class="col-sm-2"> Role </label>
    <div class="col-sm-6">
        <select class="form-select" name="role" required>
            <option value="" disabled {{ old('role') == '' ? 'selected' : '' }}>-- เลือกสิทธิ์การใช้งาน --</option>
            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User (ผู้ใช้งานทั่วไป)</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin (ผู้ดูแลระบบ)</option>
        </select>
        
        @if($errors->has('role'))
            <div class="text-danger"> {{ $errors->first('role') }}</div>
        @endif
    </div>
</div> --}}

{{-- Role (Radio Button) --}}
{{-- <div class="form-group row mb-2">
    <label class="col-sm-2"> Role </label>
    <div class="col-sm-6">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="role" id="roleUser" value="user" {{ old('role', 'user') == 'user' ? 'checked' : '' }}>
            <label class="form-check-label" for="roleUser">User</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="role" id="roleAdmin" value="admin" {{ old('role') == 'admin' ? 'checked' : '' }}>
            <label class="form-check-label" for="roleAdmin">Admin</label>
        </div>
    </div>
</div> --}}

<div class="form-group row mb-2">
    <label class="col-sm-2"> Password </label>
    <div class="col-sm-6">
        <input type="password" class="form-control" name="password" required placeholder="Password" minlength="6">
        @if(isset($errors))
            @if($errors->has('password'))
                <div class="text-danger"> {{ $errors->first('password') }}</div>
            @endif 
        @endif
    </div>
</div>


<div class="form-group row mb-2">
    <label class="col-sm-2">  </label>
    <div class="col-sm-5">
       
       <button type="submit" class="btn btn-primary"> Insert  </button> 
       <a href="/member" class="btn btn-danger">cancel</a>
    </div>
</div>

</form>

</div> <!--  / <div class="col-sm-9 col-md-9"> -->


@endsection
{{-- 
@section('footer')
@endsection --}}

@section('js_before')
@endsection

@section('js_before')
@endsection