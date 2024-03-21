<?php
session_start();
ob_start();
// include_once("model/connectdb.php");
$conn = mysqli_connect("localhost", "root", "", "mypham");
if (!isset($_SESSION['MaKhachHang']) || empty($_SESSION['MaKhachHang'])) {
    header('location: index.php');
    exit();
}
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
    <title>XEM SẢN PHẨM</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/xemsanpham.css" type="text/css">
</head>

<body>
    <?php
    include("controller/cCart.php");
    $p = new CCart();
    $p->handleUpdateProduct();
    $p->handleDeleteProduct();

    ?>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->


    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> shopmyphamNumberTwo@gmail.com</li>
                                <li>Miễn phí vận chuyển khi đăng ký thành viên</li>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="./view/capnhatttcn.php"><i class="fa fa-user"></i></a>
                                <a href="contact.php"><i class="fa fa-phone"></i></a>
                                <a href="cart.php"><i class="fa fa-shopping-bag"></i></a>
                            </div>

                            <div class="header__top__right__auth">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" 
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php
                                        if (isset($_SESSION['MaKhachHang'])) {
                                            $tenTaiKhoan = $_SESSION['MaKhachHang'];
                                            $name = mysqli_query($conn, "SELECT * FROM `khachhang` WHERE `MaKhachHang`= $tenTaiKhoan");
                                            $kq = mysqli_fetch_array($name);
                                            echo $kq["HoTen"];
                                        }
                                        ?>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="view/capnhatttcn.php">Cập nhật thông tin</a>
                                        <a class="dropdown-item" href="view/doimatkhau.php">Đổi mật khẩu</a>
                                        <a class="dropdown-item" href="?action=logout">Đăng xuất</a>
                                    </div>
                                </div>
                            </div>
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
                        <a href="./indexuser.php"><img src="./img/logo.png" alt=""></a>
                    </div>
                </div>

                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#" method="get">
                            <input type="text" name="tim" placeholder="Nhập sản phẩm cần tìm.">
                            <button class="site-btn" type="submit" name="timkiem">TÌM</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-12">
                <nav class="header__menu">
                    <ul>
                        <li><a href="indexuser.php">Trang Chủ</a>
                        
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
    <br>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>GIỎ HÀNG</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                include('./view/vCart.php');
                                $cart = new VCart();
                                $cart->viewAllProducts()
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <ul>


                            <li>
                                <h5>Tổng tiền</h5> <span id="allTotal">
                                    <?php

                                    $cart->cartTotal()
                                    ?>
                                </span>
                            </li>
                        </ul>
                        <a href="payment.php" class="primary-btn">Thanh Toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

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
                <div class="col-lg-12" style="text-align: center !important; border-top: 1px solid #ccc; margin: 15px 0 0 0">
                    <div class="footer__copyright" ">
                        <div class="footer__copyright__text" style="width: 100%; margin: 10px 0px 0 4%">
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
    <script type="text/javascript">
         function confirmDelete() {
            return confirm("Bạn có chắc chắn muốn xóa không?");
        }
        function confirmUpdate() {
            return confirm("Bạn có chắc chắn cập nhật số lượng?");
        }
        var formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0,
        });


        setInterval(() => {
            renderPrice()
        }, 100);

        const allTotalhtml = document.querySelector('#allTotal')
        const totalItem = document.querySelectorAll('.shoping__cart__total')
        const prices = document.querySelectorAll('._price')
        const quantity = document.querySelectorAll('._quantity')

        function renderPrice() {
            let allTotal = 0
            for (let i = 0; i < totalItem.length; i++) {
                totalItem[i].innerHTML = formatter.format(prices[i].innerHTML * quantity[i].value)
                allTotal += prices[i].innerHTML * quantity[i].value
            }

            allTotalhtml.innerHTML =  formatter.format(allTotal)
        }
       
    </script>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>