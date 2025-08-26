<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($editMode) && $editMode ? 'Edit' : 'Mark' }} Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mb-4">
        {{ isset($editMode) && $editMode ? 'Edit' : 'Mark' }} Attendance - Class {{ $teacher->class_assigned }}
    </h2>

    <form method="POST" action="{{ isset($editMode) && $editMode ? route('teacher.attendance.update', ['date' => $selectedDate]) : route('teacher.attendance.submit') }}">
        @csrf

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="date" class="form-label">Attendance Date</label>
                <input type="date" name="date" class="form-control"
                       value="{{ old('date', $selectedDate ?? now()->toDateString()) }}"
                       {{ isset($editMode) && $editMode ? 'readonly' : 'required' }}>
            </div>
            <div class="col-md-4">
                <label for="time" class="form-label">Time</label>
                <input type="time" name="time" class="form-control"
                       value="{{ old('time', $selectedTime ?? now()->format('H:i')) }}" required>
            </div>
        </div>

        <table class="table table-bordered">
            <thead class="table-secondary">
                <tr>
                    <th>Student</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>
                        @php
                            $existing = $existingRecords[$student->id]->status ?? null;
                        @endphp
                        <select name="attendance[{{ $student->id }}]" class="form-select" required>
                            <option value="present" {{ $existing === 'present' ? 'selected' : '' }}>Present</option>
                            <option value="absent" {{ $existing === 'absent' ? 'selected' : '' }}>Absent</option>
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">
            {{ isset($editMode) && $editMode ? 'Update' : 'Submit' }} Attendance
        </button>
    </form>

    <div class="mt-3">
        <a href="{{ route('teacher.attendance.view') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Attendance Records
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
