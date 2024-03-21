<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ĐẶT HÀNG</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/pagephu.css" type="text/css">
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
                                <li><i class="fa fa-envelope"></i> shopmyphamNumberTwo@gmail.com</li>
                                <li>Miễn phí vận chuyển cho đơn hàng từ 399k</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-user"></i></a>
                                <a href="#"><i class="fa fa-phone"></i></a>                   
                                <a href="cart.php"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        
                            <div class="header__top__right__auth">
                                <a href="#">Follow Us</a>
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
                            <input type="text" placeholder="Nhập sản phẩm cần tìm.">
                            <button type="submit" class="site-btn">TÌM</button>
                        </form>
                    </div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    
                </div>

                <div class="col-lg-12">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="#">Danh mục</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./xemsanpham.html">Xem sản phẩm</a></li>
                                    <li><a href="./dathang.html">Đặt hàng</a></li>
                                    <li><a href="./thongtinsanpham.html">Xem thông tin đơn hàng</a></li>
                                    <li><a href="./huydon.html">Hủy đơn</a></li>
                                    <li><a href="#">Khác</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Tin tức</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Chính sách</a></li>
                            <li><a href="#">Quản lý</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <br>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/bgxemct.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Order</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6>Bạn đã có Mã giảm giá chưa? <a href="#">Nhấn vào đây</a> để nhập code!</h6>
                </div>
            </div>
            <div class="checkout__form">
            <?php
                    include_once("view/vCustomer1.php");
                    $p = new VCustomer();
                    $p -> viewAllCustomers();
                ?>
              <!--  <h4>Thông tin Khách hàng</h4>
                  <p><a href="./themthongtin.html" style="color: red"> Chỉnh sửa</a></p>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                          <p><b>Họ và Tên khách hàng:</b> Nguyễn Văn An.<br>
                             <b>Sống tại:</b> Thành phố Hồ Chí Minh.<br>
                             <b>Điện thoại:</b> 098 7654 321<br>
                             <b>E-mail:</b> nguyenvanan@gmail.com<br>
                             <b>Địa chỉ:</b> 12 Nguyễn Văn Bảo, Phường 4, Gò Vấp, Thành phố Hồ Chí Minh.</p>
                             <br><br>
                      
                       <h4>Thông tin sản phẩm</h4>
                       <div class="checkout__input__checkbox">
                           <label>Giao hàng tiết kiệm: 15.000
                                 <input type="checkbox">
                                 <span class="checkmark"></span>
                           </label>
                       </div>
                       <div class="checkout__input__checkbox">
                           <label>Giao hàng nhanh: 30.000
                                 <input type="checkbox">
                                 <span class="checkmark"></span>
                            </label>
                        </div>

                          <p><b>Tên sản phẩm:</b> Mặt nạ<br>
                             <b>Số lượng:</b> x1<br>
                             <b>Thành tiền:</b> 39.000<br><br>

                             <b>Tên sản phẩm:</b> Kem chống nắng<br>
                             <b>Số lượng:</b> x1<br>
                             <b>Thành tiền:</b> 79.000<br><br>

                             <b>Tên sản phẩm:</b> Nước tẩy trang<br>
                             <b>Số lượng:</b> x1<br>
                             <b>Thành tiền:</b> 149.000<br><br>
                        </div>
                
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn hàng của bạn</h4>
                                <div class="checkout__order__products">Sản phẩm <span>Thành tiền</span></div>
                                <ul>
                                    <li>Mặt nạ <span>39.000</span></li>
                                    <li>Kem chống nắng<span>79.000</span></li>
                                    <li>Nước tẩy trang<span>149.000</span></li>
                                </ul>
                                <div class="checkout__order__subtotal">Phí vận chuyển<span>30.000</span></div>
                                <div class="checkout__order__total">Tổng tiền<span>307.000</span></div>
                        
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Thanh toán trực tuyến. <a href="./thongtinthanhtoan.html" style="color: palevioletred">Tại đây!</a>
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Thanh toán khi nhận hàng.
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <button type="submit" class="site-btn2">ĐẶT HÀNG</button>
                            </div>
                        </div>
                    </div>
                </form> -->
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

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

</body>
</html>