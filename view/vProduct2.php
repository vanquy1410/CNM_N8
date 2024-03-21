<?php
    include_once("controller/cProduct.php");
    class VProduct2{
        function viewAllProducts(){
            $p = new CProduct();
            $tbl = $p -> getAllProducts();
            showProduct($tbl);
        }
    }

    function showProduct($tbl){
        if($tbl){
            if(mysqli_num_rows($tbl) >0){
                if ($row = mysqli_fetch_assoc($tbl)){
                
                    while($row = mysqli_fetch_assoc($tbl)){
                        if($row["trangThai"] == 1){
                            elseif(isset($_REQUEST["search"])){
                                $search = $_REQUEST["search"];
                                $tbl = $p->getBySearch($search);
                            
                        
                        
                    echo "
                        <div class='col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat'>
                            <div class='featured__item'>
                                <div class='featured__item__pic set-bg'>
                                <img src='img/".$row['HinhAnh']."'/>
                                    <ul class='featured__item__pic__hover'>
                                        <li><a href='#'><i class='fa fa-shopping-cart'></i></a></li>
                                        <li><a href='./xemsanpham.php'><i class='fa fa-search'></i></li>
                                    </ul>
                                </div>
                                <div class='featured__item__text'>
                                    <h6><a href='#'>".$row["TenSanPham"]."</a></h6>
                                    <h5>".number_format($row["GiaBan"], 0, ',', '.')."đ</h5>
                                </div>
                            </div>
                        </div>
                            ";
                
                        }
                    }
               
            } }
        }else{
            echo"Vui lòng nhập dữ liệu!";
        }
    }
}
?>

