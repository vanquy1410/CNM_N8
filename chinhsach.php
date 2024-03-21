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
</head>

<body>

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
                                    <li><a href="./view/dangnhap.php">Đặt hàng</a></li>
                                    <li><a href="./view/dangnhap.php">Xem lịch sử mua hàng</a></li>
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
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__item set-bg" data-setbg="img/bgmypham1.jpg">
                        <div class="hero__text">
                            <span>COSMETICS</span>
                            <h2>MỸ PHẨM<br>100% An toàn cho da</h2>
                            <p>Có sẵn nhận và giao hàng miễn phí</p>
                            <a href="shop.php" class="primary-btn">XEM NGAY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Hero Section Begin -->

    <!-- Hero Section End -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <h4>1. Điều khoản về sử dụng website</h4>
                        <p>- Chúng tôi lập ra trang website bán hàng này và ngay khi quý khách truy cập vào website này
                            đồng nghĩa là quý khách chấp thuận với các điều khoản và chính sách đưa ra trong website
                            này. Tất cả các nội dung về điều khoản và chính sách đưa ra trong website này có thể thay
                            đổi bất cứ khi nào và có hiệu lực tức thì khi nó được đăng tải lên trên website mà không cần
                            thông báo. Khi quý khách tiếp tục truy cập vào website ngay sau nội dung mới được cập nhật
                            nghĩa là quý khách nhận thức và chấp thuận với các nội dung được đăng tải mới. Để thuận tiện
                            trong việc sử dụng website này, quý khách vui lòng kiểm tra nội dung về các điều khoản và
                            chính sách để nắm được những cập nhật mới nhất.</p>
                        <p>- Khi truy cập vào website chúng tôi, quý khách phải đảm bảo đủ 18 tuổi hoặc truy cập dưới sự
                            giám sát của bố mẹ hoặc người giám hộ hợp pháp, có đủ hành vi dân sự để thực hiện việc truy
                            cập, mua bán hàng hóa, trao đổi thư từ theo quy định của pháp luật của nhà nước CHXHCN Việt
                            Nam hoặc nước sở tại nơi quý khách đang sinh sống./p>
                        <p>- Quý khách có quyền tạo tài khoản (account) trên website của chúng tôi để thuận tiện cho
                            việc giao dịch, hưởng những lợi ích của khách hàng thân thiết hoặc quý khách có thể từ chối
                            việc đăng ký tạo tài khoản mà không ảnh hưởng đến chất lượng dịch vụ bán hàng. Trong trường
                            hợp quý khách tạo tài khoản trên website này, quý khách phải chấp thuận các điều khoản mà
                            chúng tôi đưa ra trong mục "Điều khoản mua hàng" và chịu trách nhiệm hoàn toàn về việc quản
                            lý tên đăng nhập và mật khẩu và không để bên thứ ba nào biết để truy cập vào tài khoản của
                            mình trên website này. Chúng tôi không chịu trách nhiệm cho bất cứ tổn thất nào khi quý
                            khách không tuân thủ các điều khoản đã được nêu ra dù trực tiếp hay gián tiếp.</p>
                        <p>- Chúng tôi có thể gửi các email quảng cáo dựa vào email lịch sử mua hàng của quý khách đã
                            đăng ký.</p>
                        <p>- Chúng tôi không chấp nhận cho bên nào sử dụng trang web của mình, trừ những trường hợp có
                            đưa ra bằng văn bản cụ thể, cho những mục đích quảng cáo hay thương mại hay bất kì các hoạt
                            động hợp pháp hay bất hợp pháp nào được quy định trong luật hiện hành của nhà nước CHXHCN
                            Việt Nam hoặc/và các quy định của luật pháp chung của các nước khác.</p>
                        <p>- Việc thông tin qua lại, đặt hàng, phản hồi, bán hàng hóa, đổi, trả hàng hóa chỉ phát sinh
                            khi bên mua hàng (gọi là khách hàng) có nhu cầu muốn mua mặt hàng được NumberTwo đăng ký
                            thông tin trên website và bên bán hàng (gọi là bên bán) có thể cung cấp mặt hàng đã thông
                            tin trên website theo trình tự các bước đã được thiết lập trên website. Mọi hoạt động như đã
                            nêu ở mục này phải tuân thủ luật pháp nước CHXHCN Việt Nam và NumberTwo không chịu trách
                            nhiệm khi hàng hóa của mình bị gửi kèm, hay bị lợi dụng vào những mục đích xấu, trái pháp
                            luật được quy định trong các luật hiện hành của nước CHXHCN Việt Nam. Sản phẩm của NumberTwo
                            bao gồm những nguyên vật liệu và đóng gói tem nhãn đã được thông báo và mô tả cụ thể trên
                            website và chúng tôi không chịu trách nhiệm khi sản phẩm mình có những thành phần, chi tiết
                            khác mà đã không được nêu ra trên website.</p>
                        <h4>2. Quy định về bảo mật dữ liệu</h4>
                        <p>- Thông tin của quý khách (Tên, địa chỉ, thông tin ngân hàng, thông tin đặt hàng, thông tin
                            các giao dịch...) sẽ được bảo vệ trên trang web mà không được cung cấp cho bên thứ ba nào
                            trừ khi được các cơ quan thẩm quyền của nhà nước CHXHCN Việt Nam yêu cầu. </p>
                        <p>- Trong trường hợp khách hàng phát hiện thông tin của mình được sử dụng sai mục đích trên
                            website, khách hàng có thể gửi email khiếu nại việc thông tin cá nhân bị sử dụng sai mục
                            đích hoặc phạm vi đã thông báo đến email quản lý để nhận được sự hỗ trợ kịp thời. Email tiếp
                            nhận khiếu nại: info@NumberTwo.com. </p>
                        <p>- Việc tấn công hệ thống bảo mật của website để đánh cắp dữ liệu khách hàng, thay đổi nội
                            dung website, đăng tải các bài viết hay hình ảnh vi phạm pháp luật nhà nước CHXHCN Việt Nam
                            được cho là hành động phạm tội và sẽ bị truy tố bởi cơ quan chức năng.</p>
                        <p>- Các đánh giá của khách hàng được nêu ra trên website là đánh giá thật và đã được công bố
                            công khai thực tế trên các trang mạng xã hội ( ví dụ Facebook, Instagram, Zalo,...) hoặc
                            được NumberTwo xin ý kiến chia sẻ lại lên website. Người đánh giá cho NumberTwo nhận thức
                            được việc NumberTwo có thể sử dụng tên tài khoản lúc đánh giá và nội dung đánh giá để đăng
                            lại lên trang web này. Nếu quý khách hàng muốn gỡ bỏ đánh giá, xin vui lòng liên hệ để nhận
                            được sự hỗ trợ.</p>

                        <h4>3. Thương hiệu và bản quyền</h4>
                        <p>Website bán hàng này đã được thông báo với Bộ Công Thương và hoạt động với mục đích bán các
                            mặt hàng đăng trên website.</p>
                        <p>Thương hiệu, nhãn hiệu NumberTwo sẽ được bảo hộ theo luật sở hữu trí tuệ, các nội dung thông
                            tin, thiết hình học và ngoại quan sản phẩm, hình ảnh, video, âm nhạc, logo, mã source code
                            đều là tài sản của người đại diện hợp pháp của nhãn hiệu NumberTwo và website
                            www.NumberTwo.com</p>
                        <p>Toàn bộ nội dung của website được bảo vệ bởi luật bản quyền của nhà nước CHXHCN Việt Nam.</p>
                        <h4>4. Mua hàng và xác nhận đơn hàng</h4>
                        <h5>4.1 Mua hàng trên website</h5>
                        <p>Việc mua hàng trên website là việc lựa chọn hàng hóa và hoàn tất các bước đã được thiết kế để
                            đặt hàng và thanh toán. Chúng tôi cũng chấp nhận đặt hàng qua điện thoại hoặc email, tuy
                            nhiên đơn hàng vẫn phải được khởi tạo trên website (bởi người mua hoặc do NumberTwo khởi tạo
                            theo thông tin mà người mua cung cấp thông qua điện thoại hoặc email) để thuận tiện trong
                            việc theo dõi và quản lý đơn hàng. </p>
                        <h5>4.2 Xác nhận đơn hàng</h5>
                        <p>Việc đặt hàng thông qua website sẽ được xác nhận tình trạng gửi cho email đăng ký khi mua
                            hàng. Chúng tôi sẽ liên lạc với người mua để xác nhận thông tin đặt hàng (sản phẩm, số
                            lượng, địa điểm giao hàng, giá cả, phương thức thanh toán). NumberTwo có toàn quyền trong
                            việc xác nhận đơn đặt hàng sẽ được giao hoặc hủy đơn hàng với bất cứ lý do nào thông qua
                            việc liên lạc với người mua cho dù người mua đã thanh toán hoặc chưa thanh toán. Nếu người
                            mua đã thanh toán thì chúng tôi sẽ căn cứ vào thông tin chuyển tiền đã nhận thông qua tài
                            khoản ngân hàng để chúng tôi tiến hành việc hoàn trả lại cho người gửi tiền.</p>
                        <h5>4.3 Giá bán</h5>
                        <p>Giá bán của sản phẩm đăng trên website chưa bao gồm giá vận chuyển của bên thứ 3, NumberTwo
                            sẽ thông báo với khách hàng đã đặt hàng thành công về số tiền hàng và tiền vận chuyển để
                            người mua thuận tiện trong việc hoàn tất thủ tục thanh toán để nhận hàng. Trong trường hợp
                            giá đăng trên website có sự sai lệch do bất cứ lý do gì, chúng tôi có quyền từ chối đơn hàng
                            đã đặt như đã nêu ở mục 4.2 này.</p>
                        <h5>4.4 Vai trò và trách nhiệm</h5>
                        <p>Bên bán: Gửi đủ hàng và đúng chủng loại như đơn hàng đã được xác nhận cho khách hàng. Xác
                            nhận tình trạng thanh toán cho khách hàng trên hệ thống. Ngoài ra bên bán phải phản hồi
                            thông tin về khiếu nại hay hàng đổi trả khi khách hàng gửi yêu cầu và hỗ trợ gửi trả hàng
                            hay hoàn tiền theo chính sách đổi trả hàng.</p>
                        <p>Khách hàng: khách hàng trách nhiệm thanh toán cho bên giao hàng đây đủ số tiền nếu chọn hình
                            thức thanh toán khi nhận hàng (COD) hoặc thanh toán cho bên bán số tiền hàng nếu chọn chuyển
                            khoản qua ngân hàng. Khách hàng phải có trách nhiệm thanh toán chi phí giao hàng cho bên
                            giao hàng nếu chọn hình thức thanh toán chuyển khoản qua ngân hàng </p>
                        <h5>4.5 Phương thức thanh toán</h5>
                        <p>Thanh toán trực tuyến: Chính sách thanh toán của chúng tôi được thiết kế nhằm đảm bảo sự
                            thuận lợi và an toàn cho khách hàng khi mua sắm trên trang web của chúng tôi. Chúng tôi cung
                            cấp nhiều phương thức thanh toán linh hoạt để đáp ứng đa dạng nhu cầu của khách hàng.</p>
                        <p>Chuyển khoản ngân hàng: Chúng tôi chấp nhận thanh toán trực tuyến thông qua các phương thức
                            an toàn như thẻ tín dụng/debit và các dịch vụ thanh toán trực tuyến phổ biến khác. Tất cả
                            thông tin thanh toán của khách hàng đều được bảo vệ bằng các biện pháp an ninh cao cấp để
                            đảm bảo tính riêng tư và an toàn.</p>
                        <p>Thanh toán khi nhận hàng: Khách hàng cũng có thể sử dụng phương thức chuyển khoản ngân hàng
                            để thanh toán. Chúng tôi cung cấp thông tin tài khoản ngân hàng để đơn giản hóa quá trình
                            chuyển khoản và đảm bảo tính chính xác của giao dịch.</p>
                        <p>Đối với một số địa chỉ và đơn đặt hàng cụ thể, chúng tôi hỗ trợ hình thức thanh toán khi nhận
                            hàng. Khách hàng có thể thanh toán tiền mặt khi nhận được sản phẩm tại địa chỉ giao hàng.
                        </p>
                        <h4>5. Đổi trả hàng hóa</h4>
                        <h5>5.1 Thời gian đổi trả</h5>
                        <p>Khách hàng có quyền đổi trả sản phẩm trong khoảng thời gian cụ thể, thường là từ ngày nhận
                            hàng. Thời gian này có thể thay đổi tùy thuộc vào loại sản phẩm và chính sách cụ thể của
                            từng sản phẩm.</p>
                        <h5>5.2 Điều kiện đổi trả</h5>
                        <p>Sản phẩm cần được giữ trong tình trạng hoàn toàn mới và nguyên vẹn, không có dấu vết sử dụng
                            hay hỏng hóc.
                            Bao gồm đầy đủ phụ kiện, hướng dẫn sử dụng, và bảng bảo hành (nếu có).
                            Đối với một số loại sản phẩm nhất định, có thể áp dụng các điều kiện đặc biệt, chẳng hạn như
                            sản phẩm phải còn trong tem bảo hành.</p>
                        <h5>5.3 Quy trình đổi trả</h5>
                        <p>Khách hàng cần thông báo về việc đổi trả sản phẩm trong thời gian quy định và theo đúng quy
                            trình mà chúng tôi quy định.
                            Thông tin về quy trình đổi trả và các biểu mẫu liên quan thường được cung cấp trên trang web
                            của chúng tôi hoặc qua dịch vụ khách hàng.</p>
                        <h4>6. Hóa đơn bán hàng</h4>
                        <p>Chúng tôi lập hóa đơn bán hàng cho tất cả các đơn đặt hàng và lưu trữ có thời hạn thông qua
                            đơn vị thứ 3 cung cấp dịch vụ hóa đơn điện tử. Quý khách điền thông tin người mua hàng, mã
                            số thuế, địa chỉ để chúng tôi lập nên hóa đơn một cách đầy đủ nhất. Trường hợp người mua
                            không yêu cầu cung cấp hóa đơn bán hàng, chúng tôi vẫn lập hóa đơn bán hàng theo thông tin
                            người mua đã cung cấp trong đơn đặt hàng và ghi chú trong hóa đơn là người mua không lấy hóa
                            đơn. </p>
                        <p>Chúng tôi không cung cấp hóa đơn cho những mục đích khác hoặc sai lệch số tiền so với số tiền
                            của đơn đặt hàng đã đặt.</p>
                        <h4>7. Giao nhận hàng hóa/đổi trả</h4>
                        <p>Việc giao hàng tùy thuộc vào vị trí địa lý của nơi nhận để quyết định (được đồng thuận giữa
                            người bán và người mua) có hay không việc sử dụng dịch vụ của bên thứ ba nhằm hỗ trợ việc
                            giao nhận hàng hóa hay thu hộ COD.</p>
                        <p>Chúng tôi không chịu trách nhiệm khi bên giao nhận giao sai hàng hóa mà gây ảnh hưởng trực
                            tiếp hoặc gián tiếp đến người mua. Việc giao sai hàng hóa do lỗi bên bán sẽ được bên bán
                            giao lại đúng theo đơn đặt hàng.</p>
                    </div>
                </div>
            </div>

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
                    <div class="footer__copyright">
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