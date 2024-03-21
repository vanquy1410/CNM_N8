<?php

function checkuser1($user, $pass)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM nhanvien 
        WHERE SoDienThoai = :user AND MatKhau = :pass");
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':pass', $pass);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    
    if (count($kq) > 0) {
        // Check if 'Role' key exists in the first row
        if (isset($kq[0]['Role'])) {
            return $kq[0]['Role'];
        } else {
            // Handle case where 'Role' key is not present
            // You can log this or return an error message
            return "Role not found for user";
        }
    } else {
        return 0; // No matching user found
    }
}

function getIdEmployee($user)
{
    $conn = connectdb();
    
    // Sử dụng prepared statement với tham số :user
    $stmt = $conn->prepare("SELECT `MaNhanVien` FROM `nhanvien` WHERE SoDienThoai = :user");
    
    // Gán giá trị cho tham số :user
    $stmt->bindParam(':user', $user, PDO::PARAM_STR);
    
    // Thực thi truy vấn
    $stmt->execute();
    
    // Xử lý kết quả
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    
    if (count($kq) > 0) {
        return $kq[0]['MaNhanVien'];
    } else {
        return 0;
    }
}


class modelProduct
{
    function changePassword1($email, $newPassword)
    {
        $con = null;
        $p = new clsketnoi();
        if ($p->ketnoiDB($con)) {
            $string = "UPDATE nhanvien SET MatKhau = '$newPassword' WHERE MaNhanVien = $email";
            $kq = mysqli_query($con, $string);
            $p->dongKetNoi($con);
            return $kq;
        } else {
            return false;
        }
    }
}