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
        <li><a href="#accommodation">ACCOMMODATION</a></li>
        <li><a href="#vehicle">DRiving</a></li>
        <li><a href="aboutus.php">about&nbsp; us</a></li>
        <li><a href="#nearbydestination">EXPERIENCES</a></li>
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
</nav>   
<div class="hero-content">
		<div class="brand-logo">
        <div class="brand-main" a href="index.html">AYU BO RESORT</a></div>
        <div class="brand-sub">SIGIRIYA</div><br>
        <div class="brand-tagline">SRI LANKA</div>
    </div>
      <h1>Welcome to AYU BO RESORT</h1>
      <button class="hero-book-btn">Book Your Stay</button>
    </div>
  </header>

  <!-- Hero Section with Video and Booking Button -->
  <section class="hero">
    <div class="hero-video-container">
      <video autoplay loop muted class="hero-video">
        <source src="assets/IMG_4373.webm" type="video/webm">
        Your browser does not support the video tag.
      </video>
    </div>
  </section>

  <!-- Main Content -->
  <main>
    <section class="section">
<section class="about">
      <h2>Welcome to Ayubowan Bay Resort</h2>
      Welcome to Ayubowan Bay Resort, one of Sri Lanka’s most cherished getaways, recommended by over 500 delighted guests. Located near breathtaking attractions, our resort is the perfect blend of comfort, luxury, and authentic Sri Lankan hospitality.&nbsp;</p>
    <p>We provide elegantly designed rooms with modern amenities, including high-speed WiFi, hot water, and stunning views of the bay. Beyond your stay, we make your journey seamless by offering vehicles for sightseeing, ensuring you can explore nearby attractions with ease. Whether you’re seeking a relaxing escape, an adventurous trip, or a cultural experience, Ayubowan Bay Resort is your ideal base.&nbsp;</p>
    <p>Our friendly staff is dedicated to making every moment memorable, ensuring you leave with beautiful memories and the desire to return. Experience a stay where comfort meets adventure, and every detail is crafted for your ultimate satisfaction.</p>
  </section>
    <section class="sec2">&nbsp;
      <div class="row">
        <div class="col-lg-6">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="assets/IMG_4373.webm"></iframe>
          </div>
        </div>
        <div class="col-lg-6">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small> </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1"><br>
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </section>


    <!-- Rooms Section -->
    <section class="rooms" id="accommodation">
      <h3>ACCOMMODATION</h3>
      <div class="room-cards">
        <div class="room-card">
          <div class="room-title" align="center">Luxury Panoramic</div>
          <img src="images/ImgResponsive_Placeholder.png" class="img-fluid" alt="Placeholder image">
          <div class="room-desc">Breathtaking views of the lake and lush jungles. 85 Rooms | Lake View</div>
          <button class="book-your-stay-btn" onclick="window.location.href='room.php'">
Book your room</button>
        </div>
        <div class="room-card">
          <div class="room-title" align="center">Luxury</div>
          <img src="images/ImgResponsive_Placeholder.png" class="img-fluid" alt="Placeholder image">
          <div class="room-desc">Teak interiors, comfort & lush jungle views. 30 Rooms | Garden View</div>
           <button class="book-your-stay-btn" onclick="window.location.href='room.php'">
Book your room</button>
        </div>
        <div class="room-card">
          <div class="room-title" align="center">Royal Suite</div>
          <img src="images/ImgResponsive_Placeholder.png" class="img-fluid" alt="Placeholder image">
          <div class="room-desc">Expansive living spaces, lake & mountain view. 15 Suites | Lake/Mountain View</div>
           <button class="book-your-stay-btn" onclick="window.location.href='room.php'">
Book your room</button>
        </div>
      </div>
    </section>

     <!-- Rooms Section -->
    <section class="rooms" id="nearbydestination">
      <h3>Nearby Destinations</h3>
      <div class="room-cards">
        <div class="room-card">
          <div class="room-title">SIGIRIYA</div>
          <img src="assets/destination/7afb1867ab39dcc0187ca69d9318d791.jpg" alt="Placeholder image" width="350" class="img-fluid">
          <div class="room-desc">The star attraction, a UNESCO World Heritage Site often called the Lion Rock is a stunning 200m rock fortress featuring ancient frescoes, water gardens, and panoramic summit views.</div>
          <button onclick="window.location.href='destination1.php'">More Details</button>
        </div>
        <div class="room-card">
          <div class="room-title">Elephants and wildlife</div>
          <img src="assets/destination/861c27c1779223a5ca413a8c28114cd5.jpg" alt="Placeholder image" width="270" height="360" class="img-fluid">
          <div class="room-desc"><br>
            <p>Minneriya and Kaudulla offer an unforgettable experience of Sri Lanka’s rich biodiversity.</p>
          </div>
          <button onclick="window.location.href='destination1.php'">More Details</button>
        </div>
        <div class="room-card">
          <div class="room-title">Heritage Temples</div>
          <img src="assets/destination/d7fe25a1a13234d4d7d70ad72463810a.jpg" alt="Placeholder image" height="350" class="img-fluid"><br>
          <div class="room-desc">Once the majestic capital of Sri Lanka, Polonnaruwa Ancient City is a living museum of history and architecture.</div>
          <button onclick="window.location.href='destination1.php'">More Details</button>
        </div>
      </div>
    </section>

    <!-- vehicle Section -->
    <section class="rooms" id="vehicle">
      <h3>PickUp Your Vehicle</h3>
      <div class="room-cards">
        <div class="room-card">
       <img class="room-img img-fluid" src="assets/vehicle/05.jpeg" alt="Luxury Room">
       <div class="room-title">Threewheel</div>
       <div class="room-desc">The perfect way to explore Sri Lanka like a local. Compact, agile, and ideal for short-distance travel.&nbsp;</div>
       <button onclick="window.location.href='vehicle.html'">More Details</button>

       </div>
        
       <div class="room-card">
       <img class="room-img img-fluid" src="assets/vehicle/03.jpg" alt="Luxury Room">
       <div class="room-title">SAFARI JEEP</div>
       <div class="room-desc">
         <p>Open-top and specially designed&nbsp;</p>
         <p>for wildlife and adventure tours.</p>
       </div>
       <button onclick="window.location.href='vehicle.html'">More Details</button>
       </div>

        <div class="room-card">
       <img class="room-img img-fluid" src="assets/vehicle/06.jpg" alt="Luxury Room">
       <div class="room-title">CAR</div>
       <div class="room-desc">Comfortable and stylish vehicles suitable for city trips, road trips, or family outings.</div>
       <button onclick="window.location.href='vehicle.html'">More Details</button>
       </div>
      </div>
    </section>

    

    <!-- Offers Section -->
<section class="offers" id="offers">
  <div class="container text-center">
    <div class="row align-items-center justify-content-center">
      
      <div class="col-lg-6" align="justify">
        <h3>Unforgettable Stays, Exclusive Offers</h3>
        <p>Indulge in unique spa treatments, fine dining, and more.</p>
        <p>
          Discover a world of relaxation and indulgence where every detail is crafted for your comfort. 
          Whether you’re enjoying our signature spa therapies, savoring fine culinary delights, or unwinding 
          in a serene setting, our exclusive offers promise memories you’ll cherish forever.
        </p>
      </div>
      
      <div class="col-lg-6">
        <a href="booking.php">
    <img src="assets/ex.png" class="img-fluid ex" alt="Exclusive Offers" />
</a>
      </div>
      
    </div>
  </div>
</section>


    <!-- Experiences Section -->
    <section class="experiences" id="experiences">
      <h3><strong>Culture, Adventure, Serene Nature</strong></h3>
      <p>Discover local culture, wildlife, cave dining, and peaceful nature escapes near Sigiriya.</p>
	  <div class="row">
		  <div class="col-lg-4"><img src="assets/cul.png" class="img-fluid" alt="Placeholder image">&nbsp;</div>
		  <div class="col-lg-4"><img src="assets/ad.png" class="img-fluid" alt="Placeholder image"></div>
		  <div class="col-lg-4"><img src="assets/valla.png" class="img-fluid" alt="Placeholder image"></div>
	  </div>
    </section>
  </main>
 <!-- footer -->
<footer class="site-footer">
  <div class="footer-main">
    <!-- Column 1: Navigation Links -->
    <div class="footer-col">
      <h4>AYU BO RESORT</h4>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Accommodation</a></li>
        <li><a href="#">Experiences</a></li>
        <li><a href="#">Offers</a></li>
        <li><a href="#">Dining</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">Gallery</a></li>
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
