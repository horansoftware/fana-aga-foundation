<?php
 require_once "connection/connection.php";
 
session_start();
if (isset($_SESSION["admin_id"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    session_unset();
    session_write_close();
    $url = "./login.php";
    header("Location: $url");
}

// Update or reset data in the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // About Us
    if (isset($_POST["about"])) {
        $about = $_POST["about"];
        try {
            $stmt = $db->prepare("UPDATE content SET about = :content1 WHERE id = 1") ;
            $stmt->bindParam(":content1", $about);
            $stmt->execute();
            echo "About Us content updated successfully!";
        } catch (PDOException $e) {
            echo "Error updating About Us content: " . $e->getMessage();
        }
    }

    // Contact Address
    if (isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["address"])) {
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        try {
            $stmt = $db->prepare("UPDATE content SET email = :content1 WHERE id = 1");
            $stmt->bindParam(":content1", $email);
            $stmt->execute();

            $stmt = $db->prepare("UPDATE content SET phone = :content1 WHERE id = 1");
            $stmt->bindParam(":content1", $phone);
            $stmt->execute();

            $stmt = $db->prepare("UPDATE content SET address = :content1 WHERE id = 1");
            $stmt->bindParam(":content1", $address);
            $stmt->execute();

            echo "Contact Address updated successfully!";
        } catch (PDOException $e) {
            echo "Error updating Contact Address: " . $e->getMessage();
        }
    }
}
// Fetch default backup text for About Us
try {
    $stmt = $db->prepare("SELECT about FROM content WHERE id = 1");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $aboutBackup = $row["about"];
} catch (PDOException $e) {
    echo "Error fetching About Us backup text: " . $e->getMessage();
}
//error_reporting(0);
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
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Change Content</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="index.html" class="logo">
					Dashboard
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					
					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="Search ..." class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-envelope"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">0</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
												New Admin registered
												</span>
												<span class="time">15 days ago</span> 
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						 
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="https://static.vecteezy.com/system/resources/thumbnails/009/636/683/small/admin-3d-illustration-icon-png.png">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Faana Aagaa Foundation 
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<?php include 'includes/navigation.php';?>
						</div>
			</div>
			<div class="main-panel">
			<div class="content">
				<div class="container-fluid">
					<h4 class="page-title">Content Management</h4>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Change Content of Website - About Us</div>
								</div>
								<div class="card-body">
									<form method="POST">
										<div class="form-group">
											<label for="about">About Us</label>
											<textarea name="about" class="form-control" id="about" rows="9"><?php echo $aboutBackup; ?></textarea>
										</div>
										<button type="submit" class="btn btn-success">Update</button>
									 
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Change Content of Website - Contact Address</div>
								</div>
								<div class="card-body">
									<form method="POST">
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" name="email" class="form-control" id="email" value="<?php echo $emailBackup; ?>">
										</div>
										<div class="form-group">
											<label for="phone">Phone</label>
											<input type="phone" name="phone" class="form-control" id="phone" value="<?php echo $phoneBackup; ?>">
										</div>
										<div class="form-group">
											<label for="address">Address</label>
											<input type="text" name="address" class="form-control" id="address" value="<?php echo $addressBackup; ?>">
										</div>
										<button type="submit" class="btn btn-success">Update</button>
										 
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php include 'includes/footer.php'; ?>
			</div>
		</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
</html>