<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

if(isset($_POST['submit']))
{	$docspecialization=$_POST['Doctorspecialization'];
$docname=$_POST['docname'];
$docaddress=$_POST['clinicaddress'];
$docfees=$_POST['docfees'];
$doccontactno=$_POST['doccontact'];
$docemail=$_POST['docemail'];
$password=md5($_POST['npass']);
$sql=mysqli_query($con,"insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,password) values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$password')");
if($sql)
{
echo "<script>alert('Đã thêm thông tin bác sĩ thành công');</script>";
echo "<script>window.location.href ='manage-doctors.php'</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Quản trị viên | Thêm bác sĩ</title>

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
  <script type="text/javascript">
  function valid() {
    if (document.adddoc.npass.value != document.adddoc.cfpass.value) {
      alert("Trường Mật khẩu và Xác nhận mật khẩu không khớp!!");
      document.adddoc.cfpass.focus();
      return false;
    }
    return true;
  }
  </script>


  <script>
  function checkemailAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "check_availability.php",
      data: 'emailid=' + $("#docemail").val(),
      type: "POST",
      success: function(data) {
        $("#email-availability-status").html(data);
        $("#loaderIcon").hide();
      },
      error: function() {}
    });
  }
  </script>
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
                <h1 class="mainTitle">Quản trị viên | Thêm bác sĩ</h1>
              </div>
              <ol class="breadcrumb">
                <li>
                  <span>Quản trị viên</span>
                </li>
                <li class="active">
                  <span>Thêm bác sĩ</span>
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
                        <h5 class="panel-title">Thêm bác sĩ
                        </h5>
                      </div>
                      <div class="panel-body">

                        <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                          <div class="form-group">
                            <label for="DoctorSpecialization">
                              Chuyên gia bác sĩ
                            </label>
                            <select name="Doctorspecialization" class="form-control" required="true">
                              <option value="">Chọn chuyên khoa</option>
                              <?php $ret=mysqli_query($con,"select * from doctorspecilization");
while($row=mysqli_fetch_array($ret))
{
?>
                              <option value="<?php echo htmlentities($row['specilization']);?>">
                                <?php echo htmlentities($row['specilization']);?>
                              </option>
                              <?php } ?>

                            </select>
                          </div>

                          <div class="form-group">
                            <label for="doctorname">
                              Tên bác sĩ
                            </label>
                            <input type="text" name="docname" class="form-control" placeholder="Nhập tên bác sĩ"
                              required="true">
                          </div>


                          <div class="form-group">
                            <label for="address">
                              Địa chỉ phòng khám bác sĩ
                            </label>
                            <textarea name="clinicaddress" class="form-control"
                              placeholder="Nhập Địa Chỉ Phòng Khám Bác Sĩ" required="true"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="fess">
                              Phí tư vấn bác sĩ
                            </label>
                            <input type="text" name="docfees" class="form-control"
                              placeholder="Nhập Phí Tư Vấn Bác Sĩ" required="true">
                          </div>

                          <div class="form-group">
                            <label for="fess">
                              Số liên hệ bác sĩ
                            </label>
                            <input type="text" name="doccontact" class="form-control"
                              placeholder="Nhập số liên hệ của Bác sĩ" required="true">
                          </div>

                          <div class="form-group">
                            <label for="fess">
                              Email bác sĩ
                            </label>
                            <input type="email" id="docemail" name="docemail" class="form-control"
                              placeholder="Nhập Email Bác sĩ" required="true" onBlur="checkemailAvailability()">
                            <span id="email-availability-status"></span>
                          </div>




                          <div class="form-group">
                            <label for="exampleInputPassword1">
                              Mật khẩu
                            </label>
                            <input type="password" name="npass" class="form-control" placeholder="Nhập Mật khẩu mới"
                              required="required">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputPassword2">
                              Xác nhận mật khẩu
                            </label>
                            <input type="password" name="cfpass" class="form-control" placeholder="Xác nhận lại mật khẩu"
                              required="required">
                          </div>



                          <button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
                            Thêm
                          </button>
                        </form>
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
<?php } ?>