<?php
    include_once("Model/mLoaiNVAdmin.php");
    class CLoaiNVAdmin{
        function getAllLoaiNV(){
            $p = new MLoaiNV();
            $tbl = $p -> selectAllLoaiNV();
            return $tbl;
        }
    }
?>