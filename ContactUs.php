<?php
session_start();
include 'db.php'; 
$result = $conn->query("SELECT * FROM customers LIMIT 5"); // For example

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ContactUs</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	 <!-- contact us part -->
<section class="contact-section">
  <style>
    .contact-section {
      background-color: #ffffff;
      color: #000000;
      padding: 60px 20px;
      font-family: 'Poppins', sans-serif;
      text-align: center;
    }

    .contact-title {
      font-size: 28px;
      font-weight: bold;
      color: #000000;
      letter-spacing: 2px;
    }

    .contact-title .eco {
      font-size: 16px;
      display: block;
      margin-top: 5px;
      font-weight: normal;
    }

    .contact-subtitle {
      font-size: 14px;
      color: #000000;
      margin-top: 10px;
    }

    .contact-phone {
      font-size: 18px;
      font-weight: bold;
      margin: 10px 0 20px;
    }

    .custom-input {
      background-color: transparent;
      border: none;
      border-bottom: 1px solid #000000;
      color: #fff;
      border-radius: 0;
      outline: none;
      width: 100%;
      margin-bottom: 20px;
      padding: 8px 5px;
    }

    .custom-input::placeholder {
      color: #000000;
    }

    .custom-btn {
      background-color: transparent;
      color: #000000;
      border: 1px solid #000000;
      padding: 8px 30px;
      transition: 0.3s;
      cursor: pointer;
    }

    .custom-btn:hover {
      background-color: #000000;
      color: #000000;
    }

    .contact-footer {
      margin-top: 40px;
      font-size: 14px;
      color: #000000;
    }
  </style> 
  </head>
    <body class="back">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AYU BO RESORT</title>
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
        <li><a href="aboutus.php">about&nbsp; us</a></li>
        <li><a href="destination1.php">EXPERIENCES</a></li>
      </ul>
    </div>
    
    <div class="nav-center">
      <div class="brand-logo">
       
      </div>
    </div>
    <ul class="nav-menu">
        <li><a href="index.php">Home</a></li>
    </ul>
    
    <button class="book-your-stay-btn">BOOK YOUR STAY</button>
      </div>
    </div>
  </div>
</nav>
<section class="hero">
  <div class="row">
    <div class="col-lg-6"><img src="assets/destination/elepantwatch1.webp" class="img-fluid" alt="Placeholder image">&nbsp;</div>
    <div class="col-lg-6 des"><br>
     <h5>Welcome to Ayu Bo Resort</h5><br>
      <p>&nbsp;Welcome to Ayu Bo Resort, one of Sri Lanka’s most cherished getaways, recommended by over 500 delighted guests. Located near breathtaking attractions, our resort is the perfect blend of comfort, luxury and authentic Sri Lankan hospitality. We provide elegantly designed rooms with modern amenities, including high-speed WiFi, hot water and stunning views of the Sigiriya rock. Beyond your stay, we make your journey seamless by offering vehicles for sightseeing, ensuring you can explore nearby attractions with ease. Whether you’re seeking a relaxing escape, an adventurous trip or a cultural experience, Ayu Bo Resort is your ideal base. Our friendly staff is dedicated to making every moment memorable, ensuring you leave with beautiful memories and the desire to return. Experience a stay where comfort meets adventure and every detail is crafted for your ultimate satisfaction.</p>
    </div>
  </div>
</section>

<section class="sect2">
  <div class="row">
    <div class="col-lg-6 form"><img src="assets/cont2.jpeg" class="img-fluid" alt="Placeholder image">
    
    </div>
    <div class="col-lg-6"> &nbsp;</div>
  </div>
</section>
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.4.1.min.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script> 
    <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>
