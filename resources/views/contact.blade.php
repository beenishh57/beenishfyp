<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact - EduSphere</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #fff;
    }

    /* Navbar */
    .navbar {
      background-color: #990033;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 40px;
      color: white;
    }

    .navbar .logo {
      font-size: 22px;
      font-weight: bold;
    }

    .navbar ul {
      list-style: none;
      display: flex;
      gap: 20px;
      margin: 0;
      padding: 0;
    }

    .navbar ul li a {
      color: white;
      text-decoration: none;
      font-size: 16px;
    }

    /* Contact Section */
    .contact-container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      gap: 40px;
      padding: 50px 20px;
      max-width: 1100px;
      margin: auto;
    }

    /* Left Info */
    .contact-info {
      flex: 1;
    }

    .info-box {
      background: #990033;
      color: white;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .info-box i {
      font-size: 20px;
    }

    /* Right Form */
    .contact-form {
      flex: 2;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .contact-form h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .contact-form label {
      font-weight: bold;
      margin-top: 10px;
      display: block;
    }

    .contact-form input, 
    .contact-form textarea {
      width: 100%;
      padding: 12px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    .contact-form button {
      background: #990033;
      color: white;
      border: none;
      width: 100%;
      padding: 12px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
    }

    .contact-form button:hover {
      background: #770029;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .contact-container {
        flex-direction: column;
      }
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="logo">EduSphere</div>
    <ul>
      <li><a href="{{route('home')}}">Home</a></li>
      <li><a href="{{ route('about') }}">About</a></li>
     <li><a href="{{ route('contact') }}">Contact</a></li>
      <li><a href="{{ route('login') }}">Login</a></li>
      <li><a href="{{ route('register') }}">Register</a></li>
    </ul>
  </div>

  <!-- Contact Section -->
  <div class="contact-container">

    <!-- Left Info -->
    <div class="contact-info">
      <div class="info-box">
        <i class="fas fa-map-marker-alt"></i>
        <span>Govt. Graduate College for Women, Satellite Town, Gujranwala</span>
      </div>
      <div class="info-box">
        <i class="fas fa-phone"></i>
        <span>+1 234 567 890</span>
      </div>
      <div class="info-box">
        <i class="fas fa-envelope"></i>
        <span>info@example.com</span>
      </div>
    </div>

    <!-- Right Form -->
    <!-- In your contact.blade.php file -->
<div class="contact-form">
    <h2>Send us a Message</h2>
    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <label>Your Name</label>
        <input type="text" name="name" placeholder="Enter your name" required>

        <label>Email Address</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>Phone Number</label>
        <input type="text" name="phone" placeholder="Enter your phone number">

        <label>Message</label>
        <textarea name="message" rows="5" placeholder="Write your message"></textarea>

        <button type="submit">Send Message</button>
    </form>
</div>

  </div>

</body>
</html>
