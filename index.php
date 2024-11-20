<?php
include_once('hms/include/config.php');
if (isset($_POST['submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['emailid'];
    $mobileno = $_POST['mobileno'];
    $dscrption = $_POST['description'];
    $query = mysqli_query($con, "insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
    echo "<script>alert('Thông tin của bạn đã được gửi thành công');</script>";
    echo "<script>window.location.href ='index.php'</script>";
} ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> WECARE Hệ Thống Quản Lý Bệnh Viện</title>

    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            font-size: 16px;
            /* Có thể chỉnh kích thước tùy thích */
            color: #333;
            /* Màu chữ cơ bản */
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 600;
            /* Đậm hơn cho các tiêu đề */
        }

        button,
        input,
        textarea {
            font-family: 'Inter', sans-serif;
        }

        button,
        .btn {
            border-radius: 8px;

            /* Bo tròn tất cả các nút */
        }

        /* Styling for the header navigation menu */
        header #menu a {

            text-decoration: none;
            /* Remove underline from links */
        }

        header #menu a:hover {
            color: #007bff;
            /* Blue color on hover */
            background-color: transparent;
            /* Ensure no background change */
        }

        /* Optional: To add background color change when hovering */
        header #menu a {
            padding: 10px 15px;
            /* Ensure padding for proper click area */
            border-radius: 5px;
            /* Rounded corners for hover effect */
        }

        header #menu a:hover {
            background-color: #007bff;
            /* Blue background color on hover */
            color: #fff;
            /* Keep text white */
        }

        /* Default button style (blue background, white text) */
        button,
        .btn,
        .btn-success {
            background-color: #007bff;
            /* Blue background */

            border: 1px solid #007bff;
            /* Blue border */
            font-weight: bold;
            /* Make the button text bold */
        }

        /* Button hover effect (lighter blue background) */
        button:hover,
        .btn:hover,
        .btn-success:hover {

            border-color: #0056b3;
            /* Darker blue border */

        }

        /* Optional: Focused state (button when clicked) */
        button:focus,
        .btn:focus,
        .btn-success:focus {
            outline: none;
            /* Remove the default focus outline */

        }

        /* Change the icons color to blue */
        #services .single-key i,
        #gallery .gallery-filter .btn {
            color: #007bff;
            background-color: white;
            transition: all 0.3s ease;
            /* Blue color */
        }

        /* Header container: Flexbox để giữ mọi thứ trên một hàng */
        #nav-head .row {
            display: flex;
            align-items: center;
            /* Căn giữa theo chiều dọc */
            justify-content: space-between;
            /* Phân phối đều không gian */
            flex-wrap: nowrap;
            /* Ngăn xuống hàng */
        }

        /* Logo HMS luôn căn trái */
        .col-lg-2.col-md-3 {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            /* Căn sát trái */
            white-space: nowrap;
            /* Ngăn xuống hàng */
        }

        /* Menu chính */
        #menu ul {
            display: flex;
            gap: 15px;
            /* Khoảng cách giữa các mục menu */
            list-style: none;
            margin: 0;
            padding: 0;
            white-space: nowrap;
            /* Ngăn xuống hàng */
        }

        /* Các mục trong menu */
        #menu ul li {
            margin: 0;
            padding: 0;
        }

        /* Nút hẹn khám: Căn phải */
        .appoint {
            margin-left: auto;
            /* Đẩy sang phải */
            white-space: nowrap;
            /* Ngăn xuống hàng */
        }

        /* Chỉnh font chữ toàn bộ header */
        .header-nav {
            font-family: 'Arial', sans-serif;
            /* Chọn font chữ, thay bằng font bạn muốn */
            font-size: 16px;
            /* Cỡ chữ mặc định */
            color: #000;
            /* Màu chữ mặc định */
        }

        /* Chỉnh font chữ riêng cho HealthFlow */
        .brand {
            font-family: 'Georgia', serif;
            /* Font chữ cho tiêu đề */
            font-size: 24px;
            /* Kích thước chữ */
            font-weight: bold;
            /* Đậm chữ */
            color: #000;
            /* Màu chữ */
        }

        /* Chỉnh font chữ riêng cho menu */
        .nav-item ul li a {
            font-family: 'Arial', sans-serif;
            /* Font chữ đơn giản */
            font-size: 15px;
            /* Kích thước chữ */
            color: #000;
            /* Màu chữ */
            text-transform: uppercase;
            /* Viết hoa chữ */
            font-weight: 500;
            /* Độ đậm vừa phải */
        }

        /* Chỉnh font chữ riêng cho nút Đặt lịch hẹn khám */
        .appoint a {
            font-family: 'Verdana', sans-serif;
            /* Font chữ của nút */
            font-size: 14px;
            /* Kích thước chữ */
            font-weight: bold;
            /* Đậm chữ */
            color: #fff;
            /* Màu chữ */
        }

        /* Di chuyển nút sang phải */
        .appoint {
            margin-left: 40px;
            margin-bottom: 20px;
            /* Điều chỉnh khoảng cách, tăng giá trị nếu cần */
        }

        /* Dịch logo qua trái và lên trên */
        .col-lg-2 {
            margin-left: -10px;
            /* Điều chỉnh giá trị âm để đưa logo sang trái */
            margin-top: -10px;
            /* Điều chỉnh giá trị âm để đưa logo lên trên */
        }
    </style>
</head>
</head>

<body>

    <header id="menu-jk">

        <div id="nav-head" class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3  col-sm-12"
                        style="color:#000;font-weight:bold; font-size:42px;margin-bottom:20px;margin-right:60px; margin-top: 1% !important;">
                        WECARE
                        <a data-toggle="collapse" data-target="#menu" href="#menu"><i
                                class="fas d-block d-md-none small-menu fa-bars"></i></a>
                    </div>
                    <div id="menu" class="col-lg-8 col-md-9 d-none d-md-block nav-item">
                        <ul>
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="#services">Dịch vụ</a></li>
                            <li><a href="#about_us">Giới thiệu</a></li>
                            <li><a href="#gallery">Phòng trưng bày</a></li>
                            <li><a href="#contact_us">Liên hệ</a></li>
                            <li><a href="#logins">Đăng nhập</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-2 d-none d-lg-block appoint">
                        <a class="btn btn-success" href="hms/user-login.php">Đặt lịch hẹn khám</a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <div class="slider-detail">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>


            <div class="carousel-inner">
                <div class="carousel-item ">
                    <img class="d-block w-100" src="assets/images/slider/slider_2.jpg" alt="Second slide">
                    <div class="carousel-cover"></div>
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class="animated bounceInDown">
                            Hệ thống quản lý bệnh viện</h5>
                    </div>
                </div>

                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/images/slider/slider_3.jpg" alt="Third slide">
                    <div class="carousel-cover"></div>
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class="animated bounceInDown">Hệ thống quản lý bệnh viện</h5>



                    </div>

                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Trước</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Tiếp theo</span>
            </a>
        </div>


    </div>


    <section id="logins" class="our-blog container-fluid">
        <div class="container">
            <div class="inner-title">

                <h2>
                    Đăng nhập</h2>
            </div>
            <div class="col-sm-12 blog-cont">
                <div class="row no-margin">
                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                            <img src="assets/images/patient.jpg" alt="">

                            <div class="blog-single-det">
                                <h6>Bệnh nhân đăng nhập</h6>
                                <a href="hms/user-login.php" target="_blank">
                                    <button class="btn btn-success btn-sm">Bấm vào đây</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                            <img src="assets/images/doctor.jpg" alt="">

                            <div class="blog-single-det">
                                <h6>Bác sĩ đăng nhập</h6>
                                <a href="hms/doctor" target="_blank">
                                    <button class="btn btn-success btn-sm">Bấm vào đây</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">

                            <img src="assets/images/admin.jpg" alt="">

                            <div class="blog-single-det">
                                <h6>Quản trị viên đăng nhập</h6>

                                <a href="hms/admin" target="_blank">
                                    <button class="btn btn-success btn-sm">Bấm vào đây</button>
                                </a>
                            </div>
                        </div>
                    </div>






                </div>
            </div>

        </div>
    </section>







    <!-- ################# Our Departments Starts Here#######################--->


    <section id="services" class="key-features department">
        <div class="container">
            <div class="inner-title">

                <h2>
                    Các dịch vụ chính của chúng tôi</h2>
                <p>Hãy xem một số dịch vụ chính của chúng tôi</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-heartbeat"></i>
                        <h5>
                            Tim mạch</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-ribbon"></i>
                        <h5>Chỉnh hình</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fab fa-monero"></i>
                        <h5>Thần kinh</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-capsules"></i>
                        <h5>Dược phẩm</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-prescription-bottle-alt"></i>
                        <h5>
                            Đội ngũ dược phẩm</h5>
                    </div>
                </div>



                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="far fa-thumbs-up"></i>
                        <h5>
                            Phương pháp điều trị chất lượng cao</h5>

                    </div>
                </div>
            </div>






        </div>

    </section>




    <!--  ************************* About Us Starts Here ************************** -->

    <section id="about_us" class="about-us">
        <div class="row no-margin">
            <div class="col-sm-6 image-bg no-padding">

            </div>
            <div class="col-sm-6 abut-yoiu">
                <h3>Giới thiệu về bệnh viện chúng tôi</h3>
                <?php
                $ret = mysqli_query($con, "select * from tblpage where PageType='aboutus' ");
                while ($row = mysqli_fetch_array($ret)) {
                ?>

                    <p><?php echo $row['PageDescription']; ?>.</p><?php } ?>
            </div>
        </div>
    </section>


    <!--  ************************* Gallery Starts Here ************************** -->
    <div id="gallery" class="gallery">
        <div class="container">
            <div class="inner-title">

                <h2>Phòng trưng bày của chúng tôi</h2>
                <p>Xem phòng trưng bày của chúng tôi</p>
            </div>
            <div class="row">


                <div class="gallery-filter d-none d-sm-block">
                    <button class="btn btn-default filter-button" data-filter="all">Tất cả</button>
                    <button class="btn btn-default filter-button" data-filter="hdpe">Nha khoa
                    </button>
                    <button class="btn btn-default filter-button" data-filter="sprinkle">
                        Tim mạch</button>
                    <button class="btn btn-default filter-button" data-filter="spray"> Thần kinh</button>
                    <button class="btn btn-default filter-button" data-filter="irrigation">
                        Phòng thí nghiệm</button>
                </div>
                <br />



                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                    <img src="assets/images/gallery/gallery_01.jpg" class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                    <img src="assets/images/gallery/gallery_02.jpg" class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                    <img src="assets/images/gallery/gallery_03.jpg" class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                    <img src="assets/images/gallery/gallery_04.jpg" class="img-responsive">
                </div>

                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                    <img src="assets/images/gallery/gallery_05.jpg" class="img-responsive">
                </div>



                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                    <img src="assets/images/gallery/gallery_06.jpg" class="img-responsive">
                </div>

            </div>
        </div>


    </div>
    <!-- ######## Gallery End ####### -->


    <!--  ************************* Contact Us Starts Here ************************** -->

    <section id="contact_us" class="contact-us-single">
        <div class="row no-margin">

            <div class="col-sm-12 cop-ck">
                <form method="post">
                    <h2>Liên hệ</h2>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label>Họ và tên:</label></div>
                        <div class="col-sm-8"><input type="text" placeholder="Nhập họ và tên" name="fullname"
                                class="form-control input-sm" required></div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label>Email:</label></div>
                        <div class="col-sm-8"><input type="text" name="emailid" placeholder="Nhập địa chỉ Email"
                                class="form-control input-sm" required></div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label>Số điện thoại:</label></div>
                        <div class="col-sm-8"><input type="text" name="mobileno" placeholder="Nhập số điện thoại"
                                class="form-control input-sm" required></div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label>Tin nhắn:</label></div>
                        <div class="col-sm-8">
                            <textarea rows="5" placeholder="Nhập tin nhắn bạn muốn trao đổi với chúng tôi" class="form-control input-sm"
                                name="description" required></textarea>
                        </div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label></label></div>
                        <div class="col-sm-8">
                            <button class="btn btn-success btn-sm" type="submit" name="submit">Gửi tin nhắn</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>





    <!-- ################# Footer Starts Here#######################--->


    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <h2>Liên kết hữu ích</h2>
                    <ul class="list-unstyled link-list">
                        <li><a ui-sref="about_us" href="#about_us">Giới Thiệu</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="portfolio" href="#services">Dịch vụ</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="products" href="#logins">Đăng nhập</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="gallery" href="#gallery">Phòng trưng bày</a><i class="fa fa-angle-right"></i>
                        </li>
                        <li><a ui-sref="contact_us" href="#contact_us">Liên hệ cho chúng tôi</a><i
                                class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12 map-img">
                    <h2>Liên hệ cho chúng tôi</h2>
                    <address class="md-margin-bottom-40">

                        <?php
                        $ret = mysqli_query($con, "select * from tblpage where PageType='contactus' ");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>


                            <?php echo $row['PageDescription']; ?> <br>
                            Số điện thoại: <?php echo $row['MobileNumber']; ?> <br>
                            Email: <a href="mailto:<?php echo $row['Email']; ?>"
                                class=""><?php echo $row['Email']; ?></a><br>
                            Thời gian: <?php echo $row['OpenningTime']; ?>
                    </address>

                <?php } ?>





                </div>
            </div>
        </div>


    </footer>
    <div class="copy">
        <div class="container">

            WECARE Hệ thống quản lý bệnh viện


        </div>

    </div>

</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-nav/js/jquery.easing.min.js"></script>
<script src="assets/plugins/scroll-nav/js/scrolling-nav.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>

<script src="assets/js/script.js"></script>



</html>