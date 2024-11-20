<?php
include_once('include/config.php');
if (isset($_POST['submit'])) {
  $fname = $_POST['full_name'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $query = mysqli_query($con, "insert into users(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");
  if ($query) {
    echo "<script>alert('Đã đăng ký thành công. Bạn có thể đăng nhập ngay bây giờ');</script>";
    header('location:user-login.php');
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Đăng ký bệnh nhân</title>

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
      if (document.registration.password.value != document.registration.password_again.value) {
        alert("Mật khẩu mới và Xác nhận mật khẩu không khớp!!");
        document.registration.password_again.focus();
        return false;
      }
      return true;
    }
  </script>
  <style>
    /* Đậm viền khung và thêm bóng */
    form#registration input.form-control {
      border: 2px solid #007bff;
      /* Viền đậm màu xanh */
      border-radius: 5px;
      /* Bo góc */
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      /* Thêm bóng nhẹ */
      padding: 10px;
      /* Tăng khoảng cách bên trong */
    }

    /* Hiệu ứng khi focus vào input */
    form#registration input.form-control:focus {
      border-color: #0056b3;
      /* Đổi màu viền khi focus */
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.4);
      /* Bóng mạnh hơn khi focus */
      outline: none;
      /* Bỏ viền outline mặc định */
    }

    /* Tùy chỉnh toàn bộ fieldset */
    form#registration fieldset {
      border: 2px solid #007bff;
      /* Viền đậm màu xanh */
      border-radius: 10px;
      /* Bo góc */
      padding: 20px;
      /* Khoảng cách bên trong fieldset */
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
      /* Thêm bóng */
    }
  </style>


</head>

<body class="login">
  <div class="row">
    <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <div class="logo margin-top-30">
        <a href="../index.php">
          <h2 style="color: #007bff;font-weight:bold;">WECARE | Đăng ký bệnh nhân</h2>
        </a>
      </div>
      <!-- start: REGISTER BOX -->
      <div class="box-register">
        <form name="registration" id="registration" method="post" onSubmit="return valid();">
          <fieldset>
            <legend>
              Đăng ký
            </legend>
            <p>
              Nhập thông tin cá nhân của bạn dưới đây:
            </p>
            <div class="form-group">
              <input type="text" class="form-control" name="full_name" placeholder="Họ và tên" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="address" placeholder="Địa chỉ" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="city" placeholder="Thành phố" required>
            </div>
            <div class="form-group">
              <label class="block">
                Giới tính
              </label>
              <div class="clip-radio radio-primary">
                <input type="radio" id="rg-female" name="gender" value="Nữ">
                <label for="rg-female">
                  Nữ
                </label>
                <input type="radio" id="rg-male" name="gender" value="Nam">
                <label for="rg-male">
                  Nam
                </label>
              </div>
            </div>
            <p>
              Nhập chi tiết tài khoản của bạn dưới đây:
            </p>
            <div class="form-group">
              <span class="input-icon">
                <input type="email" class="form-control" name="email" id="email"
                  onBlur="userAvailability()" placeholder="Email" required>
                <i class="fa fa-envelope"></i> </span>
              <span id="user-availability-status1" style="font-size:12px;"></span>
            </div>
            <div class="form-group">
              <span class="input-icon">
                <input type="password" class="form-control" id="password" name="password"
                  placeholder="Mật khẩu" required>
                <i class="fa fa-lock"></i> </span>
            </div>
            <div class="form-group">
              <span class="input-icon">
                <input type="password" class="form-control" id="password_again" name="password_again"
                  placeholder="Xác nhận lại mật khẩu" required>
                <i class="fa fa-lock"></i> </span>
            </div>
            <div class="form-group">
              <div class="checkbox clip-check check-primary">
                <input type="checkbox" id="agree" value="agree" checked="true" readonly=" true">
                <label for="agree">
                  Tôi đồng ý
                </label>
              </div>
            </div>
            <div class="form-actions">
              <p>

                Đã có tài khoản?
                <a href="user-login.php">
                  Đăng nhập
                </a>
              </p>
              <button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
                Đăng ký <i class="fa fa-arrow-circle-right"></i>
              </button>
            </div>
          </fieldset>
        </form>

        <div class="copyright">
          &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> WECARE</span>.
          <span>All rights
            reserved</span>
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

  <script>
    function userAvailability() {
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "check_availability.php",
        data: 'email=' + $("#email").val(),
        type: "POST",
        success: function(data) {
          $("#user-availability-status1").html(data);
          $("#loaderIcon").hide();
        },
        error: function() {}
      });
    }
  </script>

</body>

</html>