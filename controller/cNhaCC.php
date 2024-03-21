<?php
    include_once("Model/mNhaCC.php");
    class CNhaCC{
        function getAllNCC(){
            $p = new MNhaCC();
            $tbl = $p -> selectAllNCC();
            return $tbl;
        }
    }
?>