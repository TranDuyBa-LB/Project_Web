<?php
    require 'ket_noi_database.php';
    session_start();
    $ten_dang_nhap = $_POST['ten_dang_nhap'];
    $mat_khau = md5($_POST['mat_khau']);
    echo $ten_dang_nhap.$mat_khau;
    $select_admin = "SELECT ten_dang_nhap,mat_khau
                     FROM admin
                     WHERE (ten_dang_nhap='$ten_dang_nhap') and (mat_khau='$mat_khau')";
    $bang_admin = $obj_database->query($select_admin);
    $mang_admin = $bang_admin->fetch();
    if(($mang_admin['ten_dang_nhap']===$ten_dang_nhap) && ($mang_admin['mat_khau']===$mat_khau)){
        $_SESSION['id_sinh_vien']=md5('admin02051999');
        header('location:../admin.php');
    } else {
        $select_sv = "SELECT id_sinh_vien, ten_dang_nhap, mat_khau
                   FROM nguoi_dung
                   WHERE (ten_dang_nhap='$ten_dang_nhap') and (mat_khau='$mat_khau')";
        try {
        $return_table_sv = $obj_database->query($select_sv);
        $mang_sv = $return_table_sv->fetch();
        if(($mang_sv['ten_dang_nhap']===$ten_dang_nhap) && ($mang_sv['mat_khau']===$mat_khau)){
            $_SESSION['id_sinh_vien'] = $mang_sv['id_sinh_vien'];
            header('location:../blog_sinh_vien.php');
        } else
            header('location:../index.html');
        } catch (Exception $erro_select) {
        echo "Lỗi: ".$erro_select;
        }
    }
 ?>