<?php
session_start();
include("include/config.php");
error_reporting(0);
if (isset($_POST['submit'])) {
	$uname = $_POST['username'];
	$dpassword = md5($_POST['password']);
	$ret = mysqli_query($con, "SELECT * FROM doctors WHERE docEmail='$uname' and password='$dpassword'");
	$num = mysqli_fetch_array($ret);
	if ($num > 0) {
		$_SESSION['dlogin'] = $_POST['username'];
		$_SESSION['id'] = $num['id'];
		$uid = $num['id'];
		$uip = $_SERVER['REMOTE_ADDR'];
		$status = 1;

		$log = mysqli_query($con, "insert into doctorslog(uid,username,userip,status) values('$uid','$uname','$uip','$status')");

		header("location:dashboard.php");
	} else {

		$uip = $_SERVER['REMOTE_ADDR'];
		$status = 0;
		mysqli_query($con, "insert into doctorslog(username,userip,status) values('$uname','$uip','$status')");
		echo "<script>alert('Tên người dùng hoặc mật khẩu không hợp lệ');</script>";
		echo "<script>window.location.href='index.php'</script>";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Doctor Login</title>

	<link
		href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
		rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	<style>
		/* Định dạng tổng thể cho form */
		.form-login fieldset {
			border: 2px solid #007bff;
			border-radius: 10px;
			background-color: #e6f7ff;
			padding: 20px;
		}

		/* Tiêu đề bên trong form */
		.form-login legend {
			color: #007bff;
			font-size: 20px;
			font-weight: bold;
			padding: 0 10px;
		}

		/* Định dạng cho khung nhập liệu */
		.form-login .form-control {
			border: 2px solid #007bff;
			background-color: #e6f7ff;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			padding: 10px 15px;
			font-size: 16px;
			transition: all 0.3s ease-in-out;
		}

		/* Hiệu ứng khi focus vào ô nhập */
		.form-login .form-control:focus {
			border-color: #0056b3;
			box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
			outline: none;
		}

		/* Định dạng nút Submit */
		.form-login .btn-primary {
			background-color: #007bff;
			border: none;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
			font-size: 16px;
			padding: 10px 20px;
			transition: all 0.3s ease-in-out;
		}

		/* Hiệu ứng khi rê chuột vào nút */
		.form-login .btn-primary:hover {
			background-color: #0056b3;
			box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
		}

		/* Định dạng cho khung chứa form */
		.box-login {
			border: 2px solid #007bff;
			border-radius: 10px;
			box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
			padding: 30px;
			background-color: #ffffff;
		}

		/* Liên kết trong phần "new-account" */
		.new-account a {
			color: #007bff;
			font-weight: bold;
			text-decoration: none;
		}

		.new-account a:hover {
			text-decoration: underline;
		}

		/* Logo và tiêu đề */
		.logo h2 {
			color: #007bff;
			font-weight: bold;
			text-align: center;
		}
	</style>

</head>


<body class="login">
	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
				<a href="../../index.php">
					<h2> WECARE|Trang đăng nhập bác sĩ</h2>
				</a>
			</div>

			<div class="box-login">
				<form class="form-login" method="post">
					<fieldset>
						<legend>
							Đăng nhập vào tài khoản của bạn
						</legend>
						<p>
							Vui lòng nhập email và mật khẩu<br />
							<span
								style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
						</p>
						<div class="form-group">
							<span class="input-icon">
								<input type="text" class="form-control" name="username" placeholder="Email" required>
								<i class="fa fa-user"></i> </span>
						</div>
						<div class="form-group form-actions">
							<span class="input-icon">
								<input type="password" class="form-control password" name="password"
									placeholder="Mật khẩu" required>
								<i class="fa fa-lock"></i>
							</span>
							<a href="forgot-password.php">
								Quên mật khẩu ?
							</a>
						</div>
						<div class="form-actions">

							<button type="submit" class="btn btn-primary pull-right" name="submit">
								Đăng nhập <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>


					</fieldset>
				</form>

				<div class="copyright">
					<span class="text-bold text-uppercase"> Hệ thống quản lý bệnh viện</span>
				</div>

			</div>

		</div>
	</div>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<script src="vendor/jquery-validation/jquery.validate.min.js"></script>

	<script src="assets/js/main.js"></script>

	<script src="assets/js/login.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			Login.init();
		});
	</script>

</body>

</html>