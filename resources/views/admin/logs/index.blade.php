@extends('home')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm border-0" style="border-radius: 15px;">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0"><i class="fas fa-history me-2 text-secondary"></i> ระบบบันทึกกิจกรรม (Activity Logs)</h5>
            <span class="badge bg-light text-dark border">ทั้งหมด {{ $logs->count() }} รายการ</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>วัน-เวลา</th>
                            <th>ผู้ใช้งาน</th>
                            <th>กิจกรรม</th>
                            <th>รายละเอียด</th>
                            <th>IP Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                        <tr>
                            <td class="small text-muted">{{ $log->created_at }}</td>
                            <td>
                                <span class="fw-bold">{{ $log->user_name ?? 'Guest' }}</span>
                                <br><small class="text-muted">ID: {{ $log->user_id ?? '-' }}</small>
                            </td>
                            <td>
                                @php
                                    $badgeClass = 'bg-info';
                                    if(str_contains($log->action, 'Order')) $badgeClass = 'bg-success';
                                    if(str_contains($log->action, 'Login')) $badgeClass = 'bg-primary';
                                    if(str_contains($log->action, 'Delete')) $badgeClass = 'bg-danger';
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ $log->action }}</span>
                            </td>
                            <td class="text-wrap" style="max-width: 300px;">{{ $log->detail }}</td>
                            <td><code class="small">{{ $log->ip_address }}</code></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection