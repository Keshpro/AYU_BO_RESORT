<?php
session_start();
include 'db.php'; 
$result = $conn->query("SELECT * FROM customers LIMIT 5"); // For example

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>About Us</title>
  <link rel="stylesheet" href="style.css">
  <link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">
</head>
<body>
  <!-- Navigation Bar -->
<nav class="heritance-navbar">
  <div class="nav-container">
    <div class="nav-left">
      <ul class="nav-menu">
        <li><a href="room.php">ACCOMMODATION</a></li>
        <li><a href="vehicle.php">DRiving</a></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="destination1.php">EXPERIENCES</a></li>
      </ul>
    </div>
    
	  <ul class="nav-menu">
        <li><a href="ContactUs.php">Contact us</a></li>
      </ul>
    
       <button class="book-your-stay-btn" onclick="window.location.href='booking.php'">
BOOK YOUR STAY</button>
      </div>
    </div>
  </div>
</nav>
  </header>
 <section class="hero">
    <div class="hero-video-container">
    <img src="assets/destination/minneriya1.webp" height="500" class="img-fluid"> </div>
</section>
    <!-- About Us Section -->
<div><br> 
</div>
    <main style="background:#fff; border-radius:11px; max-width:950px; margin: -65px auto 35px auto; padding:2.5rem 2.1rem 2.6rem 2.1rem; box-shadow:0 6px 24px rgba(0,0,0,0.09); position:relative; z-index:3;">
        <section class="about">
            <h2 style="font-size:2.2rem; color:#B89F6A; margin-bottom:1.2rem; font-weight:800;">
          Welcome to AYU BO&nbsp; Resort</h2>
            <p style="color:#6A614C; font-size:1.18rem; line-height:2;">
                Nestled in the heart of Sigiriya, Ayu Bo Resort is more than just a place to stay&nbsp; it’s where your Sri Lankan adventure truly begins. 
                Imagine waking up to mistladen mornings, birdsong&nbsp; and views that stretch across lush landscapes and the legendary Lion Rock.<br><br>
                Our resort is a sanctuary where modern comfort meets authentic island warmth. Whether you seek adventure or tranquility, our dedicated team crafts every moment around your happiness: customized safari rides, unique local dining, luxury spa experiences, and seamless travel arrangements await.<br><br>
              Celebrated by travelers worldwide, we pride ourselves on genuine hospitality, attention to detail and a passion for making life’s best memories happen.
          </p>
        </section>

        <!-- Why Choose Us -->
        <section class="benefits" style="margin-top:2.7rem;">
            <h3 style="color:#715B2A; font-size:1.3rem; margin-bottom:1.3rem;">
          Why Choose Ayub Bo&nbsp; Resort?</h3>
            <div class="row benefits-list">
                <div class="col-md-6 col-lg-4 mb-4">
                    <strong>✧ Award-Winning Comfort✧</strong>
                    <div>Elegant rooms with modern amenities and breathtaking bay or jungle views.</div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <strong>✧ Seamless Exploration✧</strong>
                    <div>In-house vehicle bookings for safaris, cultural trips, and transfers — tuktuks, cars, open-tops & more!</div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <strong>✧ Warm, Local Hospitality✧</strong>
                    <div>Our team treats you like family and ensures a stress-free, memorable experience from arrival to goodbye.</div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <strong>✧ Authentic Sri Lankan Flavors✧</strong>
                    <div>Enjoy traditional cuisine, signature drinks, and exclusive cave dining adventures.</div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <strong>✧ Nature &amp; Serenity✧</strong>
                    <div>Rejuvenate with spa therapies and poolside relaxation amidst tropical beauty.</div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <strong>✧ Prime Location✧</strong>
                    <div>Steps away from Sigiriya, Minneriya, pidurangala and other legendary sites — perfect for every explorer!</div>
                </div>
            </div>
        </section>

        <section style="margin-top:2.9rem; text-align:center;">
            <h4 style="color:#B89F6A; font-weight:700; margin-bottom:1.1rem; font-size:1.1rem;">
            "At Ayu Bo&nbsp; Resort, you don’t just visit Sri Lanka — you live its stories, wonders, and warmth." </h4>
            <p style="color:#4D4630; font-size:1.07rem;">
          We look forward to welcoming you to our Bay...&nbsp; where your adventure begins and your heart finds a home.</p>
        </section>
    </main>
  
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
