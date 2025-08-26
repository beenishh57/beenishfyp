<!DOCTYPE html>
<html>
<head>
    <title>Assign Lecture - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
<div class="container bg-white p-5 rounded shadow">
    <h2 class="mb-4">Assign Lecture to Teacher</h2>
    <form action="{{ route('admin.lectures.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-3">
                <label>Class</label>
                <select name="class" class="form-select" required>
                    <option value="">Select</option>
                    @foreach($classes as $class)
                        <option value="{{ $class }}">{{ $class }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control" required>
            </div>

            <div class="col-md-3">
                <label>Day</label>
                <select name="day_of_week" class="form-select" required>
                    <option value="">Select</option>
                    @foreach($days as $day)
                        <option value="{{ $day }}">{{ $day }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label>Room No</label>
                <input type="text" name="room_no" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label>Start Time</label>
                <input type="time" name="start_time" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>End Time</label>
                <input type="time" name="end_time" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Teacher</label>
                <select name="teacher_id" class="form-select" required>
                    <option value="">Select Teacher</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }} (Class {{ $teacher->class_assigned ?? 'N/A' }})</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Assign Lecture</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ms-2">Back</a>
    </form>
</div>
</body>
</html>
