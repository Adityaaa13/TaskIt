@extends('layout')

@section('content')
<div class="container mt-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">
                <i class="bi bi-clock-history text-primary me-2"></i>Timesheet Entries
            </h2>
            <p class="text-muted">     Track your time spent on various tasks</p>
        </div>
        <a href="{{ route('timesheets.create') }}" class="btn btn-primary d-flex align-items-center">
            <i class="bi bi-plus-circle me-2"></i>Add Timesheet
        </a>
    </div>
    
    <!-- Alert Messages -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <!-- Timesheet Card -->
    <div class="card border-0 shadow-sm rounded-3 mb-4">
        <div class="card-body p-0">
            <!-- Table -->
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 py-3 ps-4">Task</th>
                            <th class="border-0 py-3">Date</th>
                            <th class="border-0 py-3">Hours Worked</th>
                            <th class="border-0 py-3">Comments</th>
                            <th class="border-0 py-3 text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($timesheets as $timesheet)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="task-indicator me-2" style="width: 10px; height: 10px; border-radius: 50%; background-color: #6366f1;"></div>
                                    <span class="fw-medium">{{ $timesheet->task->name ?? 'N/A' }}</span>
                                </div>
                            </td>
                            <td>
                                <i class="bi bi-calendar3 text-muted me-1"></i>
                                {{ \Carbon\Carbon::parse($timesheet->date)->format('M d, Y') }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-hourglass-split text-muted me-1"></i>
                                    <span>{{ $timesheet->hours_worked }} hrs</span>
                                </div>
                            </td>
                            <td class="text-muted">
                                {{ \Illuminate\Support\Str::limit($timesheet->comments, 40) }}
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group">
                                    <a href="{{ route('timesheets.edit', $timesheet->id) }}" class="btn btn-sm btn-outline-secondary me-2">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('timesheets.destroy', $timesheet->id) }}" method="POST">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                onclick="return confirm('Are you sure you want to delete this timesheet entry?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center">
                                    <i class="bi bi-clock-history text-muted mb-3" style="font-size: 2rem;"></i>
                                    <p class="mb-1 fw-medium">No timesheet entries found</p>
                                    <p class="text-muted">Start tracking your time by adding a new timesheet entry</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $timesheets->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Auto-dismiss alerts after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    });
</script>
@endsection