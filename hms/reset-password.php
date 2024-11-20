<?php
session_start();
//error_reporting(0);
include("include/config.php");
// Code for updating Password
if (isset($_POST['change'])) {
  $name = $_SESSION['name'];
  $email = $_SESSION['email'];
  $newpassword = md5($_POST['password']);
  $query = mysqli_query($con, "update users set password='$newpassword' where fullName='$name' and email='$email'");
  if ($query) {
    echo "<script>alert('Mật khẩu đã được cập nhật thành công.');</script>";
    echo "<script>window.location.href ='user-login.php'</script>";
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
        alert(" Mật khẩu mới và Xác nhận mật khẩu không khớp!!");
        document.passwordreset.password_again.focus();
        return false;
      }
      return true;
    }
  </script>
  <style>
    /* Định dạng cho khung nhập liệu */
    .form-login .form-control {
      border: 2px solid #007bff;
      /* Viền màu xanh đậm */
      background-color: #f8f9fa;
      /* Nền sáng */
      border-radius: 8px;
      /* Bo góc nhẹ */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
      /* Bóng mềm */
      padding: 10px 15px;
      /* Tăng khoảng cách bên trong */
      font-size: 16px;
      /* Tăng kích thước chữ */
      transition: all 0.3s ease-in-out;
      /* Hiệu ứng */
    }

    /* Hiệu ứng khi focus vào ô nhập */
    .form-login .form-control:focus {
      border-color: #0056b3;
      /* Viền xanh đậm hơn */
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
      /* Bóng mạnh hơn */
      outline: none;
      /* Bỏ viền outline mặc định */
    }

    /* Tùy chỉnh nút Change */
    .form-login .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 8px;
      /* Bo góc nhẹ */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
      /* Bóng mềm */
      font-size: 16px;
      /* Tăng kích thước chữ */
      padding: 10px 20px;
      /* Tăng khoảng cách */
      transition: all 0.3s ease-in-out;
      /* Hiệu ứng chuyển động */
    }

    /* Hiệu ứng khi rê chuột vào nút */
    .form-login .btn-primary:hover {
      background-color: #0056b3;
      /* Màu đậm hơn */
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
      /* Bóng mạnh hơn */
    }

    /* Định dạng cho khung đăng nhập */
    .box-login {
      border: 2px solid #007bff;
      /* Viền xanh đậm */
      border-radius: 10px;
      /* Bo góc */
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      /* Bóng mềm */
      padding: 30px;
      /* Tăng khoảng cách bên trong */
      background-color: #ffffff;
      /* Nền trắng */
    }

    /* Định dạng tiêu đề logo */
    .logo h2 {
      font-weight: bold;
      font-size: 28px;
      /* Tăng kích thước chữ */
      color: #007bff;
      /* Màu xanh đồng bộ */
      text-align: center;
      /* Căn giữa */
      margin-bottom: 20px;
      /* Thêm khoảng cách dưới */
    }
  </style>
</head>

<body class="login">
  <div class="row">
    <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <div class="logo margin-top-30">
        <a href="../index.php">
          <h2> WECARE | Đặt lại mật khẩu</h2>
        </a>
      </div>

      <div class="box-login">
        <form class="form-login" name="passwordreset" method="post" onSubmit="return valid();">
          <fieldset>
            <legend>
              Đặt lại mật khẩu bệnh nhân
            </legend>
            <p>
              Vui lòng đặt mật khẩu mới của bạn.<br />
              <span
                style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
            </p>

            <div class="form-group">
              <span class="input-icon">
                <input type="password" class="form-control" id="password" name="password"
                  placeholder="Password" required>
                <i class="fa fa-lock"></i> </span>
            </div>


            <div class="form-group">
              <span class="input-icon">
                <input type="password" class="form-control" id="password_again" name="password_again"
                  placeholder="Password Again" required>
                <i class="fa fa-lock"></i> </span>
            </div>


            <div class="form-actions">

              <button type="submit" class="btn btn-primary pull-right" name="change">
                Change <i class="fa fa-arrow-circle-right"></i>
              </button>
            </div>
            <div class="new-account">

              Đã có tài khoản?
              <a href="user-login.php">
                Đăng nhập
              </a>
            </div>
          </fieldset>
        </form>

        <div class="copyright">
          &copy; <span class="text-bold text-uppercase">
            Hệ thống quản lý bệnh viện</span>
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