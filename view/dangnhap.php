<?php
session_start();
ob_start();

include_once("../model/connectdb.php");
function checkuser($user, $pass)
{
    $conn = connectdb();
    $hashedPassword = md5($pass);
    $stmt = $conn->prepare("SELECT * FROM khachhang WHERE SoDienThoai = ? AND MatKhau = ?");
    $stmt->execute([$user, $hashedPassword]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();

    if (count($kq) > 0) {
        return $kq[0]['MaKhachHang'];
    } else {
        return 0;
    }
}
$hoTenDefault = '';
$soDienThoaiDefault = '';
if (isset($_POST['submit']) && $_POST['submit']) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $hoTenDefault = $user;
    $soDienThoaiDefault = $pass;
    $role = checkuser($user, $pass);
    if (empty($pass) || empty($user)) {
        $txt = "Bạn cần nhập đủ thông tin";
    } elseif ($role) {
        // Lưu MaKhachHang vào session
        $_SESSION['MaKhachHang'] = $role;
        $_SESSION['SoDienThoai'] = $user;
        $_SESSION['MatKhau'] = $pass;

        // Chuyển hướng đến trang abc.php
        header('location: ../indexuser.php');
        exit();
    } else {
        $txt = "Số điện thoại hoặc mật khẩu không tồn tại";
    }
    $hoTenDefault = $user;
    $soDienThoaiDefault = $pass;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main_long.css">
    <title>Đăng nhập</title>
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="../img/img-02.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="post">
                    <span class="login100-form-title">
                        Đăng nhập
                    </span>

                    <div class="wrap-input100 ">
                        <input class="input100" type="text" name="user" value="<?php echo $hoTenDefault; ?>"
                            placeholder="Số điện thoại">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 ">
                        <input class="input100" type="password" name="pass" value="<?php echo $soDienThoaiDefault; ?>"
                            placeholder="Mật khẩu">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <?php
                    if (isset($txt) && ($txt != "")) {
                        echo "<div style='color: red; text-align: center;'>$txt</div>";
                    }
                    ?>
                    <div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" name="submit" value="Đăng nhập">
                    </div>
                    
                    <div class="text-center p-t-12">
                        <a class="txt2" href="quenmatkhau.php">
                            Quên mật khẩu
                        </a>
                    </div>
                    
                    <div class="text-center p-t-12">
                        <a class="txt2" href="dangky.php">
                            Bạn chưa có tài khoản? Đăng ký tại đây
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</body>
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/select2/select2.min.js"></script>
    <script src="../vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="../js/mainn.js"></script>

</html>