<?php
session_start();
error_reporting(0);
include("include/config.php");
if (isset($_POST['submit'])) {
  $uname = $_POST['username'];
  $upassword = $_POST['password'];

  $ret = mysqli_query($con, "SELECT * FROM admin WHERE username='$uname' and password='$upassword'");
  $num = mysqli_fetch_array($ret);
  if ($num > 0) {
    $_SESSION['login'] = $_POST['username'];
    $_SESSION['id'] = $num['id'];
    header("location:dashboard.php");
  } else {
    $_SESSION['errmsg'] = "Invalid username or password";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Đăng nhập quản trị viên</title>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta content="" name="description" />
  <meta content="" name="author" />
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
</head>
<style>
  /* Khung tổng thể của form */
  .form-login fieldset {
    border: 2px solid #007bff;
    border-radius: 10px;
    background-color: #e6f7ff;
    padding: 20px;
  }

  /* Tiêu đề */
  .form-login legend {
    color: #007bff;
    font-size: 20px;
    font-weight: bold;
    padding: 0 10px;
  }

  /* Ô nhập liệu */
  .form-login .form-control {
    border: 2px solid #007bff;
    background-color: #e6f7ff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 10px 15px;
    font-size: 16px;
    transition: all 0.3s ease-in-out;
  }

  .form-login .form-control:focus {
    border-color: #0056b3;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    outline: none;
  }

  /* Nút đăng nhập */
  .form-login .btn-primary {
    background-color: #007bff;
    border: none;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    font-size: 16px;
    padding: 10px 20px;
    transition: all 0.3s ease-in-out;
  }

  .form-login .btn-primary:hover {
    background-color: #0056b3;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
  }

  /* Liên kết trở về trang chủ */
  .form-actions a {
    color: #007bff;
    font-weight: bold;
    text-decoration: none;
  }

  .form-actions a:hover {
    text-decoration: underline;
  }

  /* Logo và tiêu đề */
  .logo h2 {
    color: #007bff;
    font-weight: bold;
    text-align: center;
  }

  /* Thông báo lỗi */
  span[style="color:red;"] {
    font-weight: bold;
    color: #ff4d4d !important;
  }
</style>


<body class="login">
  <div class="row">
    <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <div class="logo margin-top-30">
        <h2>Đăng nhập quản trị viên</h2>
      </div>

      <div class="box-login">
        <form class="form-login" method="post">
          <fieldset>
            <legend>

              Đăng nhập vào tài khoản của bạn
            </legend>
            <p>
              Vui lòng nhập tên và mật khẩu của bạn để đăng nhập.<br />
              <span
                style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg'] = ""); ?></span>
            </p>
            <div class="form-group">
              <span class="input-icon">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <i class="fa fa-user"></i> </span>
            </div>
            <div class="form-group form-actions">
              <span class="input-icon">
                <input type="password" class="form-control password" name="password"
                  placeholder="Password"><i class="fa fa-lock"></i>
              </span>
            </div>
            <div class="form-actions">

              <button type="submit" class="btn btn-primary pull-right" name="submit">
                Đăng nhập<i class="fa fa-arrow-circle-right"></i>
              </button>
            </div>
            <a href="../../index.php">Trở về
              Trang chủ</a>

          </fieldset>
        </form>

        <div class="copyright">
          <span class="text-bold text-uppercase">Hệ thống quản lý bệnh viện</span>
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