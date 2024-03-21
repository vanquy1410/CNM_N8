<?php

include_once("Model/mDanhsachsukien.php");
class controlDanhsachsukien{

    function getAllDanhsachsukien()
    {
        $p = new modelDanhsachsukien(); 
        $tbl = $p->SelectAllDanhsachsukien(); //trả về table
        return $tbl;
    }

    function getDeleteDanhsachsukien($masukien){
        $p = new modelDanhSachSuKien();
        $tbl = $p -> selectDelDanhsachsukien($masukien);
        return $tbl;
    }
    function getAllDanhsachsukienBySearch($search){
        $p = new modelDanhsachsukien();
        $tbl = $p -> selectAllDanhsachsukienBySearch($search);
        return $tbl;
    }
    function getDanhsachsukienToEdit($masukien){
        $p = new modelDanhsachsukien();
        $tbl = $p -> selectDanhsachsukienToEdit($masukien);
        return $tbl;
    }

    function editDanhsachsukien($masukien,$tensukien,$hinhthuc,$diadiem,$thoigianbatdau,$thoigianketthuc,$songuoithamdu,$mota,$tenAnh,$MaLich,$MaNguoiDung,$MaBTC,$MaNhanVien){
        $p = new modelDanhsachsukien();
        if($tenAnh['name'] == ''){
            $hinhAnh ="";
            $result = $p -> updateDanhsachsukien($masukien,$tensukien,$hinhthuc,$diadiem,$thoigianbatdau,$thoigianketthuc,$songuoithamdu,$mota,$hinhAnh,$MaLich,$MaNguoiDung,$MaBTC,$MaNhanVien);
            return $result ? 1 : 0;
        }else{
            $type = $tenAnh["type"];
            $size = $tenAnh["size"];
            $hinhAnh = $tenAnh["name"];

            if($type == 'image/jpg' || $type == 'image/png' || $type == 'image/jpeg'){
                if($size < 3*1024*1024){
                    if(move_uploaded_file($tenAnh["tmp_name"], 'img/'.$hinhAnh)){
                        $res = $p -> updateDanhsachsukien($masukien,$tensukien,$hinhthuc,$diadiem,$thoigianbatdau,$thoigianketthuc,$songuoithamdu,$mota,$hinhAnh,$MaLich,$MaNguoiDung,$MaBTC,$MaNhanVien);
                        if($res){
                            return 1; //update thành công
                        }else{
                            return 0; //update không thành công
                        }
                    }else{
                        return -3; //không thể upload ảnh
                    }
                }else{
                    return -2; //ảnh quá kích cỡ
                }
            }else{
                return -1; //ảnh không đúng định dạng
            }
        }
    }
    function addDanhsachsukien($tensukien,$hinhthuc,$diadiem,$thoigianbatdau,$thoigianketthuc,$songuoithamdu,$mota,$hinhAnh,$MaLich,$MaNguoiDung,$MaBTC,$MaNhanVien){
        $type = $hinhAnh["type"];
        $size = $hinhAnh["size"];
        $tenAnh = $tensukien.strstr($hinhAnh["name"], ".");

        if($type == 'image/jpg' || $type == 'image/png' || $type == 'image/jpeg'){
            if($size < 3*1024*1024){
                if(move_uploaded_file($hinhAnh["tmp_name"], 'img/'.$tenAnh)){
                    $p = new modelDanhsachsukien();
                    $res = $p -> insertDanhsachsukien($tensukien,$hinhthuc,$diadiem,$thoigianbatdau,$thoigianketthuc,$songuoithamdu,$mota,$tenAnh,$MaLich,$MaNguoiDung,$MaBTC,$MaNhanVien);
                    if($res){
                        return 1; //insert thành công
                    }else{
                        return 0; //insert không thành công
                    }
                }else{
                    return -3; //không thể upload ảnh
                }
            }else{
                return -2; //ảnh quá kích cỡ
            }
        }else{
            return -1; //ảnh không đúng định dạng
        }
    }

}