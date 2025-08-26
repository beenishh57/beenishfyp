<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f3f6;
            font-family: 'Segoe UI', sans-serif;
        }
        .dashboard-card {
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .navbar {
            background-color: #003366;
        }
        .navbar-brand, .nav-link, .btn {
            color: white !important;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg px-4">
    <a class="navbar-brand" href="#">Student Dashboard</a>
    <div class="ms-auto">
        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container py-5">
    <h3 class="mb-4">Welcome, {{ Auth::user()->name }}</h3>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h5>Lecture Schedule</h5>
                <p>View your upcoming class lectures.</p>
                <a href="{{ route('student.lectures') }}" class="btn btn-primary btn-sm">View Schedule</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h5>My Profile</h5>
                <p>Update your student profile.</p>
                <a href="{{ route('student.profile') }}" class="btn btn-warning btn-sm">Edit Profile</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h5>Events</h5>
                <p>Check upcoming school events.</p>
                <a href="{{ route('events.index') }}" class="btn btn-info btn-sm">View Events</a>
            </div>
        </div>
        <div class="col-md-4">
        <div class="card dashboard-card p-3">
                <h5>My Attendance</h5>
                <p>View all your attendance records with filters.</p>
                <a href="{{ route('student.attendance') }}" class="btn btn-info btn-sm">View Attendance</a>
            </div>
        </div>

    </div>
</div>
</body>
</html>
