<?php
session_start();
include 'db.php'; 
$result = $conn->query("SELECT * FROM customers LIMIT 5"); // For example

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Destination</title>

  <link href="css/bootstrap-4.4.1.css" rel="stylesheet" />
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

  <style>
.scroll-wrapper {
  overflow-x: auto;
  overflow-y: hidden;
  width: 100%;
  cursor: grab;
}

.scroll-wrapper:active {
  cursor: grabbing;
}

.scroll-content {
  display: flex;
  gap: 10px;
}

.scroll-content img {
  height: 400px;
  border-radius: 20px;
  flex-shrink: 0;
}

/* Keyframes for smooth infinite scroll */
@keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-50%);
  }
}
    /* wrapper keeps corners and hides overflow */
    .card .image-container {
      overflow: hidden;
      border-radius: 0.375rem; /* matches Bootstrap .rounded corners */
    }

    /* make image fill the container and stay sharp */
    .card .image-container img {
      display: block;
      width: 100%;
      height: 200px; /* change to the height you want */
      object-fit: cover; /* keeps aspect ratio while filling */
      transition: transform 0.6s cubic-bezier(0.2, 0.8, 0.2, 1);
      transform-origin: center center;
      border-radius: inherit;
    }
h3 {
    font-family: 'Playfair Display', serif;
    font-size: 50px;
    font-weight: 600;
    line-height: 0.7;
	letter-spacing: -4px;
  }
    .card .image-container:hover img {
      transform: scale(1.15);
    }

.card:hover {
      transform: translateY(-6px);
      box-shadow: 0 10px 24px rgba(0, 0, 0, 0.72);
      transition: transform 0.65s ease, box-shadow 0.65s ease;
}
  .hero-container .hero-text .topic {
    color: #FFFFFF;
    text-align: left;
    font-size: 60px;
    margin-right: -89px;
}
  .card.h-100 .card-body .card-text {
}
  .card.h-100 .card-body .card-text {
    color: #C4AF82;
}
  .back .row.justify-content-center .col-12.col-md-6.col-lg-3.mb-4 {
}
  .back .hero-container {
    width: 100vw;
    height: 100px;
}
  .back .heritance-navbar .nav-container.dest {
    background-color: #757575;
}
  </style>
</head>
<body class="back">
  <!-- Navbar -->
<nav class="heritance-navbar">
  <div class="nav-container dest">
    <div class="nav-left">
      <ul class="nav-menu">
        <li><a href="room.php">ACCOMMODATION</a></li>
        <li><a href="vehicle.php">DRiving</a></li>
        <li><a href="aboutus.php">about&nbsp; us</a></li>
        <li><a href="index.php">Home</a></li>
      </ul>
    </div>
    
    <div class="nav-center">
      <div class="brand-logo">
        <div class="brand-main" <a href="index.html">AYU BO RESORT</a></div>
        <div class="brand-sub">SIGIRIYA</div><br>
        <div class="brand-tagline">SRI LANKA</div>
      </div>
    </div>
    
	  <ul class="nav-menu">
        <li><a href="ContactUs.php">Contact us</a></li>
      </ul>
    
      <button class="book-your-stay-btn" onclick="window.location.href='booking.php'">
BOOK YOUR STAY</button>
      </div>
    </div>
  </div>
</nav>  <!-- Hero Section -->
<!-- STYLES -->
<style>
  /* Zoom and lift effects for cards */
  .card .image-container {
    overflow: hidden;
    border-radius: 0.375rem;
  }

  .card .image-container img {
    display: block;
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.2, 0.8, 0.2, 1);
    transform-origin: center center;
    border-radius: inherit;
  }

  .card .image-container:hover img {
    transform: scale(1.15);
  }

  .card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.12);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
  }

  /* Hero Image Overlay Styles */
  .hero-container {
    position: relative;
    width: 100%;
    height: 500px;
    overflow: hidden;
  }

  .hero-container img.hero-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .hero-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.85);
  }

  .hero-text h2 {
    font-size: 2rem;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin: 0;
  }

  .hero-text h1 {
    font-size: 4rem;
    font-weight: 800;
    margin: 0;
    text-transform: uppercase;
  }
</style>
<br><br>
<!-- HERO SECTION -->
<!-- Hero Section -->
<div class="hero-container">
  <img
    src="assets/destination/e4634f2ab3c2f2e4bda65697041a1f83.jpg"
    alt="Sigiriya Rock"
    class="hero-image"
  />
  
</div>

  <!-- Explore Section -->
<div class="container">
    <div class="row">
      <div class="col-md-12 text-center mb-4">
        <h4 class="text-uppercase">&nbsp;</h4>
        <h6 class="text-uppercase">Explore Our Tours</h6>
        <h3 class="p">New and Most</h3>
        <h3 class="p">Popular Tours</h3>
        <p>&nbsp;</p>
      </div>
    </div>

    <!-- Cards Row -->
<div class="row justify-content-center">
      <!-- Card 1 -->
      <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="card h-100">
          <div class="image-container">
            <img
              src="assets/destination/7afb1867ab39dcc0187ca69d9318d791.jpg"
              alt="Sigiriya Rock Fortress"
              class="card-img-top img-fluid"
            />
          </div>
          <div class="card-body">
            <h5 class="card-title">Sigiriya Rock Fortress</h5>
            <p class="card-text">
              The star attraction, a UNESCO World Heritage Site often called the Lion Rock is a stunning 200m rock fortress featuring ancient frescoes, water gardens, and panoramic summit views.
            </p>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
    <div class="col-12 col-md-6 col-lg-3 mb-4">
      <div class="card h-100">
          <div class="image-container">
            <img
              src="assets/destination/cd6aef6d334ebedf4da8e996502b7319.jpg"
              alt="Dambulla Cave Temple (Golden Temple)"
              class="card-img-top img-fluid"
            />
          </div>
        <div class="card-body">
            <h5 class="card-title">Dambulla Cave Temple (Golden Temple)</h5>
          <p class="card-text">
              About 27 km away, this impressive complex houses over 150 Buddha statues and vibrant frescoes across five caves, making it one of Sri Lanka's best-preserved cave temple sites.
            </p>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="card h-100">
          <div class="image-container">
            <img
              src="assets/destination/9bc69f17ff9dec6fb313e690c3f9cb7b.jpg"
              alt="Pidurangala Rock"
              class="card-img-top img-fluid"
            />
          </div>
          <div class="card-body">
            <h5 class="card-title">Pidurangala Rock</h5>
            <p class="card-text">
              Just 1 km north of Sigiriya, this rocky outcrop offers breathtaking views of Sigiriya especially beautiful during sunrise or sunset and features ancient temple ruins and a reclining Buddha statue.
            </p>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="card h-100">
          <div class="image-container">
            <img
              src="assets/destination/6d10c235851f41b9cda3a061c753416e.jpg"
              alt="Minneriya & Kaudulla National Parks"
              class="card-img-top img-fluid"
            />
          </div>
          <div class="card-body">
            <h5 class="card-title">Minneriya &amp; Kaudulla National Parks</h5>
            <p class="card-text">
              Minneriya (≈30 km): Famous for the annual elephant “Gathering” (June–September), it's a prime spot for jeep safaris, birdwatching, and spotting diverse wildlife.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Extra Cards Row -->
<div class="row">
  <div class="col-xl-12 mb-3">
    <div class="card mb-3">
      <div class="card-body">
        <h4 class="card-title"><strong>Sigiriya Rock Fortress</strong></h4>

        <div class="row">
          <!-- Horizontal auto + manual scroll gallery -->
          <div class="col-md-4">
            <div class="scroll-wrapper" id="scrollWrapper">
              <div class="scroll-content" id="scrollContent">
                <img src="assets/destination/7afb1867ab39dcc0187ca69d9318d791.jpg" alt="Sigiriya 1">
                <img src="assets/destination/05b6873056e737508e1d82244162a814.jpg" alt="Sigiriya 2">
                <img src="assets/destination/8cece043869d32a6fa02ef57e9f77733.jpg" alt="Sigiriya 3">
                <img src="assets/destination/6b830dd6ce3512c00cc0418b5e0658e3.jpg" alt="Sigiriya 4">
                <!-- Duplicate images for seamless scroll -->
                <img src="assets/destination/7afb1867ab39dcc0187ca69d9318d791.jpg" alt="Sigiriya 1">
                <img src="assets/destination/05b6873056e737508e1d82244162a814.jpg" alt="Sigiriya 2">
                <img src="assets/destination/8cece043869d32a6fa02ef57e9f77733.jpg" alt="Sigiriya 3">
                <img src="assets/destination/6b830dd6ce3512c00cc0418b5e0658e3.jpg" alt="Sigiriya 4">
              </div>
            </div>
          </div>

          <!-- Text content -->
          <div class="col-md-8">
            <p>
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Rising dramatically from the lush Sri Lankan jungle, Sigiriya is an ancient rock fortress that tells a fascinating story of royal ambition and artistic brilliance. Often called the “Eighth Wonder of the World,” this UNESCO World Heritage Site boasts breathtaking frescoes, elaborate water gardens, and stunning panoramic views from its summit. Built over 1,500 years ago by King Kasyapa, Sigiriya combines history, archaeology, and natural beauty, making it a must-visit destination for adventurers and culture lovers alike. Whether you’re climbing the iconic Lion’s Gate or exploring the secret gardens, Sigiriya promises an unforgettable journey through time and nature.
            </p>
            <p><strong><em>Things to Do Near Sigiriya:</em></strong></p>
            <ul>
              <li>Climb Lion’s Gate</li>
              <li>Explore water gardens</li>
              <li>See ancient frescoes</li>
              <li>Village tour nearby</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xl-12 mb-3">
    <div class="card mb-3">
      <div class="card-body">
        <h4 class="card-title"><strong>Dambulla Cave Temple (Golden Temple)</strong></h4>

        <div class="row">
          <!-- Horizontal auto + manual scroll gallery -->
          <div class="col-md-4">
            <div class="scroll-wrapper" id="scrollWrapper">
              <div class="scroll-content" id="scrollContent">
                <img src="assets/destination/cd6aef6d334ebedf4da8e996502b7319.jpg" alt="Sigiriya 1">
                <img src="assets/destination/6df968bb83aa9f9729b5019f8a7966ff.jpg" alt="Sigiriya 2">
                <img src="assets/destination/11a5535d87673f8c065563b6ba13c9dc.jpg" alt="Sigiriya 3">
                <img src="assets/destination/fb08d01c637e583fd990f23bdcd08203.jpg" alt="Sigiriya 4">
                <!-- Duplicate images for seamless scroll -->
                <img src="assets/destination/ca96d8e009f8ad50128891ce45b59c9d.jpg" alt="Sigiriya 1">
				<img src="assets/destination/6df968bb83aa9f9729b5019f8a7966ff.jpg" alt="Sigiriya 2">
                <img src="assets/destination/11a5535d87673f8c065563b6ba13c9dc.jpg" alt="Sigiriya 3">
                <img src="assets/destination/fb08d01c637e583fd990f23bdcd08203.jpg" alt="Sigiriya 4">
              </div>
            </div>
          </div>

          <!-- Text content -->
          <div class="col-md-8">
            <p>
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Rising gracefully amidst the central Sri Lankan hills, the Dambulla Cave Temple is a remarkable sacred site that blends spirituality and history. Known as the Golden Temple, this UNESCO World Heritage Site is home to over 150 Buddha statues and intricate frescoes that span five caves, reflecting centuries of devotion and artistry. The temple complex offers visitors a serene atmosphere, panoramic views of the surrounding countryside, and a glimpse into Sri Lanka’s rich Buddhist heritage. Whether you’re exploring the sacred caves or admiring the vibrant paintings, Dambulla promises a journey of peace, culture, and reverence.
            </p>
            <p><strong><em>Things to Do Near Dambulla:</em></strong></p>
            <ul>
              <li>Explore the cave temples</li>
              <li>Admire ancient frescoes and Buddha statues</li>
              <li>Enjoy panoramic views of the surrounding hills</li>
              <li>Visit nearby markets and local villages</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
	  
<div class="row">
  <div class="col-xl-12 mb-3">
    <div class="card mb-3">
      <div class="card-body">
        <h4 class="card-title"><strong>Pidurangala Rock</strong></h4>

        <div class="row">
          <!-- Horizontal auto + manual scroll gallery -->
          <div class="col-md-4">
            <div class="scroll-wrapper" id="scrollWrapper">
              <div class="scroll-content" id="scrollContent">
                <img src="assets/destination/dbf99dae2e0e186c4bfe4ac257e446e7.jpg" alt="Sigiriya 1">
                <img src="assets/destination/722367081cc8538d06ad946ad12af47f.jpg" alt="Sigiriya 2">
                <img src="assets/destination/6c5a7208c0fc728e46ee6a23433fcca1.jpg" alt="Sigiriya 3">
                <img src="assets/destination/a90769daf7807905e7af98cbb76a9d12.jpg" alt="Sigiriya 4">
				<img src="assets/destination/dbf99dae2e0e186c4bfe4ac257e446e7.jpg" alt="Sigiriya 1">
                <img src="assets/destination/722367081cc8538d06ad946ad12af47f.jpg" alt="Sigiriya 2">
                <img src="assets/destination/6c5a7208c0fc728e46ee6a23433fcca1.jpg" alt="Sigiriya 3">
                <img src="assets/destination/a90769daf7807905e7af98cbb76a9d12.jpg" alt="Sigiriya 4">
              </div>
				
            </div>
          </div>

          <!-- Text content -->
          <div class="col-md-8">
            <p>
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Rising dramatically just north of Sigiriya, Pidurangala Rock is a striking natural formation that offers both adventure and breathtaking views. Known for its panoramic vistas of Sigiriya and the surrounding jungle, it is a favorite spot for sunrise treks. Pidurangala is also home to an ancient Buddhist monastery, complete with ruins and a reclining Buddha statue, giving visitors a mix of history, spirituality, and natural beauty. Climbing this rock rewards you with unforgettable landscapes and a tranquil escape from the crowds.
            </p>
            <p><strong><em>Things to Do Near Sigiriya:</em></strong></p>
            <ul>
              <li>Climb to the summit for sunrise views</li>
              <li>Explore ancient monastery ruins</li>
              <li>Visit the reclining Buddha statue</li>
              <li>Take nature walks in the surrounding jungle</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
	
<div class="row">
  <div class="col-xl-12 mb-3">
    <div class="card mb-3">
      <div class="card-body">
        <h4 class="card-title"><strong>Minneriya & Kaudulla National Parks</strong></h4>

        <div class="row">
          <!-- Horizontal auto + manual scroll gallery -->
          <div class="col-md-4">
            <div class="scroll-wrapper" id="scrollWrapper">
              <div class="scroll-content" id="scrollContent">
                <img src="assets/destination/dbb6714d045522a7b67b84ccc51274b8.jpg" alt="Sigiriya 1" >
                <img src="assets/destination/kaudulla-safari-elephants-scaled (1).jpg" alt="Sigiriya 2">
                <img src="assets/destination/568bfa64dc5f23932f71a9d5dc6d464a.jpg" alt="Sigiriya 3">
                <img src="assets/destination/861c27c1779223a5ca413a8c28114cd5.jpg" alt="Sigiriya 4">
				 <img src="assets/destination/dbb6714d045522a7b67b84ccc51274b8.jpg" alt="Sigiriya 1" >
                <img src="assets/destination/kaudulla-safari-elephants-scaled (1).jpg" alt="Sigiriya 2">
                <img src="assets/destination/568bfa64dc5f23932f71a9d5dc6d464a.jpg" alt="Sigiriya 3">
                <img src="assets/destination/861c27c1779223a5ca413a8c28114cd5.jpg" alt="Sigiriya 4">
              </div>
            </div>
          </div>

          <!-- Text content -->
          <div class="col-md-8">
            <p>
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Stretching across Sri Lanka’s dry zone, Minneriya and Kaudulla National Parks are renowned for their wildlife, especially the iconic elephant gatherings. Every year, hundreds of elephants converge around the reservoirs, creating one of the country’s most spectacular natural events. These parks are also home to diverse species of birds, reptiles, and other mammals, making them a haven for nature lovers and photographers. Whether on a jeep safari or quietly observing the wildlife, Minneriya and Kaudulla offer an unforgettable experience of Sri Lanka’s rich biodiversity.
            </p>
            <p><strong><em>Things to Do Near Kaudulla:</em></strong></p>
            <ul>
              <li>Jeep safaris to spot elephants and wildlife</li>
              <li>Birdwatching and photography</li>
              <li>Explore the park’s reservoirs and natural landscapes</li>
              <li>Learn about conservation efforts</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
	
<div class="row">
  <div class="col-xl-12 mb-3">
    <div class="card mb-3">
      <div class="card-body">
        <h4 class="card-title"><strong>Polonnaruwa Ancient City</strong></h4>

        <div class="row">
          <!-- Horizontal auto + manual scroll gallery -->
          <div class="col-md-4">
            <div class="scroll-wrapper" id="scrollWrapper">
              <div class="scroll-content" id="scrollContent">
                <img src="assets/destination/d82ca4a76a9775793c4d1fd4d24ff6e4.jpg" alt="Sigiriya 1" >
                <img src="assets/destination/1b209db1744dc7fae55efdc478603dae.jpg" alt="Sigiriya 2">
                <img src="assets/destination/930c13b7182dcc2c3001daeebbfd08e7.jpg" alt="Sigiriya 3">
                <img src="assets/destination/01c4e493c7ba2abf80867935482bb4ca.jpg" alt="Sigiriya 4">
				<img src="assets/destination/d82ca4a76a9775793c4d1fd4d24ff6e4.jpg" alt="Sigiriya 1" >
                <img src="assets/destination/1b209db1744dc7fae55efdc478603dae.jpg" alt="Sigiriya 2">
                <img src="assets/destination/930c13b7182dcc2c3001daeebbfd08e7.jpg" alt="Sigiriya 3">
                <img src="assets/destination/01c4e493c7ba2abf80867935482bb4ca.jpg" alt="Sigiriya 4">
              </div>
            </div>
          </div>

          <!-- Text content -->
          <div class="col-md-8">
            <p>
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Once the majestic capital of Sri Lanka, Polonnaruwa Ancient City is a living museum of history and architecture. The well-preserved ruins, including palaces, temples, and statues, showcase the ingenuity and artistry of the medieval Sinhalese civilization. Walking through the city, visitors encounter colossal Buddha statues, intricately carved stone structures, and sacred relics that tell stories of devotion, power, and culture. Polonnaruwa offers a fascinating journey into the past, allowing travelers to step back in time and witness the grandeur of Sri Lanka’s ancient kingdoms.
            </p>
            <p><strong><em>Things to Do Near polonnaruwa:</em></strong></p>
            <ul>
              <li>Explore ancient palaces and temples</li>
              <li>Admire the Gal Vihara Buddha statues</li>
              <li>Cycle or walk through the archaeological park</li>
              <li>Learn about Sri Lanka’s medieval history</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


  <!-- Feedback Section -->
<section class="feedback" id="feedback">
    <h2 style="color: white;">Guest Reviews</h2>
    <p style="color: white;">A truly unforgettable stay!" ⭐⭐⭐⭐⭐</p>
    <p style="color: white;">The hospitality was amazing." ⭐⭐⭐⭐</p>
  <p style="color: white;">"Loved the food and the views." ⭐⭐⭐⭐⭐</p>
</section>
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
  <!-- Scripts -->
<script>
  const wrappers = document.querySelectorAll('.scroll-wrapper'); // get all wrappers
  let speed = 0.5; // pixels per frame, lower = slower

  wrappers.forEach(wrapper => {
    let isScrolling = false;

    function autoScroll() {
      if (!isScrolling) {
        wrapper.scrollLeft += speed;
        // Loop scroll seamlessly
        if (wrapper.scrollLeft >= wrapper.scrollWidth / 2) {
          wrapper.scrollLeft = 0;
        }
      }
      requestAnimationFrame(autoScroll);
    }

    // Mouse drag
    let startX, scrollLeft;
    wrapper.addEventListener('mousedown', (e) => {
      isScrolling = true;
      startX = e.pageX - wrapper.offsetLeft;
      scrollLeft = wrapper.scrollLeft;
    });
    wrapper.addEventListener('mouseleave', () => isScrolling = false);
    wrapper.addEventListener('mouseup', () => isScrolling = false);
    wrapper.addEventListener('mousemove', (e) => {
      if(!isScrolling) return;
      const x = e.pageX - wrapper.offsetLeft;
      const walk = (x - startX);
      wrapper.scrollLeft = scrollLeft - walk;
    });

    // Touch drag
    wrapper.addEventListener('touchstart', (e) => {
      isScrolling = true;
      startX = e.touches[0].pageX - wrapper.offsetLeft;
      scrollLeft = wrapper.scrollLeft;
    });
    wrapper.addEventListener('touchend', () => isScrolling = false);
    wrapper.addEventListener('touchmove', (e) => {
      if(!isScrolling) return;
      const x = e.touches[0].pageX - wrapper.offsetLeft;
      const walk = (x - startX);
      wrapper.scrollLeft = scrollLeft - walk;
    });

    autoScroll(); // start auto-scroll for this wrapper
  });
</script>

</body>
</html>
