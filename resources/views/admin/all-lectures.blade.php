<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lecture Schedule - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', sans-serif;
            color: #333;
            padding: 40px;
        }

        .schedule-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        h2 {
            color: #990033;
            margin-bottom: 25px;
        }

        .form-select, .btn {
            border-radius: 10px;
        }

        .btn-primary {
            background: #990033;
            border: none;
        }

        .btn-primary:hover {
            background: #b3003b;
        }

        .table {
            margin-top: 20px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .table thead {
            background-color: #990033;
            color: white;
        }

        .table td, .table th {
            vertical-align: middle;
        }

        .back-btn {
            background: #6c757d;
            color: white;
            border-radius: 10px;
            text-decoration: none;
            padding: 8px 16px;
            display: inline-block;
            margin-top: 20px;
        }

        .back-btn:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>
<div class="container schedule-container">
    <h2 class="mb-4">Lecture Schedule</h2>

    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <select name="class" class="form-select">
                <option value="">Filter by Class</option>
                @foreach(range(0, 10) as $class)
                    <option value="{{ $class }}" {{ request('class') == $class ? 'selected' : '' }}>Class {{ $class }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="day" class="form-select">
                <option value="">Filter by Day</option>
                @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'] as $day)
                    <option value="{{ $day }}" {{ request('day') == $day ? 'selected' : '' }}>{{ $day }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('admin.all-lectures') }}" class="btn btn-secondary w-100">Clear</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Day</th>
                    <th>Subject</th>
                    <th>Time</th>
                    <th>Teacher</th>
                    <th>Room</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lectures as $lecture)
                    <tr>
                        <td>{{ $lecture->class }}</td>
                        <td>{{ $lecture->day_of_week }}</td>
                        <td>{{ $lecture->subject }}</td>
                        <td>{{ \Carbon\Carbon::parse($lecture->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($lecture->end_time)->format('h:i A') }}</td>
                        <td>{{ $lecture->teacher->name ?? 'N/A' }}</td>
                        <td>{{ $lecture->room_no ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No lectures scheduled.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="back-btn mt-4">← Back to Dashboard</a>
</div>
</body>
</html>
