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
    <title>TRANG CHỦ SHOP MỸ PHẨM</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/home.css" type="text/css">
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
                                <li style="font-family: Cairo, sans-serif; font-size: 15px;"><i
                                        class="fa fa-envelope"></i> shopmyphamNumberTwo@gmail.com</li>
                                <li style="font-family: Cairo, sans-serif; font-size: 15px;">Miễn phí vận chuyển khi
                                    đăng ký thành viên</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="./view/dangnhap.php"><i class="fa fa-user"></i></a>
                                <a href="contact.php"><i class="fa fa-phone"></i></a>
                                <?php
                                // Kiểm tra xem đã đăng nhập hay chưa
                                if (isset($_SESSION['MaKhachHang'])) {
                                    // Nếu đã đăng nhập, hiển thị các biểu tượng khác
                                    echo '<a href="cart.php"><i class="fa fa-shopping-bag"></i></a>';
                                    // Thêm các biểu tượng khác nếu cần
                                } else {
                                    // Nếu chưa đăng nhập, hiển thị biểu tượng đăng nhập
                                    echo 
                                         '<a href="./view/dangnhap.php"><i class="fa fa-shopping-bag"></i></a>';
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

                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="./img/logo.png" alt=""></a>
                    </div>
                </div>

                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <input type="text" name="search" placeholder="Nhập sản phẩm cần tìm.">
                            <button type="submit" class="site-btn">TÌM</button>
                        </form>
                    </div>
                </div>

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
                                    <li><a href="payment.php">Đặt hàng</a></li>
                                    <li><a href="orderManage.php">Xem lịch sử mua hàng</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <br>

    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>SẢN PHẨM</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php
                include_once("view/vProduct.php");
                $p = new VProduct();
                if (isset($_REQUEST["search"])) {
                    $p->viewSearchProduct($_REQUEST["search"]);
                } else {
                    $p->viewAllProducts();
                }
                ?>
            </div>
            <!--    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/xem1.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">L'ORÉAL</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/xem2.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">L'ORÉAL</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/xem3.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">L'ORÉAL</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/xem4.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">L'ORÉAL</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/xem4.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">L'ORÉAL</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/xem3.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">L'ORÉAL</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/xem2.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">L'ORÉAL</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/xem1.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">L'ORÉAL</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>-->

        </div>
    </section>

    <!-- Footer Begin -->
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
                <div class="col-lg-12"
                    style="text-align: center !important; border-top: 1px solid #ccc; margin: 15px 0 0 0">
                    <div class="footer__copyright" ">
                        <div class=" footer__copyright__text" style="width: 100%; margin: 10px 0px 0 4%">
                        <p> Copyright &copy; NumberTwo</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>