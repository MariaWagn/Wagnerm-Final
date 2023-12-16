<?php
require_once('../functions.php');
if(isset($_SESSION['email'])) die('You are already sign in, please sign out if you want to create a new account.');
$showForm=true;
if(count($_POST)>0){
	if(isset($_POST['email'][0]) && isset($_POST['password'][0])){
		$fp=fopen(__DIR__.'../../../data/users.csv.php','a+');
		fputs($fp,$_POST['email'].';'.password_hash($_POST['password'],PASSWORD_DEFAULT).PHP_EOL);
		fclose($fp);
		header('location:login.php');
	}else echo 'Email and password are missing';
}
if($showForm){
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
    <link rel="shortcut icon" href="../../img/favicon.ico" type="../../image/x-icon">
    <link rel="apple-touch-icon" type="../../image/x-icon" href="../../img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="../../image/x-icon" sizes="72x72" href="../../img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="../../image/x-icon" sizes="114x114" href="../../img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="../../image/x-icon" sizes="144x144" href="../../img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
	<link href="../../css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="../../css/custom.css" rel="stylesheet">
	
</head>

<body id="register_bg">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="login">
		<aside>
			<form method="POST">
				<div class="form-group">
					<label><?php echo "Your Email" ;?></label>
					<input class="form-control" type="email" name="email" required>
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label><?php echo "Your password" ;?></label>
					<input class="form-control" type="password" name="password" required>
					<i class="icon_lock_alt"></i>
				</div>		
				<button type="submit" class="btn_1 rounded full-width add_top_30"><?php echo "Register Now!" ;?></button>
			</form>
			<div class="text-center add_top_10"><?php echo "Already have an acccount? " ;?><strong><a href="login.php"><?php echo "Sign In" ;?></a></strong></div>
			<div class="copy"><?php echo "© 2023 Maria Wagner" ;?></div>
		</aside>
	</div>
	<!-- /login -->
	
	<!-- COMMON SCRIPTS -->
    <script src="../../js/common_scripts.js"></script>
	<script src="../../js/functions.js"></script>
	<script src="../../assets/validate.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="../../js/pw_strenght.js"></script>
	
	
  
</body>
</html>
<?php
} 