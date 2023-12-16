<?php
require_once('../../settings.php');

If(count($_POST)>0){
	$output='';
	$fp=fopen(APP_PATH.'/data/users.csv.php', 'r');
	$index=0;
	while(!feof($fp)){
		$line=fgets($fp);
		if($index==$_GET['index']){
			$output.=$_POST['email'].';'.$_POST['password'].PHP_EOL;
		}else{
			$output.=$line;
		}
		$index++;
	}
	fclose($fp);
	$fp=fopen(APP_PATH.'/data/users.csv.php', 'w');
	fputs($fp, $output);
	fclose($fp);
}
$fp=fopen(APP_PATH.'/data/users.csv.php', 'r');
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
  <link href="../vendor/dropzone.css" rel="stylesheet">
  <link href="../css/date_picker.css" rel="stylesheet">
  <!-- Your custom styles -->
  <link href="../css/custom.css" rel="stylesheet">
  <!-- WYSIWYG Editor -->
  <link rel="stylesheet" href="../js/editor/summernote-bs4.css">
	
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
  <?php
	$index=0;
	while(!feof($fp)){
		$line=trim(fgets($fp));
		if($_GET['index']==$index){
			if(strlen($line)>0){
				$line=explode(';',$line);
				?>
				<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?> ?index=<?= $_GET['index']?>">
				  <div class="content-wrapper">
					<div class="container-fluid">
					  <!-- Breadcrumbs-->
					  <ol class="breadcrumb">
						<li class="breadcrumb-item">
						  <a href="../index.php"><?php echo "Dashboard" ;?></a>
						</li>
						<li class="breadcrumb-item">
						  <a href="index.php"><?php echo "Users List" ;?></a>
						</li>
						<li class="breadcrumb-item">
						  <a href="detail-user.php?index=<?php echo $index ;?>"><?php echo "User";?></a>
						</li>
						<li class="breadcrumb-item active"><?php echo "Edit User" ;?></li>
					  </ol>
						<div class="box_general padding_bottom">
							<div class="header_box version_2">
								<h2><i class="fa fa-file"></i><?php echo "Basic info" ;?></h2>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Email</label>
										<input type="text" class="form-control" name="email" value="<?= $line[0]?>"/>
									</div>
								</div>
								
							</div>
							<!-- /row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Password</label>
										<input type="text" class="form-control" name="password" value="<?= $line[1]?>"/>
									</div>
								</div>
							</div>
							<!-- /row-->
						</div>
						<!-- /box_general-->
						<p><button type="submit" class="btn_1 medium">Save changes</button></p>
					  </div>
					  <!-- /.container-fluid-->
				   </div>
				</form> 
				<?php
			}
			break;
		}
		$index++;
	}
	fclose($fp);
	?>
    <!-- /.container-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small<?php echo "© 2023 Maria Wagner" ;?></small>
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
    <!-- Custom scripts for this page-->
    <script src="../vendor/dropzone.min.js"></script>
    <script src="../vendor/bootstrap-datepicker.js"></script>
    <script>
    $('input.date-pick').datepicker();
    </script>
    <!-- WYSIWYG Editor -->
    <script src="../js/editor/summernote-bs4.min.js"></script>
    <script>
    $('.editor').summernote({
        fontSizes: ['10', '14'],
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']]
        ],
        placeholder: 'Write here ....',
        tabsize: 2,
        height: 200
    });
    </script>
	
</body>
</html>
