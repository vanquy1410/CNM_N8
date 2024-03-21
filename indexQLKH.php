<?php
session_start();
ob_start();

$_SESSION['MaNhanVien'];
$conn = mysqli_connect("localhost", "root", "", "qlsukienhoithao");

if (!isset($_SESSION['Role']) || empty($_SESSION['Role'])) {
    header('location: ./admin/login.php');
    exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset();
    session_destroy();
    header('location: ./admin/login.php');
    exit();
}

// chuyển quyền truy cập admin
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
} else {
    $_SESSION['role'] = 'qlkh';
}


if (isset($_REQUEST['adminButton'])) {
    if ($_SESSION['role'] !== 'admin') {
        // Nếu không phải admin, chuyển hướng về trang không có quyền truy cập
        echo ('<h4 style="text-align:center; padding-top:10px; color:red">Bạn không có quyền truy cập trang này!</h4>');
        echo "<meta http-equiv='refresh' content='3;url='''>";
        exit();
    }

    if ($_SESSION['role'] === 'admin') {
        // Nếu là admin, chuyển hướng đến trang admin
        header('Location: indexAdmin.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="./css/styleAdmin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
                        echo $kq["TenNhanVien"];
                    }
                    ?>
                </a>
                <form action="" method="post" id="formAdmin">
                    <button type="submit" name="adminButton" id="adminButton">Admin</button>
                    <a href="?action=logout" data-toggle="tooltip" data-placement="bottom" title="ĐĂNG XUẤT"><b>Đăng
                            xuất <i class="fas fa-sign-out-alt"></i></b></a>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-3 body">
        <br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="indexQLKH.php?danh-sach-su-kien">DANH SÁCH SỰ KIỆN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexQLKH.php?kiem-ke-kho">KIỂM KÊ KHO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexQLKH.php?san-pham">CẬP NHẬT THÔNG TIN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexQLKH.php?phieu-nhap-kho">PHIẾU NHẬP KHO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexQLKH.php?phieu-xuat-kho">PHIẾU XUẤT KHO</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">

            <?php
            include_once("view/vDanhsachsukien.php");
            $a = new VDanhsachsukien();

            include_once("view/vKiemKeKho.php");
            $p = new VPhieuKiemTraKho();

            include_once("view/vProduct3.php");
            $c = new VProduct();

            include_once("view/vPhieuNhapKho.php");
            $d = new VPhieuNhapKho();

            include_once("view/vPhieuXuatKho.php");
            $e = new VPhieuXuatKho();

            if (isset($_REQUEST['danh-sach-su-kien'])) {
                $a->viewAllDanhsachsukien();
            }elseif (isset($_REQUEST['kiem-ke-kho'])) {
                $p->viewAllPhieuKiemTraKho();
            } elseif (isset($_REQUEST['san-pham'])) {
                $c->viewAllProducts();
            } elseif (isset($_REQUEST['phieu-nhap-kho'])) {
                $d->viewAllPhieuNhapKho();
            } elseif (isset($_REQUEST['phieu-xuat-kho'])) {
                $e->viewAllPhieuXuatKho();
            } elseif (isset($_REQUEST['btnSearchDSSK'])) {
                $a->viewAllDanhsachsukienBySearch($_REQUEST['txtSearchDSSK']);
            } elseif (isset($_REQUEST['btnSearchPKTK'])) {
                $p->viewAllPhieuKiemTraKhoBySearch($_REQUEST['txtSearchPKTK']);
            } elseif (isset($_REQUEST['btnSearchSP'])) {
                $c->viewAllProductBySearch($_REQUEST['txtSearchSP']);
            } elseif (isset($_REQUEST['btnSearchPNK'])) {
                $d->viewAllPhieuNhapKhoBySearch($_REQUEST['txtSearchPNK']);
            } elseif (isset($_REQUEST['btnSearchPXK'])) {
                $e->viewAllPhieuXuatKhoBySearch($_REQUEST['txtSearchPXK']);
                // } elseif (isset($_REQUEST["btnSubmitActionPhieuKiemTraKho"])) {
                //     $p->showFormDelPhieuKiemTraKho();
                //     $p -> showFormEditPhieuKiemTraKho();
            } elseif (isset($_REQUEST["btnSubmitActionDanhsachsukien"])) {
                $a->showFormDelDanhsachsukien();
                $a->showFormEditDanhsachsukien();
            } elseif (isset($_REQUEST["btnSubmitActionPhieuXuatKho"])) {
                $e->showFormDelPhieuXuatKho();
                $e->showFormEditPhieuXuatKho();
            } elseif (isset($_REQUEST["btnSubmitActionPhieuNhapKho"])) {
                $d->showFormDelPhieuNhapKho();
                $d->showFormEditPhieuNhapKho();
            } elseif (isset($_REQUEST["btnProdAct"])) {
                $c->showFormDelProduct();
                $c->showFormEditProduct();
            } elseif (isset($_REQUEST["btnSubmitActionPhieuKiemTraKho"])) {
                $p->showFormDelPhieuKiemTraKho();
                $p->showFormEditPhieuKiemTraKho();
                // $p -> showFormEditPhieuKiemTraKho();
                // }elseif(isset($_REQUEST["btnCusAct"])){
                //     $d -> showFormDelCustomer();
            } else {
                echo "welcom admin";
            }

             //thêm DSSK
             if (isset($_REQUEST["btnAddDSSK"])) {
                $tensukien = $_REQUEST["TSK"];
                $hinhthuc = $_REQUEST["HT"];
                $diadiem = $_REQUEST['ĐĐ'];
                $thoigianbatdau = $_REQUEST["TGBD"];
                $thoigianketthuc = $_REQUEST["TGKT"];
                $songuoithamdu = $_REQUEST["SNTD"];
                $mota = $_REQUEST["MT"];
                $hinhAnh = $_FILES["hinhAnh"];
                $MaLich = $_REQUEST["ML"];
                $MaNguoiDung = $_REQUEST["MND"];
                $MaBTC = $_REQUEST["MBTC"];
                $MaNhanVien = $_REQUEST["MNV"];
                $dp = new controlDanhsachsukien();
                $result = $dp->addDanhsachsukien($tensukien,$hinhthuc,$diadiem,$thoigianbatdau,$thoigianketthuc,$songuoithamdu,$mota,$hinhAnh,$MaLich,$MaNguoiDung,$MaBTC,$MaNhanVien);

                if ($result == 1) {
                    echo "<script>alert('Add event successfully!')</script>";
                    // echo header("refresh: 0; url = 'index.php?san-pham'");
                } elseif ($result == 0) {
                    echo "<script>alert('Add event unsuccessfully!')</script>";
                } elseif ($result == -1) {
                    echo "<script>alert('This file is not image format!')</script>";
                } elseif ($result == -2) {
                    echo "<script>alert('This file is too lagre to upload!')</script>";
                } else {
                    echo "<script>alert('Can not upload file!')</script>";
                }
            }
            //thêm PKTK
            if (isset($_REQUEST["btnAddPKTK"])) {
                $NgayKiemTra = $_REQUEST["NKT"];
                $TrangThaiKiemTra = $_REQUEST["TTKT"];
                $MaNhanVien = $_SESSION['MaNhanVien'];
                $MaSanPham = $_REQUEST["MSPQLK"];
                $p = new controlPhieuKiemTraKho();
                $result = $p->addPhieuKiemTraKho($NgayKiemTra, $TrangThaiKiemTra, $MaNhanVien, $MaSanPham);

                if ($result == 1) {
                    echo "<script>alert('Add phieu kiem tra kho successfully!')</script>";
                    //echo header("refresh: 0; url = 'index.php?kiem-ke-kho'");
                } elseif ($result == 0) {
                    echo "<script>alert('Add phieu kiem tra kho unsuccessfully!')</script>";
                }
            }
            //thêm sản phẩm
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
                $cp = new CProduct();
                $result = $cp->addProduct($tenSP, $slt, $moTa, $giaBan, $giaNhap, $thuongHieu, $hinhAnh, $hsd, $loaiSP, $nhaCC);

                if ($result == 1) {
                    echo "<script>alert('Add product successfully!')</script>";
                    // echo header("refresh: 0; url = 'index.php?san-pham'");
                } elseif ($result == 0) {
                    echo "<script>alert('Add product unsuccessfully!')</script>";
                } elseif ($result == -1) {
                    echo "<script>alert('This file is not image format!')</script>";
                } elseif ($result == -2) {
                    echo "<script>alert('This file is too lagre to upload!')</script>";
                } else {
                    echo "<script>alert('Can not upload file!')</script>";
                }
            }

            //thêm PNK
            if (isset($_REQUEST["btnAddPNK"])) {
                $NgayLapPhieuNhapKho = $_REQUEST["NLPNK"];
                $TrangThaiPhieuNhapKho = $_REQUEST["TTPN"];
                $MaNhanVien = $_SESSION['MaNhanVien'];
                $MaSanPham = $_REQUEST["MSP"];
                $dp = new controlPhieuNhapKho();
                $result = $dp->addPhieuNhapKho($NgayLapPhieuNhapKho, $TrangThaiPhieuNhapKho, $MaNhanVien, $MaSanPham);

                if ($result == 1) {
                    echo "<script>alert('Add phieu nhap kho successfully!')</script>";
                    //echo header("refresh: 0; url = 'index.php?phieu-xuat-kho'");
                } elseif ($result == 0) {
                    echo "<script>alert('Add phieu nhap kho unsuccessfully!')</script>";
                }
            }

            //thêm PXK
            if (isset($_REQUEST["btnAddPXK"])) {
                $NgayLapPhieuXuatKho = $_REQUEST["NLPXK"];
                $TrangThaiPhieuXuatKho = $_REQUEST["TTPX"];
                $MaNhanVien = $_SESSION['MaNhanVien'];
                $MaSanPham = $_REQUEST["MSPX"];
                $ep = new controlPhieuXuatKho();
                $result = $ep->addPhieuXuatKho($NgayLapPhieuXuatKho, $TrangThaiPhieuXuatKho, $MaNhanVien, $MaSanPham);

                if ($result == 1) {
                    echo "<script>alert('Add phieu xuat kho successfully!')</script>";
                    // echo header("refresh: 0; url = 'index.php?san-pham'");
                } elseif ($result == 0) {
                    echo "<script>alert('Add phieu xuat kho unsuccessfully!')</script>";
                }
            }
            ?>
        </div>

    </div>
    <!-- Modal Them danh sách sự kiện -->
    <div class="modal fade" id="ModalDSSK" tabindex="-1" aria-labelledby="modalDSSKLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm danh sách sự kiện</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <form action="#" method="post" enctype="multipart/form-data"
                    onsubmit="return validateFormDSSK();">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="TSK">Tên sự kiện</label>
                            <input type="text" name="TSK" id="TSK" class="form-control" aria-describedby="TSK-mess"
                                onblur="test('#TSK', ktTSK)">
                            <small id="TSK-mess"></small>
                        </div>
                        <div class="form-group">
                            <label for="HT">Hình thức</label>
                            <input type="text" name="HT" id="HT" class="form-control" aria-describedby="HT-mess"
                                onblur="test('#HT', ktHT)">
                            <small id="HT-mess"></small>
                        </div>
                        <div class="form-group">
                            <label for="ĐĐ">Địa điểm</label>
                            <input type="text" name="ĐĐ" id="ĐĐ" class="form-control" aria-describedby="ĐĐ-mess"
                                onblur="test('#ĐĐ', ktTSK)">
                            <small id="ĐĐ-mess"></small>
                        </div>
                        <div class="form-group">
                            <label for="TGBD">Thời gian bắt đầu</label>
                            <input type="date" name="TGBD" id="TGBD" class="form-control" aria-describedby="TGBD-mess">
                            <small id="TGBD-mess"></small>
                        </div>
                        <div class="form-group">
                            <label for="TGKT">Thời gian kết thúc</label>
                            <input type="date" name="TGKT" id="TGKT" class="form-control" aria-describedby="TGKT-mess">
                            <small id="TGKT-mess"></small>
                        </div>
                        <div class="form-group">
                            <label for="SNTD">Số người tham dự</label>
                            <input type="test" name="SNTD" id="SNTD" class="form-control" aria-describedby="SNTD-mess"
                                onblur="test('#SNTD', ktSNTD)">
                            <small id="SNTD-mess"></small>
                        </div>
                        <div class="form-group">
                            <label for="MT">Mô tả</label>
                            <input type="test" name="MT" id="MT" class="form-control" aria-describedby="MT-mess"
                                onblur="test('#MT', ktMT)">
                            <small id="MT-mess"></small>
                        </div>


                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" name="hinhAnh" class="form-control">
                            <small id="hinhAnh-mess"></small>
                        </div>
                        <div class="form-group">
                            <label for="ML">Mã Lịch</label>
                            <input type="test" name="ML" id="ML" class="form-control" aria-describedby="ML-mess"
                                onblur="test('#ML', ktML)">
                            <small id="ML-mess"></small>
                        </div>
                        <div class="form-group">
                            <label for="MND">Mã Người dùng</label>
                            <input type="test" name="MND" id="MND" class="form-control" aria-describedby="MND-mess"
                                onblur="test('#MND', ktMND)">
                            <small id="MND-mess"></small>
                        </div>
                        <div class="form-group">
                            <label for="MBTC">Mã ban tổ chức</label>
                            <input type="test" name="MBTC" id="MBTC" class="form-control" aria-describedby="MBTC-mess"
                                onblur="test('#MBTC', ktMBTC)">
                            <small id="MBTC-mess"></small>
                        </div>
                        <div class="form-group">
                            <label for="MNV">Mã nhân viên</label>
                            <input type="test" name="MNV" id="MNV" class="form-control" aria-describedby="MNV-mess"
                                onblur="test('#MNV', ktMNV)">
                            <small id="MNV-mess"></small>
                        </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                        <button type="submit" name="btnAddDSSK" class="btn btn-success">Lưu</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
    <!-- Modal Them phiếu kiểm tra kho -->
    <div class="modal fade" id="ModalPKTK" tabindex="-1" aria-labelledby="modalPKTKLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm phiếu kiểm tra kho</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <form action="#" method="post" enctype="multipart/form-data"
                    onsubmit="return validateFormKiemTraKho();">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="NKT">Ngày kiểm tra</label>
                            <input type="date" name="NKT" id="NKT" class="form-control" aria-describedby="NKT-mess"
                                value="<?php echo date('Y-m-d'); ?>">
                            <small id="NKT-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="TTKT">Trạng thái kiểm tra</label>
                            <input type="text" name="TTKT" id="TTKT" class="form-control" aria-describedby="TTKT-mess"
                                onblur="test('#TTKT', ktTTKT)">
                            <small id="TTKT-mess"></small>
                        </div>

                        <!-- <div class="form-group">
                                        <label for="MNVQLK">Mã nhân viên quản lý kho</label>
                                        <input type="text" name="MNVQLK" id="MNVQLK" class="form-control" aria-describedby="MNVQLK-mess" onblur="test('#MNVQLK', ktMNVQLK)">
                                        <small id="MNVQLK-mess"></small>
                                    </div> -->

                        <div class="form-group">
                            <label for="MSPQLK">Mã sản phẩm</label>
                            <input type="text" name="MSPQLK" id="MSPQLK" class="form-control"
                                aria-describedby="MSPQLK-mess" onblur="test('#MSPQLK', ktMSPQLK)">
                            <small id="MSPQLK-mess"></small>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                        <button type="submit" name="btnAddPKTK" class="btn btn-success">Lưu</button>
                    </div>
                </form>

            </div>
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
                            <input type="text" name="tenSP" id="tenSP" class="form-control"
                                aria-describedby="tenSP-messs">
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
                            <label for="">Giá bán</label>
                            <input type="number" name="giaBan" id="giaBan" class="form-control"
                                aria-describedby="giaBan-messs">
                            <small id="giaBan-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Giá nhập</label>
                            <input type="number" name="giaNhap" id="giaNhap" class="form-control"
                                aria-describedby="giaNhap-messs">
                            <small id="giaNhap-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Thương hiệu</label>
                            <input type="text" name="thuongHieu" id="thuongHieu" class="form-control"
                                aria-describedby="thuongHieu-messs">
                            <small id="thuongHieu-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" name="fileAnh" class="form-control">
                            <small id="hinhAnh-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="">Hạn sử dụng</label>
                            <input type="date" name="HSD" id="HSD" class="form-control" aria-describedby="HSD-messs"
                                value="<?php echo date('Y-m-d'); ?>">
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
                            include_once("Controller/cLoaiSanPham.php");
                            $cloai = new CLoaiSP();
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
                            include_once("Controller/cNhaCC.php");
                            $ce = new CNhaCC();
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


    <!-- Modal Phiếu nhập kho  -->
    <div class="modal fade" id="ModalPNK" tabindex="-1" aria-labelledby="modalPNKLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm phiếu nhập kho</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <form action="#" method="post" enctype="multipart/form-data" onsubmit="return validateFormNhapKho();">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="NLPNK">Ngày Lập Phiếu Nhập Kho</label>
                            <input type="date" name="NLPNK" id="NLPNK" class="form-control"
                                placeholder="vi du: 20/11/2023" aria-describedby="NLPNK-mess"
                                value="<?php echo date('Y-m-d'); ?>">
                            <small id="NLPNK-mess"></small>
                        </div>

                        <div class="form-group">
                            <label for="TTPN">Trạng thái phiếu nhập kho</label>
                            <input type="text" name="TTPN" id="TTPN" class="form-control"
                                placeholder="vi du: sản phẩm không hư hỏng" aria-describedby="TTPN-messs"
                                onblur="test('#TTPN', ktTTPN)">
                            <small id="TTPN-mess"></small>
                        </div>

                        <!-- <div class="form-group">
                                                <label for="MNVK">Mã nhân viên kiểm tra kho</label>
                                                <input type="text" name="MNVK" id="MNVK" class="form-control" placeholder="" aria-describedby="MNVK-messs" onblur="test('#MNVK', ktMNVK)">
                                                <small id="MNVK-mess"></small>
                                            </div> -->

                        <div class="form-group">
                            <label for="MSP">Mã Sản Phẩm</label>
                            <input type="text" name="MSP" id="MSP" class="form-control" placeholder=""
                                aria-describedby="MSP-messs" onblur="test('#MSP', ktMSP)">
                            <small id="MSP-mess"></small>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                        <button type="submit" name="btnAddPNK" class="btn btn-success">Lưu</button>
                    </div>
                </form>

            </div>
        </div>

    </div>


    </div>

    <!-- Modal Phiếu xuất kho  -->
    <div class="modal fade" id="ModalPXK" tabindex="-1" aria-labelledby="modalPXKLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm phiếu xuất kho</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <form action="#" method="post" enctype="multipart/form-data" onsubmit="return validateFormXuatKho();">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Ngày Lập Phiếu Xuất Kho</label>
                            <input type="date" name="NLPXK" id="NLPXK" class="form-control"
                                placeholder="vi du: 20/11/2023" aria-describedby="NLPXK-mess"
                                value="<?php echo date('Y-m-d'); ?>">
                            <small id="NLPXK-mess"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Trạng Thái Phiếu Xuất Kho</label>
                            <input type="text" name="TTPX" id="TTPX" class="form-control" placeholder=""
                                aria-describedby="TTPX-messs" onblur="test('#TTPX', ktTTPX)">
                            <small id="TTPX-mess"></small>
                        </div>

                        <!-- <div class="form-group">
                                    <label for="">Mã nhân viên kiểm tra kho</label>
                                        <input type="text" name="MNVXK" id="MNVXK" class="form-control"
                                            placeholder="" aria-describedby="MNVXK-messs"
                                            onblur="test('#MNVXK', ktMNVXK)">
                                        <small id="MNVXK-mess"></small>
                                    </div> -->
                        <div class="form-group">
                            <label for="">Mã Sản Phẩm</label>
                            <input type="text" name="MSPX" id="MSPX" class="form-control" placeholder=""
                                aria-describedby="MSPX-messs" onblur="test('#MSPX', ktMSPX)">
                            <small id="MSPX-mess"></small>
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                        <button type="submit" name="btnAddPXK" class="btn btn-success">Lưu</button>
                    </div>

            </div>
            </form>
        </div>
    </div>

    </div>


    </tbody>
    </table>
    </div>
    </div>
    <script>
        function confirmDelete() {
            return confirm("Bạn có chắc chắn muốn xóa không?");
        }
    </script>

    <script>

        function validateFormKiemTraKho() {
            var NKT = document.getElementById('NKT').value;
            var TTKT = document.getElementById('TTKT').value;
            // var MNVQLK = document.getElementById('MNVQLK').value;
            var MSPQLK = document.getElementById('MSPQLK').value;

            // Khởi tạo đối tượng chứa thông báo lỗi
            var errorMessages = {
                NKT: '',
                TTKT: '',
                // MNVQLK: '',
                MSPQLK: ''
            };

            // Kiểm tra điều kiện và lưu thông báo lỗi
            var currentDate = new Date().toISOString().split('T')[0];
            if (NKT <= currentDate) {
                errorMessages.NKT = 'Ngày lập phiếu kiểm tra kho phải lớn hơn ngày hiện tại.';
            }

            if (TTKT.trim() === '') {
                errorMessages.TTKT = 'Trạng thái phiếu kiểm tra kho không được để trống.';
            }

            // if (MNVQLK.trim() === '') {
            //     errorMessages.MNVQLK = 'Mã nhân viên kiểm tra kho không được để trống.';
            // }

            if (MSPQLK === undefined || MSPQLK.trim() === '') {
                errorMessages.MSPQLK = 'Mã Sản Phẩm không được để trống.';
            }

            // Hiển thị thông báo lỗi trong thẻ <small>
            document.getElementById('NKT-mess').innerHTML = errorMessages.NKT;
            document.getElementById('TTKT-mess').innerHTML = errorMessages.TTKT;
            // document.getElementById('MNVQLK-mess').innerHTML = errorMessages.MNVQLK;
            document.getElementById('MSPQLK-mess').innerHTML = errorMessages.MSPQLK;
            document.getElementById('NKT').value = currentDate;

            // Kiểm tra xem có thông báo lỗi nào không
            for (var field in errorMessages) {
                if (errorMessages[field] !== '') {
                    return false; // Có ít nhất một lỗi, không submit form
                }
            }

            return true; // Không có lỗi, có thể submit form
        }



        function validateFormNhapKho() {
            var NLPNK = document.getElementById('NLPNK').value;
            var TTPN = document.getElementById('TTPN').value;
            // var MNVK = document.getElementById('MNVK').value;
            var MSP = document.getElementById('MSP').value;

            // Khởi tạo đối tượng chứa thông báo lỗi
            var errorMessages = {
                NLPNK: '',
                TTPN: '',
                // MNVK: '',
                MSP: ''
            };

            // Kiểm tra điều kiện và lưu thông báo lỗi
            var currentDate = new Date().toISOString().split('T')[0];
            if (NLPNK <= currentDate) {
                errorMessages.NLPNK = 'Ngày lập phiếu nhập kho phải lớn hơn ngày hiện tại.';
            }

            if (TTPN.trim() === '') {
                errorMessages.TTPN = 'Trạng thái phiếu nhập kho không được để trống.';
            }

            // if (MNVK.trim() === '') {
            //     errorMessages.MNVK = 'Mã nhân viên kiểm tra kho không được để trống.';
            // }

            if (MSP.trim() === '') {
                errorMessages.MSP = 'Mã Sản Phẩm không được để trống.';
            }

            // Hiển thị thông báo lỗi trong thẻ <small>
            document.getElementById('NLPNK-mess').innerHTML = errorMessages.NLPNK;
            document.getElementById('TTPN-mess').innerHTML = errorMessages.TTPN;
            // document.getElementById('MNVK-mess').innerHTML = errorMessages.MNVK;
            document.getElementById('MSP-mess').innerHTML = errorMessages.MSP;
            document.getElementById('NLPNK').value = currentDate;
            // Kiểm tra xem có thông báo lỗi nào không
            for (var field in errorMessages) {
                if (errorMessages[field] !== '') {
                    return false; // Có ít nhất một lỗi, không submit form
                }
            }

            return true; // Không có lỗi, có thể submit form
        }



        function validateFormXuatKho() {
            var NLPXK = document.getElementById('NLPXK').value;
            var TTPX = document.getElementById('TTPX').value;
            // var MNVXK = document.getElementById('MNVXK').value;
            var MSPX = document.getElementById('MSPX').value;

            // Khởi tạo đối tượng chứa thông báo lỗi
            var errorMessages = {
                NLPXK: '',
                TTPX: '',
                // MNVXK: '',
                MSPX: ''
            };

            // Kiểm tra điều kiện và lưu thông báo lỗi
            var currentDate = new Date().toISOString().split('T')[0];
            if (NLPXK <= currentDate) {
                errorMessages.NLPXK = 'Ngày lập phiếu xuất kho phải lớn hơn ngày hiện tại.';
            }

            if (TTPX.trim() === '') {
                errorMessages.TTPX = 'Trạng thái phiếu xuất kho không được để trống.';
            }

            // if (MNVXK.trim() === '') {
            //     errorMessages.MNVXK = 'Mã nhân viên kiểm tra kho không được để trống.';
            // }

            if (MSPX.trim() === '') {
                errorMessages.MSPX = 'Mã Sản Phẩm không được để trống.';
            }

            // Hiển thị thông báo lỗi trong thẻ <small>
            document.getElementById('NLPXK-mess').innerHTML = errorMessages.NLPXK;
            document.getElementById('TTPX-mess').innerHTML = errorMessages.TTPX;
            // document.getElementById('MNVXK-mess').innerHTML = errorMessages.MNVXK;
            document.getElementById('MSPX-mess').innerHTML = errorMessages.MSPX;
            document.getElementById('NLPXK').value = currentDate;
            // Kiểm tra xem có thông báo lỗi nào không
            for (var field in errorMessages) {
                if (errorMessages[field] !== '') {
                    return false; // Có ít nhất một lỗi, không submit form
                }
            }

            return true; // Không có lỗi, có thể submit form
        }
        function validateFormSP() {
            var tenSP = document.getElementById('tenSP').value;
            var thuongHieu = document.getElementById('thuongHieu').value;
            var SLT = document.getElementById('SLT').value;
            var giaNhap = document.getElementById('giaNhap').value;
            var giaBan = document.getElementById('giaBan').value;
            var HSD = document.getElementById('HSD').value;

            // Khởi tạo đối tượng chứa thông báo lỗi
            var errorMessages = {
                tenSP: '',
                thuongHieu: '',
                SLT: '',
                giaNhap: '',
                giaBan: '',
                HSD: ''
            };

            // Kiểm tra điều kiện và lưu thông báo lỗi
            if (tenSP.trim() === '') {
                errorMessages.tenSP = 'Tên sản phẩm không được để trống.';
            }

            if (thuongHieu.trim() === '') {
                errorMessages.thuongHieu = 'Thương hiệu không được để trống.';
            }

            if (SLT <= 0) {
                errorMessages.SLT = 'Số lượng tồn phải lớn hơn 0.';
            }

            if (giaNhap <= 0) {
                errorMessages.giaNhap = 'Giá nhập phải lớn hơn 0.';
            }

            if (giaBan <= giaNhap) {
                errorMessages.giaBan = 'Giá bán phải lớn hơn giá nhập.';
            }

            var currentDate = new Date().toISOString().split('T')[0];
            if (HSD <= currentDate) {
                errorMessages.HSD = 'Hạn sử dụng phải lớn hơn ngày hiện tại.';
            }

            // Hiển thị thông báo lỗi trong thẻ <small>
            document.getElementById('tenSP-mess').innerHTML = errorMessages.tenSP;
            document.getElementById('thuongHieu-mess').innerHTML = errorMessages.thuongHieu;
            document.getElementById('SLT-mess').innerHTML = errorMessages.SLT;
            document.getElementById('giaNhap-mess').innerHTML = errorMessages.giaNhap;
            document.getElementById('giaBan-mess').innerHTML = errorMessages.giaBan;
            document.getElementById('HSD-mess').innerHTML = errorMessages.HSD;
            document.getElementById('HSD').value = currentDate;

            // Kiểm tra xem có thông báo lỗi nào không
            for (var field in errorMessages) {
                if (errorMessages[field] !== '') {
                    return false; // Có ít nhất một lỗi, không submit form
                }
            }

            return true; // Không có lỗi, có thể submit form
        }
    </script>

</body>

</html>