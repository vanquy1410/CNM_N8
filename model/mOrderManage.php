<?php
include_once("connect.php");

class MOrderManager
{
    function getAllOrder($maKhachHang)
    {
        $p = new ConnectDB();
        $con = null;
        if ($p->connect_DB($con)) {
            $str = "SELECT *
            FROM chitiethoadon
            INNER JOIN hoadon ON chitiethoadon.MaHoaDon = hoadon.MaHoaDon
            INNER JOIN sanpham ON chitiethoadon.MaSanPham = sanpham.MaSanPham
            WHERE MaKhachHang = $maKhachHang";
            $tbl = mysqli_query($con, $str);
            $p->closeDB($con);
            return $tbl;
        } else {
            return false;
        }
    }
}
