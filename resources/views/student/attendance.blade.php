<!DOCTYPE html>
<html>
<head>
    <title>My Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            margin-top: 40px;
        }

        .attendance-card {
            background: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
        }

        h2 {
            color: #004080;
            margin-bottom: 25px;
        }

        .table thead {
            background-color: #004080;
            color: white;
        }

        .filter-row {
            margin-bottom: 20px;
        }

        .back-btn {
            background-color: #6c757d;
            color: white;
            border-radius: 8px;
            padding: 8px 16px;
            text-decoration: none;
        }

        .back-btn:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="attendance-card">
        <h2>My Attendance Record</h2>

        <form method="GET" class="row filter-row">
            <div class="col-md-4">
                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="col-md-4">
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="present" {{ request('status') == 'present' ? 'selected' : '' }}>Present</option>
                    <option value="absent" {{ request('status') == 'absent' ? 'selected' : '' }}>Absent</option>
                </select>
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('student.attendance') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        @if ($attendances->count())
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Marked By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $attendance)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($attendance->date)->format('M d, Y') }}</td>
                                <td>{{ $attendance->lecture->subject ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-{{ $attendance->status === 'present' ? 'success' : 'danger' }}">
                                        {{ ucfirst($attendance->status) }}
                                    </span>
                                </td>
                                <td>{{ $attendance->teacher->name ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $attendances->links() }}
            </div>
        @else
            <div class="alert alert-info mt-3">No attendance records found.</div>
        @endif

        <a href="{{ route('student.dashboard') }}" class="back-btn mt-4 d-inline-block">← Back to Dashboard</a>
    </div>
</div>
</body>
</html>
