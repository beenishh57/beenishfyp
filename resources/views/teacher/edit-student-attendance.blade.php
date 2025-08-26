<!DOCTYPE html>
<html>
<head>
    <title>Edit Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3>Edit Attendance for {{ $student->name }} ({{ $record->date->format('M d, Y') }})</h3>

    <form method="POST" action="{{ route('teacher.attendance.update.student', ['student' => $student->id, 'date' => $record->date->toDateString()]) }}">
        @csrf

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="present" {{ $record->status === 'present' ? 'selected' : '' }}>Present</option>
                <option value="absent" {{ $record->status === 'absent' ? 'selected' : '' }}>Absent</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Marked Time</label>
            <input type="time" name="time" class="form-control" required value="{{ $record->marked_at->format('H:i') }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Attendance</button>
        <a href="{{ route('teacher.attendance.view') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
