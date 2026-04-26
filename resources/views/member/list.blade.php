@extends('home')

@section('css_before')
@endsection

@section('header')
@endsection

@section('sidebarMenu')
@endsection

@section('content')

{{-- <div class="container mt-4">
    <div class="row">
    <div class="col-md-10"> --}}
{{-- <h3> Member Data  
<a  href="/member/adding" class="btn btn-primary btn-sm mb-2"> + member </a>
</h3> --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="m-0" style="font-weight: bold;">Member Data</h3>
        {{-- ปุ่ม '+' จัดไว้ทางขวา --}}
        <a href="/member/adding" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Member
        </a>
    </div>


<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr class="table-info">
            <th width="5%" class="text-center">No.</th>
            <th width="35%">Name</th>
            <th width="35%">User Name</th>
            <th width="10%">Role</th>
            <th width="5%">Password</th>
            <th width="5%">edit</th>
            <th width="5%">delete</th>
        </tr>
    </thead>

    <tbody>
        @foreach($memberList as $row)
        <tr>
            <td align="center"> {{ $loop->iteration }}.  <!--เรียงลำดับใหม่  --></td>
            <td>{{ $row->member_name }}  </td>
            <td>{{ $row->member_username }}  </td>
            <td>{{ $row->role }}  </td>
            <td>
                    {{-- <a href="/member/reset/{{ $row->member_id }}" class="btn btn-sm" style="border: 2px solid #EB7D2F;color:  EB7D2F">Reset</a> --}}
                    <a href="/member/reset/{{ $row->member_id }}" class="btn btn-sm btn-reset-custom" > Reset </a>
            </td>
            <td>
                    <a href="/member/{{ $row->member_id }}" class="btn btn-warning btn-sm">edit</a>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="deleteConfirm({{ $row->member_id }})">delete</button>

                    <form id="delete-form-{{ $row->member_id }}" action="/member/remove/{{ $row->member_id }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE') 
                    </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

{{-- <p> Add column phone, email, age </p> --}}

<div>
        {{ $memberList->links() }}
    </div>
    
{{-- </div>
</div>
</div> --}}
{{-- devbanban.com  --}}

@endsection

@section('footer')
@endsection

@section('js_before')
@endsection

@section('js_before')
@endsection


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function deleteConfirm(id) {
    Swal.fire({
        title: 'คุณแน่ใจหรือไม่?',
        text: "หากลบแล้วจะไม่สามารถกู้คืนได้!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'ใช่, ลบเลย!',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });

}
</script>



