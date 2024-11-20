<?php session_start();
error_reporting(0);
include("include/config.php");
if (isset($_POST['submit'])) {
    $puname = $_POST['username'];
    $ppwd = md5($_POST['password']);
    $ret = mysqli_query($con, "SELECT * FROM users WHERE email='$puname' and password='$ppwd'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        $_SESSION['login'] = $_POST['username'];
        $_SESSION['id'] = $num['id'];
        $pid = $num['id'];
        $host = $_SERVER['HTTP_HOST'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        $log = mysqli_query($con, "insert into userlog(uid,username,userip,status) values('$pid','$puname','$uip','$status')");
        header("location:dashboard.php");
    } else {
        $_SESSION['login'] = $_POST['username'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 0;
        mysqli_query($con, "insert into userlog(username,userip,status) values('$puname','$uip','$status')");

        echo "<script>alert('Tên người dùng hoặc mật khẩu không hợp lệ');</script>";
        echo "<script>window.location.href='user-login.php'</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>User-Login</title>

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

    /* Tùy chỉnh nút đăng nhập */
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

<body class="login">
    <div class="row">
        <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="logo margin-top-30">
                <a href="../index.php">
                    <h2> WECARE | Đăng nhập bệnh nhân</h2>
                </a>
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
                                style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
                        </p>
                        <div class="form-group">
                            <span class="input-icon">
                                <input type="email" class="form-control" name="username" placeholder="Email" required>
                                <i class="fa fa-user"></i> </span>
                        </div>
                        <div class="form-group form-actions">
                            <span class="input-icon">
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu"
                                    required>
                                <i class="fa fa-lock"></i>
                            </span><a href="forgot-password.php">
                                Quên mật khẩu?
                            </a>
                        </div>
                        <div class="form-actions">

                            <button type="submit" class="btn btn-primary pull-right" name="submit">
                                Đăng nhập <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                        <div class="new-account">
                            Bạn chưa có tài khoản?
                            <a href="registration.php">
                                Tạo tài khoản
                            </a>
                        </div>
                    </fieldset>
                </form>

                <div class="copyright">
                    </span><span class="text-bold text-uppercase"> Hệ thống quản lý bệnh viện</span>.
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
    <!-- <script src="vendor/jquery-validation/jquery.validate.min.js"></script> -->

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