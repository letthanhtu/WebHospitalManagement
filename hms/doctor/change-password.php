<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$cpass=md5($_POST['cpass']);
$did=$_SESSION['id'];
$sql=mysqli_query($con,"SELECT password FROM  doctors where password='$cpass' && id='$did'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$npass=md5($_POST['npass']);
 $con=mysqli_query($con,"update doctors set password='$npass', updationDate='$currentTime' where id='$did'");
$_SESSION['msg1']="Đã thay đổi mật khẩu thành công!!";
}
else
{
$_SESSION['msg1']="Mật khẩu cũ không khớp!!";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor  | Change Password</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
<script type="text/javascript">
function valid()
{
	if (document.chngpwd.cpass.value == "") {
      alert("Mật khẩu hiện tại đang trống!!");
      document.chngpwd.cpass.focus();
      return false;
    } else if (document.chngpwd.npass.value == "") {
      alert("Mật khẩu mới đang trống!!");
      document.chngpwd.npass.focus();
      return false;
    } else if (document.chngpwd.cfpass.value == "") {
      alert("Xác nhận mật khẩu đang trống!!");
      document.chngpwd.cfpass.focus();
      return false;
    } else if (document.chngpwd.npass.value != document.chngpwd.cfpass.value) {
      alert("Mật khẩu mới và Xác nhận mật khẩu không khớp!!");
      document.chngpwd.cfpass.focus();
      return false;
    }
    return true;
}
</script>

	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Bác sĩ | Thay đổi mật khâu</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Bác sĩ</span>
									</li>
									<li class="active">
										<span>Thay đổi mật khẩu</span>
									</li>
								</ol>
							</div>
						</section>
						
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Đổi mật khẩu</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
								<?php echo htmlentities($_SESSION['msg1']="");?></p>	
													<form role="form" name="chngpwd" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="exampleInputEmail1">
																Mật khẩu hiện tại
															</label>
							<input type="password" name="cpass" class="form-control"  placeholder="Nhập mật khẩu hiện tại">
														</div>
														<div class="form-group">
															<label for="exampleInputPassword1">
																Mật khẩu mới
															</label>
					<input type="password" name="npass" class="form-control"  placeholder="Nhập mật khẩu mới">
														</div>
														
<div class="form-group">
															<label for="exampleInputPassword1">
																Xác nhận mật khẩu
															</label>
									<input type="password" name="cfpass" class="form-control"  placeholder="Xác nhận mật khẩu">
														</div>
														
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Gửi
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									
								</div>
							</div>
						
						
																		
						
					</div>
				</div>
			</div>
			
	<?php include('include/footer.php');?>
			
				
	<?php include('include/setting.php');?>
			<>
			
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>

		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		
		<script src="assets/js/main.js"></script>
		
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		
	</body>
</html>
<?php } ?>
