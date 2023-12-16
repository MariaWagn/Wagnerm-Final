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
									<li><a href="contacts.php"><?php echo "Contact";?></a></li>
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
		<div id="results">
		   <div class="container">
			   <div class="row">
					<div class="col-lg-3 col-md-4 col-10">
						<?php 
						$array1=readJson('book-listing');
						$x=0;
						foreach($array1 as $count){
							$x+=1;
						};
						?>
					   <h4><strong><?php echo $x;?></strong> <?php echo "result for All listing";?></h4>
				   </div>
				   <div class="col-lg-9 col-md-8 col-2">
					   <a href="#0" class="search_mob btn_search_mobile"></a> <!-- /open search panel -->
						<div class="row g-0 custom-search-input-2 inner">
							<div class="col-lg-8">
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
							<div class="col-lg-1">
								<input type="submit">
							</div>
						</div>
				   </div>
			   </div>
			   <!-- /row -->
				<div class="search_mob_wp">
					<div class="custom-search-input-2">
						<div class="form-group">
							<input class="form-control" type="text" placeholder="What are you looking for...">
							<i class="icon_search"></i>
						</div>
						<select class="wide">
							<option><?php echo "All Categories";?></option>	
							<option><?php echo "Genre";?></option>
							<option><?php echo "Author";?></option>
						</select>
						<input type="submit">
					</div>
				</div>
				<!-- /search_mobile -->
		   </div>
		   <!-- /container -->
	   </div>
	   <!-- /results -->
		
		<div class="filters_listing sticky_horizontal">
			<div class="container">
				<ul class="clearfix">
					<li>
						<div class="switch-field">
							<input type="radio" id="all" name="listing_filter" value="all" checked>
							<label for="all"><?php echo "All";?></label>
							<input type="radio" id="popular" name="listing_filter" value="popular">
							<label for="popular"><?php echo "Popular";?></label>
							<input type="radio" id="latest" name="listing_filter" value="latest">
							<label for="latest"><?php echo "Latest";?></label>
						</div>
					</li>
					<li><a class="btn_filt" data-bs-toggle="collapse" href="#filters" aria-expanded="false" aria-controls="filters" data-text-swap="Less filters" data-text-original="More filters"><?php echo "More filters";?></a></li>	
				</ul>
			</div>
			<!-- /container -->
		</div>
		<!-- /filters -->
		
		
		<div class="collapse" id="filters">
			<div class="container margin_30_5">
				<div class="row">
					<div class="col-md-4">
						<h6><?php echo "Rating";?></h6>
						<ul>
							<li>
								<label class="container_check"><?php echo "Superb 9+ ";?><small><?php echo "1";?></small>
								  <input type="checkbox">
								  <span class="checkmark"></span>
								</label>
							</li>
							<li>
								<label class="container_check"><?php echo "Very Good 8+ ";?><small><?php echo "2";?></small>
								  <input type="checkbox">
								  <span class="checkmark"></span>
								</label>
							</li>
							<li>
								<label class="container_check"><?php echo "Good 7+ ";?><small><?php echo "3";?></small>
								  <input type="checkbox">
								  <span class="checkmark"></span>
								</label>
							</li>
							<li>
								<label class="container_check"><?php echo "Pleasant 6+ ";?><small><?php echo "3";?></small>
								  <input type="checkbox">
								  <span class="checkmark"></span>
								</label>
							</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- /Filters -->

		<div class="container margin_60_35">
			<div class="category_filter">
				<label class="container_radio"><?php echo "All";?>
					<input type="radio" id="all_2" name="categories_filter" value="all" checked data-filter="*" class="selected">
					<span class="checkmark"></span>
				</label>
				<label class="container_radio"><?php echo "Fantasy";?>
					<input type="radio" id="fantasy" name="categories_filter" value="fantasy" data-filter=".fantasy">
					<span class="checkmark"></span>
				</label>
				<label class="container_radio"><?php echo "Thriller & Suspense";?>
					<input type="radio" id="thriller" name="categories_filter" value="thriller" data-filter=".thriller">
					<span class="checkmark"></span>
				</label>
				<label class="container_radio"><?php echo "Mystery";?>
					<input type="radio" id="mystery" name="categories_filter" value="mystery" data-filter=".mystery">
					<span class="checkmark"></span>
				</label>
				<label class="container_radio"><?php echo "Romance";?>
					<input type="radio" id="romance" name="categories_filter" value="romance" data-filter=".romance">
					<span class="checkmark"></span>
				</label>
				<label class="container_radio"><?php echo "LGBTQ+";?>
					<input type="radio" id="lgbtq" name="categories_filter" value="lgbtq" data-filter=".lgbtq">
					<span class="checkmark"></span>
				</label>
				<label class="container_radio"><?php echo "Young Adult";?>
					<input type="radio" id="youngadult" name="categories_filter" value="youngadult" data-filter=".youngadult">
					<span class="checkmark"></span>
				</label>
			</div>
			<div class="isotope-wrapper">
			<div class="row">
				<?php 
				$array2=readJson('book-listing');
				$index=0;
				foreach($array2 as $book){
					?>
					<div class="col-xl-4 col-lg-6 col-md-6 isotope-item <?php echo $book['genre'];?>">
						<div class="strip grid">
							<figure>
								<a href="#0" class="wish_bt"></a>
								<a href="detail.php?index=<?= $index ?>"><img src="img/<?php echo $book['img'];?>" class="img-fluid" alt=""><div class="read_more"><span><?php echo "Read more" ;?></span></div></a>
								<small><?php echo $book['genre'];?></small>
							</figure>
							<div class="wrapper">
								<h3><a href="detail.php?index=<?= $index ?>"><?php echo $book['name'];?></a></h3>
								<p><?php echo $book['author'];?></p>
							</div>
							<ul>
								<li><span></span></li>
								<li><div class="score"><span><?php echo $book['rate'][0];?><em><?php echo $book['rate'][1];?></em></span><strong><?php echo $book['rate'][2];?></strong></div></li>
							</ul>
						</div>
					</div>
					<?php
					$index++;
				};
				?>				
			</div>
			<!-- /row -->
			</div>
			<!-- /isotope-wrapper -->
			
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
	
	<!-- Isotope Filtering -->
	<script src="js/isotope.min.js"></script>
	<script>
	$(window).on('load', function(){
	  var $container = $('.isotope-wrapper');
	  $container.isotope({ itemSelector: '.isotope-item', layoutMode: 'masonry' });
	});

	$('.category_filter').on( 'click', 'input', 'change', function(){
	  var selector = $(this).attr('data-filter');
	  $('.isotope-wrapper').isotope({ filter: selector });
	});
	</script>
  
</body>
</html>