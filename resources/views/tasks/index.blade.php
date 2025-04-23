@extends('layout')

@section('content')
<!-- Hero Section with Gradient and Background Pattern -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Manager</title>
  <style>
    .hero-section {
      position: relative;
      background: linear-gradient(135deg, #075bd8, #8f94fb);
      color: white;
      text-align: center;
      padding: 4rem 2rem;
      border-radius: 1rem;
      overflow: hidden;
      box-shadow: 0 10px 25px rgba(78, 84, 200, 0.4);
      margin-bottom: 2rem;
    }
    
    .hero-content {
      position: relative;
      z-index: 10;
    }
    
    .hero-title {
      font-size: 3rem;
      font-weight: 800;
      margin-bottom: 1.5rem;
      letter-spacing: 0.5px;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
    }
    
    .hero-subtitle {
      font-size: 1.4rem;
      max-width: 600px;
      margin: 0 auto 2rem;
      line-height: 1.5;
      opacity: 0.9;
    }
    
    .cta-button {
      background-color: white;
      color:rgb(70, 77, 209);
      font-weight: 600;
      padding: 0.8rem 2rem;
      font-size: 1.1rem;
      border-radius: 50px;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      text-decoration: none;
      display: inline-block;
    }
    
    .cta-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }
    
    /* Decorative elements */
    .hero-circle {
      position: absolute;
      border-radius: 50%;
      background-color: rgba(255, 255, 255, 0.1);
    }
    
    .hero-circle-1 {
      width: 300px;
      height: 300px;
      top: -100px;
      right: -50px;
    }
    
    .hero-circle-2 {
      width: 200px;
      height: 200px;
      bottom: -50px;
      left: -50px;
    }
    
    .hero-circle-3 {
      width: 100px;
      height: 100px;
      top: 70%;
      left: 20%;
    }
    
    .hero-circle-4 {
      width: 150px;
      height: 150px;
      top: 30%;
      right: 15%;
      opacity: 0.15;
    }
    
    .hero-pattern {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.07'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
      opacity: 0.5;
    }
    
    .floating-icons {
      position: absolute;
      font-size: 1.4rem;
      opacity: 0.2;
      animation-duration: 3s;
      animation-iteration-count: infinite;
      animation-timing-function: ease-in-out;
    }
    
    .icon-1 {
      top: 20%;
      left: 10%;
      animation-name: float1;
    }
    
    .icon-2 {
      top: 60%;
      right: 15%;
      animation-name: float2;
    }
    
    .icon-3 {
      top: 40%;
      left: 30%;
      animation-name: float3;
    }
    
    @keyframes float1 {
      0%, 100% { transform: translateY(0) rotate(0); }
      50% { transform: translateY(-15px) rotate(5deg); }
    }
    
    @keyframes float2 {
      0%, 100% { transform: translateY(0) rotate(0); }
      50% { transform: translateY(-20px) rotate(-5deg); }
    }
    
    @keyframes float3 {
      0%, 100% { transform: translateY(0) rotate(0); }
      50% { transform: translateY(-10px) rotate(10deg); }
    }
  </style>
</head>
<body>
  <div class="hero-section">
    <!-- Decorative elements -->
    <div class="hero-pattern"></div>
    <div class="hero-circle hero-circle-1"></div>
    <div class="hero-circle hero-circle-2"></div>
    <div class="hero-circle hero-circle-3"></div>
    <div class="hero-circle hero-circle-4"></div>
    
    <!-- Floating icons -->
    <div class="floating-icons icon-1">✓</div>
    <div class="floating-icons icon-2">📝</div>
    <div class="floating-icons icon-3">🔔</div>
    
    <!-- Main content -->
    <div class="hero-content">
      <h1 class="hero-title">📋 Manage Your Tasks</h1>
      <p class="hero-subtitle">Organize, prioritize, and track your tasks efficiently with our powerful yet simple task management system.</p>
    </div>
  </div>
</body>
</html>

<!-- Filter Section with Glass Effect -->
<div class="filter-section card border-0 mb-4 glass-card">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title m-0">
                <i class="bi bi-funnel me-2"></i>Filter Tasks
            </h5>
            
        </div>
        
        <div class="collapse show" id="filterCollapse">
            <form method="GET" action="{{ route('tasks.index') }}" class="row g-3">
                <!-- Priority Filter -->
                <div class="col-md-4">
                    <label for="priority" class="form-label fw-medium small text-uppercase">Priority</label>
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bg-transparent border-end-0">
                            <i class="bi bi-flag"></i>
                        </span>
                        <select name="priority" id="priority" class="form-select border-start-0">
                            <option value="">All Priorities</option>
                            @foreach ($priorityOptions as $option)
                                <option value="{{ $option }}" {{ request('priority') == $option ? 'selected' : '' }}>
                                    {{ ucfirst($option) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <!-- Status Filter -->
                <div class="col-md-4">
                    <label for="status" class="form-label fw-medium small text-uppercase">Status</label>
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bg-transparent border-end-0">
                            <i class="bi bi-check2-square"></i>
                        </span>
                        <select name="status" id="status" class="form-select border-start-0">
                            <option value="">All Statuses</option>
                            @foreach ($statusOptions as $option)
                                <option value="{{ $option }}" {{ request('status') == $option ? 'selected' : '' }}>
                                    {{ ucfirst($option) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <!-- Apply button -->
                <div class="col-md-4 d-flex align-items-end">
                    <div class="d-grid gap-2 w-100">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-search me-2"></i>Apply Filters
                        </button>
                      
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Controls -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="m-0 fw-bold text-primary">
        <i class="bi bi-collection me-2"></i>Your Tasks
    </h4>
    
    
</div>

<!-- Task Grid with Animated Cards -->
<div class="row g-4">
    @forelse($tasks as $task)
        <div class="col-md-4 task-card-wrapper">
            <div class="card h-100 border-0 task-card">
                <div class="card-header-custom {{ $task->priority == 'urgent' ? 'priority-urgent' : ($task->priority == 'important' ? 'priority-important' : 'priority-normal') }}">
                    <span class="priority-indicator"></span>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="badge rounded-pill {{ $task->priority == 'urgent' ? 'priority-badge-urgent' : ($task->priority == 'important' ? 'priority-badge-important' : 'priority-badge-normal') }}">
                            {{ ucfirst($task->priority) }}
                        </span>
                        <div class="task-dropdown">
                            <button class="btn btn-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li><a class="dropdown-item" href="{{ route('tasks.edit', $task->id) }}">
                                    <i class="bi bi-pencil me-2"></i>Edit
                                </a></li>
                                <li><a class="dropdown-item" href="#">
                                    <i class="bi bi-eye me-2"></i>View Details
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this task?')">
                                            <i class="bi bi-trash me-2"></i>Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <h5 class="card-title fw-bold mb-3">{{ $task->name }}</h5>
                    <p class="card-text text-secondary mb-4">{{ Str::limit($task->description, 100) }}</p>
                    
                    <div class="task-meta d-flex justify-content-between align-items-center mt-auto">
                        <div class="due-date">
                            <i class="bi bi-calendar3 me-1"></i>
                            <span class="text-muted">{{ date('M d, Y', strtotime($task->due_date)) }}</span>
                        </div>
                        <span class="status-indicator {{ strtolower(str_replace(' ', '-', $task->status ?? 'pending')) }}">
                            {{ ucfirst($task->status ?? 'Pending') }}
                        </span>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 p-3">
                    <div class="d-flex justify-content-between gap-2">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary flex-grow-1">
                            <i class="bi bi-pencil me-2"></i>Edit
                        </a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="flex-grow-1">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger w-100" onclick="return confirm('Are you sure?')">
                                <i class="bi bi-trash me-2"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="empty-state text-center py-5">
                <h3 class="fw-bold mb-3">No tasks found</h3>
                
            </div>
        </div>
    @endforelse
</div>

<!-- Pagination with Custom Styling -->
@if($tasks->hasPages())
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-lg">
                {{-- Previous Page Link --}}
                @if ($tasks->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $tasks->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @for ($i = 1; $i <= $tasks->lastPage(); $i++)
                    @if ($i == $tasks->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $tasks->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endfor

                {{-- Next Page Link --}}
                @if ($tasks->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $tasks->nextPageUrl() }}" rel="next">&raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">&raquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif



<style>
/* Custom Styles for the Task Manager */
:root {
    --primary: #4361ee;
    --primary-dark: #3a56d4;
    --secondary: #7209b7;
    --success: #06d6a0;
    --danger: #ef476f;
    --warning: #ffd166;
    --light: #f8f9fa;
    --dark: #212529;
}

body {
    background-color: #f7f7fc;
}

/* Hero Section */
.hero-section {
    border-radius: 16px;
    overflow: hidden;
}

.bg-gradient {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
}

.hero-bg {
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.hero-circle-1 {
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
    top: -100px;
    right: -100px;
}

.hero-circle-2 {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
    bottom: -50px;
    left: 10%;
}

/* Stats Cards */
.stats-row {
    margin-bottom: 2rem;
}

.stat-card {
    border-radius: 12px;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
}

.stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.stat-label {
    color: #718096;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-value {
    font-weight: 700;
    font-size: 1.75rem;
    color: var(--dark);
}

/* Glass Effect Card */
.glass-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
}

/* Task Cards */
.task-card-wrapper {
    perspective: 1000px;
}

.task-card {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
    transition: all 0.3s ease-in-out;
    position: relative;
    transform-style: preserve-3d;
}

.task-card:hover {
    transform: translateY(-10px) rotateX(2deg);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
}

.card-header-custom {
    height: 8px;
    position: relative;
    overflow: hidden;
}

.priority-urgent {
    background: linear-gradient(to right, var(--danger), #ff8a8a);
}

.priority-important {
    background: linear-gradient(to right, var(--warning), #ffe066);
}

.priority-normal {
    background: linear-gradient(to right, var(--primary), #6e8efb);
}

.priority-indicator {
    position: absolute;
    top: -5px;
    left: 20px;
    height: 20px;
    width: 20px;
    border-radius: 50%;
    background-color: inherit;
}

.priority-badge-urgent {
    background-color: rgba(239, 71, 111, 0.15);
    color: var(--danger);
}

.priority-badge-important {
    background-color: rgba(255, 209, 102, 0.2);
    color: #e6a800;
}

.priority-badge-normal {
    background-color: rgba(67, 97, 238, 0.15);
    color: var(--primary);
}

.badge {
    padding: 0.5rem 0.8rem;
    font-weight: 600;
    font-size: 0.75rem;
}

.btn-icon {
    width: 32px;
    height: 32px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: #718096;
    background-color: transparent;
    transition: all 0.2s;
}

.btn-icon:hover {
    background-color: rgba(0, 0, 0, 0.05);
    color: var(--dark);
}

.task-meta {
    font-size: 0.85rem;
}

.status-indicator {
    padding: 0.35rem 0.7rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
}

.completed {
    background-color: rgba(6, 214, 160, 0.15);
    color: var(--success);
}

.in-progress {
    background-color: rgba(67, 97, 238, 0.15);
    color: var(--primary);
}

.pending {
    background-color: rgba(113, 128, 150, 0.15);
    color: #4a5568;
}

/* Buttons & Interactive Elements */
.btn {
    border-radius: 8px;
    padding: 0.5rem 1.25rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: var(--primary);
    border-color: var(--primary);
}

.btn-primary:hover {
    background-color: var(--primary-dark);
    border-color: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
}

.btn-outline-primary {
    color: var(--primary);
    border-color: var(--primary);
}

.btn-outline-primary:hover {
    background-color: var(--primary);
    border-color: var(--primary);
    transform: translateY(-2px);
}

.form-control, .form-select {
    border-radius: 8px;
    padding: 0.625rem 1rem;
    border-color: #e2e8f0;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.25);
}

.input-group-text {
    border-color: #e2e8f0;
}

/* Quick Add Button */
.quick-add-btn {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.quick-add-btn:hover {
    transform: scale(1.1) rotate(45deg);
    box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
}

/* Empty State */
.empty-state {
    background-color: white;
    border-radius: 16px;
    padding: 3rem;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
}

/* Pagination */
.pagination {
    gap: 0.5rem;
}

.page-item.active .page-link {
    background-color: var(--primary);
    border-color: var(--primary);
}

.page-link {
    width: 46px;
    height: 46px;
    border-radius: 8px !important;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    border-color: #e2e8f0;
}

.page-link:hover {
    color: var(--primary-dark);
    background-color: #edf2ff;
    border-color: #e2e8f0;
}

/* Animation for cards */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.task-card {
    animation: fadeIn 0.5s ease-out forwards;
}

.task-card-wrapper:nth-child(2) .task-card {
    animation-delay: 0.1s;
}

.task-card-wrapper:nth-child(3) .task-card {
    animation-delay: 0.2s;
}

.task-card-wrapper:nth-child(4) .task-card {
    animation-delay: 0.3s;
}

.task-card-wrapper:nth-child(5) .task-card {
    animation-delay: 0.4s;
}

.task-card-wrapper:nth-child(6) .task-card {
    animation-delay: 0.5s;
}
</style>
@endsection