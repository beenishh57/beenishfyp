<!DOCTYPE html>
<html>
<head>
  <title>Approve Users</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f3f3f3;
      padding: 40px;
    }

    .container {
      max-width: 700px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #990033;
    }

    .user {
      padding: 10px;
      margin-bottom: 10px;
      border-bottom: 1px solid #ccc;
    }

    button {
      padding: 5px 10px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #218838;
    }

    a {
      text-decoration: none;
      color: #990033;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Pending Approvals</h2>

    @if(session('success'))
      <p style="color:green">{{ session('success') }}</p>
    @endif

    @forelse($users as $user)
      <div class="user">
        <strong>{{ $user->name }}</strong> ({{ $user->email }}) - Role: {{ $user->role }}
        <form action="{{ route('approve.user', $user->id) }}" method="POST" style="display:inline;">
          @csrf
          <button type="submit">Approve</button>
        </form>
      </div>
    @empty
      <p>No users pending approval.</p>
    @endforelse

    <br>
    <a href="{{ url('/admin/dashboard') }}">← Back to Dashboard</a>
  </div>
</body>
</html>
