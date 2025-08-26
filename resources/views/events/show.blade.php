<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Details</title>
</head>
<body>
    <h1>{{ $event->title }}</h1>
    <p><strong>Description:</strong> {{ $event->description }}</p>
    <p><strong>Start:</strong> {{ $event->start_date }}</p>
    <p><strong>End:</strong> {{ $event->end_date }}</p>

    <a href="{{ route('events.index') }}">Back to Events List</a>
</body>
</html>
