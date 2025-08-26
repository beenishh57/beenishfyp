<!DOCTYPE html>
<html>
<head>
  <title>Manage Teachers - EduSphere</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f3f3f3;
      padding: 40px;
    }
    .container {
      max-width: 900px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    h2 {
      color: #990033;
      border-bottom: 2px solid #eee;
      padding-bottom: 10px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }
    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #f8f8f8;
      color: #990033;
    }
    .status-approved {
      color: #28a745;
      font-weight: bold;
    }
    .status-pending {
      color: #dc3545;
      font-weight: bold;
    }
    .btn {
      padding: 6px 12px;
      border-radius: 4px;
      cursor: pointer;
      border: none;
      color: white;
      font-size: 14px;
    }
    .btn-approve {
      background-color: #28a745;
    }
    .btn-deapprove {
      background-color: #dc3545;
    }
    .btn:hover {
      opacity: 0.9;
    }
    .actions {
      display: flex;
      gap: 5px;
    }
    .alert {
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 4px;
    }
    .alert-success {
      background-color: #d4edda;
      color: #155724;
    }
    .alert-error {
      background-color: #f8d7da;
      color: #721c24;
    }
    .back-link {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      color: #990033;
      font-weight: bold;
    }
    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Manage Teachers</h2>

    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    @if(session('error'))
      <div class="alert alert-error">
        {{ session('error') }}
      </div>
    @endif

    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Status</th>
          <th>Class</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($teachers as $teacher)
          <tr>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->email }}</td>
            <td>
              @if($teacher->is_approved)
                <span class="status-approved">Approved</span>
              @else
                <span class="status-pending">Pending Approval</span>
              @endif
            </td>
            <td>
  <form action="{{ route('admin.teachers.assign.class', $teacher->id) }}" method="POST">
    @csrf
    <select name="class_assigned" onchange="this.form.submit()">
      <option value="">Select Class</option>
      @for ($i = 1; $i <= 10; $i++)
        <option value="{{ $i }}" {{ $teacher->class_assigned == $i ? 'selected' : '' }}>
          Class {{ $i }}
        </option>
      @endfor
    </select>
  </form>
</td>

<td class="actions">
  <form action="{{ route('toggle.approval', $teacher->id) }}" method="POST">
    @csrf
    @if($teacher->is_approved)
      <button type="submit" class="btn btn-deapprove">Deapprove</button>
    @else
      <button type="submit" class="btn btn-approve">Approve</button>
    @endif
  </form>
</td>

          </tr>
        @empty
          <tr>
            <td colspan="4" style="text-align: center;">No teachers found</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <a href="{{ url('/admin/dashboard') }}" class="back-link">← Back to Dashboard</a>
  </div>
</body>
</html>