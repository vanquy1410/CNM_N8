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
        if(isset($_REQUEST["btnAdd"])){
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
            $p = new ControlDanhsachsukien();
            $result = $p -> addDanhsachsukien($tensukien,$hinhthuc,$diadiem,$thoigianbatdau,$thoigianketthuc,$songuoithamdu,$mota,$hinhAnh,$MaLich,$MaNguoiDung,$MaBTC,$MaNhanVien);

            if($result ==1){
                echo"<script>alert('Add event successfully!')</script>";
                echo header("refresh: 0; url = 'admin.php?aEvent'");
            }elseif($result == 0){
                echo"<script>alert('Add event unsuccessfully!')</script>";
            }elseif($result ==-1){
                echo"<script>alert('This file is not image format!')</script>";
            }elseif($result ==-2){
                echo"<script>alert('This file is too lagre to upload!')</script>";
            }else
                echo"<script>alert('Can not upload file!')</script>";
        }
    ?>
    <form action="#" method="post" enctype = "multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-7">
                <label for="TSK">Tên sự kiện</label>
                <input type="text" name="TSK" id="TSK" class="form-control" required>
            </div>
            <div class="form-group col-md-5">
                <label for="HT">Hình thức</label>
                <input type="text" name="HT" id="HT" class="form-control" required>
            </div>
        </div>
            <div class="form-group">
                <label for="ĐĐ">Địa điểm</label>
                <input type="text" name="ĐĐ" id="ĐĐ" class="form-control" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-7">
                    <label for="TGBD">Thời gian bắt đầu</label>
                    <input type="date" name="TGBD" id="TGBD" class="form-control" required>
                </div>
                <div class="form-group col-md-5">
                    <label for="TGKT">Thời gian kết thúc</label>
                    <input type="date" name="TGKT" id="TGKT" class="form-control"  required>
                </div>
            </div>
            <div class="form-group">
                    <label for="SNTD">Số người tham dự</label>
                    <input type="test" name="SNTD" id="SNTD" class="form-control" required>
            </div>
            <div class="form-group">
                    <label for="MT">Mô tả</label>
                    <input type="test" name="MT" id="MT" class="form-control" required>
            </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label for="">Hình ảnh</label>
                <input type="file" name="hinhAnh" class="form-control" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label>Mã lịch</label>
                <input type="text" name="ML" class="form-control" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label>Mã người dùng</label>
                <input type="text" name="MND" class="form-control" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label>Mã ban tổ chức</label>
                <input type="text" name="MBTC" class="form-control" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label>Mã nhân viên</label>
                <input type="text" name="MNV" class="form-control" required>
            </div>
        </div>

        <div class="form-row test">
            <div class="form-group col-md-3">
            </div>
            <div class="form-group col-md-4">
                <input type="hidden" value="">
                <button type="reset" class="btnCus3 btnCus">Reset</button>
                <button type="submit" name='btnAdd' class="btnCus3 btnCus">Add</button>
            </div>
            <div class="form-group col-md-4">
            </div>
        </div>
        
    </form>
</body>
</html>