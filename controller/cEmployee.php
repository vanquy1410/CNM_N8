<?php
    include_once("Model/mEmployee.php");
    class CEmployee{
        function getAllEmployees(){
            $p = new MEmployee();
            $tbl = $p -> selectAllEmployees();
            return $tbl;
        }
    }
?>