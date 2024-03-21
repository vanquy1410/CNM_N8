<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $p = new ControlDanhsachsukien();
    $tblEdit = $p->getDanhsachsukienToEdit($_REQUEST["masukien"]);

    if (mysqli_num_rows($tblEdit) > 0) {
        while ($r = mysqli_fetch_assoc($tblEdit)) {
            $masukien = $r["MaSuKien"];
            $tensukien = $r["TenSuKien"];
            $hinhthuc = $r["HinhThuc"];
            $diadiem = $r['DiaDiem'];
            $thoigianbatdau = $r["ThoiGianBatDau"];
            $thoigianketthuc = $r["ThoiGianKetThuc"];
            $songuoithamdu = $r["SoNguoiThamDu"];
            $mota = $r["MoTa"];
            $hinhAnh = $r["HinhAnh"];
            $MaLich = $r["MaLich"];
            $MaNguoiDung = $r["MaNguoiDung"];
            $MaBTC = $r["MaBTC"];
            $MaNhanVien = $r["MaNhanVien"];
        }
    }

    if (isset($_REQUEST["btnEditDSSK"])) {
        $masukien = $_REQUEST["MSK"];
        $tensukien = $_REQUEST["TSK"];
        $hinhthuc = $_REQUEST["HT"];
        $diadiem = $_REQUEST['ĐĐ'];
        $thoigianbatdau = $_REQUEST["TGBD"];
        $thoigianketthuc = $_REQUEST["TGKT"];
        $songuoithamdu = $_REQUEST["SNTD"];
        $mota = $_REQUEST["MT"];
        $hinhAnh = $_FILES["hinhAnh"];
        $MaLich = $_REQUEST["ML"];
        $MaNguoiDung = $_REQUEST["MND"];
        $MaBTC = $_REQUEST["MBTC"];
        $MaNhanVien = $_REQUEST["MNV"];

        $result = $p->editDanhsachsukien($masukien,$tensukien,$hinhthuc,$diadiem,$thoigianbatdau,$thoigianketthuc,$songuoithamdu,$mota,$hinhAnh,$MaLich,$MaNguoiDung,$MaBTC,$MaNhanVien);

        if ($result == 1) {
            echo "<script>alert('Edit event successfully!')</script>";
            echo header("refresh: 0; url = 'indexQLKH.php?danh-sach-su-kien'");
        } elseif ($result == 0) {
            echo "<script>alert('Edit event unsuccessfully!')</script>";
        } elseif ($result == -1) {
            echo "<script>alert('This file is not image format!')</script>";
        } elseif ($result == -2) {
            echo "<script>alert('This file is too lagre to upload!')</script>";
        } else
            echo "<script>alert('Can not upload file!')</script>";
    }
    ?>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-5">
                <label>Mã sự kiện</label>
                <input type="text" name="MSK" class="form-control" value="<?php echo $masukien ?>" required>
            </div>
            <div class="form-group col-md-7">
                <label>Tên sự kiện</label>
                <input type="text" name="TSK" class="form-control" value="<?php echo $tensukien ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label>Hình thức</label>
                <input type="text" name="HT" class="form-control" value="<?php echo $hinhthuc ?>" required>
            </div>
            <div class="form-group col-md-7">
                <label>Địa điểm</label>
                <input type="text" name="ĐĐ" class="form-control" value="<?php echo $diadiem ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label>Thời gian bắt đầu</label>
                <input type="date" name="TGBD" class="form-control" value="<?php echo $thoigianbatdau ?>" required>
            </div>
            <div class="form-group col-md-7">
                <label>Thời gian kết thúc</label>
                <input type="date" name="TGKT" class="form-control" value="<?php echo $thoigianketthuc ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label>Số người tham dự</label>
                <input type="number" name="SNTD" class="form-control" value="<?php echo $songuoithamdu ?>" required>
            </div>
            <div class="form-group col-md-7">
                <label>Mô tả</label>
                <input type="text" name="MT" class="form-control" value="<?php echo $mota ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label>Hình ảnh</label>
                <img src="image/<?php echo $hinhAnh ?>" alt="" width="100px">
                <input type="file" name="hinhAnh" class="form-control">
            </div>
            <div class="form-group col-md-7">
                <label>Mã lịch</label>
                <input type="text" name="ML" class="form-control" value="<?php echo $MaLich ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label>Mã người dùng</label>
                <input type="text" name="MND" class="form-control" value="<?php echo $MaNguoiDung ?>" required>
            </div>
            <div class="form-group col-md-7">
                <label>Mã ban tổ chức</label>
                <input type="text" name="MBTC" class="form-control" value="<?php echo $MaBTC ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label>Mã nhân viên</label>
                <input type="text" name="MNV" class="form-control" value="<?php echo $MaNhanVien ?>" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <input type="hidden" value="">
                <button type="reset" class="btnCus3 btnCus">Reset</button>
                <button type="submit" name='btnEditDSSK' class="btnCus3 btnCus">Update</button>
            </div>
        </div>

    </form>
</body>

</html>