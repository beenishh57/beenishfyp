{{-- resources/views/teacher/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-card {
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4">
        <a class="navbar-brand" href="#">Teacher Dashboard</a>
        <div class="ms-auto">
            <a href="{{ route('logout') }}" class="btn btn-light">Logout</a>
        </div>
    </nav>

    <div class="container py-4">
    <h2 class="mb-4">Welcome, {{ Auth::user()->name }}</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h5>Upcoming Events</h5>
                <p>View and manage your upcoming teaching events.</p>
                <a href="{{ route('events.index') }}" class="btn btn-primary btn-sm">View Events</a>
            </div>
        </div>
        <div class="col-md-4">
                <div class="card dashboard-card p-3">
                    <h5>My Lecture Schedule</h5>
                    <p>View all lectures assigned to you.</p>
                    <a href="{{ route('teacher.lectures') }}" class="btn btn-success btn-sm">View Schedule</a>
                </div>
        </div>
        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h5>Students Attendance</h5>
                <p>View all students assigned to your class.</p>
                <a href="{{ route('teacher.attendance.view') }}" class="btn btn-info btn-sm">View Students</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h5>Edit Profile</h5>
                <p>Update your personal and teaching profile info.</p>
                <!-- <a href="{{ route('teacher.profile.edit') }}" class="btn btn-warning btn-sm">Edit Profile</a> -->
                 <a href="{{ route('teacher.profile') }}" class="btn btn-warning btn-sm">Edit Profile</a>

            </div>
        </div>
    </div>
</div>
@if ($upcomingEvents->count())
    <h4 class="mt-4">Upcoming Events</h4>
    <ul class="list-group mb-4">
        @foreach ($upcomingEvents as $event)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $event->title }}</strong><br>
                    <small>{{ \Carbon\Carbon::parse($event->start_date)->format('F j, Y h:i A') }}</small>
                </div>
            </li>
        @endforeach
    </ul>
@else
    <div class="alert alert-info mt-4">
        No upcoming events scheduled.
    </div>
@endif

</body>
</html>
        