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
        // include("Controller/acProduct.php"); 1
        if(isset($_REQUEST["btnAddPKTK"])){
            $NgayKiemTra = $_REQUEST["NKT"];
            $TrangThaiKiemTra = $_REQUEST["txtTTKT"];
            $MaNhanVien = $_REQUEST["txtMNVK"];
            $MaSanPham = $_REQUEST["txtMSP"];
            $p = new controlPhieuKiemTraKho();
            $result = $p -> addPhieuKiemTraKho($NgayKiemTra,$TrangThaiKiemTra,$MaNhanVien,$MaSanPham);

            if($result ==1){
                echo"<script>alert('Add phieu nhap kho successfully!')</script>";
                echo header("refresh: 0; url = 'admin.php?aPhieuNhapKho'");
            }elseif($result == 0){
                echo"<script>alert('Add phieu nhap kho unsuccessfully!')</script>";
            }
        }
    ?>
<form action="#" method="post" enctype = "multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-7">
                <label>Ngày Kiểm Tra</label>
                <input type="date" name="NKT" class="form-control" required>
            </div>
            <div class="form-group col-md-5">
                <label>Trạng thái kiểm tra</label>
                <input type="text" name="txtTTKT" class="form-control" required>
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
                <button type="submit" name='btnAddPKTK' class="btnCus3 btnCus">Add</button>
            </div>
            <div class="form-group col-md-4">
            </div>
        </div>
        
    </form>
</body>
</html>