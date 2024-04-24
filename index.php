<?php
    require_once 'admin/connection/connection.php'; // Include the connection.php file
    // Function to update the views count table
    include 'includes/viewers.php'; 

    $query = "SELECT * FROM events order by id desc";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Faana Aagaa Foundation</title>
  <?php include 'includes/seo.php' ?>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <style>


.hero-container {
    height: 30vh;
    background: linear-gradient(to right, #05070FC7, #0B1329A2),
            url('assets/img/slide_1.jpg') center/cover no-repeat fixed;

    /* filter: grayscale(100%); */
    position: relative;
}

.hero-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
}

.hero-text {
    font-size: 24px;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 20px;
}

.donate-button {
    background-color: #0f90ba;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.donate-button:hover {
    background-color: #FF0000;
}
.custom-bg {
            background-color: #000000;
            color: white;
        }

        .custom-text {
            font-weight: bold;
            text-transform: uppercase;
        }

        /* For mobile devices */
@media (max-width: 767px) {
  #first-slide {
    background-image: url(assets/img/slide/slide_mobile_1.jpg);
  }
}

/* For desktop devices */
@media (min-width: 768px) {
  #first-slide {
    background-image: url(assets/img/slide/slide_1.jpg);
  }
}

  </style>
</head>

<body>
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logso d-flex align-items-center"> 
        <img style="height:55px; width: 160px;" src="assets/img/logo/logo.png" alt="">
        <!-- <h1>Faana Aagaa Foundation<span>.</span></h1> -->
      </a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <?php include 'includes/navigation.php'?>
    </div>
  </header> 
  <section id="hero" class="hero">
  
    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-item first-slide active" id="first-slide" style="background-image: url(assets/img/slide/slide_1.jpg)">
          <div class="info d-flex align-items-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6 text-center">
                <h2 data-aos="fade-down">Lafti Marti Biyya, Namni Marti Kiyya</h2>
                <p data-aos="fade-up">Honoring the heritage of Yuuba Aagaa Xenxenoo, we strive to uphold the Gadaa system's legacy, fostering a future where cultural heritage and unity thrive.</p>
                <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Get Started</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url(assets/img/slide/slide_2.jpg)">
          <div class="info d-flex align-items-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6 text-center">
                <h2 data-aos="fade-down">Preserving Legacy, Inspiring Tomorrow</h2>
                <p data-aos="fade-up"> Rooted in the principles of Gadaa, we empower leaders to enact positive change, envisioning a society built on peace, unity, and cultural preservation.</p>
                <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Get Started</a>
              </div>
            </div>
          </div>
        </div>
    </div>
      <div class="carousel-item" style="background-image: url(assets/img/slide/slide_3.jpg)">
      <div class="info d-flex align-items-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6 text-center">
                <h2 data-aos="fade-down">Unveiling History, Shaping Futures</h2>
                <p data-aos="fade-up">Through our dedication to preserving cultural heritage, we shape a future where the timeless wisdom of Gadaa guides communities towards unity and prosperity.</p>
                <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Get Started</a>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="carousel-item" style="background-image: url(assets/img/slide/slide_4.jpg)">
      <div class="info d-flex align-items-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6 text-center">
                <h2 data-aos="fade-down">Legacy of Peace, Journey of Unity</h2>
                <p data-aos="fade-up"> Inspired by Aagaa Xenxenoo's legacy, we embark on a journey to foster unity and peace, ensuring that the spirit of Gadaa continues to inspire generations to come.</p>
                <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Get Started</a>
              </div>
            </div>
          </div>
        </div>
    </div>
 
      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Get Started Section ======= -->
    <section id="get-started" class="get-started">
      <div class="container">

        <div class="row justify-content-between gy-4">

          <div class="col-lg-6 d-flex align-items-center " data-aos="fade-up">
            <div class="content">
              <h3>About Us</h3>
              <p style="  text-align: justify;">
        Faana Aagaa Foundation is a tribute to the legacy of Aba Gada Aagaa Xenxenoo, established with the aim of preserving and promoting the Gadaa system and its cultural heritage. Named after Yuuba Aagaa Xenxenoo, this foundation embodies his teachings and principles, striving to uphold his way of life and leadership.<br>Inspired by the luminous spirit of Yuuba Aagaa Xenxenoo, our namesake and revered leader, we embark on a sacred mission to ensure that the timeless wisdom and ethos of the Gadaa endure the tests of time.
              
              
           </p>
            </div>
          </div>

          <div class="col-lg-5" data-aos="fade">
            <!-- logo image  -->
            <img style="width: 350px; height:330px;" src="assets/img/logo/logo_2.jpg" class="img-fluid" alt="">
            </div>

        </div>
 
      </div>
    </section> 
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <!-- <div class="section-header">
          <h2>Vision & Mission</h2>
          <p>Endurance Youth Association (EYA) is a youth-focused Local NGO concerned and working towards empowering the youth.</p>
        </div> -->

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="fa-solid fa-eye"></i>
              </div>
              <h3>Vision</h3>
              <p>We envision a society where the principles of Gadaa are upheld, leaders emerge to serve their people selflessly, cultural heritage is preserved for future generations, and peace is actively pursued as a collective endeavor.</p>
              <a href="agriculture/animal-husbandry.php" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-coins"></i>
              </div>
              <h3>MISSION</h3>
              <p>Our mission is to preserve and perpetuate the Gadaa system, foster unity among people, and promote national values. Through our initiatives, we seek to honor the memory of Aga Tantanno and his dedication to peace, love, and social harmony.</p>
              <a href="mining/mining-extraction.php" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-city"></i>
              </div>
              <h3>Core Values</h3>
              <p>Our core values encompass commitment to safeguarding the Gadaa system and its cultural significance, fostering unity transcending differences, nurturing selfless leaders dedicated to communities' integrity, promoting cultural heritage transmission, and advocating for peace and reconciliation inspired by Aga Tantanno's legacy.</p>
              <a href="construction/construction-trade.php" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->


          

        </div>

      </div>
    </section><!-- End Services Section -->

    <section id="features" class="features  ">
      <div class="container" data-aos="fade-up">

        <ul class="nav nav-tabs row  g-2 d-flex">

          <li class="nav-item col-4">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
              <h4>Preservation of the Gadaa System</h4>
            </a>
          </li>

          <li class="nav-item col-4">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
              <h4>Leadership Development</h4>
            </a> 
          <li class="nav-item col-4">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
              <h4>Monastery and Tourism Development</h4>
            </a>
          </li> 

          

        </ul>

        <div class="tab-content">

          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <h3>The Gadaa System</h3>
                <p class="fst-italic">
               Through research and socio-economic initiatives, we dedicate ourselves to the preservation of the Gadaa system, ensuring its continued relevance and sustainability for generations to come.
                </p>
                <ul>
                  <li>Our efforts in preserving the Gadaa system involve conducting in-depth research and implementing socio-economic programs aimed at safeguarding its cultural significance. We believe that by understanding its historical context and adapting to modern challenges, we can ensure the enduring legacy of the Gadaa system for future generations. </li>
               
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                <img src="assets/img/slide/slide_1.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane" id="tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>His contributions are more than just a politics</h3>
                <p class="fst-italic">
              We strive to cultivate leaders who embody the selfless spirit of Aagaa Xenxenoo, empowering them to serve their communities with dedication and integrity.
                </p>
                <ul>
                  <li>Our focus on leadership development entails a holistic approach, integrating mentorship, training, and practical experiences to equip individuals with the skills and mindset necessary to lead with integrity and compassion. By investing in the growth and empowerment of these leaders, we strive to create a ripple effect of positive influence, shaping communities and societies for generations to come.
</li>
                 </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/Screenshot 2024-03-18 201022.png" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane" id="tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>Harnessing the potential of monastery resources</h3>
                <p class="fst-italic">We embark on a journey of development aimed at both preserving heritage and promoting tourism, envisioning a future where these sacred sites serve as beacons of cultural enlightenment and economic prosperity. </p>
                <ul>
                  <li>
                  Our focus on monastery and tourism development involves strategic planning to organize monastery resources effectively, ensuring their preservation and accessibility to future generations. Simultaneously, we leverage these sites as tourism attractions, not only fostering cultural exchange but also contributing to local economies through sustainable tourism practices.
                  </li>
                  </ul>
                
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/gada-three.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane" id="tab-4">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>Climate Resilience and Adaptive Practices</h3>
                <p class="fst-italic">
                Recognizing climate change's impact, EYA prioritizes resilience, integrating environmental practices into youth development for a sustainable future.
                </p>
                <ul>
                  <li>The recognition of Climate Resilience and Adaptive Practices as a strategic priority for the Endurance Youth Association  (EYA) is grounded in a comprehensive situation assessment. This acknowledgment is based on the critical importance, potential impact, and feasibility of addressing challenges related to climate change. EYA's past successes in Environmental Conservation and Awareness have played a pivotal role in guiding the prioritization of this area.
The assessment brought to light the alarming vulnerabilities of Ethiopian youth to the adverse effects of climate change, posing increased environmental risks and challenges to livelihoods.</li>
                    </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/image_808.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

        </div>

      </div>
    </section> 
 
    
    <div class="hero-container">
        <div class="hero-content">
            <h1 class="hero-text">Make a Difference in the World<br>Donate Us!</h1>
            <a href="donate.php">      <button class="donate-button">Donate Now</button> </a>
        </div>
    </div>

    <section id="recent-blog-posts" style="background-color: #EDEEF3;" class="recent-blog-posts">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Blogs and Events</h2>
      <br>
      <p></p>
      <div class="row gy-5">
        <?php 
          // Get the latest news item for the big one
          $latest_event = reset($events); // Assuming $events is sorted by date
        ?>
      <div class="col-xl-6" data-aos="fade-up" data-aos-delay="100">
  <div style="background-color:#fff; height: 200px;" class="post-item position-relative h-100">
  <div class="post-img position-relative" style="height: 250px; overflow: hidden;">
  <img style="  object-fit: cover;
  object-position: center;" src="admin/upload/<?php echo $latest_event['image']; ?>" class="img-fluid center-cropped" alt="" style="height: auto; max-width: 100%;">
</div>
  
    <div class="post-content d-flex flex-column">
      <h3 class="post-title"
      style=" text-align: left;
    padding: 5px;"><?php echo $latest_event['title']; ?></h3>
       <div  class="post-description"
    
    style=" text-align: left;
    padding: 5px;
    font-size: 13px;"
       ><?php echo substr($latest_event['description'], 0, 100); ?><?php echo strlen($latest_event['description']) > 100 ? '...' : ''; ?></div>
      <a     style="  padding: 5px; " href="news.php?news_id=<?php echo $latest_event['id']; ?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
    </div>
  </div>
</div>
 

        <div class="col-xl-6" data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-4">
            <?php foreach ($events as $event): ?>
              <?php if ($event !== $latest_event): ?>
                <div class="col-md-12">
                  <div style="background-color:#fff; height: 100px;" class="post-item position-relative d-flex">
                    <div class="post-img">
                      <img src="admin/upload/<?php echo $event['image']; ?>" class="img-fluid" alt="" style="max-height: 100%; max-width: 150px;">
                    </div>
                    <div class="post-content">
                      <h4 class="post-title"     style=" text-align: left;
    padding: 5px;"><?php echo $event['title']; ?></h4>
                      <div class="post-description"  style=" text-align: left;
    padding: 5px;
    font-size: 13px;"><?php echo substr($event['description'], 0, 50); ?><?php echo strlen($event['description']) > 50 ? '...' : ''; ?></div>
                      <span class="post-date"><?php echo date('M d', strtotime($event['date'])); ?></span>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>






  <?php include 'includes/footer.php' ?>
  </main><!-- End #main -->



  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>