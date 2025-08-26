<!DOCTYPE html>
<html>
<head>
    <title>My Class Lecture Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f0f2f5, #e0eafc);
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            margin-top: 40px;
        }

        .schedule-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        h2 {
            color: #003366;
            margin-bottom: 25px;
        }

        .table thead {
            background-color: #003366;
            color: white;
        }

        .back-btn {
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 10px;
            display: inline-block;
        }

        .back-btn:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="schedule-card">
        <h2>Lecture Schedule - Class {{ Auth::user()->class_assigned ?? 'N/A' }}</h2>

        @if ($lectures->count())
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Teacher</th>
                            <th>Room</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lectures as $lecture)
                            <tr>
                                <td>{{ $lecture->day_of_week }}</td>
                                <td>{{ $lecture->subject }}</td>
                                <td>{{ \Carbon\Carbon::parse($lecture->date)->format('M d, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($lecture->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($lecture->end_time)->format('h:i A') }}</td>
                                <td>{{ $lecture->teacher->name ?? 'N/A' }}</td>
                                <td>{{ $lecture->room_no ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">No lectures scheduled for your class.</div>
        @endif

        <a href="{{ route('student.dashboard') }}" class="back-btn mt-4">← Back to Dashboard</a>
    </div>
</div>
</body>
</html>
