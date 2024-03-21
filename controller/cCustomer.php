<?php
    include_once("Model/mCustomer.php");
    class CCustomer{
        function getAllCustomers(){
            $p = new MCustomer();
            $tbl = $p -> selectAllCustomers();
            return $tbl;
        }
    }
?>