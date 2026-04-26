@extends('home')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-sm-12">
            <h3> :: form Add New Product :: </h3>

            <form action="/item" method="post" enctype="multipart/form-data">
                @csrf

                {{-- ชื่อสินค้า --}}
                <div class="form-group row mb-2">
                    <label class="col-sm-2"> Product Name </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="item_name" required 
                            placeholder="กรอกชื่อสินค้า" minlength="3" value="{{ old('item_name') }}">
                        @error('item_name') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- รายละเอียด --}}
                <div class="form-group row mb-2">
                    <label class="col-sm-2"> Product detail </label>
                    <div class="col-sm-7">
                        <textarea name="description" class="form-control" rows="5" required
                            placeholder="กรอกรายละเอียดสินค้า">{{ old('description') }}</textarea>
                        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- ราคา --}}
                <div class="form-group row mb-2">
                    <label class="col-sm-2">Price </label>
                    <div class="col-sm-4">
                        <input type="number" step="0.01" class="form-control" name="price" required 
                            placeholder="0.00" min="0" value="{{ old('price') }}">
                        @error('price') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- รีวิว (1-5 ดาว) --}}
                <div class="form-group row mb-2">
                    <label class="col-sm-2"> Review Score </label>
                    <div class="col-sm-3">
                        <select class="form-select" name="review">
                            <option value="0">-- ให้คะแนนรีวิว --</option>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ old('review') == $i ? 'selected' : '' }}>{{ $i }} ดาว</option>
                            @endfor
                        </select>
                        @error('review') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- รูปภาพ --}}
                <div class="form-group row mb-2">
                    <label class="col-sm-2"> Product Image </label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" name="image_path" accept="image/*">
                        <small class="text-muted">รองรับไฟล์: jpg, jpeg, png (ไม่เกิน 5MB)</small>
                        @error('image_path') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label class="col-sm-2"> </label>
                    <div class="col-sm-5">
                        <button type="submit" class="btn btn-primary"> Save Product </button>
                        <a href="/item" class="btn btn-danger">Cancel</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection