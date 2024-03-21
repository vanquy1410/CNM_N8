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
        // include("Controller/acProduct.php");
        if(isset($_REQUEST["btnAddPXK"])){
            $NgayLapPhieuXuatKho = $_REQUEST["NLPXK"];
            $TrangThaiPhieuXuatKho = $_REQUEST["txtTTPXK"];
            $MaNhanVien = $_REQUEST["txtMNVK"];
            $MaSanPham = $_REQUEST["txtMSP"];
            $p = new controlPhieuKiemTraKho();
            $result = $p -> addPhieuKiemTraKho($NgayLapPhieuXuatKho,$TrangThaiPhieuXuatKho,$MaNhanVien,$MaSanPham);

            if($result ==1){
                echo"<script>alert('Add phieu xuat kho successfully!')</script>";
                echo header("refresh: 0; url = 'admin.php?aPhieuXuatKho'");
            }elseif($result == 0){
                echo"<script>alert('Add phieu xuat kho unsuccessfully!')</script>";
            }
        }
    ?>
    <form action="#" method="post" enctype = "multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-7">
                <label>Ngày Lập Phiếu Xuất Kho</label>
                <input type="date" name="NLPXK" class="form-control" required>
            </div>
            <div class="form-group col-md-5">
                <label>Trạng Thái Phiếu Xuất Kho</label>
                <input type="text" name="txtTTPXK" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label>Mã Nhân Viên Kho</label>
            <input type="text" name="txtMNVK" class="form-control" required>
        </div>
        
        </div>
        <div class="form-group">
            <label>Mã Sản Phẩm</label>
            <input type="text" name="txtMSP" class="form-control" required>
        </div>
        <div class="form-row test">
            <div class="form-group col-md-3">
            </div>
            <div class="form-group col-md-4">
                <input type="hidden" value="">
                <button type="reset" class="btnCus3 btnCus">Reset</button>
                <button type="submit" name='btnAddPXK' class="btnCus3 btnCus">Add</button>
            </div>
            <div class="form-group col-md-4">
            </div>
        </div>
        
    </form>
</body>
</html>