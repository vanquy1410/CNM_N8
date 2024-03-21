<?php
session_start();
ob_start();
$conn = mysqli_connect("localhost", "root", "", "mypham");
$_SESSION['role'] = 'admin';

if (!isset($_SESSION['MaNhanVien'])) {
    header('location: /admin/login.php');
    exit();
}

// if (!isset($_SESSION['LoaiNhanVien']) || empty($_SESSION['LoaiNhanVien'])) {
//     header('location: ./admin/login.php');
//     exit();
// }

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset();
    session_destroy();
    header('location: ./admin/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUẢN LÝ CỬA HÀNG</title>
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="./css/styleAdmin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        small {
            color: red;
        }
    </style>
</head>



<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 header">
                <a class="navbar-brand" href="#"><i class="fa fa-user-circle" aria-hidden="true"></i>
                    <?php
                    if (isset($_SESSION['MaNhanVien'])) {
                        $tenTaiKhoan = $_SESSION['MaNhanVien'];
                        $name = mysqli_query($conn, "SELECT * FROM `nhanvien` WHERE `MaNhanVien`= $tenTaiKhoan");
                        $kq = mysqli_fetch_array($name);
                        echo $kq["HoTen"];
                    }
                    ?>
                </a>
                <a href="?action=logout" data-toggle="tooltip" data-placement="bottom" title="ĐĂNG XUẤT"><b>Đăng xuất <i class="fas fa-sign-out-alt"></i></b></a>
            </div>
        </div>
    </div>
    <div class="container mt-3 body">
        <br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item menu">
                <a class="nav-link <?php echo isset($_REQUEST['nhan-vien']) ? "active" : ""; ?>" href="indexAdmin.php?nhan-vien">NHÂN VIÊN</a>
            </li>
            <li class="nav-item menu">
                <a class="nav-link <?php echo isset($_REQUEST['san-pham']) ? "active" : ""; ?>" href="indexAdmin.php?san-pham">SẢN PHẨM</a>
            </li>
            <li class="nav-item menu">
                <a class="nav-link <?php echo isset($_REQUEST['khach-hang']) ? "active" : ""; ?>" href="indexAdmin.php?khach-hang">KHÁCH HÀNG</a>
            </li>
            <li class="nav-item menu">
                <a class="nav-link <?php echo isset($_REQUEST['thong-ke']) ? "active" : ""; ?>" href="indexAdmin.php?thong-ke">THỐNG KÊ</a>
            </li>
            <li class="nav-item menu">
                <a class="nav-link <?php echo isset($_REQUEST['ban-hang']) ? "active" : ""; ?>" href="indexNVBH.php">QUẢN LÝ BÁN HÀNG</a>
            </li>
            <li class="nav-item menu">
                <a class="nav-link <?php echo isset($_REQUEST['kho']) ? "active" : ""; ?>" href="indexQLKH.php">QUẢN LÝ
                    KHO</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <!-- quản lý nhân viên  -->
            <?php
            include_once("view/vEmployeeAdmin.php");
            $p = new VEmployee();

            include_once("view/vProductAdmin.php");
            $c = new VProductAdmin();

            include_once("view/vCustomerAdmin.php");
            $d = new VCustomer();

            if (isset($_REQUEST['nhan-vien'])) {
                $p->viewAllEmployees();
            } elseif (isset($_REQUEST['san-pham'])) {
                $c->viewAllProducts();
            } elseif (isset($_REQUEST['khach-hang'])) {
                $d->viewAllCustomers();
            } elseif (isset($_REQUEST['btnSearchNV'])) {
                $p->viewAllEmployeeBySearch($_REQUEST['txtSearchNV']);
            } elseif (isset($_REQUEST['btnSearchSP'])) {
                $c->viewAllProductBySearch($_REQUEST['txtSearchSP']);
            } elseif (isset($_REQUEST['btnSearchKH'])) {
                $d->viewAllCustomerBySearch($_REQUEST['txtSearchKH']);
            } elseif (isset($_REQUEST["btnProdAct"])) {
                $c->showFormDelProduct();
                $c->showFormEditProduct();
            } elseif (isset($_REQUEST["btnEmpAct"])) {
                $p->showFormDelEmployee();
                $p->showFormEditEmployee();
            } elseif (isset($_REQUEST["btnCusAct"])) {
                $d->showFormDelCustomer();
            } elseif (isset($_REQUEST["thong-ke"])) {
                include("./thongke.php");
            } else {
                echo "<img class='img-admin' src='./img/admin.png' alt=''>";
            }

            //thêm nhân viên
            if (isset($_REQUEST["btnAddEmp"])) {
                $hoten = $_REQUEST["hoTen"];
                $matkhau = $_REQUEST["matkhau"];
                $email = $_REQUEST["Email"];
                $sdt = $_REQUEST["SDT"];
                $diachi = $_REQUEST["DiaChi"];
                $loainv = $_REQUEST["LoaiNV"];
                // include_once("controller/cEmployee.php");
                $cem = new CEmployeeAdmin();
                $result = $cem->addEmployee($hoten, $matkhau, $email, $sdt, $diachi, $loainv);

                if ($result == 1) {
                    echo "<script>alert('Thêm nhân viên thành công!')</script>";
                    echo header("refresh: 0; url = 'indexAdmin.php?nhan-vien'");
                } else {
                    echo "<script>alert('Thêm thất bại!')</script>";
                }
            }



            //thêm sản phẩm
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_REQUEST["btnAddProd"])) {

                    $tenSP = $_REQUEST["tenSP"];
                    $slt = $_REQUEST["SLT"];
                    $moTa = $_REQUEST["moTa"];
                    $giaBan = $_REQUEST["giaBan"];
                    $giaNhap = $_REQUEST["giaNhap"];
                    $thuongHieu = $_REQUEST["thuongHieu"];
                    $hinhAnh = $_FILES["fileAnh"];
                    $hsd = $_REQUEST["HSD"];
                    $loaiSP = $_REQUEST["LoaiSP"];
                    $nhaCC = $_REQUEST["nhaCC"];
                    $cp = new CProductAdmin();
                    $result = $cp->addProduct($tenSP, $slt, $moTa, $giaBan, $giaNhap, $thuongHieu, $hinhAnh, $hsd, $loaiSP, $nhaCC);

                    if ($result == 1) {
                        echo "<script>alert('Thêm sản phẩm thành công!')</script>";
                        // header("refresh: 0; url = 'indexAdmin.php?san-pham'");
                        echo "<meta http-equiv='refresh' content='0;url='./indexAdmin?san-pham''>";
                    } elseif ($result == 0) {
                        echo "<script>alert('Thêm sản phẩm tháta bại!')</script>";
                    } elseif ($result == -1) {
                        echo "<script>alert('Ảnh không đúng định dạng!')</script>";
                    } elseif ($result == -2) {
                        echo "<script>alert('Ảnh quá kích cỡ!')</script>";
                    } else {
                        echo "<script>alert('Không thể tải ảnh!')</script>";
                    }
                }
            }
            ?>
        </div>

    </div>


    <!-- Modal Them san pham -->
    <div class="modal fade" id="modalThemSP" tabindex="-1" aria-labelledby="modalThemSPLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">THÔNG TIN SẢN PHẨM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data" onsubmit="return validateFormSP();">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="tenSP" id="tenSP" class="form-control" aria-describedby="tenSP-messs">
                            <small id="tenSP-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Số lượng tồn</label>
                            <input type="number" name="SLT" id="SLT" class="form-control" aria-describedby="SLT-messs">
                            <small id="SLT-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <input type="text" name="moTa" id="moTa" class="form-control" aria-describedby="moTa-messs">
                            <small id="moTa-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Giá nhập</label>
                            <input type="number" name="giaNhap" id="giaNhap" class="form-control" aria-describedby="giaNhap-messs">
                            <small id="giaNhap-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Giá bán</label>
                            <input type="number" name="giaBan" id="giaBan" class="form-control" aria-describedby="giaBan-messs">
                            <small id="giaBan-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Thương hiệu</label>
                            <input type="text" name="thuongHieu" id="thuongHieu" class="form-control" aria-describedby="thuongHieu-messs">
                            <small id="thuongHieu-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" name="fileAnh" class="form-control">
                            <small id="hinhAnh-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Hạn sử dụng</label>
                            <input type="date" name="HSD" id="HSD" class="form-control" aria-describedby="HSD-messs">
                            <small id="HSD-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Loại sản phẩm</label>
                            <!-- <select name="ChucVu" id="ChucVu" class="form-control">
                                        <option value="1">Nhân viên bán hàng</option>
                                        <option value="2">Nhân viên kho</option>
                                    </select>
                                    <small id="DiaChi-mess"></small> -->
                            <?php
                            include_once("Controller/cLoaiSPAdmin.php");
                            $cloai = new CLoaiSPAdmin();
                            $tbl = $cloai->getAllLoaiSP();

                            if (mysqli_num_rows($tbl) > 0) {
                                echo '<select name="LoaiSP" class="form-control">';
                                while ($r = mysqli_fetch_assoc($tbl)) {
                                    echo '<option value="' . $r["MaLoai"] . '">' . $r["TenLoai"] . '</option>';
                                }
                                echo '</select>';
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="">Nhà cung cấp</label>
                            <?php
                            include_once("Controller/cNhaCCAdmin.php");
                            $ce = new CNhaCCAdmin();
                            $tbl = $ce->getAllNCC();

                            if (mysqli_num_rows($tbl) > 0) {
                                echo '<select name="nhaCC" class="form-control">';
                                while ($r = mysqli_fetch_assoc($tbl)) {
                                    echo '<option value="' . $r["MaNhaCungCap"] . '">' . $r["TenNhaCungCap"] . '</option>';
                                }
                                echo '</select>';
                            }
                            ?>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                        <button type="submit" name="btnAddProd" class="btn btn-success">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!-- Modal Them Nhan Vien -->
    <div class="modal fade" id="modalThemNV" tabindex="-1" aria-labelledby="modalThemNVLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">THÔNG TIN NHÂN VIÊN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data" onsubmit="return validateFormNV();">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text" name="hoTen" id="hoTen" class="form-control" aria-describedby="hoTen-messs">
                            <small id="hoTen-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="text" name="matkhau" id="matkhau" class="form-control" aria-describedby="matkhau-messs">
                            <small id="matkhau-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="Email" id="Email" class="form-control" aria-describedby="Email-messs">
                            <small id="Email-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" name="SDT" id="SDT" class="form-control" aria-describedby="SDT-messs">
                            <small id="SDT-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" name="DiaChi" id="DiaChi" class="form-control" aria-describedby="DiaChi-messs">
                            <small id="DiaChi-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Loại nhân viên</label>
                            <!-- <select name="ChucVu" id="ChucVu" class="form-control">
                                        <option value="1">Nhân viên bán hàng</option>
                                        <option value="2">Nhân viên kho</option>
                                    </select>
                                    <small id="DiaChi-mess"></small> -->
                            <?php
                            include_once("Controller/cLoaiNVAdmin.php");
                            $ce = new CLoaiNVAdmin();
                            $tbl = $ce->getAllLoaiNV();

                            if (mysqli_num_rows($tbl) > 0) {
                                echo '<select name="LoaiNV" class="form-control">';
                                while ($r = mysqli_fetch_assoc($tbl)) {
                                    if ($r["MaLoaiNhanVien"] != 3) {
                                        echo '<option value="' . $r["MaLoaiNhanVien"] . '">' . $r["GhiChu"] . '</option>';
                                    }
                                }
                                echo '</select>';
                            }
                            ?>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                        <button type="submit button" name="btnAddEmp" class="btn btn-success">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Bạn có chắc chắn muốn xóa không?");
        }

        // document.addEventListener('DOMContentLoaded', function() {
        //     const links = document.querySelectorAll('.nav-link');

        //     links.forEach(link => {
        //         link.addEventListener('click', function(e) {
        //             e.preventDefault(); // Prevent the default action of the link

        //             links.forEach(l => l.classList.remove('active2'));
        //             this.classList.add('active2');
        //         });
        //     });
        // });
    </script>
    <script src="./js/mainAdmin.js"></script>
</body>

</html>