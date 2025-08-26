<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - All Student Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', sans-serif;
            color: #333;
            padding: 40px;
        }

        .content-wrapper {
            background: rgba(255,255,255,0.95);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
        }

        h2 {
            color: #990033;
            margin-bottom: 25px;
        }

        .filter-form .form-control,
        .filter-form .form-select {
            border-radius: 10px;
        }

        .table {
            margin-top: 25px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .badge-present {
            background-color: #28a745;
        }

        .badge-absent {
            background-color: #dc3545;
        }

        .btn-filter {
            background: #990033;
            color: white;
            border-radius: 10px;
        }

        .btn-clear {
            background: #6c757d;
            color: white;
            border-radius: 10px;
        }

        .pagination .page-link {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container content-wrapper">
        <h2>All Student Attendance Records</h2>

        <form method="GET" class="row g-3 filter-form">
            <div class="col-md-3">
                <select name="class" class="form-select">
                    <option value="">Filter by Class</option>
                    @foreach(range(0, 10) as $class)
                        <option value="{{ $class }}" {{ request('class') == $class ? 'selected' : '' }}>Class {{ $class }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="col-md-2">
                <button class="btn btn-filter w-100">Filter</button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.attendance.view') }}" class="btn btn-clear w-100">Clear</a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover mt-4">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Student</th>
                        <th>Class</th>
                        <th>Status</th>
                        <th>Marked At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($attendances as $attendance)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($attendance->date)->format('Y-m-d') }}</td>
                            <td>{{ $attendance->student->name }}</td>
                            <td>{{ $attendance->student->class_assigned }}</td>
                            <td>
                                @if ($attendance->status === 'present')
                                    <span class="badge badge-present">Present</span>
                                @else
                                    <span class="badge badge-absent">Absent</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($attendance->marked_at)->format('h:i A') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No attendance records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($attendances->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $attendances->appends(request()->query())->links() }}
            </div>
        @endif
        <div class="text-center mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary px-4 py-2" style="border-radius: 10px;">
                ← Back to Admin Dashboard
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
