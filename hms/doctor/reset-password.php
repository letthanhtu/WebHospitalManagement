<?php
session_start();
//error_reporting(0);
include("include/config.php");
// Code for updating Password
if (isset($_POST['change'])) {
	$cno = $_SESSION['cnumber'];
	$email = $_SESSION['email'];
	$newpassword = md5($_POST['password']);
	$query = mysqli_query($con, "update doctors set password='$newpassword' where contactno='$cno' and docEmail='$email'");
	if ($query) {
		echo "<script>alert('Mật khẩu đã được cập nhật thành công.');</script>";
		echo "<script>window.location.href ='index.php'</script>";
	}
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Password Reset</title>

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

	<script type="text/javascript">
		function valid() {
			if (document.passwordreset.password.value != document.passwordreset.password_again.value) {
				alert("Trường Mật khẩu và Xác nhận mật khẩu không khớp!!");
				document.passwordreset.password_again.focus();
				return false;
			}
			return true;
		}
	</script>
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
				<a href="../index.php">
					<h2> WECARE | Khôi phục mật khẩu bệnh nhân</h2>
				</a>
			</div>

			<div class="box-login">
				<form class="form-login" name="passwordreset" method="post" onSubmit="return valid();">
					<fieldset>
						<legend>
							Khôi phục mật khẩu
						</legend>
						<p>
							Vui lòng cài đặt mật khẩu mới.<br />
							<span
								style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
						</p>

						<div class="form-group">
							<span class="input-icon">
								<input type="password" class="form-control" id="password" name="password"
									placeholder="Mật khẩu mới" required>
								<i class="fa fa-lock"></i> </span>
						</div>


						<div class="form-group">
							<span class="input-icon">
								<input type="password" class="form-control" id="password_again" name="password_again"
									placeholder="Xác nhận lại mật khẩu" required>
								<i class="fa fa-lock"></i> </span>
						</div>


						<div class="form-actions">

							<button type="submit" class="btn btn-primary pull-right" name="change">
								Thay đổi <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
						<div class="new-account">
							Bạn đã có tài khoản
							<a href="index.php">
								Đăng nhập
							</a>
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