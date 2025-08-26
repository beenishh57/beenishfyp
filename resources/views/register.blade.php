<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - EduSphere</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 40px;
      background-color: #f9f9f9;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #990033;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin: 8px 0 2px 0;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    .error {
      color: red;
      font-size: 14px;
      margin-bottom: 10px;
    }

    .alert {
      background-color: #ffe6e6;
      border: 1px solid #ffb3b3;
      color: #cc0000;
      padding: 10px 15px;
      border-radius: 6px;
      margin-bottom: 20px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #990033;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 20px;
    }

    button:hover {
      background-color: #b3003b;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Register</h2>

    <!-- Global validation errors -->
    @if ($errors->any())
      <div class="alert">
        <ul style="padding-left: 20px; margin: 0;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('register.submit') }}" method="POST">
      @csrf

      <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
      @error('name')
        <div class="error">{{ $message }}</div>
      @enderror

      <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
      @error('email')
        <div class="error">{{ $message }}</div>
      @enderror

      <input type="password" name="password" placeholder="Password" required>
      @error('password')
        <div class="error">{{ $message }}</div>
      @enderror

      <select name="role" required>
        <option value="">Select Role</option>
        <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
        <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
      </select>

      @error('role')
        <div class="error">{{ $message }}</div>
      @enderror

      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>
