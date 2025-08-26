<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About | EduSphere</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      line-height: 1.6;
      color: #333;
    }

    /* Navbar (same as homepage) */
    .navbar {
      background-color: #990033;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 40px;
      color: white;
    }

    .navbar .logo {
      font-size: 24px;
      font-weight: bold;
    }

    .navbar ul {
      list-style: none;
      display: flex;
      gap: 20px;
      margin: 0;
      padding: 0;
    }

    .navbar ul li {
      display: inline;
    }

    .navbar ul li a {
      color: white;
      text-decoration: none;
      font-size: 16px;
    }

    /* Hero banner */
    .hero-about {
      width: 100%;
      height: 300px;
      background: url('https://media.istockphoto.com/id/1281150063/photo/college-campus.jpg?s=612x612&w=0&k=20&c=8g8MoUI5kYILlGCeJgnwzVBNfMYDE49Pav_w7xDJToM=') no-repeat center center/cover;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-align: center;
    }

    .hero-about h1 {
      background: rgba(0,0,0,0.5);
      padding: 15px 30px;
      border-radius: 10px;
      font-size: 36px;
    }

    /* About content */
    .about-section {
      max-width: 1000px;
      margin: 50px auto;
      padding: 0 20px;
    }

    .about-section h2 {
      text-align: center;
      font-size: 28px;
      color: #990033;
      margin-bottom: 20px;
    }

    .about-section p {
      font-size: 16px;
      color: #555;
      margin-bottom: 20px;
      text-align: justify;
    }

    /* Mission and Vision */
    .about-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
      margin-top: 40px;
    }

    .about-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      padding: 25px;
      text-align: center;
      transition: transform 0.2s;
    }

    .about-card:hover {
      transform: translateY(-8px);
    }

    .about-card h3 {
      color: #990033;
      margin-bottom: 15px;
    }

    /* Footer */
    .footer {
      background: #990033;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    }
  </style>
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

  <!-- Hero Section -->
  <div class="hero-about">
    <h1>About EduSphere</h1>
  </div>

  <!-- About Content -->
  <section class="about-section">
    <h2>Welcome to EduSphere</h2>
    <p>
      EduSphere is a modern college portal designed to simplify student life by integrating essential academic and campus features into one platform. 
      From tracking attendance to staying updated with schedules and campus events. EduSphere ensures that students remain connected and informed every step of the way.
    </p>
    <p>
      Our goal is to provide a user-friendly, efficient and engaging digital experience for both students and faculty members, 
      bridging the gap between technology and education.
    </p>

    <div class="about-cards">
      <div class="about-card">
        <h3>Our Mission</h3>
        <p>
          To empower students and faculty with technology-driven solutions that improve communication, streamline academics and enhance campus life.
        </p>
      </div>
      <div class="about-card">
        <h3>Our Vision</h3>
        <p>
          To be the leading digital education platform that transforms how institutions and students interact, learn and grow together.
        </p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <div class="footer">
    <p>&copy; 2025 EduSphere. All Rights Reserved.</p>
  </div>

</body>
</html>
