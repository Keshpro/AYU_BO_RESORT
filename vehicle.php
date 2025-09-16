<?php
session_start();
include 'db.php'; 
$result = $conn->query("SELECT * FROM customers LIMIT 5"); // For example

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Vehicle Rentals | AYU BO Resort</title>
   <link rel="stylesheet" href="style.css">
  <link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=1200">
  <style>
    body {
      background: #fff;
      color: #403311;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
    }
    /* Header and Navbar */
    .topbar {
      background: #181716;
      padding: 0.7rem 12vw;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      gap: 30px;
      font-weight: 500;
      font-size: 1.02rem;
    }
    .topbar a {
      color: #d9af4f;
      text-decoration: none;
      margin: 0 8px;
      transition: color 0.2s;
    }
    .topbar a:hover {
      color: #f9d67e;
    }
    /* Hero Banner */
    .hero {
      width: 100vw;
      min-width: 1200px;
      background: #fff;
      margin: 0;
    }
    .hero-imgs {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      width: 100vw;
      min-width: 1200px;
      overflow: hidden;
    }
    .hero-imgs img {
      width: 100%;
      height: 170px;
      object-fit: cover;
      display: block;
    }
    .hero-overlay {
      text-align: center;
      position: absolute;
      left: 0;
      width: 100vw;
      min-width: 1200px;
      top: 105px;
      z-index: 1;
    }
    .hero-overlay h1 {
      color: #fff;
      background: rgba(0,0,0,0.35);
      padding: 22px 44px 13px;
      font-size: 2.2rem;
      font-weight: 800;
      letter-spacing: 0.01em;
      border-radius: 7px 7px 0 0;
      display: inline-block;
      margin-bottom: 2px;
    }
    .hero-overlay p {
      color: #222;
      background: rgba(255,255,255,0.85);
      display: inline-block;
      max-width: 480px;
      padding: 15px 30px;
      border-radius: 0 0 11px 11px;
      font-size: 1.08rem;
      font-weight: 500;
      margin: 0;
    }
    /* Main sections */
    .main-wrapper {
      max-width: 1200px;
      margin: 0 auto;
      padding: 50px 0 0 0;
    }
    .section-title {
      text-align: center;
      font-size: 2rem;
      color: #3d2808;
      font-weight: 800;
      margin: 24px 0 40px 0;
      letter-spacing: 0.02em;
    }
    /* Benefits/Why choose us */
    .why-row {
      display: flex;
      justify-content: center;
      gap: 32px;
      margin-bottom: 50px;
    }
    .why-card {
      width: 320px;
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 4px 16px #efdca8a8;
      padding: 0 0 15px 0;
      text-align: center;
      transition: transform .3s;
    }
    .why-card img {
      width: 100%;
      height: 160px;
      object-fit: cover;
      border-radius: 14px 14px 0 0;
    }
    .why-card h4 {
      color: #cba949;
      font-size: 1.1rem;
      font-weight: 700;
      margin: 23px 0 8px 0;
    }
    .why-card p {
      color: #554b18;
      font-size: 0.96rem;
      padding: 0 15px;
    }
    .vehicle-section-title {
      text-align: center;
      font-size: 1.25rem;
      color: #3d2808;
      font-weight: 700;
      margin: 55px 0 36px 0;
    }
    /* Vehicle Cards */
    .vehicle-card {
      display: flex;
      background: #fcf8ed;
      border-radius: 16px;
      box-shadow: 0 4px 30px #efdca85b;
      overflow: hidden;
      margin-bottom: 34px;
      align-items: stretch;
    }
    .vehicle-card img {
      width: 250px;
      height: 180px;
      object-fit: cover;
      border-radius: 14px 0 0 14px;
      display: block;
    }
    .vehicle-details {
      flex: 1;
      padding: 27px 23px 10px 23px;
    }
    .vehicle-details h3 {
      color: #bd971a;
      margin: 0 0 10px 0;
      font-size: 1.28rem;
    }
    .vehicle-details p {
      font-size: 0.97rem;
      margin: 0 0 13px 0;
      color: #5c480a;
    }
    .vehicle-specs {
      font-size: 0.98rem;
      color: #543e13;
      margin-bottom: 12px;
    }
    .vehicle-specs span {
      display: inline-block;
      margin-right: 22px;
    }
    .book-btn {
      background: #d7ba60;
      color: #fff;
      padding: 8px 25px;
      border: none;
      border-radius: 18px;
      font-size: 1rem;
      font-weight: 700;
      cursor: pointer;
    }
    .book-btn:hover {
      background: #bba358;
    }
    /* Packages */
    .packages-row {
      display: flex;
      gap: 22px;
      margin-bottom: 33px;
      margin-left: 15px;
    }
    .package-card {
      background: #fff;
      border-radius: 13px;
      box-shadow: 0 4px 16px #efdca887;
      padding: 20px 28px 10px 28px;
      min-width: 220px;
      flex: 1;
    }
    .package-card h5 {
      color: #bfa145;
      font-size: 1.08rem;
      margin: 0 0 7px 0;
      font-weight: 700;
    }
    .package-card ul {
      margin: 0 0 0 13px;
      padding: 0 0 0 14px;
      color: #66540e;;
      font-size: .96rem;
    }
    .footer {
      background: #0e1217;
      color: #e3c477;
      padding: 44px 10vw 15px;
      font-size: .97rem;
      margin-top: 84px;
    }
    .footer-top {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 15px;
      flex-wrap: wrap;
    }
    .footer-col {
      flex: 1;
      min-width: 200px;
      margin: 0 30px 10px 0;
    }
    .footer-col h4 {
      color: #ffd778;
      font-weight: 800;
      margin-bottom: 12px;
      font-size: 1.08rem;
    }
    .footer-col ul {
      padding: 0; margin: 0; list-style: none;
    }
    .footer-col ul li {
      margin-bottom: 7px;
    }
    .footer-logo {
      font-size: 2.3rem;
      color: #ebc96c;
      font-weight: 900;
      letter-spacing: 6px;
      margin-top: 24px;
    }
    .footer-copy {
      color: #a99b64;
      text-align: center;
      font-size: .95rem;
      font-weight: 400;
      margin-top: 7px;
    }
    /* Responsive */
    @media (max-width: 1350px) {
      body, .hero, .main-wrapper { min-width: 930px; }
    }
    @media (max-width: 1000px) {
      .main-wrapper, .hero, .hero-imgs { min-width: 750px; }
      .why-row { flex-direction: column; gap: 30px; }
    }
    @media (max-width: 780px) {
      .main-wrapper, .hero, .hero-imgs { min-width: 350px; }
      .vehicle-card { flex-direction: column; }
      .vehicle-card img { border-radius: 14px 14px 0 0; width: 100%; }
    }
  </style>
</head>
<body>
  <!-- Topbar / Navbar -->
  <nav class="heritance-navbar">
  <div class="nav-container">
    <div class="nav-left">
      <ul class="nav-menu">
        <li><a href="room.php">ACCOMMODATION</a></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="aboutus.php">about&nbsp; us</a></li>
        <li><a href="destination1.php">EXPERIENCES</a></li>
      </ul>
    </div>
    <ul class="nav-menu">&nbsp;
       &nbsp;<li><a href="ContactUs.php">Contact us</a></li>
    </ul>
    
        <button class="book-your-stay-btn" onclick="window.location.href='booking.php'">
BOOK YOUR STAY</button>
	  <button class="book-your-stay-btn" onclick="window.location.href='login.php'">
  Admin
</button>

  </div>
  </div>
</nav><br><br><br><br>
  <!-- Hero Section -->
  <div class="hero" style="position:relative;">
    <div class="hero-imgs">
      <img src="assets/vehicle/img1.webp">
      <img src="assets/vehicle/img2.webp">
      <img src="assets/vehicle/img3.webp">
      <img src="assets/vehicle/img4.jpeg">
      <img src="assets/vehicle/img5.jpg">
      <img src="assets/vehicle/img6.jpeg">
      <img src="assets/vehicle/img7.jpeg">
      <img src="assets/vehicle/img8.jpeg">
      <img src="assets/vehicle/img9.jpeg">
      <img src="assets/vehicle/img10.jpeg">
    </div>
    <div class="hero-overlay">
      <h1>Embark on an Unforgettable Adventure</h1><br>
      <p>Drive Your Own vehicle – Yes, you can, and you’re going to LOVE IT!<br>
        We rent vehicles to make your journey here special with us.</p>
    </div>
  </div>
  <br><br><br>
  <!-- Main Content -->
  <div class="main-wrapper">
    <div class="section-title">Why Choose Our Vehicles?</div>
    <div class="why-row">
      <div class="why-card">
        <img src="assets/vehicle/img1.webp">
        <h4>Explore Like a Local</h4>
        <p>
          Experience the freedom of self-driving and discover hidden gems near Sigiriya and beyond.<br>
          Our vehicles let you travel at your own pace, stop whenever you want, and connect with the authentic culture of Sri Lanka. 
          Driving a vehicle is more than just transport – it’s an adventure that turns your journey into unforgettable memories.
        </p>
      </div>
      <div class="why-card">
        <img src="assets/vehicle/img11.jpeg">
        <h4>Hassle-Free Experience</h4>
        <p>
          Experience true freedom on the road! Rent a car, tuk-tuk, or bike and explore at your own pace—no schedules, no waiting, no stress.<br>
          Our hassle-free service means easy booking, well-maintained vehicles, and 24/7 support, so you can focus on the adventure.
        </p>
      </div>
      <div class="why-card">
        <img src="assets/vehicle/img6.jpeg">
        <h4>24/7 Support</h4>
        <p>
          No matter where your journey takes you, our 24/7 support has you covered.<br>
          Whether it’s a question, help with directions, or unexpected issues on the road, our dedicated team is always just a call or message away.
        </p>
      </div>
    </div>
    <div class="vehicle-section-title">Our Vehicle Options</div>
    <!-- Tuktuk -->
    <div class="vehicle-card">
      <img src="assets/vehicle/img12.jpeg" alt="Tuktuk">
      <div class="vehicle-details">
        <h3>Tuktuk</h3>
        <p>The perfect way to explore Sri Lanka like a local. Compact, agile, and ideal for short-distance travel.</p>
        <div class="vehicle-specs">
          <span>Seating: 3 people</span>
          <span>Fuel: Petrol</span>
          <span>Transmission: Manual</span>
        </div>
        <div style="margin-bottom:12px">Best For: City trips and short excursions</div>
        <button class="book-btn" onclick="window.location.href='booking.php'">
BOOK NOW</button>
      </div>
    </div>
    <div class="packages-row">
      <div class="package-card">
        <h5>Daily Package - 15 USD</h5>
        <ul>
          <li>Up to 100 km/day</li>
          <li>Insurance included</li>
          <li>Flexible pick-up & drop-off</li>
        </ul>
      </div>
      <div class="package-card">
        <h5>Weekly Package - 90 USD</h5>
        <ul>
          <li>Unlimited mileage</li>
          <li>Discounted rates</li>
          <li>Free additional driver</li>
        </ul>
      </div>
    </div>
    <!-- Cars -->
    <div class="vehicle-card">
      <img src="assets/vehicle/img13.jpg" alt="Cars">
      <div class="vehicle-details">
        <h3>Cars</h3>
        <p>Comfortable and stylish vehicles suitable for city trips, road trips, or family outings.</p>
        <div class="vehicle-specs">
          <span>Seating: 4-5 people</span>
          <span>Fuel: Petrol/Diesel</span>
          <span>Transmission: Auto/Manual</span>
        </div>
        <div style="margin-bottom:12px">Best For: City trips, long drives</div>
       <button class="book-btn" onclick="window.location.href='booking.php'">
BOOK NOW</button>
      </div>
    </div>
    <div class="packages-row">
      <div class="package-card">
        <h5>Daily Package - 20 USD</h5>
        <ul>
          <li>Up to 100 km/day</li>
          <li>Insurance included</li>
        </ul>
      </div>
      <div class="package-card">
        <h5>Weekly Package - 90 USD</h5>
        <ul>
          <li>Unlimited mileage</li>
          <li>Discounted rates</li>
        </ul>
      </div>
    </div>
    <!-- Vans -->
    <div class="vehicle-card">
      <img src="assets/vehicle/img14.jpg" alt="Vans">
      <div class="vehicle-details">
        <h3>Vans</h3>
        <p>Spacious and comfortable, ideal for families or groups planning longer trips.</p>
        <div class="vehicle-specs">
          <span>Seating: 7-12 people</span>
          <span>Fuel: Diesel</span>
          <span>Transmission: Auto/Manual</span>
        </div>
        <div style="margin-bottom:12px">Best For: Group tours, family travel</div>
        <button class="book-btn" onclick="window.location.href='booking.php'">
BOOK NOW</button>
      </div>
    </div>
    <div class="packages-row">
      <div class="package-card">
        <h5>Daily Package - 25 USD</h5>
        <ul>
          <li>Up to 150 km/day</li>
          <li>Insurance included</li>
        </ul>
      </div>
      <div class="package-card">
        <h5>Weekly Package - 150 USD</h5>
        <ul>
          <li>Unlimited mileage</li>
          <li>Discounted rates</li>
        </ul>
      </div>
    </div>
    <!-- Scooters -->
    <div class="vehicle-card">
      <img src="assets/vehicle/img15.jpg" alt="Scooters">
      <div class="vehicle-details">
        <h3>Scooters</h3>
        <p>Lightweight, fuel-efficient vehicles perfect for solo travelers or couples.</p>
        <div class="vehicle-specs">
          <span>Seating: 2 people</span>
          <span>Fuel: Petrol</span>
          <span>Transmission: Automatic</span>
        </div>
        <div style="margin-bottom:12px">Best For: Quick trips, city rides</div>
        <button class="book-btn" onclick="window.location.href='booking.php'">
BOOK NOW</button>
      </div>
    </div>
    <div class="packages-row">
      <div class="package-card">
        <h5>Hourly Package - 4 USD</h5>
        <ul>
          <li>Flexible hours</li>
          <li>Insurance included</li>
        </ul>
      </div>
      <div class="package-card">
        <h5>Daily Package - 10 USD</h5>
        <ul>
          <li>Up to 80 km/day</li>
          <li>Insurance included</li>
        </ul>
      </div>
    </div>
    <!-- Safari Vehicles -->
    <div class="vehicle-card">
      <img src="assets/vehicle/img16.webp" alt="Safari Vehicle">
      <div class="vehicle-details">
        <h3>Safari Vehicles</h3>
        <p>Open-top and specially designed for wildlife and adventure tours.</p>
        <div class="vehicle-specs">
          <span>Seating: 6-10 people</span>
          <span>Fuel: Diesel</span>
          <span>Transmission: Manual</span>
        </div>
        <div style="margin-bottom:12px">Best For: Safari tours, nature trips</div>
       <button class="book-btn" onclick="window.location.href='booking.php'">
BOOK NOW</button>
      </div>
    </div>
    <div class="packages-row">
      <div class="package-card">
        <h5>Half-day Package - 50 USD</h5>
        <ul>
          <li>Up to 50 km</li>
          <li>Driver included</li>
        </ul>
      </div>
      <div class="package-card">
        <h5>Full-day Package - 80 USD</h5>
        <ul>
          <li>Up to 120 km</li>
          <li>Driver included</li>
        </ul>
      </div>
    </div>
  </div>
   <!-- footer -->
<footer class="site-footer">
  <div class="footer-main">
    <!-- Column 1: Navigation Links -->
    <div class="footer-col">
      <h4>AYU BO RESORT</h4>
      <ul>
        <li><a href="index.php" style="color:#bfa64a;">Home</a></li>
          <li><a href="room.php" style="color:#bfa64a;">Accommodation</a></li>
          <li><a href="destination1.php" style="color:#bfa64a;">Experiences</a></li>
          <li><a href="contactus.php" style="color:#bfa64a;">Contact Us</a></li>
      </ul>
    </div>

    <!-- Column 2: Logo (Center) -->
    <div class="footer-col footer-logo-col">
      <div class="footer-logo">
        <!-- Replace with your SVG or img if available -->
        <div class="footer-logo-big">ABR</div>
        <div class="footer-logo-txt">AYU BO<br>RESORT</div>
      </div>
    </div>

    <!-- Column 3: Google Map -->
    <div class="footer-col footer-map-col">
      <h4>Find Us</h4>
      <div class="footer-map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.9579612203685!2d80.70842631512612!3d7.695502094522497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afca1760cb462d9%3A0xb6a3bfb00d1f22ed!2sHeritance%20Kandalama!5e0!3m2!1sen!2slk!4v1662724651309!5m2!1sen!2slk"
          width="240"
          height="150"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-legal">
      <a href="#">GDPR Compliance</a>
      <a href="#">Privacy Policy</a>
      <a href="#">Terms &amp; Condition</a>
      <a href="#">Sitemap</a>
    </div>
    <div class="footer-copyright">
      &copy; 2025 ayu bo resort. All rights reserved.
    </div>
  </div>
</footer>
<script src="script.js"></script>
</body>
</html>
