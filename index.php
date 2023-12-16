<?php
require_once('lib/json-read.php');
require_once('lib/functions.php');
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
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>
		
	<div id="page">
		
	<header class="header menu_fixed">
		<ul id="top_menu">
			<li><a href="lib/auth/login.php" class="login" title="Sign In"><?php echo "Sign In";?></a></li>
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
		        <li><span><a href="index.php"><?php echo "Home";?></a></span>
		        </li>
		        <li><span><a href="book-listings.php"><?php echo "Listings";?></a></span>
		        </li>
		        <li><span><a href="#0"><?php echo "Pages";?></a></span>
		            <ul>
						<?php if(isset($_SESSION['email']) && $_SESSION['email'] == 'wagnerm15@mymail.nku.edu') {
						?>
							<li><a href="admin"><?php echo "Admin Center";?></a></li>
						<?php
						}
						?>
						<li><a href="contacts.php"><?php echo "Contacts";?></a></li>
						<li><a href="comments/index.php"><?php echo "Posts";?></a></li>
		                <li><a href="lib/auth/signout.php"><?php echo "Sign Out";?></a></li>
		            </ul>
		        </li>
		    </ul>
		</nav>
	</header>
	<!-- /header -->
	
	<main>
		<section class="hero_single version_2">
			<div class="wrapper">
				<div class="container">
					<h3><?php echo "Find your next book!";?></h3>
					<p><?php echo "Discover top rated books and genres";?></p>
					<form>
						<div class="row g-0 custom-search-input-2">
							<div class="col-lg-7">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="What are you looking for...">
									<i class="icon_search"></i>
								</div>
							</div>
							<div class="col-lg-3">
								<select class="wide">
									<option><?php echo "All Categories";?></option>	
									<option><?php echo "Genre";?></option>
									<option><?php echo "Author";?></option>
								</select>
							</div>
							<div class="col-lg-2">
								<input type="submit" value="Search">
							</div>
						</div>
						<!-- /row -->
					</form>
				</div>
			</div>
		</section>
		<!-- /hero_single -->
		
		<div class="bg_color_1">
			<div class="container margin_80_55">
				<div class="main_title_2">
					<span><em></em></span>
					<h2><?php echo "Genres";?></h2>
					<p><?php echo "Below are the genres of all the books we have on the website.";?></p>
				</div>
				<div class="row">
				<?php 
				$array1=readJson('genre');
				foreach($array1 as $genre){
					?>
					<div class="col-lg-4 col-md-6">
						<a href="book-listings.php" class="grid_item">
							<figure>
								<img src="img/<?php echo $genre['img'];?>" alt="">
								<div class="info">
									<small><?php echo $genre['amount'];?></small>
									<h3><?php echo $genre['name'];?></h3>
								</div>
							</figure>
						</a>
					</div>
					<!-- /grid_item -->
					<?php
				};
				?>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->	
		</div>
		<!-- /bg_color_1 -->	

		<!-- /container -->	
		<div class="call_section pattern">
			<div class="wrapper">
				<div class="container margin_80_55">
				<?php 
				$array2=readJson('how-it-works');
				foreach($array2 as $works){
					?>
					<div class="main_title_2">
						<span><em></em></span>
						<h2><?php echo $works['title'];?></h2>
						<p><?php echo $works['desc'];?></p>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="box_how">
								<i class="pe-7s-search"></i>
								<h3><?php echo $works['step1'];?></h3>
								<p><?php echo $works['step1desc'];?></p>
								<span></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="box_how">
								<i class="pe-7s-info"></i>
								<h3><?php echo $works['step2'];?></h3>
								<p><?php echo $works['step2desc'];?></p>
								<span></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="box_how">
								<i class="pe-7s-like2"></i>
								<h3><?php echo $works['step3'];?></h3>
								<p><?php echo $works['step3desc'];?></p>
							</div>
						</div>
					</div>
					<!-- /row -->
					<p class="text-center add_top_30 wow bounceIn" data-wow-delay="0.5"><a href="register.php" class="btn_1 rounded"><?php echo "Register Now" ;?></a></p>
				</div>
				<?php
				};
				?>
			</div>
			<!-- /wrapper -->
		</div>
		<!-- /container -->
	</main>
	<!-- /main -->

	<footer class="plus_border">
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-6">
					<h3 data-bs-target="#collapse_ft_1"><?php echo "Quick Links" ;?></h3>
					<div class="collapse dont-collapse-sm" id="collapse_ft_1">
						<ul class="links">
							<li><a href="lib/auth/register.php"><?php echo "Create account" ;?></a></li>
							<li><a href="contacts.php"><?php echo "Contacts" ;?></a></li>
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
    <script src="js/common_scripts.js"></script>
	<script src="js/functions.js"></script>
	<script src="assets/validate.js"></script>

</body>
</html>