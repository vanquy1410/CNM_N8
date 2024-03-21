<?php
    include_once("connect3.php");
    class modelDanhsachsukien{
        function selectAllDanhsachsukien(){
            // $con;
            $p = new KetNoiDB();
            if ($p ->moketnoi($con)) {
                $query="SELECT sk.masukien,sk.trangThai, sk.tensukien,sk.hinhthuc,sk.diadiem, sk.thoigianbatdau, sk.thoigianketthuc,sk.songuoithamdu,sk.mota,sk.hinhanh
                , nd.MaNguoiDung,nd.TenNguoiDung,l.MaLich,btc.MaBTC,nv.MaNhanVien
                FROM sukien sk
                INNER JOIN nguoidung nd ON sk.MaNguoiDung = nd.MaNguoiDung 
                INNER JOIN lich l ON sk.MaLich = l.MaLich
                INNER JOIN bantochuc btc ON sk.MaBTC = btc.MaBTC
                INNER JOIN nhanvien nv ON sk.MaNhanVien = nv.MaNhanVien 
                ";
                $tbl=mysqli_query($con,$query);
                $p->dongketnoi($con);
                return $tbl;
            } else {
                return false;
            }
        }
        
        function selectAllDanhsachsukienBySearch($search){
            // $con;
            $p=new KetNoiDB();
            if ($p->moKetNoi($con)) {
                $string = "SELECT SELECT sk.masukien,sk.trangThai, sk.tensukien,sk.hinhthuc,sk.diadiem, sk.thoigianbatdau, sk.thoigianketthuc,sk.songuoithamdu,sk.mota,sk.hinhanh
                , nd.MaNguoiDung,nd.TenNguoiDung,l.MaLich,btc.maBTC,nv.MaNhanVien
                FROM sukien sk
                INNER JOIN nguoidung nd ON sk.MaNguoiDung = nd.MaNguoiDung 
                INNER JOIN lich l ON sk.MaLich = l.MaLich
                INNER JOIN bantochuc btc ON sk.MaBTC = btc.MaBTC
                INNER JOIN nhanvien nv ON sk.MaNhanVien = nv.MaNhanVien 
                where TenSuKien like N'%".$search."%' order by MaSuKien Desc";
                $table=mysqli_query($con,$string);
                $p->dongketnoi($con);
                return $table;
            } else {
                return false;
            }
            
        }
        function selectDanhsachsukienToEdit($masukien){
            $p = new KetNoiDB();
            // $con;
            if($p -> moKetNoi($con)){
                $string = "SELECT * FROM sukien WHERE masukien = '$masukien' LIMIT 1 ;";
                $tbl = mysqli_query($con,$string);
                $p -> dongKetNoi($con);
                return $tbl;
            }else{
                return false;
            }
        }
        function selectDelDanhsachsukien($masukien){
            // $con;
            $p = new KetNoiDB();
            if($p -> moKetNoi($con)){
                $string = "UPDATE `qlsukienhoithao`.`sukien` SET `trangThai` = '0' WHERE `sukien`.`masukien` =$masukien LIMIT 1 ;";
                $result = mysqli_query($con,$string);
                $p -> dongKetNoi($con);
                return $result;
            }else{
                return false; //ket noi that bai
            }
        }
        function updateDanhsachsukien($masukien,$tensukien,$hinhthuc,$diadiem,$thoigianbatdau,$thoigianketthuc,$songuoithamdu,$mota,$hinhAnh,$MaLich,$MaNguoiDung,$MaBTC,$MaNhanVien){
            $p = new KetNoiDB();
            $con;
            if($p -> moketnoi($con)){
                if($hinhAnh != ""){ // nếu có hình
                    $img = " `HinhAnh` = '$hinhAnh',";
                }else{
                    $img = "";
                }
                $string = "UPDATE `sukien` SET   
                `TenSuKien` =  '$tensukien',
                `HinhThuc` =  '$hinhthuc',
                `DiaDiem` =  '$diadiem',
                `ThoiGianBatDau` =  '$thoigianbatdau',
                `ThoiGianKetThuc` =  '$thoigianketthuc',
                `SoNguoiThamDu` =  '$songuoithamdu', 
                `MoTa` =  '$mota',  
                $img  
                `MaLich` =  '$MaLich', 
                `MaNguoiDung` =  '$MaNguoiDung', 
                `MaBTC` =  '$MaBTC',  
                `MaNhanVien` =  '$MaNhanVien'
                 WHERE `MaSuKien` = '$masukien';
                ";
                $tbl = mysqli_query($con,$string);
                $p -> dongKetNoi($con);
                return $tbl;
            }else{
                return false;
            }
        }
    


        function insertDanhsachsukien($tensukien,$hinhthuc,$diadiem,$thoigianbatdau,$thoigianketthuc,$songuoithamdu,$mota,$tenAnh,$MaLich,$MaNguoiDung,$MaBTC,$MaNhanVien)
        {
            $con;
            $p = new KetNoiDB();
            if($p -> moKetNoi($con)){
                $string ="INSERT INTO `sukien` (
                `TenSuKien`, 
                `HinhThuc`, 
                `DiaDiem`, 
                `ThoiGianBatDau`, 
                `ThoiGianKetThuc`, 
                `SoNguoiThamDu`,
                `MoTa`, 
                `HinhAnh`,
                `MaLich`, 
                `MaNguoiDung`,
                `MaBTC`, 
                `MaNhanVien`,  
                `trangThai`)
                VALUES (
                '$tensukien','$hinhthuc', '$diadiem', '$thoigianbatdau','$thoigianketthuc','$songuoithamdu','$mota','$tenAnh','$MaLich','$MaNguoiDung','$MaBTC','$MaNhanVien', '1'
                );";
                $result = mysqli_query($con,$string);
                $p -> dongKetNoi($con);
                return $result;
            }else{
                return false; //ket noi that bai
            }
        }
    
    }
?>
