<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];

$sql=mysqli_query($con,"Update users set fullName='$fname',address='$address',city='$city',gender='$gender' where id='".$_SESSION['id']."'");
if($sql)
{
$msg="Hồ sơ của bạn đã được cập nhật thành công";


}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Chỉnh sửa hồ sơ</title>

  <link
    href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
    rel="stylesheet" type="text/css" />
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


</head>

<body>
  <div id="app">
    <?php include('include/sidebar.php');?>
    <div class="app-content">

      <?php include('include/header.php');?>
      <div class="main-content">
        <div class="wrap-content container" id="container">
          <section id="page-title">
            <div class="row">
              <div class="col-sm-8">
                <h1 class="mainTitle">Người dùng | Chỉnh sửa hồ sơ</h1>
              </div>
              <ol class="breadcrumb">
                <li>
                  <span>Người dùng </span>
                </li>
                <li class="active">
                  <span>Chỉnh sửa hồ sơ</span>
                </li>
              </ol>
            </div>
          </section>
          <div class="container-fluid container-fullw bg-white">
            <div class="row">
              <div class="col-md-12">
                <h5 style="color: green; font-size:18px; ">
                  <?php if($msg) { echo htmlentities($msg);}?> </h5>
                <div class="row margin-top-30">
                  <div class="col-lg-8 col-md-12">
                    <div class="panel panel-white">
                      <div class="panel-heading">
                        <h5 class="panel-title">Chỉnh sửa hồ sơ</h5>
                      </div>
                      <div class="panel-body">
                        <?php 
$sql=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($data=mysqli_fetch_array($sql))
{
?>
                        <h4> Hồ sơ của <?php echo htmlentities($data['fullName']);?></h4>
                        <p><b>Hồ sơ đăng ký ngày: </b><?php echo htmlentities($data['regDate']);?></p>
                        <?php if($data['updationDate']){?>
                        <p><b>Ngày cập nhật hồ sơ lần cuối: </b><?php echo htmlentities($data['updationDate']);?></p>
                        <?php } ?>
                        <hr />
                        <form role="form" name="edit" method="post">


                          <div class="form-group">
                            <label for="fname">
                              Tên người dùng
                            </label>
                            <input type="text" name="fname" class="form-control"
                              value="<?php echo htmlentities($data['fullName']);?>">
                          </div>


                          <div class="form-group">
                            <label for="address">
                              Địachỉchỉỉ
                            </label>
                            <textarea name="address"
                              class="form-control"><?php echo htmlentities($data['address']);?></textarea>
                          </div>
                          <div class="form-group">
                            <label for="city">
                              Thành phố
                            </label>
                            <input type="text" name="city" class="form-control" required="required"
                              value="<?php echo htmlentities($data['city']);?>">
                          </div>

                          <div class="form-group">
                            <label for="gender">
                              Giới tính
                            </label>

                            <select name="gender" class="form-control" required="required">
                              <option value="<?php echo htmlentities($data['gender']);?>">
                                <?php echo htmlentities($data['gender']);?></option>
                              <option value="Nam">Nam</option>
                              <option value="Nữ">Nữ</option>
                              <option value="Khác">Khác</option>
                            </select>

                          </div>

                          <div class="form-group">
                            <label for="fess">
                              Email
                            </label>
                            <input type="email" name="uemail" class="form-control" readonly="readonly"
                              value="<?php echo htmlentities($data['email']);?>">
                            <a href="change-emaild.php">Cập nhật id email của bạn</a>
                          </div>

                          <button type="submit" name="submit" class="btn btn-o btn-primary">
                            Update
                          </button>
                        </form>
                        <?php } ?>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <div class="panel panel-white">


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include('include/footer.php');?>
    <?php include('include/setting.php');?>
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