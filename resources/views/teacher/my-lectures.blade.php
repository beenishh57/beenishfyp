<!DOCTYPE html>
<html>
<head>
    <title>My Lecture Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
<div class="container bg-white p-5 rounded shadow">
    <h2 class="mb-4">My Lecture Schedule</h2>

    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <select name="class" class="form-select">
                <option value="">Filter by Class</option>
                @foreach($classes as $class)
                    <option value="{{ $class }}" {{ request('class') == $class ? 'selected' : '' }}>Class {{ $class }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="day" class="form-select">
                <option value="">Filter by Day</option>
                @foreach($days as $day)
                    <option value="{{ $day }}" {{ request('day') == $day ? 'selected' : '' }}>{{ $day }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('teacher.lectures') }}" class="btn btn-secondary w-100">Clear</a>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Date</th>
                <th>Day</th>
                <th>Class</th>
                <th>Subject</th>
                <th>Time</th>
                <th>Room No</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lectures as $lecture)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($lecture->date)->format('Y-m-d') }}</td>
                    <td>{{ $lecture->day_of_week }}</td>
                    <td>{{ $lecture->class }}</td>
                    <td>{{ $lecture->subject }}</td>
                    <td>{{ \Carbon\Carbon::parse($lecture->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($lecture->end_time)->format('h:i A') }}</td>
                    <td>{{ $lecture->room_no }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No lectures found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('teacher.dashboard') }}" class="btn btn-secondary mt-3">← Back to Dashboard</a>
</div>
</body>
</html>
