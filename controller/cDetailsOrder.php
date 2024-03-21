<?php
include_once("Model/mDetailsOrder.php");

if (!isset($_SESSION['MaKhachHang'])) {
    header('location: view/dangnhap.php');
    exit();
}

class CDetailsOrder
{
    function handleComment()
    {
        if (isset($_REQUEST["btnComment"])) {
            $sao = $_REQUEST["sao"];
            $noidung = $_REQUEST["noidung"];
            $maSanPham = $_REQUEST["maSanPham"];
            $maKhachHang = $_SESSION['MaKhachHang'];
            $hinhAnh = $_FILES["fileAnh"];
            

            if(isset($hinhAnh) && $hinhAnh['error'] == 0) {
                $type = $hinhAnh["type"];
                $size = $hinhAnh["size"];
                $tenAnh = $maSanPham . strstr($hinhAnh["name"], ".");

                if ($type == 'image/jpg' || $type == 'image/png' || $type == 'image/jpeg') {
                    if ($size < 3 * 1024 * 1024) {
                        if (move_uploaded_file($hinhAnh["tmp_name"], 'img/comment/' . $tenAnh)) {
                            $p = new MDetailsOrder();
                            $result = $p->createComment($maKhachHang,  $maSanPham,  $noidung, $sao, $hinhAnh);

                            if ($result) {
                                echo '<script>alert("Đánh giá sản phẩm thành công")
                                window.location.href = "orderManage.php";
                                </script>';
                                // header('location: orderManage.php');
                                // exit();
                            } else {
                                echo '<script>alert("Đánh giá sản phẩm thất bại")</script>';
                            }



                            if ($result) {
                                return 1; //insert thành công
                            } else {
                                return 0; //insert không thành công
                            }
                        } else {
                            return -3; //không thể upload ảnh
                        }
                    } else {
                        return -2; //ảnh quá kích cỡ
                    }
                } else {
                    return -1; //ảnh không đúng định dạng
                }
            } else {
                $p = new MDetailsOrder();
                $hinhAnh = "";
                $result = $p->createComment($maKhachHang,  $maSanPham,  $noidung, $sao, $hinhAnh);
                if ($result) {
                    echo '<script>alert("Đánh giá sản phẩm thành công")
                    window.location.href = "orderManage.php";
                    </script>';
                    // header('location: orderManage.php');
                    // exit();
                } else {
                    echo '<script>alert("Đánh giá sản phẩm thất bại")</script>';
                }
            }
        }
    }

    function handleReturn()
    {
        if (isset($_REQUEST["btnReturn"])) {
            $maChiTietHoaDon = $_REQUEST["maChiTietHoaDon"];
            $soLuong = $_SESSION['soLuong'];
            $noidung = $_REQUEST["noidung"];
            // thêm bước xử lý hình ảnh
            $hinhAnh = "hinh anh 123";

            $p = new MDetailsOrder();
            $result = $p->createReturn($maChiTietHoaDon,  $soLuong,  $noidung, $hinhAnh);

            if ($result) {
                echo '<script>alert("Chúng tôi đã ghi nhận thông tin vui lòng đợi nhân viên phản hồi qua email")
                window.location.href = "orderManage.php";
                </script>';
            } else {
                echo '<script>alert("Hoàn trả thất bại")</script>';
            }
        }
    }


    function getAllOrder()
    {
        $maHoaDon = $_REQUEST['maHoaDon'];
        $p = new MDetailsOrder();
        $tbl = $p->getAllDetailsOrder($maHoaDon);
        return $tbl;
    }
}
