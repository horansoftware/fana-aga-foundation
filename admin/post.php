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

// Add new event to the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $date = date('Y-m-d');
    // Upload image file
    $targetDir = 'upload/';
    $targetFile = $targetDir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);

    // Insert event data into the database
    $stmt = $db->prepare("INSERT INTO events (title, description, date, image) VALUES (:title, :description, :date, :image)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':image', $image); 

    // Redirect to the event list page
    if ($stmt->execute()) {
		$insertMsg = "Post added successfully."; 
		echo "<script>alert('Post added successfully.');</script>";
	//	header('Location: post.php');
    
	} else {
		$errorMsg = "Failed to add post.";
		echo "<script>alert('Failed to add Post.');</script>";
	}
}

if (isset($_REQUEST['event_id'])) {
    $eventId = $_REQUEST['event_id'];

    // Retrieve the event details before deletion
    $stmt = $db->prepare("SELECT title, image FROM events WHERE id = :id");
    $stmt->bindParam(':id', $eventId);
    $stmt->execute();
    $eventData = $stmt->fetch(PDO::FETCH_ASSOC);

    // Delete the event from the database
    $stmt = $db->prepare("DELETE FROM events WHERE id = :id");
    $stmt->bindParam(':id', $eventId);
    $stmt->execute();

    // Delete the associated image file
    $imageFile = 'upload/' . $eventData['image'];
    if (file_exists($imageFile)) {
        unlink($imageFile);
    }
    header('Location: post.php');
    exit();
}

// Fetch all events from the database
$stmt = $db->query("SELECT * FROM events");
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Post Blog</title>
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
								<span class="notification">1</span>
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
													New user registered
												</span>
												<span class="time">5 minutes ago</span> 
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
					<div class="container">
            <div class="col-lg-12">
                <?php
                    if(isset($errorMsg))
                    {?>
                            <div class="alert alert-danger">
                                <strong>WRONG ! <?php echo $errorMsg; ?></strong>
                            </div>
                            <?php
                    }
                    if(isset($insertMsg)){
                    ?>
                            <div class="alert alert-success">
                                <strong>SUCCESS ! <?php echo $insertMsg; ?></strong>
                            </div>
                            <?php
                    }
                    ?>

            </div>
        </div>
						<h4 class="page-title">Upload Blogs</h4>
						<div class="row">
							<div class="col-md-9 ">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Add New Post</div>
									</div>
									<form method="POST" enctype="multipart/form-data">
									<div class="card-body">
										<div class="form-group">
											<label for="email">News Title</label>
											<input type="text" name="title"class="form-control" id="name" placeholder="Enter Email">
										</div>
										<div class="form-group">
											<label for="password">Date</label>
											<input type="text" value="<?php echo date('d, M, Y');?>" class="form-control" id="password" placeholder="Password">
										</div>
									 
									 
											<div class="form-group">
												<label for="exampleFormControlFile1">Blog Image</label>
												<input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
											</div>
											<div class="form-group">
											 
												<label for="comment">News Description</label>
												<textarea  class="form-control" rows="4"ccols="10" id="description" name="description"></textarea>

												</textarea>
											</div>
											 
										</div>
										<div class="card-action">
											<button type="submit"  class="btn btn-success">Post</button>
											<button class="btn btn-danger">Cancel</button>
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<?php include 'includes/footer.php';?>
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