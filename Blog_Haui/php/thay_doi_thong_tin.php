<?php
    require 'check_dang_nhap.php';
    require 'ket_noi_database.php';
    $id_sinh_vien = (int)$_SESSION['id_sinh_vien'];
    $biet_danh = $_POST['biet_danh'];
    $ma_sinh_vien = $_POST['ma_sinh_vien'];
    $truong_dang_hoc = $_POST['truong_dang_hoc'];
    $email = $_POST['email'];
    if(!empty($ma_sinh_vien)){
        $ma_sinh_vien = md5($ma_sinh_vien);
        $update_sql = "UPDATE nguoi_dung
                       SET biet_danh='$biet_danh',ma_sinh_vien='$ma_sinh_vien',truong_dang_hoc='$truong_dang_hoc',email='$email'
                       WHERE id_sinh_vien=$id_sinh_vien";
    } else{
        $update_sql = "UPDATE nguoi_dung
                       SET biet_danh='$biet_danh',truong_dang_hoc='$truong_dang_hoc',email='$email'
                       WHERE id_sinh_vien=$id_sinh_vien";
    }
    $obj_database->query($update_sql);
    header('location:../nguoi_dung.php');
 ?>