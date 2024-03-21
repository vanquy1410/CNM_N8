
<?php
    include_once("controller/cDanhsachsukien.php");
    class VDanhsachsukien{
        function viewAllDanhsachsukien(){
            $a = new controlDanhsachsukien();
            $tbl = $a -> getAllDanhsachsukien();
            showDanhsachsukien($tbl);
        }
        function viewAllDanhsachsukienBySearch($search){
            $a = new controlDanhsachsukien();
            if(isset($_REQUEST['txtSearchDSSK'])){
                $tbl = $a -> getAllDanhsachsukienBySearch($search);
            }
            showDanhsachsukien($tbl);
        }
        function showFormEditDanhsachsukien(){
            $a = new controlDanhsachsukien();
            if(isset($_REQUEST["btnSubmitActionDanhsachsukien"])){
                if($_REQUEST["btnSubmitActionDanhsachsukien"] == "edit"){
                    include("editDanhsachsukien.php");
                    // return $result;
                }
            }
        }
        function showFormDelDanhsachsukien(){
            $a = new controlDanhsachsukien();
                if(isset($_REQUEST["btnSubmitActionDanhsachsukien"])) { //
                    if ($_REQUEST["btnSubmitActionDanhsachsukien"] == "delete"){
                        $result = $a -> getDeleteDanhsachsukien($_REQUEST["masukien"]);
                        echo header("refresh:0; url='indexQLKH.php?danh-sach-su-kien'");
                        return $result;
                    }
                }
        }
    }
        function showDanhsachsukien($tbl){
            if($tbl){
                if(mysqli_num_rows($tbl) >0){
                    $dem=0;
                    echo '
                    <div id="danh-sach-su-kien" class="container tab-pane active"><br>
                    <div class="row timKiem-them">
                        <div class="timKiem input-group mb-3 col-md-5">
                            <form action="indexQLKH.php" method="get">
                                     <input type="text" name="txtSearchDSSK" size="18" placeholder = "Search" value = "';
                                     if(isset($_REQUEST["txtSearchDSSK"])) echo $_REQUEST["txtSearchDSSK"];
                                     echo '" >
                                     <input type="submit" name="btnSearchDSSK" class="btnCus" value="Search"> 
                            </form>
                        </div>
    
                        <div class="timKiem col-md-4">
                            <h2>DANH SÁCH SỰ KIỆN</h2>
                        </div>
                        <div class="timKiem themDSSK col-md-3">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalDSSK">
                                Thêm sự kiện
                            </button>
                        </div>
                    </div>
                    </div>
                    ';
                    echo "<table class='dssk_tbl'> <tr>";
                        echo'
                        <table class="table table-bordered table-hover " id="myTable">
                        <thead class="table-secondary">
                                <tr class="ex">
                                <th width="auto">Mã sự kiện</th>
                                <th width="auto">Tên sự kiện</th>
                                <th>Hình thức</th>
                                <th>Địa điểm</th>
                                <th>Thời gian bắt đầu</th>
                                <th>Thời gian kết thúc</th>
                                <th>Số người tham dự</th>
                                <th>Mô tả</th>
                                <th>Hình ảnh</th>
                                <th>Mã Lịch</th>
                                <th>Mã người dùng</th>
                                <th>Mã BTC</th>
                                <th>Mã nhân viên</th>
                                <th>Tính năng</th>
                            </tr>
                        </thead>
                        ';
                        while($row = mysqli_fetch_assoc($tbl)){
                            if($row["trangThai"] == 1){
                                echo "<tr >";
                                    echo "<td>"."MSK". $row['masukien'] ."</td>";
                                    echo "<td>". $row['tensukien'] ."</td>";
                                    echo "<td>". $row['hinhthuc'] ."</td>";
                                    echo "<td>". $row['diadiem'] ."</td>";  
                                    echo "<td>". $row['thoigianbatdau'] ."</td>"; 
                                    echo "<td>". $row['thoigianketthuc'] ."</td>";
                                    echo "<td>". $row['songuoithamdu'] ."</td>";
                                    echo "<td>". $row['mota'] ."</td>";   
                                    echo "<td>"."<img src='img/".$row["hinhanh"]."' alt='".$row["hinhanh"]."' width= '50px' height= '50px'>"."</td>"; 
                                    echo "<td>". $row['MaLich'] ."</td>";
                                    echo "<td>". $row['MaNguoiDung'] ."</td>";
                                    echo "<td>". $row['MaBTC'] ."</td>";
                                    echo "<td>". $row['MaNhanVien'] ."</td>";
                                echo "<td>
                                        <form action='#' method='get'>
                                        <input type='hidden' name='masukien' value='" . $row["masukien"] . "'>
                                        <button class='btnCus btn2 edit' type='submit' value='edit' name= 'btnSubmitActionDanhsachsukien'>
                                            <i class='fa fa-pencil' aria-hidden='true'></i>
                                        </button>
                                    </form>
                                    <form action='#' method='get'onsubmit='return confirmDelete();'>
                                        <input type='hidden' name='masukien' value='" . $row["masukien"] . "'>
                                        
                                        <button class='btnCus btn2 delete' type='submit' value='delete' name= 'btnSubmitActionDanhsachsukien'>
                                            <i class='fa fa-trash-o' aria-hidden='true'></i>
                                        </button>
                                        </form>
                                    </td>";
                                echo "</tr>";
                            }
                        }
                        echo "</table>";
            }else{
                echo"Không tìm thấy danh sách!";
                echo header("refresh: 5; url='indexQLKH.php?danh-sach-su-kien'");
            }
        }
        }
    ?>
 