<?php
include_once("controller/cOrderManage.php");
class VOrderManager
{
    function viewAllOrder()
    {
        $p = new COrderManager();
        $tbl = $p->getAllOrder();
        showProduct($tbl);
    }

    function cartTotal()
    {
        $p = new CCart();
        $tbl = $p->getAllProduct();
        $total = 0;
        if ($tbl) {
            if (mysqli_num_rows($tbl) > 0) {
                while ($row = mysqli_fetch_assoc($tbl)) {
                    $total += $row['GiaBan'] * $row['SoLuong'];
                }
            }
        } else {
            echo "Vui lòng nhập dữ liệu!";
        }

        echo number_format($total, 0, ',', '.');
        echo "đ";
    }
}


function showProduct($tbl)
{
    if ($tbl) {
        if (mysqli_num_rows($tbl) > 0) {
            $temp = "";
            while ($row = mysqli_fetch_assoc($tbl)) {
                
                // loại bỏ trùng mã hoá đơn
                if($temp != $row['MaHoaDon']){
                    echo '
                    <tr>
                        <form action="detailsOrder.php" method="get">
                            <td class="shoping__cart__item">
                            <img src="img/' . $row['HinhAnh'] . '" alt="">
                                <h5>' . $row['DiaChiGiaoHang'] . '</h5>
                            </td>
                            <td class="shoping__cart__price">
                            ' . $row['NgayLap'] . '
                            </td>
                            <td class="shoping__cart__price">
                                HD - ' . $row['MaHoaDon'] . '
                            </td>
                            <td class="shoping__cart__quantity">
                                <div class="quantity">
                                ' . $row['TongTien'] . 'đ
                                </div>
                            </td>
                            <td class="shoping__cart__total">
                                <input type="hidden" name="maHoaDon" value="' . $row['MaHoaDon'] . '">
                                <button class="btn btn-outline-info" type="submit" name="btn_details_order">Chi tiết</button>
                            </td>
                        </form>
                    </tr>
                    ';
                }

                $temp = $row['MaHoaDon'];
                
            }
        }
    } else {
        echo "Vui lòng nhập dữ liệu!";
    }
}
