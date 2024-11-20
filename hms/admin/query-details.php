<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{
if(isset($_POST['update']))
		  {
$qid=intval($_GET['id']);
$adminremark=$_POST['adminremark'];
$isread=1;
$query=mysqli_query($con,"update tblcontactus set  AdminRemark='$adminremark',IsRead='$isread' where id='$qid'");
if($query){
echo "<script>alert('Ghi chú của quản trị viên đã được cập nhật thành công.');</script>";
echo "<script>window.location.href ='read-query.php'</script>";
}
		  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Quản trị viên | Chi tiết yêu cầu</title>

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
                <h1 class="mainTitle">Quản trị viên | Chi tiết yêu cầu</h1>
              </div>

              <ol class="breadcrumb">
                <li>
                  <span>Quản trị viên</span>
                </li>
                <li class="active">
                  <span>Chi tiết yêu cầu</span>
                </li>
              </ol>
            </div>
          </section>

          <div class="container-fluid container-fullw bg-white">


            <div class="row">
              <div class="col-md-12">
                <h5 class="over-title margin-bottom-15">Quản lý<span class="text-bold"> Chi tiết yêu cầu</span></h5>
                <hr />
                <table class="table table-hover" id="sample-table-1">

                  <tbody>
                    <?php
$qid=intval($_GET['id']);
$sql=mysqli_query($con,"select * from tblcontactus where id='$qid'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

                    <tr>
                      <th>Họ và tên</th>
                      <td><?php echo $row['fullname'];?></td>
                    </tr>

                    <tr>
                      <th>Email </th>
                      <td><?php echo $row['email'];?></td>
                    </tr>
                    <tr>
                      <th>Số điện thoại</th>
                      <td><?php echo $row['contactno'];?></td>
                    </tr>
                    <tr>
                      <th>Tin nhắn</th>
                      <td><?php echo $row['message'];?></td>
                    </tr>

                    <tr>
                      <th>Ngày gửi</th>
                      <td><?php echo $row['PostingDate'];?></td>
                    </tr>

                    <?php if($row['AdminRemark']==""){?>
                    <form name="query" method="post">
                      <tr>
                        <th>Quản trị viên xem xét</th>
                        <td><textarea name="adminremark" class="form-control" required="true"></textarea></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>
                          <button type="submit" class="btn btn-primary pull-left" name="update">
                            Cập nhật <i class="fa fa-arrow-circle-right"></i>
                          </button>

                        </td>
                      </tr>

                    </form>
                    <?php } else {?>

                    <tr>
                      <th>Quản trị viên xem xét</th>
                      <td><?php echo $row['AdminRemark'];?></td>
                    </tr>

                    <tr>
                      <th>Ngày cập nhật lần cuối</th>
                      <td><?php echo $row['LastupdationDate'];?></td>
                    </tr>

                    <?php 
											 }} ?>


                  </tbody>
                </table>
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