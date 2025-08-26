<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EduSphere</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

    .hero {
  width: 100%;
  height: calc(100vh - 70px);
  background: url('/images/student.jpg') no-repeat center center/cover;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}

/* Flash message inside hero */
.flash-message {
  position: absolute;
  top: 30px;
  left: 50%;
  transform: translateX(-50%);
  background-color: #e0ffe0;
  border: 1px solid #a0dca0;
  color: #006600;
  padding: 15px 25px;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  font-weight: 500;
  animation: fadeOut 5s ease forwards;
  z-index: 10;
}

.features {
  padding: 60px 40px;
  text-align: center;
}

.features h2 {
  font-size: 28px;
  margin-bottom: 10px;
  color: #333;
}

.features p {
  font-size: 16px;
  color: #555;
  margin-bottom: 40px;
}

.feature-cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 25px;
  max-width: 1200px;
  margin: 0 auto;
}

.card {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  padding: 20px;
  transition: transform 0.2s;
}

.card:hover {
  transform: translateY(-8px);
}

.card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 8px;
  margin-bottom: 15px;
}


.card h4 {
  font-size: 14px;
  color: #888;
  margin: 0;
}

.card h3 {
  font-size: 20px;
  margin: 8px 0;
  color: #990033;
}

.card p {
  font-size: 14px;
  color: #555;
}


/* Why Choose Section */
.why-choose {
  padding: 60px 40px;
  text-align: center;
  background: #f9f9f9;
}

.why-choose h2 {
  font-size: 28px;
  margin-bottom: 10px;
  color: #990033;
}

.why-choose p {
  font-size: 16px;
  color: #555;
  margin-bottom: 30px;
  max-width: 900px;
  margin-left: auto;
  margin-right: auto;
  line-height: 1.6;
}

.stats {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 25px;
  max-width: 1000px;
  margin: 0 auto 40px auto;
}

.stat-box {
  background: white;
  border-radius: 10px;
  padding: 25px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  transition: transform 0.2s;
}

.stat-box:hover {
  transform: translateY(-5px);
}

.stat-box h3 {
  font-size: 32px;
  color: #990033;
  margin-bottom: 10px;
}

.stat-box p {
  font-size: 14px;
  color: #555;
}

.closing-text {
  font-size: 16px;
  color: #333;
  font-weight: 500;
}


/* Upcoming Events Section */
.upcoming-events {
  padding: 60px 40px;
  text-align: center;
}

.upcoming-events h2 {
  font-size: 28px;
  margin-bottom: 10px;
  color: #333;
}

.events-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 25px;
  max-width: 1200px;
  margin: 30px auto 0;
}



.event-card:hover {
  transform: translateY(-5px);
}

.event-date {
  background: #990033;
  color: white;
  padding: 8px 15px;
  font-weight: bold;
  position: absolute;
  top: 10px;
  left: 10px;
  border-radius: 6px;
  font-size: 14px;
}


.event-content h3 {
  font-size: 18px;
  margin-bottom: 8px;
  color: #990033;
}

.event-content p {
  font-size: 14px;
  color: #555;
}



/* Footer */
.footer {
  background-color: #990033;
  color: white;
  padding: 50px 40px 20px 40px;
}

.footer-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 30px;
  max-width: 1200px;
  margin: 0 auto;
}

.footer-column h2,
.footer-column h3 {
  margin-bottom: 15px;
  color: #fff;
}

.footer-logo {
  font-size: 22px;
  font-weight: bold;
}

.footer-column p {
  font-size: 14px;
  line-height: 1.6;
}

.footer-column ul {
  list-style: none;
  padding: 0;
}

.footer-column ul li {
  margin: 8px 0;
}

.footer-column ul li a {
  color: #fff;
  text-decoration: none;
  font-size: 14px;
}

.footer-column ul li a:hover {
  text-decoration: underline;
}

/* Social Icons */
.social-icons a img {
  width: 28px;
  margin-right: 12px;
  transition: transform 0.2s;
}

.social-icons a img:hover {
  transform: scale(1.2);
}

/* Footer Bottom */
.footer-bottom {
  text-align: center;
  margin-top: 30px;
  padding-top: 15px;
  border-top: 1px solid rgba(255,255,255,0.3);
}

.footer-bottom p {
  font-size: 13px;
  margin: 0;
}

/* Make event cards same size as feature cards */
.event-card {
  display: flex;
  flex-direction: column;
  height: 100%; /* ensures equal height in grid */
  border-radius: 10px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  overflow: hidden;
  transition: transform 0.2s;
}

.event-image-container {
  position: relative;
  flex-shrink: 0;
}

.event-card img {
  width: 100%;
  height: 200px; /* same as feature card images */
  object-fit: cover;
  border-radius: 8px 8px 0 0;
}

.event-content {
  flex: 1;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}




@keyframes fadeOut {
  0%   { opacity: 1; }
  80%  { opacity: 1; }
  100% { opacity: 0; display: none; }
}

  </style>
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <div class="logo">EduSphere</div>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="{{ route('about') }}">About</a></li>
     <li><a href="{{ route('contact') }}">Contact</a></li>
      <li><a href="{{ route('login') }}">Login</a></li>
      <li><a href="{{ route('register') }}">Register</a></li>

    </ul>
  </div>
<!-- Hero Section with Background Image -->
<div class="hero">
  @if(session('success'))
    <div class="flash-message">
      {{ session('success') }}
    </div>
  @endif
</div>


<!-- Upcoming Events Section -->
  <section class="upcoming-events">
    <h2>Upcoming Events</h2>
    <div class="events-grid">
      @forelse(\App\Models\Event::where('start_date', '>=', now())->orderBy('start_date')->take(4)->get() as $event)
        <div class="event-card">
          <div class="event-image-container">
            <span class="event-date">{{ \Carbon\Carbon::parse($event->start_date)->format('M d') }}</span>
            @if($event->image_path)
              @php
                $cleanedPath = str_replace('public/', '', $event->image_path);
                $imageURL = asset("storage/{$cleanedPath}");
              @endphp
              <img src="{{ $imageURL }}" class="event-image" alt="{{ $event->title }}">
            @else
              <img src="https://via.placeholder.com/400x200?text=No+Image" class="event-image" alt="No Image Available">
            @endif
          </div>
          <div class="event-content">
            <h3>{{ $event->title }}</h3>
            <p>
              {{ \Carbon\Carbon::parse($event->start_date)->format('h:i A') }} -
              {{ \Carbon\Carbon::parse($event->end_date)->format('h:i A') }}
            </p>
          </div>
        </div>
      @empty
        <p>No upcoming events at the moment.</p>
      @endforelse
    </div>
  </section>



<!-- Key Features Section -->
<section class="features">
  <h2>Key Features of Our College Portal</h2>
  <p>What you can access through your student dashboard</p>

  <div class="feature-cards">
    <!-- Card 1 -->
    <div class="card">
      <img src="https://media.istockphoto.com/id/1198430065/vector/attendance-concept-vector-flat-design.jpg?s=612x612&w=0&k=20&c=Q21HKmopEQcN1mhGYNPzRYMWtjla-C-eyGyVEPpoJ5w=" alt="Attendance">
      <h4>TRACKING</h4>
      <h3>Attendance</h3>
      <p>Check your daily and monthly attendance status with ease.</p>
    </div>

    <!-- Card 2 -->
    <div class="card">
      <img src="https://media.istockphoto.com/id/1712969554/photo/calendar-with-business-appointments-pens-coffee-cup-and-spectacles-monthly-schedule-business.jpg?s=612x612&w=0&k=20&c=rORqx92qaI6GaZmLxjPpQzEi9Z3opremHCqhuQrEcS4=" alt="Timetable">
      <h4>SCHEDULE</h4>
      <h3>Timetable</h3>
      <p>Stay on track with your class schedule and updates.</p>
    </div>

    <!-- Card 3 -->
    <div class="card">
      <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUTEhMWFhUXGBcZGRgYGBgbGRoYGBcdFxcdGhkeHSggHRolGxgYITEjJSkrLi4uGB8zODMtNygtLisBCgoKDg0OGxAQGy8mICUtLS0tLS0tLS8tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS8tLy0tLS0tLS0tLS0tLf/AABEIAKgBLAMBIgACEQEDEQH/xAAcAAACAgMBAQAAAAAAAAAAAAAEBQMGAAIHAQj/xABDEAACAQIEAwYEAwYEBQMFAAABAhEAAwQSITEFQVEGEyJhcYEykaGxUsHRByNCYuHwFHKS8TNDgqLSU7LCFhdUc5P/xAAaAQADAQEBAQAAAAAAAAAAAAABAgMEAAUG/8QAKhEAAgICAQQBAwQDAQAAAAAAAAECEQMhEgQxQVETFCKBMmFxoZGx8UL/2gAMAwEAAhEDEQA/AOp15NeqCdq37k+XzFVIGk1tNasIrya442JrU1k1k0TjA1ZNRXLoG/2NaDFKSACD/fQfnXUCwgNWZ6Fe8QdtIJ2PLqdqAvliScz6/wAMSuuuhAI+k1zQHId5xzIHqRRncKCFLeI7CqphMMS0yoHkPF9qsyYw5eUgaE7z51Np+BoyvuQ31CkgkCOunKftQR4jaAmWyzGYKcs+tQYjBuwuSwLMPTWQfyj3qDDXlWx3Ny1fYkkkD4ZnQgj2PSarGKojLI0/RPjuKogkAsDqCIgj1ml//wBQr+GPf9BQeM8NoIT4pJPlMafSfeh8JatspBnNygT/AGaoopEXlmx/h+JK/wACs3WBoPckCj1uCl/DcObaBSZ+ensaKFBpGiLdbJy1CX+JIrBTmzEwAFbU+WkH2qc0NjMWltczmB9z5VyR0nonsYnNupA84n6E/Wp7TxOuh5+fKR8x71Wr3ai2DCqzeeg/rReA4ylwiBcEmJySPmJp3iddifyx9j+ydRB0nYLE+pzflQeLXIYZomYGkn060HxDisXRbVxbXwS3+YAzO4AB8qjxWPbDXMpY3lMeMga+QbqOkka0qg7BLKq/gaYEBmEzHmCJ+Y57US7xzUabQPkdN/WqjxvG3c6m2HAUhgVzFWB1BMCYiNNd6GxHF75MAM6g6d5aV/TVlJp/gct2L9QkWPimItqveh2ABywq+FtCfhPSNcpG4qvWu0p1Btk9CCBp5jYfOst4+/dGS5JUeKGAGoGkaaegjSaeXeF2LfdJcJi4uY3M6BFPTId11AnzHs9RgqlsnynN3HQHh+KWmAJdV0kgn4dY1O1SJxmw7BA4LCYIJB84Yae01Xu1OB7lig0Ckbc5Eq3uJ05a9arjIYmNKtHDGauxHlknTRfcXxa3bBh0gkSc5Zzy1A6a0MnGLJ/5q+5I+4FUWa2tWmcwqlj5An7U6wRQPlZeU4haaYuIY/mFePxC0N7if6hVQscIvMwBQrPNgYHrW1rhLM5RHRmXfXTfkdz5wNNK744+w/JL0XTBYtH+F1PkGU/QGizSHhXAFQZruVyeWWQPQnn5xTjD4ZUEIMokmB1PrUJJXotG62SGvKw15QHLNYuCCDpt/sa8uYm2vxOo9ASflSrGYzKumb1ABj1mlClnbwj2gfWAKxUWc67Fmu422ZYtCjSYPt5k1A3FLYAJW4FOzFND6a0t4lhXyWzHhAIPkxO59Rl+VGcRxNlrQtKbtwqBk0ESBA0gE6eRp1FaJucthF/GIAGBkESCBQb8RDAhQ89QATQ7AJbVGOskmIMTGnnoBz5mhMoOzfMEfaRR0g82whsSB8LuI/ETqfYGtRjSCJuEga7afcVC1gn4VHscx+/6VMnCLhHIEiQDof70pWwbNcVjFaSoMmNTrI6EEkRPSpHBuEeEK2xkmMp8h116VnC7ijQr4ubaHT8qseFwmcSBp1Mj5ClboaK5FexmCVRKB/DtE7+/L0rbhL3TpuJ/jzAx5Hb2pve4AZLCC0zoSD94ml2IxLo2xYbERrO40jb78+QHJp9jmuL3oYXz4SF3I3/vlVYu3LxfLBzExG39in1q6GUMAROsGtxcplo6cVIWJwVdC7FjzGw/Wilwyr8Cqp6hRNFk14qTTWHgl2A1tPmBa5PkFAB9dz9aka4BEsBOgkxrUjDWhMTwy4wYyxkyunwjX4RI18/KnVeRXpaJ8WbgUm2uZulVjHYO+95BeUmdgNBlnWDrFWnD4q4UUK0eELmOUHODGqkxqBPP4qWccDLauDMSAyQqk6eEhs0aBTvvyFNjbTojkakr2I+O2lVguY5F2QL8OgJ8ROszvqdaV4TFlDoSJjYxqDofPnUN24SZmmCcHukKWKgN1iR0kH7A862pJKmZW3J2hzh7y3SlxCFuJlInUNlMjbXTb0gGIksuIYjE4j93eNpEDAkiDBGkwGZuvSqvw20bd4LcXSZ8oBkncjb70Tx/4Ve27OpOuugny3mpPGuS/oKb4v8Asg7RXQbhCaqsKOsKAokdYFKbNtnYKo1qYOHAEnMBuY1/l/Qn02iIVYg/ry/OtEVSom+9hWHV7bgAePblz0jXerJh+NJlyutu53a+HvFzASwBymZy66A9BVevXMoknxOPWFI19zt6etb4LCs1t2UA+Hf/AK1O1TnFS2xoycewbisXbxDv31wgmIhYEjRRHJQCfXTbekOIvlC9tGBSSJ5Hz1qK9Mmd60vdev8AZ+tUjFRA3YOaYcL4jcQqiBYZgD4ZJkx11jlW3DeHLe0DkPqSMoiOX8Un2pvw3CpZBLpDqYz7hs22Tn5RFCUl2HjFjKy5I8QggwY29R5Hf3ofC8PS27Oogt8h1jpP5Vph1LXmc28q5QAzRmJB5cwI/vWjai9FlsmVtKlR6Gr1GpWh0wktWuatZr00ow2C+v2qVAo2AFbMlRMpFYTQEJdI2r03/b0oUGvWPSicJ8WnjInnt5HXemtzhKJPiZyNwgAI0nmZjziq+Myt4pB86e4y6jMH75V8KbBiwIUA7Dy611klRmGW1vkOUblmnXoAAJNR8ZxJTL3ZKoyA5ZJG5B+1RYjG2j8b3HI8lUfUn5xS/iXERcCqikBARvmJ1J1gDrXUBy0OOD3FbKGAOZ45co6Aaa/Sn/HrwSw0syzCgqJMnYAafcVROE3WzFdRz6QRoD9Y96uqY5WQC8A/nAIJHkf71pZR2mUxy+1oB7K40D90S5JJILeQ1AEmNiaYcYVZIPNYI016Tr6Vq3FLSD92gHsB9qU4jGljLf1o8W5cqoNqMON2bWbSL8IIHp/Wpv8ADg6g0GsH4TPlsf60WmMieux06b86dp+AJmFANzW9q7HMfX9KGv3wY6VoHEijxOsJa7CswIJCkjfkPMct/alqcKN1Eulrstcyu0ggAmAVEzvlHlr0oe9xbI2VCpI1YnZRtqOZ1AjzAoFmsupb94qgjwhgV1k6SNNvPeqxg/BnyTV+xnb4l3KXAwLNbZVzGJPxRrJ2y7+flQS8WS+oJIRgfxePfQ5hHyM0g4nxMFclsQo85JPUnmdPSh+GcOvXjNtJH4jovnrz9qusUUreiKnJ6Q8xNuwLjMSskag7a85gwYoJOFW7hIR3ukA6Ag8tAWiBr1NOuH9lbaeK4xc9Bov6n6elWCzaVBCqFA2AED5VKXUqP6dl49O5fq0c+bh9ywD3iFfA2uhBLDIBI00zz/tQxu3u7OQnIRDAQfLbcbb1e8VisPczYd3Us0DLOs6sIPJhln2qj8SwN3DPAJ3OVh/ED+YjUf0rRgzfJp9yGbFw2uwALn4v7/WmeFQOMx1K/wDeeSnz+484kng2HvFpuMYPImeW53gAfarGMAbywELKNtPr5E0+TIkThCyiYq6W1Opkz9/1+VG8MxTIHVTrkM/Mafr/AEq1X+FWQNUGafHJIOg+IHaRrIgzNAcC4SAzOPFOcLodtRJnUkxttQ+WLid8bToS2OG3rxJCM2usKW+w094rbH8Euok5NAdYZSRMDVQSQJjcdOtXU4TvAkgzbJBWJBUyQcmxIY9OgqFMDeRrZJBhmFwkhAUYAfC0SwGYzHJd4qXzu/BT4f5KBgOHXWdSqsoBHiOkRzE71b80jUR5GOR/s17w21ntksQpBMcgw3DamRPTehLqkNmBPwwRyiZneM29O5cmGK4oJLV5moaziQ89RoRroSJ5joa3rqGsIDVrmqIGtlNCgkq3K8e7rXkVqU86GgltrK8rK802mpStTbqSt7Vud644WYvCZiD1GU9Y3BB8j9zVexiMjFSdulXa9bA2oK/gkf4lB8+fzGtFMnOFlf4ZhwVLtrrpPKKIt3w05dY3PL586NvcDtkQAR5gn86Gt4BrTASxQDSBsfMD70yYnFo0Nkhg0AkiIBOaJ2giPrU17Ea5QDA0nkep+f5VmIxQtgmCWBgA6akTM+Q6dRSteJtPwAj3Hr1plsDaQxzk16qTUOE4is/vFyjqNfpTHD37dyQhBjlBHvqKN0FU/IOByFTG5yOoHX9aKWwN4qM2RXWNxIMgOgPsf12+1RJabMBBmdqKFgUwRCBEes8h5fn/AL1znxO4Wc548SrsuXKJkn8R2n03j1J0mAXw/gl65ahRkllJZpGgDbDc/F8/Sry+CtkhioJB0zAaHyNSupjXqfsKL6nVRQi6ZXbZXOH9mbVvV/3rdWGnsv6k06AHT5VWeMdscLhyy2/3twmSEjLMR4n25AaSdKWi7icZbN25eFqzlc93b1Y5CMwgkFtDJlojWBSVKe5Mr9sFSLevFbEsobO4jwKROpjfy5jeqH224xfN3uluZbcDwpoRI2dgZJHrHlWmFwmHdxaQXZaVVmZFAciEJQKZlsoPi50nTCnNrWjFgSZKWVtETkpatgaeN3EaEfCqkHcEFWrpXAbwxdju7jEXcgaRE67MvInXUf2KJxPCEBF/Ci/903P/AJ0dwTGvYAfpompBnc6j+EbkbEkaamqyxNq138Cciz4yx3ByHUnUnlHL7a+3Q1YuBY9WtC2HFtwd+sn+/lSfDY1cbb1gXF3HToRzytvS57TKcsGdoGv0pOKyx4y00JbxSuPYt+NtpcxKqN9M3qAT9oor/H27dz/Di2RCFhCjKQBJgDf9dKqWBxTLdDu8sCNtTppr7epq0YnCDFFLi3XTLyXroZB2+hrNlx8aT7V/ZfFNytxW7/o1xdpLtoXrUiRpy5x9/bn60LirXZJQyf5dHH5OP5T866FeW3YtuoZvESTJkidz5D86o+NJJJXbqPPrzFW6V9/Xgn1C2vfkETiOZAAQbkElSY1BiDvH1iaS4N75xAd1YT4TKnKBqdP186am1mOo15EaH5jXWtBZI1l/ck/Q1uSozt2b2cQzZgQVIkbfWZIPp7862e6wIhZHPUT6jWKizHqaFxPEFteEyTBImT6SeUmu4hs9vcZa3/xLLKDsQwM/lPvRmF4mrgZZk/wnQx110I9JpLheN5mi6AFg7An5+XtUtziiBsrZXtmCCNcvKCsf1g865xOUiyo+lal6Gs3QRIII5RXpuVPiUsu1ZWoNezXlm09rBXlE4a1oSdh9TXPQSDLWwsN0NMLRIOsKByEf2anL7kkERSOQyiJjp60FxDHG3AAzM2w/vemd5CzExSjjGBK/vQJMEaa68j7CfeKeOyU20tCbiGKJaDBjnpqeZ089vICieGOgAMDnI2k8tSdtudKsuuuw/v51FcuyenSrcTHy3Y/s2rd24qEmJbbeIkAEiNx9aKtWwhzWUUj8bMTlHMsBAj2I9aQ4fF93eD9GDR1EzHypngcSrsBbtDX8TM32yj5iucWMpL8h+O4qe5LKqkqwG0SGBgkDzU+xFS4FXdQzpknWJk+vl760Hdx1onIxzCQSLaqF02ltJj0PrTzC4y3cgAkHo0a+hHOpzTitIvikpPbNUQLrz5frU2EYQTzqr9se1K4M5SjM5EqNljkZ6eg8q5TxvtRicSf3lwheSJ4UHtz9yalTfc0X6Oxdqe1drDWp0uXJgKCP+4wYG9c/4z2tvXbad5lyuGJSDkjOVHOf4DrM1S8PiCDrqOYOxFNeJ24SyVmO79xN240H2O/OPlfHFEptk692/wAEIfwsFK+zxp6MB/mNWHBcYu2US2yIwgkZ1nwtKuFIPwssCR7GqTZc1buz9wkoDqoVmKnVSRmOx6mBI11rVGKaITdFi4PZZtRatIQM2igZRvL3LmYr7EHzHM60MGp8TBiSSSttmE/5mMmoOMXcoWyNBCu/8zuM2vWARHqaadn+z1q9ZLszZiSNI8MbSI160smox5PROPKUuMSDFcGs35a0wjnEyoHVDrEDlSHiHCmmIgAQo305eusn1Jp3g7RRpU6qdCPy8qsyYVbtsMBBMyB15geRofP8b3tDwhzRz3C2ThiLpMMNCo1JHIHp01102qxW8SuJt5k8LDRhz9CeYO45flHjuBOxMqdRoB9PagsBwPFWnzW0OnJiFDDmNT7g8j6mqT4SXLkrOipfprRu2GHMUxwGOKLk1iZBG4PoetH3eHs0EjKefP7c69wnDsjSBJ6n6xWefUwcdlYdLPl6Qox73bjEqjR0IHz9aDXC3wdLZnyA/KrSQ4/hFbIX/DHuKgutklSSNH0UfbEfD+FXWYFrYTz0H/aPyivcRZzgvkXICFkHxa842+nlNOHxTKfh+tCKWXMbWSG5ONV3kA7RrXR6mUn6FydIorVifF8PtKBBbUSG/pEe1JrvZm00sz3GY6lgVH/bliKsuIvZUVNGgGT5kk6fOgNJ08JqcupyJ6kXj0+NxVxKRxrgFywM4PeW/wAQEFf8w5eu1JS1dWQ9fpz9RVc432SV5fDwrfg/gPp+E+W3pW3p+uUvtyf5MWfonHcP8FOsYp0MoxB8ufr1pna4+Y8a6+W31pfxHAPaJDgxMT/e1B5q9Ew9jvaJNStYjnSTD9qMPMB9SQACrjXlypvcxBavHcZJnpKSfY8kVNYxMaEAg8qqfE+1Vu1de0yP4YGZSOag7EiN61w/bCwYEXNt4HISZ18qb42xPlin3Lkb6fh/7v6VImIzCIEb6fKq3wrjKYh2W2G0EyRvrGms0xPErVpslxwCY089xJ5UjhQ6mmrHGMLW7eZUztppyE+QrLAW9aBcLm5gHZuXodvMUBjMVZxGVDdyFTqpBnbzrXEPbwttu7Yy0DMxGkTsNJOp09KTi6ryFzV34orvHsJ4/AIU67gayQefOJpScI38v+tP/Kt8bjBcb8PIdIHXofMaa8t6AuEgwa2Ri6MEmm7D7+EJIMrqB/GnLw/i8qbjBtbw+kA3CBMg+CMxgjrK+wNK+G4FrwU7KCQT6awPPxGrjdw4uWhbGhSMvlAjXyI0nyFLKXGh4Y+SbBuydnIHPdlyYGYBdP5dT76fpQ2PwzWnOYABiSMp0Anl6VNh8XiLClAm5mSpO4A0I0O1brh718hr5IUdQFMHkBGm25qe+Tk+xVJcFFLaPO1PBxi8OoYhXgMrRIzFQTI2Kn9DyrjWMw1hGZLhuo6kggWl0I6g3fsQK7qcUGOQ/wDSfPp6chVE/aH2VN9e+tD98g1Uf8xRy/zjl126RNa0zQ1e0UOzhcP/AAvcfyCoh+RZp9po/iGItIyqbdzS3aBBuLsbatBHddW+fSqtYbWnXF77C5k+IKttYIn4baqY6bcorRAjJE+ayBmW0xH81yYPQwo/r8wHvAsUuZALaDMGUa3NyPCPj/ERSLg2FL3FTIyZiFMglTJ84I67mrkeCWJaypK3F1QlwcxyyZAHh2FXTiu5KSbDuMrmZLw+G4i+zIoRh9AferF2Uw1nuC7xOYhszQNNQImCIPOqxwXiSvbIuiVY6rMFnH8Vs8mAOo8wNc0AleHKT+7vJ6XJRh5HQj60s48o8LolF8Z86ss3Fr1ho7srmG+UaEeu3+9MeCrltSeZJH2/KqzhMEqwblwPv4bcmYiZYgQNRtRHE+OArlUj22HQDyrM8DlUYmqGavukT43tELVwl1JXYxuPMVIva7BkT3yr5NIPyIqpcUVnWSZOvXWN4MQY8qo+PeD6HnqPccxWp9JjlEEOplF0d1s4226i4plWEhhsR1B6VPauqdiK5fjf2nIbcCy6vEQCpT2MzHtVZ7PdrblnEZrhLWbhkj8MakqOo2I579K8/wCmnu9G+WaFa2d2vKDWiJFVqxxNoW4j5kYAjWQQdjPSnnD8eLqzEQYPrvUp4pRV+DoZVJ0iDieHJ1UwaFs3SCM605daFuWxUKo0ctUxXxBEnwigQq04u4cGhGwtBsKAjZHI16EI2NEHCVp/hooWHTBcTYS4Iceh5+xpU/Z9gfAVj5fQCm95IqLMetacXVZMaqL0Z8vTY57aKjhMO3eAAbMvykT966VbQ5R6D7Ug4cqNe7q2yWxzuMAScsE5ZiPLnznkHWGxLrdFtmLqWCyRrqYDCdR1r0crs8nA63+DnXaSwXxl0KCSWEAAkmEHKoMNh7aE940nK3hQgn4ToW+Ee2Y9QKJ7XY4jEXkGiliCF0mPxHdvfblSEXR+KdG5fymqpaRmf6mOLnFnt2ybJ7saDwFlJE82nMfcx5U24fgr+KtW7gMsV1ZiTzP8UdNN6qJuxZYydSPvV/4Xxex/hsOJYEWiMqgak6MZJ56nrrSTtPRWG07Amv3bDi2zkRBOpygafDOwqTjfFDeeROUaLP39/wBKUdp+IvcbOQFBgbbAfwzybSSDB+YrW1fzOqAfEY1IFMo+Tm3VLsTSTtqfKrJwDhWdSL6eGZWSQwHPTkJihDif8M7pbUbiSxJOgmNhpqaY8P7QLAzjUjUjkZ6dNKE1JrSGhxT2yxYeyFWEAAXZQJNaOTEroQeWlLON9oRh0Q50AadwxOwOkDfXnFVLH9uHIm2iFBvOaQfPXnGn9DWeONvZoc0tF/GMYf7EfaojjDzmOYiP7NVjh/aK3ctoxLBiBIFu6QG5gMFIMHzo/D8RVzCsZ6EMp66ZgJp/iBzD74APX33Hyo3D4jvBB+MD/UB+Y/vnQHfnKZJ0BI35CSP0/rSReMXGKshyiZUzJME7gjTaaDx8kcsnFiLt92ea2TibCjKZ7xQqyrH+MGJgnfodeZir8ddxfu57hVe8uQJJMZjELO0dYFdu4fjVvLmUidA6jYE9B+E6/Ucq4z+0LgDYa8bgk2rrEqfwsZJU/Ug8x6GkhJrTKNXtCa3j8pHdjKfxbt8+XtHvVnwfaO/dDBmVRl/eXAozZBC6nmTooHMkCqZgrLOwVRJJAAHMnQCmmMxKootIQVBlmH8bxEj+USQvqTpmgaIuyckH3+I5m00UaKvRek8zqSTzJJo/D8fuAAZyQOTQwHoDMVVFvVIL9aYyVUScC9Ybjb3EdS3LMBsJTU6DT4cx/wCkUPbxzEwD/Y1mlHZm+O9BOuUZsv4o3HpE007U2FsSEIykrqDMqwLLOpg6AkeYoqSTpCNBV/tQoUiJ8WbYat1ncCRMfWqtf4rLQQvyH5Cgrjkmi+yPChicfatXZyHMzCYJCKWgHzIHtNTlNQTZaGOyK3Ze6Yt4drnXItxo+RIHvTTAdmMXqTgrxUgxLIIJUgHKYJGuokfau0oq20VEVUQaBVAAA8gKLLLFedPq5PsjfHpYrucc7N3sdhLnd4mxdNhjowUsEJ9BonUct9prpvDSFtXCDzn6f0pjANRf4BHOw+VZ55nJVRWGGMZXYk7Mdou8drVw6yQhOhaBJWOsSR5A9KsjCh04bbQ6IoPUD86nUVErKm7QPcrULNS3BUSoZoAM7qo71up88b1pdYUGgoWXbc1CcJTPLNbd2KUcr3Cbt3DF2t20u5gIedAonlIImRIMbVrju1Kowu3yrXNFypqF31JmCd4gn8qpuOxrqhXnOXedSDA0pBfDsPiG6nc9D5f3rX0Escbt9z5yPJaT0S8b4mLt+5cAIDMSAeU1mAwT3QWUqANDmYD4gY9aX4qwyjOSIkAb8xPMbRr71JZxOQacwD9q4bihxc4LcUSXs/6/luIovBXV7q0CF0Xcsw6nWOnpSJMWzEAsSJGnvR9og2FjoOYJ3HkK5IElRHjsXnMli2XmGYjX1nyqw4I5UBYKs+7b8+lVjCsFYZjpGmvoBRY4q6tcCsQMwGuugYgxyANPHQsthfE+PrOVJLBoJIBUjYxDSdaO4fig1tWLKJ3g9CRz1qkK35c6f8MKhFYh58Q8BkmSYIA6CZ9Oc0YSbezpxpaDe2WLziyodSFVhAM66bx1EVW8NfKNPsREgidQRI0/p60fxu1BXKWYGTqNpjp19BQIti3rcHi5JrP/AFdPTf00lJqmVg7jseJh7ncC5bYi2XgSwEGCzLqRPqND5HSj+EcNxNwN3Ye4ZA8LTGja6ExyqLsnZXEN+9LZLatdYDTwIPhUAeGSQNNpNWh7t4hc15LFplLW1ByoFGaFyqZzEganU+e1HlXYRr2RWUxNhMl4Nb+KHuNA2J+Kdxyihrt/PZtumgIOaBHikzpyUxIHqOVF8LvKQQbjvaNi42IVvhWFOSNfizZYO8/ICdlsOSi547sJLk/CBmJBkGZBIgDUzHOub22/Al6VEfCcbdtYmyynSQHB2ZCfED7CQeRANW7iGEs4zD6jNaur7qfydT9RSl+NWUaLdpjvrmFvlHwqD9STTLs/xS0SVUFc2pQhWJI3ZWAGYgakESQNJqGeLkuVFcGVJ8Wzk3HOGNw8tabW44OV4MC0dNP531B6LprmMVlrs13Xtv2dXF2ihIDDxW7m8E/dW0n57gVwfGYd7TtbuDK6GGB5H9Oc8wRSQnaNXEkFyvRdoTPXoeqcwcQ+ziipBBgirDdd8ULGZ9cwtEk6Akgox9QSPS1VPz0+4HezK9r8SmP86eJY8yM6D/PRjPYsoaLxZ4bgrRcMrP3TZHe8Sq55KgLatSxkqx1caKZrXiyoyObNtLV+xbt30uWVCBkJhypgMVyujeOWGVweYrBjrN2b74jDhLqWzetXO8L96oAcrbtgP8QLBgR8ZE7ilXE+1WERmayLly4bbWgWy27KI1s2vDaBZmGU7M2+pk0X+5KN2Jbnb/HWzlN8uB+JEP5A0bY/anjhv3LD/IR9mqk3MSCSTtND30jxIdDWWSg32N6513OmYb9rt5T48Mjdctxl+6mneB/bDh5GexeTzGRh9wfpXGEea2qbxQ9DfJM+h+HftBwWKZVS8FY6BXDISegzCCfQ1YUu18+dk+yF3FkO027P4/4m/wD1/wDlsPOuzJhx3eQloiJzHNtE5t5896lLAvDGWaixBxXoNcf4pxnHYC+bYxDXFgMveQ8qTAknWRBGhqQftQvrAexbbzVmTr1zdKd9HOrWxF1cG6ejq900G1UnEftDy2kuGwfFGgcaT55aWf8A3NJiMNu2XW75TPwUj6XL6KLqMfs6QHjnWv8AiTXNrn7RXkj/AA66T/zDyMfhrQ/tBf8A/HX/APof/Cu+ky+gfU4/YJjbkhSNu/t//OgLClogcrfT/wBN6Mv25Ud2hKi9bIAkkL49z0E70DasXCB+7bZP4T/6Tz9a9eXc8uIVdcwmrR+5BIJBjul3IP59KTYp/E/qRrvy3NMsZaYW1HwsBbOvKLSjX3oBbSkBjznNqdTIE+VBo5Edl9R6j7084dPdpOmn5ikN+0ykZFY/0OnKmli5CIIggayI10610e4Jq6CoUawJ6x6UuuKSzuCpUsWHjSYzE6iZB8qLtuSCZWIPMAnQbCdar2Lh2Hdry2GsfKjJ12BCO9heHtFzAKjbVmVQPUmrh2WRbS3RmV2gBcpDKXIJXX0nQxt51R8OrAgOpEgsJBEgAmR1Gm9NMNxtrZ8CqJGU7RHmIgnz3oRYZxfguPHiLavBQ5VBDeDMrkjTw6Kd9By13Fc+u3pOtMuI8UuOPEQQJhdMu/TaaV98Z0AIMSOWm1BhgtD7s1xlsMQ65TqVKtBVlZWzKw6GKsi8bwJBPcXVJIlFvLl+ZTNGvPyqi4W3O4y6zEcgpGk89aMzyIAkdSJJ9Z/vSmSOaRb7vbVAjWbdi13TrlIhgwB1H7zOczA6zHKmRbLhcOg/iU3G21OZkWfSG/1GqFZ4M4AYEBSfiY5VBnTxHQmDssk8hV+soLmFtlGzGyCjxp4SxZWHPKCzCTG40FdST/JHJbX4HXZw4fuHV7LPcZioPdlpJAyqHiEPPUiN6rmJw13DvDgpcQg8tCNVII0p5wvtYcPZFpbWZpY5iSBBM7RJ38qAvYh8XdNy9CogHeMoICoCTGv8RkgaySRSQ5RlJtaFm4ShFRf3L9v9ljt4jx9wyNDsxtsAYWVVwhOwUlmAPURzqnftC7HtiE760h75BqI/4iDl/mG49xzEVbtbxU3bzXI0LEiIIEAwB6aVe+x3ab/F28jmMRbGuut22NM4/mEgN7HmYhkxuG1+TbilyX+jh9yzGh0PnpWmTzFdP/aLg8TanFWL14J/zEW44Cn8YAPwnn0OvMxQR2kxHO9cP+Zi3/umhaK7F3dmrd2A7P3cTfVU0IIbMdlykHMfQx8xSBuPXD8Xdn/NZsN97ZrpX7Hu0Sd/3dzu1NxSqlbdtPFIIByqN4PvFG6TaFlekxnxX9mNp1uf4S+rOhINvTQ/gkHwmNNfpXDeL4VrTlWmQYg19N8LwOKtY29c7u3bw7Oxczq41KsNSQQTJ+EatXz/APtJxiXcbee38LXHI8wWOvvv70OTadu+3/DoKnpV3/6VUmpLF2NORqCiuGcOu4i4LVlSznkOQ5knkB1NSZpRimXgTrpG5J5Cuk9kewMxdxg03Wz+dz/x+fSnXZHsXbwsXbkXL/4o8KdQgP8A7tz5bVblrkJKW9G1q2AIAgCguOcbtYW3nuEkmcqLqzHoB+ewoLj/AGjt4fwghrpEhZ2826Dy51zLjN5r9w3LjksRzyxz0EsIHpVI421fgk5q6C+N8RfFXDdca6ABdQFB0H1JnqaTY1NVBB2/M+VQX8NpMzO325TWuAwga6EkwQdR5Anp5VpUv/KRJw82GXceHtrbCnwRqBNRrbKjWBDyZ00inHDMCLYvsraqfhYSWhcwK7Roehr3FYswdFnQHX8QMfQVTj7E5ekI7uMQMfENZ213aRtUrNQtvhgGuf6VGtw9anyfkpS8F94JiF7gFiB8JknyO56VOuOtfCGEgwdG3AI56aVXLmJZUCquUQZDGZjVdJ+hqTDYtcxOTUkzLgA6CTqm/On5E6HvHFw65W71LgKjMBmGXSBB5n++lI14eDJFy33ZGgDPInXpvpz60HikLqAWjr9Ok0Qt5e7UCJUQTMkgQAIgRvMeR2oL9zmvQRg7VhR+8LGGfVmjwggDwjfYn/qqDFcSwxJZVc9QdJiNiPhJgiftS/iNwuFGVhlnlvMae0UNgLYLjMuYDdZyz5Zo09aEpbpICWrbHeE4haZRbZ2TYSzkgcyYkD4tNqDXFol0lW0G5BkMD1+f0pjw9rdx+7t4BWcKfD3hOmkkyNT7862ucFutckYJlGoIDDntAYgR/Yo2zqQtx2KGZJAnQ5oknoOkHQdQJ32qPCurs2ZioJBZjLaiTMDfYCm+N7K38xuBSlsRCtDEDLsYaSZnbypDfYJK+IAs3hAOswBMsOnnua5t3Y0Unot3CuE5bqOWRwMzgCdSAWU/ODV74F2Ws3FbF4tRAzGI+IDcny0gc/zonZ3iDORnBUooGsDMe7yEhTHhETXYsNiO/wAGy4crnjJBiBJ1kHTVTPvSZ5uMVx8+QY4Jyd+PHsU4nsbgsTZF3DJkaDlMtBIkEMDPzH1rm2Ov27JygG4Rzf4B6Ju3q2nVa6kj3OHYe7cv3Q8gd3bWYDa/DtA1EwABFcD45xUMxykzOs0uKTp27XgMlbWqdbCb3GTdzOziMsAEjwgagBdgJjQaabVYuznFXsgFWgiOfMjXQAk+9c8uMgAAkmNTsPQCfrVn7O3SbOpnxHmT9B+tVjK3Qs4UrLnie0trOA+GtFiCZAuLt/KrgH5Uu4v2je6mUAKg2VRlUcpgc/MyarvEW/fLt8LfgHMe/wA/1rD8P9P0NPSRNRAsbclgN2k85/h9Km4FxBrd5XtOFuISwMgQR1J0giQeoMUn4nh2e7oNIAknQfOvG4I/8LofcipPk32Lriktn0RZtC/h0u5VAuopZNGUZ11APNTP1rhfbrs02CvnKD3Lk5J/hPNCfLkeY9DXSP2J8SuXMNew1wyLDrl6hLuYx6ZlYj19Ktnangtu9aZXAYFYIPMfqNwa8yU3CbTPShCMo67nzJNEYXFshkGp+P8ACmwt97LaxqrfiU/Cf185pdNXUvKIuPhlnx3bfFva7o3rhSIyl2Ijz11FVK9eLGWqaaufZLsE2Ii7iQUtbhNnf/xX6ny3ouTYFGMdle7Mdlr2MeE8NsHxXCNB5L+JvL5xXZ+z3ALOEt5LSx+JjqzHqx/LYUfhcIltFRFCqogKBAA8hUjMACSYA3J5UoHKzc1We0HaYJNuyfHB8cEqI3A5TodeUc+QvG+0ecAWWAtGQbpnWNwukdPnVZxHxQrFyAxy7aASSAQNhrV4Yn3ZFzXZEGJsAOpzGXUlmMmWJ8zP3obFWChidYnQNrz0MdI3j9ZOKXf+HrBjnHWl4dWCmdYPLzPqd/L3q8nqicU7s3zAQSY57gkexf8ASge8IuyNTB2PUGdRPWi7qnKfH7CenQ5ftzpjw/gyNaS6xJJzTroAJH21pEm3oo5KK2ScGuzauzoden4CNudRcR+E6R4k6fhbpRGHsJat3VUnVTGYzyZTHyGlA4i4WU7fEv2aqvS2RXe0Dry9qgxGBg+BgR5sg1n1qdBET+dTtiCC2SCpYkaHmdqSijezMVfLMFYgnQTAE7/wrHX3ojDm2GIJbN+LJI2HLfpvWVlG9iVo2xTWxblHDyQAAToCGmQQCDovzNBXLkbA6nTzkH517WV1ncT23iVywyAt1jn5+dHcCxdu3mLWluHlPLX/ACx/tWVlFN2K4KmF4Xjrh8ywFBfwchJ2Gkxr9BTu32wRf4LjHnERPkJrKymStWxXp0RXO2akEGyzzyY5Y9CCarpv2cQC/dBd40Mzvvm1+WtZWUHp0OloxFtgCZMTuRGscss79dqa4PtJetmUuOoAjT5bisrKNgcUQcV7aYhlJZS65gO8JYcpy6azE6zzqoYzG965e4NTzBM/U1lZUJtlYRSugnAcJF8AW3CsZ0eYMTOoEDb61ZMNgP8ADgWiGcSCWC+GTqQATrv7/KsrKrjSqxMjd0Q8WtFbqTzVtjtqOi/394Ll0BeU+cflrWVlM2LFWE4LDhl7xUYka6gELPhGmvqDpQuKt3cxCkGFM5hOu6x59ZrKym8CPTLX+xNriYrEK4aLtoGWBHitNoNfJ2/011nFJmHlFe1leP1kUsmvR6vSTbhZzXtx2XGItmNLiTlb9fLkf6VxlsJcFzuijd5OXLGs1lZRxO4jZtSOkdjexC24vYkBn3VN1XoT+JvoPrXQVrKyqszEWOxqWkL3GCqOZ+w6nyqg8f7UFwSICbKjLIcgicxGmnSa9rKtiXkSforNq69yYCgbGCRy5AAxW1qzcDGZjK0QwmSpgdYJ0OmxNZWVoStWSunRBee4YJlSJEQZj0iCKhs4R2mXX/r8P3EVlZQlE6M3QRwcm3ehoAynmOY02rYgnAiFOfN08Xxn32rKyhFboMnq/wCBDcVwNQ0eYP50Vw2+cuXcTPzAH5VlZSdpUUW42WzDdmrj2BcABZsrLBGiEGZGmu31pFe4HiZ8LW499/8ATWVlVUVIhyaZ/9k=" alt="Notices">
      <h4>INFO</h4>
      <h3>Contact Managemnet</h3>
      <p>Contact details and queries are maintained for better coordination.</p>
    </div>

    <!-- Card 4 -->
    <div class="card">
      <img src="https://bakersfieldlimoservice.com/wp-content/uploads/2018/06/graduation-caps-flying-1.jpg" alt="Events">
      <h4>CAMPUS LIFE</h4>
      <h3>Events</h3>
      <p>Explore upcoming college events, seminars, and celebrations.</p>
    </div>
  </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose">
  <h2>Why Choose EduSphere?</h2>
  <p>EduSphere is more than just a college management system – it’s your one-stop solution for smarter learning, efficient administration, and seamless communication between students, teachers, and administrators. With an intuitive design and real-time updates, EduSphere ensures everyone stays informed and connected.</p>

  <div class="stats">
    <div class="stat-box">
      <h3>500+</h3>
      <p>Students Enrolled</p>
    </div>
    <div class="stat-box">
      <h3>50+</h3>
      <p>Expert Teachers</p>
    </div>
    <div class="stat-box">
      <h3>200+</h3>
      <p>Courses Offered</p>
    </div>
    <div class="stat-box">
      <h3>100%</h3>
      <p>Secure & Reliable</p>
    </div>
  </div>

  <p class="closing-text">With EduSphere, managing academics becomes effortless, allowing students to focus on learning, teachers to focus on teaching, and administrators to focus on growth. Together, we’re shaping the future of education.</p>
</section>





<!-- Footer Section -->
<footer class="footer">
  <div class="footer-container">
    <!-- Logo & Intro -->
    <div class="footer-column">
      <h2 class="footer-logo">EduSphere</h2>
      <p>Your gateway to a better education future. Learn, grow, and shine with EduSphere.</p>
    </div>

    <!-- Quick Links -->
    <div class="footer-column">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="{{ route('about') }}">About Us</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </div>

    <!-- Contact Info -->
    <div class="footer-column">
      <h3>Contact Us</h3>
      <p>📧 info@edusphere.com</p>
      <p>📞 +92 123 456 7890</p>
      <p>📍 Gujranwala, Pakistan</p>
    </div>

    <!-- Social Links -->
    <div class="footer-column">
      <h3>Follow Us</h3>
      <div class="social-icons">
        <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook"></a>
        <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter"></a>
        <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram"></a>
        <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" alt="LinkedIn"></a>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p>© 2025 EduSphere. All rights reserved.</p>
  </div>
</footer>

</body>
</html>
