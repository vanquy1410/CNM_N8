<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "mypham");

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset(); // Xóa tất cả các biến trong session
    session_destroy(); // Hủy session
    header('location: index.php'); // Chuyển hướng về trang login.php
    exit();
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chính sách</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./css/xemsanpham.css" type="text/css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Bạn có thể thêm dòng sau vào phần head của trang web -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li style="font-family: Cairo, sans-serif; font-size: 15px;"><i class="fa fa-envelope"></i> shopmyphamNumberTwo@gmail.com</li>
                                <li style="font-family: Cairo, sans-serif; font-size: 15px;">Miễn phí vận chuyển khi
                                    đăng ký thành viên</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="./view/capnhatttcn.php"><i class="fa fa-user"></i></a>
                                <a href="contact.php"><i class="fa fa-phone"></i></a>
                                <?php
                                // Kiểm tra xem đã đăng nhập hay chưa
                                if (isset($_SESSION['MaKhachHang'])) {
                                    // Nếu đã đăng nhập, hiển thị các biểu tượng khác
                                    echo '<a href="cart.php"><i class="fa fa-shopping-bag"></i></a>';
                                    // Thêm các biểu tượng khác nếu cần
                                } else {
                                    // Nếu chưa đăng nhập, hiển thị biểu tượng đăng nhập
                                    echo '<a href="./view/dangnhap.php"><i class="fa fa-shopping-bag"></i></a>';
                                }
                                ?>
                            </div>

                            <div class="header__top__right__auth">
                                <?php
                                if (isset($_SESSION['MaKhachHang'])) {
                                    echo '<div class="dropdown">';
                                    echo '<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" 
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';

                                    // if (isset($_SESSION['MaKhachHang'])) {
                                    $tenTaiKhoan = $_SESSION['MaKhachHang'];
                                    $name = mysqli_query($conn, "SELECT * FROM `khachhang` WHERE `MaKhachHang`= $tenTaiKhoan");
                                    $kq = mysqli_fetch_array($name);
                                    echo $kq["HoTen"];
                                    //}

                                    echo '</button>';
                                    echo '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="view/capnhatttcn.php">Cập nhật thông tin</a>
                                        <a class="dropdown-item" href="view/doimatkhau.php">Đổi mật khẩu</a>
                                        <a class="dropdown-item" href="?action=logout">Đăng xuất</a>
                                    </div>';
                                    echo '</div>';
                                } else {
                                    echo '<a href="./view/dangnhap.php" style="font-family: Cairo, sans-serif; font-size: 15px;">Đăng nhập</a>';
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu">
                        <ul>
                            <li>
                                <?php
                                if (isset($_SESSION['MaKhachHang'])) {
                                    echo '<a href="indexuser.php">Trang Chủ</a>';
                                } else {
                                    echo '<a href="index.php">Trang Chủ</a>';
                                }
                                ?>
                            </li>
                            
                            <li><a href="shop.php">Sản Phẩm</a></li>
                            <li><a href="contact.php">Liên Hệ</a></li>
                            <li><a href="chinhsach.php">Chính Sách</a></li>
                            <li><a href="#">Quản lý mua hàng</a>
                                <ul class="header__menu__dropdown">
                                    <li>
                                        <?php
                                        if (isset($_SESSION['MaKhachHang'])) {
                                            echo '<a href="payment.php">Đặt hàng</a>';
                                        } else {
                                            echo '<a href="./view/dangnhap.php">Đặt hàng</a>';
                                        }
                                        ?></li>
                                    <li><a href="./view/dangnhap.php">Xem lịch sử mua hàng</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Liên Hệ</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Điện thoại</h4>
                        <p>09.8888.9898</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa chỉ</h4>
                        <p>12 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Giờ mở cửa</h4>
                        <p>9:00 AM - 21:00 PM</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>shopmyphamNumberTwo@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.858169091027!2d106.68427047365611!3d10.822164158351242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174deb3ef536f31%3A0x8b7bb8b7c956157b!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBUUC5IQ00!5e0!3m2!1svi!2s!4v1702193485364!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>HỒ CHÍ MINH</h4>
                <ul>
                    <li>Điện thoại: 09.8888.9898</li>
                    <li>Địa chỉ: 12 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Để lại lời nhắn cho chúng tôi</h2>
                    </div>
                </div>
            </div>
            <form action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Vui lòng nhập Tên">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Vui lòng nhập Email">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Lời nhắn"></textarea>
                        <button type="submit" class="site-btn">Gửi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row" style="margin: 20px 0 10px">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo" style="line-height: 150px">
                            <a href="./index.html"><img src="img/img-02logo.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h4>Truy cập nhanh</h4>
                        <ul style="list-style-type: none; color: #333; margin: 10px 0 0 0">
                            <li><a style="color: #333" href="./index.php">Home</a></li>
                            <li><a style="color: #333" href="./shop.php">Sản phẩm</a></li>
                            <li><a style="color: #333" href="./contact.php">Liên hệ</a></li>
                            <li><a style="color: #333" href="./chinhsach.php">Chính sách</a></li>
                            <li><a style="color: #333" href="./orderManage.php">Quản lý đơn hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h4>Liên hệ</h4>
                        <div class="footer__widget__social" style="margin: 10px 0 0 0">
                            <ul style="list-style-type: none; color: #333">
                                <li>Address: 12 Nguyễn Văn Bảo</li>
                                <li>Phone: 09.8888.9898</li>
                                <li>Email: shopmyphamNumberTwo@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="text-align: center !important; border-top: 1px solid #ccc; margin: 15px 0 0 0">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text" style="width: 100%; margin: 10px 0px 0 4%">
                            <p> Copyright &copy; NumberTwo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.nice-select.min.js"></script>
    <script src="./js/jquery-ui.min.js"></script>
    <script src="./js/jquery.slicknav.js"></script>
    <script src="./js/mixitup.min.js"></script>
    <script src="./js/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>


</body>
<!-- Bạn có thể thêm dòng sau trước đóng thẻ body -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

</html>