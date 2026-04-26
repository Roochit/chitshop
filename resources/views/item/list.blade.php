@extends('home')

@section('content')
    <h3> :: Product Managements ::
        <a href="/item/adding" class="btn btn-primary btn-sm"> Add Product </a>
    </h3>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr class="table-info">
                <th width="5%" class="text-center">No.</th>
                <th width="10%">Pic</th>
                <th width="55%">Product Name & Detail </th>
                <th width="15%" class="text-center">Price</th>
                <th width="5%" class="text-center">Review</th>
                <th width="5%" class="text-center">edit</th>
                <th width="5%" class="text-center">delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $row)
            
            <tr>
                {{-- ใช้ item_id แทน id --}}
                <td align="center"> {{ $loop->iteration }}.  <!--เรียงลำดับใหม่  --></td>
                {{-- <td align="center">{{ $row->item_id }}</td> --}}
                <td>
                    {{-- แสดงภาพจากคอลัมน์ image_path --}}
                    @if($row->image_path)
                        <img src="{{ asset('storage/' . $row->image_path) }}" width="100">
                    @else
                        <small>No Image</small>
                    @endif
                </td>
                <td>
                    <b>Name: {{ $row->item_name }}</b> <br>
                    Detail: {{ Str::limit($row->description, 120, '...') }}
                </td>
                <td align="right">฿{{ number_format($row->price, 2) }}</td>
                                <td align="center">
                    @if($row->review)
                        <span class="text-warning">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fa{{ $i <= $row->review ? 's' : 'r' }} fa-star"></i>
                            @endfor
                        </span>
                        ({{ $row->review }}/5)
                    @else
                        <small class="text-muted">ไม่มีรีวิว</small>
                    @endif
                </td>
                <td align="center">
                    {{-- เปลี่ยนเส้นทางลิงก์เป็น /item/ --}}
                    <a href="/item/{{ $row->item_id }}" class="btn btn-warning btn-sm">edit</a>
                </td>
                <td align="center">
                    {{-- 1. ปุ่มเรียกฟังก์ชัน JavaScript --}}
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteConfirm({{ $row->item_id }})">delete</button>

                    {{-- 2. ฟอร์มที่ซ่อนไว้ (ต้องมี id ที่ระบุ item_id และ action ที่ถูกต้อง) --}}
                    <form id="delete-form-{{ $row->item_id }}" action="/item/remove/{{ $row->item_id }}" method="POST" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $products->links() }}
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function deleteConfirm(id) {
    Swal.fire({
        title: 'ยืนยันการลบ?',
        text: "คุณต้องการลบสินค้าชิ้นนี้ใช่หรือไม่!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่, ลบเลย!',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            // จุดสำคัญ: ต้องดึง ID ของฟอร์มมาสั่ง Submit
            document.getElementById('delete-form-' + id).submit();
        }
    })
}
</script>