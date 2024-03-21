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
    // include_one("Controller/acEmployee.php");
    $p = new controlPhieuKiemTraKho();
    $tblEdit = $p->getPhieuKiemTraKhoToEdit($_REQUEST["MaPhieuKiemTraKho"]);

    if (mysqli_num_rows($tblEdit) > 0) {
        while ($r = mysqli_fetch_assoc($tblEdit)) {
            $NgayKiemTra = $r["NgayKiemTra"];
            $TrangThaiKiemTra = $r["TrangThaiKiemTra"];
            $MaNhanVien = $r["MaNhanVien"];
            $MaSanPham = $r["MaSanPham"];

        }
    }

    if (isset($_REQUEST["btnEdit"])) {
            $MaPhieuKiemTraKho = $_REQUEST["MaPhieuKiemTraKho"];
            $NgayKiemTra = $_REQUEST["NKT"];
            $TrangThaiKiemTra = $_REQUEST["TTKT"];
            $MaNhanVien = $_REQUEST["MNV"];
            $MaSanPham = $_REQUEST["MSP"];

        $result = $p->editPhieuKiemTraKho($MaPhieuKiemTraKho, $NgayKiemTra, $TrangThaiKiemTra, $MaNhanVien, $MaSanPham);

        if ($result == 1) {
            echo "<script>alert('Edit Phiếu Kiểm Tra Kho successfully!')</script>";
            echo header("refresh: 0; url = 'indexQLKH.php?kiem-ke-kho'");
        } else{
            echo "<script>alert('Edit Phiếu Kiểm Tra Kho unsuccessfully!')</script>";
        }
    }
    ?>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-5">
                <label>Ngày kiểm tra</label>
                <input type="date" name="NKT" class="form-control" value="<?php echo $NgayKiemTra ?>" required>
            </div>
            <div class="form-group col-md-7">
                <label>Trạng thái kiểm tra</label>
                <input type="text" name="TTKT" class="form-control" value="<?php echo $TrangThaiKiemTra ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label>Mã nhân viên kho</label>
                <input type="text" name="MNV" class="form-control" value="<?php echo $MaNhanVien ?>" required>
            </div>
            <div class="form-group col-md-5">
                <label>Mã sản phẩm</label>
                <input type="text" name="MSP" class="form-control" value="<?php echo $MaSanPham ?>" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <input type="hidden" value="">
                <button type="reset" class="btnCus3 btnCus">Reset</button>
                <button type="submit" name='btnEdit' class="btnCus3 btnCus">Update</button>
            </div>
        </div>

    </form>
</body>

</html>