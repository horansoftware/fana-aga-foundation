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
  
  <footer id="footer"   class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              
        <img style="height:60px; width: 175px;" src="assets/img/logo/logo.png" alt="Logo of Newlife Teen Challenge">
        <br>
              <p><?php echo $addressBackup?><br><br>
                <strong>Phone:</strong> <?php echo $phoneBackup ?><br>
                <strong>Email:</strong> <?php echo $emailBackup ?><br>
              </p>
              <div class="social-links d-flex mt-3">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div><!-- End footer info column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About us</a></li>
              <li><a href="index.php#services">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Learn More</h4>
            <ul>
              <li><a href="#">Our Gallery</a></li>
              <li><a href="#">Our Projects</a></li> 
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Company</h4>
            <ul>
              <li><a href="vision-and-mission.php">Vision</a></li>
              <li><a href="vision-and-mission.php">Mission</a></li>
              <li><a href="vision-and-mission.php">Values</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Social Links</h4>
            <ul>
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Telegram</a></li>
              <li><a href="#">Youtube</a></li>
              <li><a href="#">Linkedin</a></li>
            </ul>
          </div><!-- End footer links column-->

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
      <div class="copyright">
  &copy; <?php echo date('Y');?> Powered by <a href="https://horansoftware.com" style="color: #888; text-decoration: none;">Horan Software</a>. Faana Aagaa Foundation
</div>
      </div>
    </div>

  </footer>
  <!-- End Footer --> 