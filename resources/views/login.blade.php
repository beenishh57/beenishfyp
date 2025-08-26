<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - EduSphere</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      padding: 40px;
    }
    .container {
      max-width: 400px;
      margin: auto;
      padding: 30px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #990033;
    }
    input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    button {
      width: 100%;
      background: #990033;
      color: white;
      border: none;
      padding: 12px;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
    }
    button:hover {
      background: #b3003b;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    @if ($errors->any())
  <div style="background-color: #ffe6e6; border: 1px solid #ff9999; color: #cc0000; padding: 10px; border-radius: 6px; margin-bottom: 15px;">
    @foreach ($errors->all() as $error)
      <p style="margin: 0;">{{ $error }}</p>
    @endforeach
  </div>
@endif

    <form action="{{ route('login.submit') }}" method="POST">
      @csrf
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  
    <div class="register-link">
      Don't have an account? <a href="{{ route('register') }}">Register here</a>
    </div>
  </div>
</body>
</html>
