<?php
require_once('../functions.php');
if(isset($_SESSION['email'])) die('You are already sign in, no need to sign in.');
$showForm=true;
if(count($_POST)>0){
	if(isset($_POST['email'][0]) && isset($_POST['password'][0])){
		$index=0;
		$fp=fopen(__DIR__.'../../../data/users.csv.php','r');
		while(!feof($fp)){
			$line=fgets($fp);
			if(strstr($line,'<?php die() ?>') || strlen($line)<5) continue;
			$index++;
			$line=explode(';',trim($line));
			if($line[0]==$_POST['email'] && password_verify($_POST['password'],$line[1])){
				$_SESSION['email']=$_POST['email'];
				$_SESSION['ID']=$index;
				echo 'Welcome to our website';$showForm=false;
				header('location:../../index.php');
			}
		}
		fclose($fp);
		if($showForm) echo 'Your credentials are wrong';
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

<body id="login_bg">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="login">
		<aside>
			  <form method="POST" autocomplete="off">
				<div class="form-group">
					<label><?php echo "Email" ;?></label>
					<input class="form-control" type="email" name="email" required>
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label><?php echo "Password" ;?></label>
					<input class="form-control" type="password" name="password" required>
					<i class="icon_lock_alt"></i>
				</div>
				<button type="submit" class="btn_1 rounded full-width add_top_30"><?php echo "Login In" ;?></button>
			</form>
			<div class="text-center add_top_10"><?php echo "New to Bookish Reviews & Lists?" ;?><strong><a href="register.php"><?php echo " Sign up!" ;?></a></strong></div>
			<div class="copy"><?php echo "© 2023 Maria Wagner" ;?></div>
		</aside>
	</div>
	<!-- /login -->
		
	<!-- COMMON SCRIPTS -->
    <script src="../../js/common_scripts.js"></script>
	<script src="../../js/functions.js"></script>
	<script src="../../assets/validate.js"></script>
  
</body>
</html>
<?php
} 