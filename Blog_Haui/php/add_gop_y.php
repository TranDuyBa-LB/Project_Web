<?php
    require 'check_dang_nhap.php';
    require 'ket_noi_database.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngay_gui = date('d/m/y');
    $tieu_de_gop_y = $_POST['tieu_de_gop_y'];
    $noi_dung_gop_y = $_POST['noi_dung_gop_y'];
    $id_sinh_vien = (int)$_SESSION['id_sinh_vien'];
    $select_biet_danh = "SELECT biet_danh
                         FROM nguoi_dung
                         WHERE id_sinh_vien=$id_sinh_vien";
    $bang_biet_danh = $obj_database->query($select_biet_danh);
    $mang_biet_danh = $bang_biet_danh->fetch();
    $biet_danh = $mang_biet_danh['biet_danh'];
    $insert_gop_y = "INSERT INTO y_kien_nguoi_dung(id_sinh_vien,biet_danh,tieu_de_gop_y,noi_dung_gop_y,ngay_gui)
                     VALUES ($id_sinh_vien,'$biet_danh','$tieu_de_gop_y','$noi_dung_gop_y','$ngay_gui')";
    $obj_database->query($insert_gop_y);
    header('location:../blog_sinh_vien.php');
 ?>