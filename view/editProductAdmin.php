<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        div#update_info {
            color: #157347;
            text-align: center;
            margin: 15px 0;
            display: flex;
            justify-content: flex-start;
            margin-left: 25%;
            align-items: center;
        }

        #update_info a>i {
            color: #157347;
            margin-right: 150px;
        }

        h4 {
            color: #157347;
            margin: 15px 0;
            margin-left: 25%;
        }

        .btnCus3.btnCus {
            border-radius: 3px;
            background-color: #157347;
            color: #fff;
            border: none;
            padding: 5px 10px;
            width: 80px;
        }

        form {
            margin-left: 25%;
        }

        .btnUpd {
            align-items: center;
            margin-left: 25%;

        }

        small {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    // include_one("Controller/aAdmin.php");
    $p = new CProductAdmin();
    $tblEdit = $p->getProductToEdit($_REQUEST["MaSanPham"]);

    if (mysqli_num_rows($tblEdit) > 0) {
        while ($r = mysqli_fetch_assoc($tblEdit)) {
            $maSP = $r["MaSanPham"];
            $tenSP = $r["TenSanPham"];
            $SLT = $r["SoLuongTon"];
            $moTa = $r["MoTa"];
            $giaBan = $r["GiaBan"];
            $giaNhap = $r["GiaNhap"];
            $thuongHieu = $r["ThuongHieu"];
            $tenAnh = $r["HinhAnh"];
            $hsd = $r["HanSuDung"];
            $loaiSP = $r["LoaiSanPham"];
            $nhaCC = $r["NhaCungCap"];
        }
    }

    if (isset($_REQUEST["btnEditSP"])) {
        $ma = $_REQUEST["maSP"];
        $ten = $_REQUEST["tenSP"];
        $SLT = $_REQUEST["SLT"];
        $moTa = $_REQUEST["mota"];
        $giaBan = $_REQUEST["giaBan"];
        $giaNhap = $_REQUEST["giaNhap"];
        $thuongHieu = $_REQUEST["thuongHieu"];
        $tenAnh = $_FILES["tenAnh"];
        $hsd = $_REQUEST["HSD"];
        $loaiSP = $_REQUEST["loaiSP"];
        $nhaCC = $_REQUEST["nhaCC"];

        $result = $p->editProduct($ma, $ten, $SLT, $moTa, $giaBan, $giaNhap, $thuongHieu, $tenAnh, $hsd, $loaiSP, $nhaCC);

        if ($result == 1) {
            echo "<script>alert('Cập nhật sản phẩm thành công!')</script>";
            echo header("refresh: 0; url = 'indexAdmin.php?san-pham'");
        } elseif ($result == 0) {
            echo "<script>alert('Cập nhật sản phẩm thất bại!')</script>";
        } elseif ($result == -1) {
            echo "<script>alert('Ảnh không đúng định dạng!')</script>";
        } elseif ($result == -2) {
            echo "<script>alert('Ảnh quá kích cỡ!')</script>";
        } else
            echo "<script>alert('Không thể tải ảnh!')</script>";
    }
    ?>

    <div>
        <div id="update_info">
            <a href="./indexAdmin.php?san-pham"><i class="fas fa-backward"></i></a>
            <h2>Cập nhật thông tin</h2>
        </div>

        <?php
        echo "<h4>Mã sản phẩm: SP" . $maSP . "</h4>";
        ?>
    </div>

    <form action="#" method="post" enctype="multipart/form-data" onsubmit="return validateFormSP();">
        <div class="form-row">
            <div class="form-group col-md-5">
                <label>Mã sản phẩm</label>
                <input type="text" name="maSP" class="form-control" style="width: 600px; margin-bottom: 15px" value="<?php echo $maSP ?>" readonly>
            </div>
            <div class="form-group col-md-7">
                <label>Tên sản phẩm</label>
                <input type="text" name="tenSP" id="tenSP" class="form-control" style="width: 600px; margin-bottom: 15px" value="<?php echo $tenSP ?>"  aria-describedby="tenSP-messs">
                <small id="tenSP-mess"></small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label>Số lượng tồn</label>
                <input type="number" name="SLT" id="SLT" class="form-control" style="width: 600px; margin-bottom: 15px" value="<?php echo $SLT ?>"  aria-describedby="SLT-messs">
                <small id="SLT-mess"></small>
            </div>
            <div class="form-group col-md-7">
                <label>Mô tả</label>
                <textarea name="mota" id="moTa" class="form-control" style="width: 600px; margin-bottom: 15px" cols="30" rows="4"  aria-describedby="moTa-messs"><?php echo $moTa ?></textarea>
                <small id="moTa-mess"></small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label>Giá nhập</label>
                <input type="number" name="giaNhap" id="giaNhap" class="form-control" style="width: 600px; margin-bottom: 15px" value="<?php echo $giaNhap ?>" aria-describedby="giaNhap-messs">
                <small id="giaNhap-mess"></small>
            </div>
            <div class="form-group col-md-5">
                <label>Giá bán</label>
                <input type="number" name="giaBan" id="giaBan" class="form-control" style="width: 600px; margin-bottom: 15px" value="<?php echo $giaBan ?>" aria-describedby="giaBan-messs">
                <small id="giaBan-mess"></small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label>Thương hiệu</label>
                <input type="text" name="thuongHieu" id="thuongHieu" class="form-control" style="width: 600px; margin-bottom: 15px" value="<?php echo $thuongHieu ?>" aria-describedby="thuongHieu-messs">
                <small id="thuongHieu-mess"></small>
            </div>
            <div class="form-group col-md-7">
                <label>Hình ảnh</label>
                <img src="img/<?php echo $tenAnh ?>" alt="" width="100px">
                <input type="file" name="tenAnh" class="form-control" style="width: 600px; margin-bottom: 15px">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label>Hạn sử dụng</label>
                <input type="date" name="HSD" id="HSD" class="form-control" style="width: 600px; margin-bottom: 15px" value="<?php echo $hsd ?>" aria-describedby="HSD-messs">
                <small id="HSD-mess"></small>
            </div>
            <div class="form-group col-md-7">
                <label for="">Loại sản phẩm</label>
                <?php
                include_once("Controller/cLoaiSPAdmin.php");
                $cloai = new CLoaiSPAdmin();
                $tbl = $cloai->getAllLoaiSP();

                if (mysqli_num_rows($tbl) > 0) {
                    echo '<select name="loaiSP" class="form-control" style="width: 600px; margin-bottom: 15px">';
                    while ($r = mysqli_fetch_assoc($tbl)) {
                        if ($loaiSP == $r["LoaiSanPham"]) {
                            echo '<option selected value="' . $r["MaLoai"] . '">' . $r["TenLoai"] . '</option>';
                        } else {
                            echo '<option value="' . $r["MaLoai"] . '">' . $r["TenLoai"] . '</option>';
                        }
                    }
                    echo '</select>';
                }
                ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Nhà cung cấp</label>
                <?php
                include_once("Controller/cNhaCCAdmin.php");
                $ce = new CNhaCCAdmin();
                $tbl = $ce->getAllNCC();

                if (mysqli_num_rows($tbl) > 0) {
                    echo '<select name="nhaCC" class="form-control" style="width: 600px; margin-bottom: 15px">';
                    while ($r = mysqli_fetch_assoc($tbl)) {
                        if ($nhaCC == $r["NhaCungCap"]) {
                            echo '<option selected value="' . $r["MaNhaCungCap"] . '">' . $r["TenNhaCungCap"] . '</option>';
                        } else {
                            echo '<option value="' . $r["MaNhaCungCap"] . '">' . $r["TenNhaCungCap"] . '</option>';
                        }
                    }
                    echo '</select>';
                }
                ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group btnUpd">
                <input type="hidden" value="">
                <button type="reset" class="btnCus3 btnCus">Đặt lại</button>
                <button type="submit" name='btnEditSP' class="btnCus3 btnCus">Lưu</button>
            </div>
        </div>

    </form>

    <script src="../js/mainAdmin.js"></script>
</body>

</html>