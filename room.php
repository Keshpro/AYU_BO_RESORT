<?php
session_start();
include 'db.php'; 
$result = $conn->query("SELECT * FROM customers LIMIT 5"); // For example

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Ayu Bo Resort - Accommodations</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #fffaf5;
      color: #bfa64a; /* Gold tone */
      font-family: 'Georgia', serif;
      margin: 0;
    }
    a {
      color: #bfa64a;
      text-decoration: none;
    }
    a:hover {
      color: #8a7a2d;
      text-decoration: underline;
    }
    /* Navbar */
    .heritance-navbar {
      background-color: #ffffff;
      border-bottom: 3px solid #bfa64a;
      padding: 0.7rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-weight: 600;
      font-size: 1rem;
      color: #8a7a2d;
      box-shadow: 0 2px 10px rgb(191 166 74 / 0.2);
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    .heritance-navbar .nav-menu {
      display: flex;
      gap: 1.5rem;
      list-style: none;
      padding-left: 0;
      margin: 0;
    }
    .heritance-navbar .nav-menu li a {
      color: #bfa64a;
      text-transform: uppercase;
      transition: color 0.3s;
    }
    .heritance-navbar .nav-menu li a:hover {
      color: #8a7a2d;
    }
    .book-your-stay-btn {
      background: #bfa64a;
      border: none;
      padding: 0.5rem 1.2rem;
      border-radius: 30px;
      font-weight: 700;
      cursor: pointer;
      color: white;
      transition: background 0.3s;
    }
    .book-your-stay-btn:hover {
      background: #8a7a2d;
    }
    /* Hero Section */
    .hero {
      position: relative;
      text-align: center;
      color: #bfa64a;
      margin-bottom: 3rem;
      font-style: italic;
      font-weight: 900;
    }
    .hero img {
      width: 100%;
      height: 70vh;
      object-fit: cover;
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;
      filter: brightness(0.9);
    }
    .hero-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 3.5rem;
      color: #bfa64a;
      text-shadow: 0 0 8px rgba(191,166,74,0.6);
      letter-spacing: 6px;
    }
    /* Section Title */
    .section-title {
      text-align: center;
      margin: 2rem 0 2.5rem;
      font-size: 2.4rem;
      font-weight: 700;
      letter-spacing: 0.1em;
      color: #8a7a2d;
      font-style: italic;
    }
    /* Intro Paragraph */
    .intro-text {
      max-width: 750px;
      margin: 0 auto 3rem;
      font-size: 1.2rem;
      color: #a89142;
      text-align: center;
      line-height: 1.6;
      font-style: normal;
    }
    /* Room Cards */
    .room-card {
      background: #fff8e1;
      border-radius: 15px;
      margin-bottom: 3rem;
      box-shadow: 0 3px 14px rgba(191,166,74, 0.35);
      overflow: hidden;
      display: flex;
      flex-wrap: wrap;
      gap: 1.5rem;
    }
    .room-card .carousel,
    .room-card .room-details {
      flex: 1 1 300px;
      min-width: 310px;
      border-radius: 15px;
    }
    .room-card .room-details {
      padding: 2rem 2.5rem;
      color: #7a6a2a;
    }
    .room-details h3 {
      font-size: 2rem;
      font-weight: 900;
      margin-bottom: 0.75rem;
      color: #bfa64a;
      font-style: italic;
    }
    .room-details p {
      font-size: 1.1rem;
      margin-bottom: 1.2rem;
      color: #9d8d3d;
      font-style: normal;
    }
    .room-details ul {
      list-style: none;
      padding-left: 0;
      font-size: 1rem;
      color: #bfa64a;
      margin-bottom: 0;
    }
    .room-details ul li {
      margin-bottom: 0.5rem;
      padding-left: 1.1rem;
      position: relative;
    }
    .room-details ul li::before {
      content: "•";
      position: absolute;
      left: 0;
      color: #bfa64a;
      font-size: 1rem;
      top: 0;
    }
    /* Booking section */
    .book-section {
      text-align: center;
      padding: 3rem 1rem;
    }
    .book-section h2 {
      font-size: 2.7rem;
      font-weight: 900;
      color: #bfa64a;
      margin-bottom: 1.5rem;
      letter-spacing: 0.15em;
      font-style: italic;
    }
    .book-btn {
      font-weight: 700;
      font-size: 1.2rem;
      background: transparent;
      color: #bfa64a;
      border: 2px solid #bfa64a;
      padding: 0.75rem 2rem;
      border-radius: 12px;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
    }
    .book-btn:hover {
      background: #bfa64a;
      color: white;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="heritance-navbar">
    <div class="nav-container" style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
      <ul class="nav-menu" style="margin: 0;">
        <li><a href="index.php">Home</a></li>
        <li><a href="vehicle.php">Driving</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="destination1.php">Experiences</a></li>
      </ul>
      <ul class="nav-menu" style="margin: 0;">
        <li><a href="ContactUs.php">Contact Us</a></li>
      </ul>
      <button class="book-your-stay-btn" onclick="window.location.href='booking.php'">BOOK YOUR STAY</button>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <img src="rooms/hero.img.jpeg" alt="Hotel Room" />
    <div class="hero-text">ACCOMMODATIONS</div>
  </section>

  <!-- Intro Section -->
  <section class="container text-center">
    <h2 class="section-title">NATURE IS NOT A PLACE TO VISIT. IT IS HOME.</h2>
    <p class="intro-text">
      “AYU BO RESORT” stands as a serene sanctuary of comfort and culture in the heart of Sigiriya, one of Sri Lanka’s most treasured UNESCO World Heritage Sites. Surrounded by the iconic Sigiriya Rock Fortress, lush landscapes and ancient royal gardens, our retreat offers more than just accommodation — it invites you to experience timeless heritage, natural beauty, and authentic Sri Lankan hospitality in perfect harmony.
    </p>
    <a href="#" class="book-btn">Get More Details</a>
  </section>

  <!-- Rooms -->
  <section class="container my-5">
    <!-- Room 1 -->
    <div class="room-card">
      <div class="carousel slide" data-bs-ride="carousel" id="carouselDragonfly" style="border-radius: 15px; overflow: hidden; max-width: 600px;">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="rooms/room1/img1.jpeg" class="d-block w-100" alt="Dragonfly Room 1" />
          </div>
          <div class="carousel-item">
            <img src="rooms/room1/img2.jpeg" class="d-block w-100" alt="Dragonfly Room 2" />
          </div>
          <div class="carousel-item">
            <img src="rooms/room1/img3.jpeg" class="d-block w-100" alt="Dragonfly Room 3" />
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDragonfly" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselDragonfly" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
      <div class="room-details">
        <h3>Lion’s Gate Suite</h3>
        <p>Master Bedroom With Sigiriya rock view</p>
        <ul>
          <li>King Bed</li>
          <li>233 Square Feet</li>
          <li>Maximum 2 Adults</li>
          <li>Air Conditioner</li>
          <li>Attached Bathroom</li>
          <li>Hot Water</li>
          <li>Free Wi-Fi</li>
        </ul>
      </div>
    </div>
    <!-- Room 2 -->
    <div class="room-card" style="flex-direction: row-reverse;">
      <div class="carousel slide" data-bs-ride="carousel" id="carouselMantis" style="border-radius: 15px; overflow: hidden; max-width: 600px;">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="rooms/room2/img1.jpeg" class="d-block w-100" alt="Room 1" />
          </div>
          <div class="carousel-item">
            <img src="rooms/room2/img2.jpeg" class="d-block w-100" alt="Room 2" />
          </div>
          <div class="carousel-item">
            <img src="rooms/room2/img3.jpeg" class="d-block w-100" alt="Room 3" />
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselMantis" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselMantis" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
      <div class="room-details">
        <h3>Mirror Wall Chamber</h3>
        <p>Double Bedroom With Pidurangala</p>
        <ul>
          <li>Double Bed</li>
          <li>210 Square Feet</li>
          <li>Maximum 2 Adults</li>
          <li>Air Conditioner</li>
          <li>Attached Bathroom</li>
          <li>Hot Water</li>
          <li>Free Wi-Fi</li>
        </ul>
      </div>
    </div>
    <!-- Room 3 -->
    <div class="room-card">
      <div class="carousel slide" data-bs-ride="carousel" id="carouselChameleon" style="border-radius: 15px; overflow: hidden; max-width: 600px;">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="rooms/room3/img1.webp" class="d-block w-100" alt="Chameleon Room 1" />
          </div>
          <div class="carousel-item">
            <img src="rooms/room3/img2.jpeg" class="d-block w-100" alt="Chameleon Room 2" />
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselChameleon" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselChameleon" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
      <div class="room-details">
        <h3>Lotus Pond Suite</h3>
        <p>Bunker Bedroom With Paddy Field</p>
        <ul>
          <li>Bunker Bed</li>
          <li>250 Square Feet</li>
          <li>Maximum 4 Adults</li>
          <li>Air Conditioner</li>
          <li>Attached Bathroom</li>
          <li>Hot Water</li>
          <li>Free Wi-Fi</li>
        </ul>
      </div>
    </div>
  </section>
  <!-- Booking Call to Action -->
  <div class="book-section">
    <h2 class="section-title">SPEND YOUR HOLIDAY WITH US.</h2>
    <a href="booking.php" class="book-btn">Book Now</a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Footer -->
  <footer class="site-footer" style="background-color:#fffaf5; color:#bfa64a; padding: 40px 20px 20px;">
    <div class="footer-main d-flex flex-wrap justify-content-around">
      <div class="footer-col mb-4" style="min-width: 200px;">
        <h4 style="font-weight: 900; margin-bottom: 1rem; color:#bfa64a;">AYU BO RESORT</h4>
        <ul style="list-style:none; padding-left: 0; color:#bfa64a;">
          <li><a href="#" style="color:#bfa64a;">Home</a></li>
          <li><a href="#" style="color:#bfa64a;">Accommodation</a></li>
          <li><a href="#" style="color:#bfa64a;">Experiences</a></li>
          <li><a href="#" style="color:#bfa64a;">Offers</a></li>
          <li><a href="#" style="color:#bfa64a;">Dining</a></li>
          <li><a href="#" style="color:#bfa64a;">Contact Us</a></li>
          <li><a href="#" style="color:#bfa64a;">Gallery</a></li>
        </ul>
      </div>
      <div class="footer-col footer-logo-col text-center mb-4" style="min-width: 150px; color:#bfa64a;">
        <div style="font-size:3rem; font-weight: 900; letter-spacing: 12px;">ABR</div>
        <div style="font-weight: 700; margin-top: 5px; font-size: 1.1rem;">AYU BO<br>RESORT</div>
      </div>
      <div class="footer-col footer-map-col mb-4" style="min-width: 240px;">
        <h4 style="font-weight: 900; margin-bottom: 1rem; color:#bfa64a;">Find Us</h4>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.9579612203685!2d80.70842631512612!3d7.695502094522497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afca1760cb462d9%3A0xb6a3bfb00d1f22ed!2sHeritance%20Kandalama!5e0!3m2!1sen!2slk!4v1662724651309!5m2!1sen!2slk"
          width="240"
          height="150"
          style="border:0; border-radius: 14px;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </div>
    <div class="footer-bottom text-center" style="margin-top: 20px; font-weight: 700; font-size: 0.9rem;">
      &copy; 2025 Ayu Bo Resort. All rights reserved.
    </div>
  </footer>
</body>
</html>
