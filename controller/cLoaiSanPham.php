<?php
    include_once("Model/mLoaiSP.php");
    class CLoaiSP{
        function getAllLoaiSP(){
            $p = new MLoaiSP();
            $tbl = $p -> selectAllLoaiSP();
            return $tbl;
        }
    }
?>