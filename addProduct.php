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
        // include("Controller/acProduct.php");
        if(isset($_REQUEST["btnAdd"])){
            $name = $_REQUEST["txtProdName"];
            $price = $_REQUEST["txtProdPrice"];
            $description = $_REQUEST["txtProdDescription"];
            $file = $_FILES["ProdImage"];
            $brand = $_REQUEST["txtBrandID"];
            $p = new AdControlProduct();
            $result = $p -> addProduct($name, $price, $file, $description, $brand);

            if($result ==1){
                echo"<script>alert('Add product successfully!')</script>";
                echo header("refresh: 0; url = 'admin.php?aProd'");
            }elseif($result == 0){
                echo"<script>alert('Add product unsuccessfully!')</script>";
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
                <label>ProdName</label>
                <input type="text" name="txtProdName" class="form-control" required>
            </div>
            <div class="form-group col-md-5">
                <label>ProdPrice</label>
                <input type="text" name="txtProdPrice" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label>ProdDescription</label>
            <input type="text" name="txtProdDescription" class="form-control" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label>ProdImage</label>
                <input type="file" name="ProdImage" class="form-control" required>
            </div>
            <div class="form-group col-md-5">
                <label>BrandID</label>
                <?php
                    include_once("Controller/cBrand.php");
                    $c = new ControlBrand();
                    $tbl = $c -> getAllBrand();

                    if(mysqli_num_rows($tbl)>0){
                        echo '<select name="txtBrandID" class="form-control">';
                        while ($r = mysqli_fetch_assoc($tbl)){
                            echo '<option value="'.$r[BrandID].'">'.$r[BrandName].'</option>';
                        }
                    }
                ?>
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