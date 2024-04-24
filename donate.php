  <!-- ======= Footer ======= -->
  <?php
 require_once "admin/connection/connection.php";

// Fetch default backup text for Contact Address
try {
    $stmt = $db->prepare("SELECT email FROM content WHERE id = 1");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $emailBackup = $row["email"];

    $stmt = $db->prepare("SELECT phone FROM content WHERE id = 1");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $phoneBackup = $row["phone"];

    $stmt = $db->prepare("SELECT address FROM content WHERE id = 1");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $addressBackup = $row["address"];
} catch (PDOException $e) {
    echo "Error fetching Contact Address backup text: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Donate Us</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php include 'includes/seo.php' ?>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
 
  <link href="assets/css/main.css" rel="stylesheet">
<style>
  .bank-logo {
    width: 50px; /* Set the width and height to create a circular image */
    height: 50px;
    border-radius: 50%; /* Make the image circular */
    margin-right: 20px; /* Add some spacing between logo and details */
}

.bank-details h4 {
    margin-bottom: 10px; /* Add spacing between bank name and account number */
}

  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
      <img style="height:55px; width: 150px;" src="assets/img/logo/logo.png" alt="">
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
   <?php include 'includes/navigation.php'?>
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/contact.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Donate Now</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Donate</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">
       
      <div class="col-lg-6">
    <div class="info-item d-flex flex-column justify-content-center align-items-center">
        
        <h3>Bank Information</h3>
        <p>
            <ul class="bank-list">
                <!-- <li class="bank-item">
                    <div class="bank-details">
                        <h4>Commercial Bank of Ethiopia</h4>
                        <p>Account Number: 1000292261407</p>
                    </div>
                </li> -->
                <br><br>
                <li class="bank-item">
                    <div class="bank-details">
                        <h4>Commercial Bank of Ethiopia</h4>
                        <p>Account Number: 1000 607689419</p>
                    </div>
                </li>
                <!-- <br><br>

                <li class="bank-item">
                    <div class="bank-details">
                        <h4>Awash Bank</h4>
                        <p>Account Number: 013081123811000</p>
                    </div>
                </li> -->
            </ul>
        </p>
    </div>
</div>

     

<div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row gy-4">
                <div class="col-lg-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-lg-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div><!-- End Contact Form -->


      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<?php include 'includes/footer.php'?>
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>