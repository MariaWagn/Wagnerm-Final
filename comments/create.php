<?php
require_once('../lib/functions.php');
require_once('../lib/settings.php');
require_once('../lib/db.php');
if(!isset($_SESSION['email'])) {
	header('location:../lib/auth/login.php');
};
if(count($_POST)>0){
	query($pdo,'INSERT INTO comment(description,userID) VALUES(?,?)',[$_POST['description'],$_POST['userID']]);
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SPARKER - Premium directory and listings template by Ansonika.">
    <meta name="author" content="Ansonika">
    <title><?php echo "Bookish Reviews & Lists";?></title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="../img/favicon.ico" type="../image/x-icon">
    <link rel="apple-touch-icon" type="../image/x-icon" href="../img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="../image/x-icon" sizes="72x72" href="../img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="../image/x-icon" sizes="114x114" href="../img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="../image/x-icon" sizes="144x144" href="../img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
	<link href="../css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="../css/custom.css" rel="stylesheet">
</head>

<body>
	
	<div id="page">
		
	<header class="header_in is_sticky menu_fixed">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-12">
				</div>
				<div class="col-lg-9 col-12">
					<ul id="top_menu">
						<li><a href="../lib/auth/login.php" class="login" title="Sign In"><?php echo "Sign In";?></a></li>
						<li><a href="" class="wishlist_bt_top" title="Your wishlist"><?php echo "Your wishlist";?></a></li>
					</ul>
					<!-- /top_menu -->
					<a href="#menu" class="btn_mobile">
						<div class="hamburger hamburger--spin" id="hamburger">
							<div class="hamburger-box">
								<div class="hamburger-inner"></div>
							</div>
						</div>
					</a>
					<nav id="menu" class="main-menu">
						<ul>
							<?php if(isset($_SESSION['email'])) {
							?>
								<li><span><a href="#0"><?= $_SESSION['email'] ?></a></span></li>
							<?php
							}
							?>
							<li><span><a href="../index.php"><?php echo "Home";?></a></span>
							</li>
							<li><span><a href="../book-listings.php"><?php echo "Listings";?></a></span>
							</li>
							<li><span><a href="#0"><?php echo "Pages";?></a></span>
								<ul>
									<?php if(isset($_SESSION['email']) && $_SESSION['email'] == 'wagnerm15@mymail.nku.edu') {
									?>
										<li><a href="../admin"><?php echo "Admin Center";?></a></li>
									<?php
									}
									?>
									<li><a href="../contacts.php"><?php echo "Contacts";?></a></li>
									<li><a href="index.php"><?php echo "Posts";?></a></li>
									<li><a href="../lib/auth/signout.php"><?php echo "Sign Out";?></a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->		
	</header>
	<!-- /header -->
	
	<div class="sub_header_in sticky_header">
		<div class="container">
			<h1><?php echo "Create Post";?></h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->
		
	<main>
	<form method="POST">
	  <div class="content-wrapper">
		<div class="container-fluid">
		  <!-- Breadcrumbs-->
			<div class="box_general padding_bottom">
				<div class="header_box version_2">
					<h2><i class="fa fa-file"></i><?php echo "Basic info" ;?></h2>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Comment</label>
							<input type="text" class="form-control" name="description">
						</div>
					</div>
					
				</div>
				<!-- /row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>User</label>
							<select class="form-control" name="userID">
							 <option value="">Select User</option>
							 <?php
								$users=query($pdo,'SELECT * FROM user');
								while($user=$users->fetch()){
								?>
								<option value="<?=$user['userID']?>"><?=$user['name']?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<!-- /row-->
			</div>
			<!-- /box_general-->
			<p><button type="submit" class="btn_1 medium">Create Post</button></p>
		  </div>
		  <!-- /.container-fluid-->
	   </div>
	</form> 
	</main>	<!--/main-->
	
	<footer class="plus_border">
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-6">
					<h3 data-bs-target="#collapse_ft_1"><?php echo "Quick Links" ;?></h3>
					<div class="collapse dont-collapse-sm" id="collapse_ft_1">
						<ul class="links">
							<li><a href="../lib/auth/register.php"><?php echo "Create account" ;?></a></li>
							<li><a href="../contacts.php"><?php echo "Contacts" ;?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<h3 data-bs-target="#collapse_ft_3"><?php echo "Contacts" ;?></h3>
					<div class="collapse dont-collapse-sm" id="collapse_ft_3">
						<ul class="contacts">
							<li><i class="ti-home"></i><?php echo "0000 Cherry Wood Rd." ;?><br><?php echo "Union, Kentucky - US" ;?></li>
							<li><i class="ti-headphone-alt"></i><?php echo "+859 000 0000" ;?></li>
							<li><i class="ti-email"></i><a href="#0"><?php echo "info@gmail.com" ;?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					
					<div class="collapse dont-collapse-sm" id="collapse_ft_4">
						
						<div class="follow_us">
							<h5><?php echo "Follow Us" ;?></h5>
							<ul>
								<li><a href="#0"><i class="ti-facebook"></i></a></li>
								<li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
								<li><a href="#0"><i class="ti-google"></i></a></li>
								<li><a href="#0"><i class="ti-pinterest"></i></a></li>
								<li><a href="#0"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /row-->
			<hr>
			<div class="row">
				<div class="col-lg-12">
					<ul id="additional_links">
						<li><a href="#0"><?php echo "Terms and conditions" ;?></a></li>
						<li><a href="#0"><?php echo "Privacy" ;?></a></li>
						<li><span><?php echo "© 2023 Maria Wagner" ;?></span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="../js/common_scripts.js"></script>
	<script src="../js/functions.js"></script>
	<script src="../assets/validate.js"></script>
  
</body>
</html>
