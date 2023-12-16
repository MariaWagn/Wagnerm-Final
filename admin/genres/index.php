<?php
require_once('../../settings.php');
$content=file_get_contents(APP_PATH.'/data/genre.json');
$content=json_decode($content, true);

$index=0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ansonika">
  <title><?php echo "Bookish Reviews & Lists";?></title>
	
  <!-- Favicons-->
  <link rel="shortcut icon" href="../../img/favicon.ico" type="../image/x-icon">
  <link rel="apple-touch-icon" type="../image/x-icon" href="../img/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon" type="../image/x-icon" sizes="72x72" href="../img/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon" type="../image/x-icon" sizes="114x114" href="../img/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon" type="../image/x-icon" sizes="144x144" href="../img/apple-touch-icon-144x144-precomposed.png">
	
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Main styles -->
  <link href="../css/admin.css" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Plugin styles -->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Your custom styles -->
  <link href="../css/custom.css" rel="stylesheet">
	
</head>

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="../index.php"><?php echo "HOME"; ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../index.php">
            <span class="nav-link-text"><?php echo "Dashboard"; ?></span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none"><?php echo "Messages"; ?>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header"><?php echo "New Messages:" ;?></h6>
            <div class="dropdown-divider"></div>
          </div>
        </li> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none"><?php echo "Alerts" ;?>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header"><?php echo "New Alerts:" ;?></h6>
            <div class="dropdown-divider"></div>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control search-top" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i><?php echo "Logout" ;?></a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /Navigation-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../index.php"><?php echo "Dashboard" ;?></a>
        </li>
        <li class="breadcrumb-item active"><?php echo "Genres List" ;?></li>
      </ol>
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block"><?php echo "Genres List" ;?></h2>
			</div>
			<div class="list_general">
				<ul>
				<?php
				foreach($content as $item){
					?>
						<li>
							<h4><?= $item['name']?></h4>
							<ul class="booking_list">
								<li><strong><?php echo "Book Count" ;?></strong><?= $item['amount'] ?></li>
								<li><strong><?php echo "Image" ;?></strong><?= $item['img']?></li>
							</ul>
							<ul class="buttons">
								<li><a href="detail-genre.php?index=<?=$index ?>" class="btn_1 gray approve"><?php echo "Details";?></a></li>
							</ul>
						</li>
					<?php
					$index++;
				}
				?>
				</ul>
			</div>
		</div>
		<!-- /box_general-->
	  </div>
	  <!-- /container-fluid-->
   	</div>
    <!-- /container-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small><?php echo "© 2023 Maria Wagner" ;?></small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo "Ready to Leave?"; ?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><?php echo"×"; ?></span>
            </button>
          </div>
          <div class="modal-body"><?php echo "Select \"Logout\" below if you are ready to end your current session."; ?></div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo "Cancel"; ?></button>
            <a class="btn btn-primary" href="../../lib/auth/signout.php"><?php echo"Logout";?></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
	  <script src="../vendor/jquery.selectbox-0.2.js"></script>
	  <script src="../vendor/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/admin.js"></script>
	
</body>
</html>