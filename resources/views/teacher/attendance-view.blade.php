<!DOCTYPE html>
<html>
<head>
    <title>View Attendance - Teacher Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 40px;   
        }
        h2 {
            color: #003366;
        }
        .table {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .badge-present {
            background-color: #28a745;
        }
        .badge-absent {
            background-color: #dc3545;
        }
        .stats-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .filter-section {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4">
        <a class="navbar-brand" href="{{ route('teacher.dashboard') }}">
            <i class="fas fa-chalkboard-teacher"></i> Teacher Dashboard
        </a>
        <div class="navbar-nav ms-auto">
            <a href="{{ route('teacher.class.students') }}" class="nav-link">
                <i class="fas fa-users"></i> My Students
            </a>
            <a href="{{ route('logout') }}" class="btn btn-light ms-2">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </nav>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mx-4 mt-3" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2><i class="fas fa-clipboard-check"></i> Attendance Records - Class {{ $teacher->class_assigned }}</h2>
                    <a href="{{ route('teacher.class.students') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Take Attendance
                    </a>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stats-card text-center">
                    <h4 class="text-success">{{ $attendances->where('status', 'present')->count() }}</h4>
                    <p class="mb-0 text-muted">Total Present</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card text-center">
                    <h4 class="text-danger">{{ $attendances->where('status', 'absent')->count() }}</h4>
                    <p class="mb-0 text-muted">Total Absent</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card text-center">
                    <h4 class="text-info">{{ $attendances->unique('student_id')->count() }}</h4>
                    <p class="mb-0 text-muted">Unique Students</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card text-center">
                    <h4 class="text-warning">{{ $attendances->unique('date')->count() }}</h4>
                    <p class="mb-0 text-muted">Days Recorded</p>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <form method="GET" action="{{ route('teacher.attendance.view') }}">
                <div class="row">
                    <div class="col-md-4">
                        <label for="date" class="form-label">Filter by Date</label>
                        <input type="date" class="form-control" name="date" value="{{ request('date') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="status" class="form-label">Filter by Status</label>
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="present" {{ request('status') == 'present' ? 'selected' : '' }}>Present</option>
                            <option value="absent" {{ request('status') == 'absent' ? 'selected' : '' }}>Absent</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="student" class="form-label">Filter by Student Name</label>
                        <input type="text" class="form-control" name="student" value="{{ request('student') }}" placeholder="Enter name">
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                        <a href="{{ route('teacher.attendance.view') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Clear
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Attendance Table -->
        @if ($attendances->isEmpty())
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> No attendance records found.
                <br>
                <a href="{{ route('teacher.class.students') }}" class="btn btn-primary mt-2">
                    Take First Attendance
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th><i class="fas fa-calendar"></i> Date</th>
                            <th><i class="fas fa-user"></i> Student Name</th>
                            <th><i class="fas fa-envelope"></i> Email</th>
                            <th><i class="fas fa-check-circle"></i> Status</th>
                            <th><i class="fas fa-clock"></i> Recorded At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $attendance)
                            <tr onclick="window.location.href='{{ route('teacher.attendance.edit.student', ['student' => $attendance->student_id, 'date' => $attendance->date->toDateString()]) }}'" style="cursor: pointer;">
                                <td>
                                    <strong>{{ $attendance->date->format('M d, Y') }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $attendance->date->format('l') }}</small>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-placeholder bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px; font-size: 14px;">
                                            {{ strtoupper(substr($attendance->student->name, 0, 2)) }}
                                        </div>
                                        {{ $attendance->student->name }}
                                    </div>
                                </td>
                                <td>{{ $attendance->student->email }}</td>
                                <td>
                                    @if ($attendance->status === 'present')
                                        <span class="badge badge-present">
                                            <i class="fas fa-check"></i> Present
                                        </span>
                                    @else
                                        <span class="badge badge-absent">
                                            <i class="fas fa-times"></i> Absent
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ $attendance->created_at->format('M d, Y') }}
                                        <br>
                                        {{ $attendance->created_at->format('h:i A') }}
                                    </small>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $attendances->appends(request()->query())->links() }}
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="{{ route('teacher.dashboard') }}" class="btn btn-secondary me-2">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
                <a href="{{ route('teacher.class.students') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Take New Attendance
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>