@extends('home')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-sm-12">
            <h3> :: form Update Product :: </h3>

            {{-- 1. ปรับ Action ให้ชี้ไปที่ /item และใช้ item_id --}}
            <form action="/item/{{ $product->item_id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                {{-- 2. ชื่อสินค้า: ปรับ name เป็น item_name --}}
                <div class="form-group row mb-2">
                    <label class="col-sm-2"> Product Name </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="item_name" required 
                            placeholder="Product Name" minlength="3" 
                            value="{{ old('item_name', $product->item_name) }}">
                        @error('item_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- 3. รายละเอียด: ปรับ name เป็น description --}}
                <div class="form-group row mb-2">
                    <label class="col-sm-2"> Product detail </label>
                    <div class="col-sm-7">
                        <textarea name="description" class="form-control" rows="7" required
                            placeholder="Product detail">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- 4. ราคา: ปรับ name เป็น price --}}
                <div class="form-group row mb-2">
                    <label class="col-sm-2">Price </label>
                    <div class="col-sm-6">
                        <input type="number" step="0.01" class="form-control" name="price" required 
                            placeholder="Price" min="0" 
                            value="{{ old('price', $product->price) }}">
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row mb-2">
                    <label class="col-sm-2"> Review Score </label>
                    <div class="col-sm-3">
                        <select class="form-select" name="review">
                            <option value="0" {{ (old('review') ?? $product->review) == 0 ? 'selected' : '' }}>ไม่มีคะแนน</option>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ (old('review') ?? $product->review) == $i ? 'selected' : '' }}>
                                    {{ $i }} ดาว
                                </option>
                            @endfor
                        </select>
                        @error('review')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- 5. รูปภาพ: ปรับ name เป็น image_path --}}
                <div class="form-group row mb-2">
                    <label class="col-sm-2"> Pic </label>
                    <div class="col-sm-6">
                        <small class="text-muted">รูปภาพเดิม:</small><br>
                        @if($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}" width="200px" class="mb-2 border">
                        @else
                            <p class="text-muted">ไม่มีรูปภาพ</p>
                        @endif
                        <br>
                        <label>เลือกรูปภาพใหม่:</label>
                        <input type="file" class="form-control" name="image_path" accept="image/*">
                        @error('image_path')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label class="col-sm-2"> </label>
                    <div class="col-sm-5">
                        <button type="submit" class="btn btn-primary"> Update Product </button>
                        <a href="/item" class="btn btn-danger">Cancel</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection