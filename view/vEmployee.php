<?php
    include_once("controller/cEmployee.php");
    class VEmployee{
        function viewAllEmployees(){
            $p = new CEmployee();
            $tbl = $p -> getAllEmployees();
            showEmployee($tbl);
        }
    }

    function showEmployee($tbl){
        if($tbl){
            if(mysqli_num_rows($tbl) >0){
                $dem=0;
                echo "<table class='prod_tbl'> <tr>";
                if ($row = mysqli_fetch_assoc($tbl)){
                    echo'
                    <table class="table table-bordered table-hover " id="myTable">
                    <thead class="table-secondary">
                        <tr class="ex">
                            <th width="auto">Mã NV</th>
                            <th width="auto">Tên NV</th>
                            <th>Mật khẩu</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>Loại NV</th>
                            <th class="tinh-nang">Tính Năng</th>
                        </tr>
                    </thead>
                    ';
                    while($row = mysqli_fetch_assoc($tbl)){
                        if($row["trangThai"] == 1){
                            echo "<tr >";
                            echo "<td>".$row["MaNhanVien"]."</td>";
                            echo "<td>".$row["HoTen"]."</td>";
                            echo "<td>".$row["MatKhau"]."</td>";
                            echo "<td>".$row["Email"]."</td>";
                            echo "<td>".$row["SoDienThoai"]."</td>";
                            echo "<td>".$row["DiaChi"]."</td>";
                            echo "<td>".$row["LoaiNhanVien"]."</td>";
                            echo "<td>
                                    <form action='#' method='get'>
                                        <input type='hidden' name='MaNhanVien' value='" . $row["MaNhanVien"] . "'>
                                        <button class='btnCus btn2 edit' type='submit' value='edit' name= 'btnProdAct'>
                                            <i class='fa fa-pencil' aria-hidden='true'></i>
                                        </button>
                                        <button class='btnCus btn2 delete' type='submit' value='delete' name= 'btnProdAct'>
                                            <i class='fa fa-trash-o' aria-hidden='true'></i>
                                        </button>
                                    </form>
                                </td>";
                            echo "</tr>";
                        }
                    }
                    echo "</table>";
            }
        }else{
            echo"Vui lòng nhập dữ liệu!";
        }
    }
}
?>

