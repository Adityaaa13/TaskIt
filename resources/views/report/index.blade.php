@extends('layout')

@section('content')
<div class="container mt-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">
                <i class="bi bi-graph-up text-primary me-2"></i>Reports & Analytics
            </h2>
            <p class="text-muted">Visual insights into your productivity and task management</p>
        </div>
        <a href="{{ route('export.timesheets') }}" class="btn btn-success d-flex align-items-center">
            <i class="bi bi-file-earmark-excel me-2"></i>Export to Excel
        </a>
    </div>
    
    <!-- Charts Container -->
    <div class="row g-4">
        <!-- Task Status Chart -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="card-title fw-semibold">
                        <i class="bi bi-pie-chart-fill text-primary me-2"></i>Task Status Distribution
                    </h5>
                    <p class="text-muted small">Overview of your tasks by their current status</p>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-4">
                    <div style="width: 100%; height: 250px;">
                        <canvas id="taskStatusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Hours Per Task Chart -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="card-title fw-semibold">
                        <i class="bi bi-bar-chart-fill text-primary me-2"></i>Hours Per Task
                    </h5>
                    <p class="text-muted small">Time allocation across different tasks</p>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-4">
                    <div style="width: 100%; height: 250px;">
                        <canvas id="hoursPerTaskChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Daily Hours Chart -->
        <div class="col-12 mt-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="card-title fw-semibold">
                        <i class="bi bi-graph-up-arrow text-primary me-2"></i>Daily Activity Trend
                    </h5>
                    <p class="text-muted small">Hours logged each day over time</p>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center p-4">
                    <div style="width: 100%; height: 300px;">
                        <canvas id="dailyHoursChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Summary Stats -->
    <div class="row g-4 mt-2">
        <!-- Total Hours Logged -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3 bg-light">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total Hours</h6>
                            <h3 class="mb-0 fw-bold" id="totalHours">--</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                            <i class="bi bi-clock-history fs-3 text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Completed Tasks -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3 bg-light">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Completed Tasks</h6>
                            <h3 class="mb-0 fw-bold" id="completedTasks">--</h3>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle">
                            <i class="bi bi-check-circle fs-3 text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Productivity Score -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3 bg-light">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Productivity Score</h6>
                            <h3 class="mb-0 fw-bold" id="productivityScore">--</h3>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded-circle">
                            <i class="bi bi-lightning-charge fs-3 text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- <script src="{{ asset('js/chart.min.js') }}"></script> -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    fetch("{{ route('report.data') }}")
        .then(response => response.json())
        .then(data => {
            // Update summary stats
            document.getElementById('totalHours').textContent = 
                Object.values(data.hoursPerTask).reduce((a, b) => a + b, 0) + ' hrs';
                
            document.getElementById('completedTasks').textContent = 
                data.taskStatus['Completed'] || 0;
                
            document.getElementById('productivityScore').textContent = 
                Math.round((data.taskStatus['Completed'] || 0) / 
                (Object.values(data.taskStatus).reduce((a, b) => a + b, 0) || 1) * 100) + '%';
            
            // Pie chart: Task status
            new Chart(document.getElementById('taskStatusChart'), {
                type: 'doughnut',
                data: {
                    labels: Object.keys(data.taskStatus),
                    datasets: [{
                        label: 'Task Status',
                        data: Object.values(data.taskStatus),
                        backgroundColor: ['#ffa600', '#6366f1', '#10b981'],
                        borderWidth: 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    },
                    cutout: '65%'
                }
            });
            
            // Bar chart: Hours per task
            new Chart(document.getElementById('hoursPerTaskChart'), {
                type: 'bar',
                data: {
                    labels: Object.keys(data.hoursPerTask),
                    datasets: [{
                        label: 'Hours Spent',
                        data: Object.values(data.hoursPerTask),
                        backgroundColor: '#6366f1',
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
            
            // Line chart: Daily activity
            new Chart(document.getElementById('dailyHoursChart'), {
                type: 'line',
                data: {
                    labels: Object.keys(data.dailyHours),
                    datasets: [{
                        label: 'Hours Logged',
                        data: Object.values(data.dailyHours),
                        fill: {
                            target: 'origin',
                            above: 'rgba(99, 102, 241, 0.1)'
                        },
                        borderColor: '#6366f1',
                        borderWidth: 3,
                        tension: 0.4,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#6366f1',
                        pointBorderWidth: 2,
                        pointRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.7)',
                            padding: 10,
                            cornerRadius: 6
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                precision: 0
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error fetching report data:', error);
        });
});
</script>
@endsection