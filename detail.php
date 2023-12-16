<?php
require_once('lib/json-read.php');
require_once('lib/functions.php');
if(!isset($_SESSION['email'])) {
	header('location:lib/auth/login.php');
};

$index=$_GET['index'];
$book=readJson('book-listing');
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
	
	<div id="page" class="theia-exception">
		
	<header class="header_in">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-12">
				</div>
				<div class="col-lg-9 col-12">
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
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->		
	</header>
	<!-- /header -->
	
	<main>			
		<nav class="secondary_nav sticky_horizontal_2">
			<div class="container">
				<ul class="clearfix">
					<li><a href="#description" class="active"><?php echo "Description";?></a></li>
					<li><a href="#reviews"><?php echo "Reviews";?></a></li>
					<li><a href="#sidebar"><?php echo "Booking";?></a></li>
				</ul>
			</div>
		</nav>

		<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
						<section id="description">
							<div class="detail_title_1">
								<h1><?= $book[$index]['name'] ;?></h1>
							</div>
							<p><?= $book[$index]['desc'] ;?></p>
							<h5 class="add_bottom_15"><?php echo "Tags";?></h5>
							<div class="row add_bottom_30">
								<div class="col-lg-6">
									<ul class="bullets">
									<?php 
									for($q=0;$q<count($book[$index]['tags']);$q++) {
										?>
										<li><?= $book[$index]['tags'][$q];?></li>
										<?php
									}
									?>
									</ul>
								</div>
							</div>
							<!-- /row -->
						</section>
						<!-- /section -->
					
						<section id="reviews">
							<h2><?php echo "Reviews";?></h2>
							<div class="reviews-container add_bottom_30">
								<div class="row">
									<div class="col-lg-3">
										<div id="review_summary">
											<strong><?= $book[$index]['rate'][2];?></strong>
											<em><?= $book[$index]['rate'][0];?></em>
										</div>
									</div>
									<div class="col-lg-9">
									
									<?php 
										for($y=0;$y<count($book[$index]['stars']);$y++) {
										?>
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: <?= $book[$index]['stars'][$y]['starpercent'];?>%" aria-valuenow="<?= $book[$index]['stars'][$y]['starpercent'];?>" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong><?= $book[$index]['stars'][$y]['starname'];?></strong></small></div>
										</div>
										<!-- /row -->
										<?php
									}
									?>
									</div>
								</div>
								<!-- /row -->
							</div>

							<div class="reviews-container">
								<?php 
									for($r=0;$r<count($book[$index]['reviews']);$r++) {
									?>
									<div class="review-box clearfix">
										<div class="rev-content">								
											<div class="rev-info">
												<?= $book[$index]['reviews'][$r]['name'] . " - " . $book[$index]['reviews'][$r]['date'];?>
											</div>
											<div class="rev-text">
												<p>
													<?= $book[$index]['reviews'][$r]['review'];?>
												</p>
											</div>
										</div>
									</div>
									<?php
									}
								?>
								<!-- /review-box -->
							</div>
							<!-- /review-container -->
						</section>
						<!-- /section -->
						<hr>

							<div class="add-review">
							<!-- add review form-->
							<!-- add review form-->
							</div>
					</div>
					<!-- /col -->
					
					<aside class="col-lg-4" id="sidebar">
						<div class="box_detail booking">
							<div class="price">
								<span><small><?php echo "Review";?></small></span>
								<div class="score"><span><?= $book[$index]['rate'][0];?></span><strong><?= $book[$index]['rate'][2];?></strong></div>
							</div>
							<a href="" class="btn_1 full-width outline wishlist"><i class="icon_heart"></i><?php echo " Add to wishlist";?></a>
						</div>
						<ul class="share-buttons">
							<li><a class="fb-share" href="#0"><i class="social_facebook"></i><?php echo "Share";?></a></li>
							<li><a class="twitter-share" href="#0"><i class="social_twitter"></i><?php echo "Share";?></a></li>
							<li><a class="gplus-share" href="#0"><i class="social_googleplus"></i><?php echo "Share";?></a></li>
						</ul>
					</aside>
				</div>
				<!-- /row -->
		</div>
		<!-- /container -->
		
	</main>
	<!--/main-->
	
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
	
	<!-- INPUT QUANTITY  -->
	<script src="js/input_qty.js"></script>
</body>
</html>