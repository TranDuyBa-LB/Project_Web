<?php
    require 'check_dang_nhap.php';
    require 'ket_noi_database.php';
    $id_sinh_vien = (int)$_SESSION['id_sinh_vien'];
    $mat_khau_hien_tai = md5($_POST['mat_khau_hien_tai']);
    $mat_khau_moi = $_POST['mat_khau_moi'];
    $mat_khau_moi_nhap_lai = $_POST['mat_khau_moi_nhap_lai'];
    $select_mat_khau_cu = "SELECT mat_khau
                           FROM nguoi_dung
                           WHERE id_sinh_vien=$id_sinh_vien";
    $mat_khau_cu = $obj_database->query($select_mat_khau_cu);
    $mat_khau_cu = $mat_khau_cu->fetch();
    if($mat_khau_hien_tai===$mat_khau_cu['mat_khau']) {
        if($mat_khau_moi===$mat_khau_moi_nhap_lai){
            $mat_khau_moi = md5($mat_khau_moi);
            $update_mat_khau = "UPDATE nguoi_dung
                                SET mat_khau='$mat_khau_moi'
                                WHERE id_sinh_vien = $id_sinh_vien";
            $obj_database->query($update_mat_khau);
            header('location:../nguoi_dung.php');
        } else {
            $error = "Mật khẩu mới không giống nhau !";
            header("location:../trang_doi_mat_khau.php?error=$error");
        }
    } else {
        $error = "Bạn nhập sai mật khẩu cũ !";
        header("location:../trang_doi_mat_khau.php?error=$error");
    }
 ?>