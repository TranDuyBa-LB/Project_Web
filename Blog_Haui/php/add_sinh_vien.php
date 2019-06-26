<?php 
    require 'ket_noi_database.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $biet_danh = $_POST['biet_danh'];
    $ma_sinh_vien = md5($_POST['ma_sinh_vien']);
    $truong_dang_hoc = $_POST['truong_dang_hoc'];
    $email = $_POST['email'];
    $ten_dang_nhap = $_POST['ten_dang_nhap'];
    $mat_khau = md5($_POST['mat_khau']);
    $ngay_dang_ky = date('d/m/y - g:i/A');
    $insert_sql = "INSERT INTO nguoi_dung(ma_sinh_vien, truong_dang_hoc, biet_danh, email, ten_dang_nhap, mat_khau, ngay_dang_ky) 
                   VALUES ('$ma_sinh_vien','$truong_dang_hoc','$biet_danh','$email','$ten_dang_nhap','$mat_khau','$ngay_dang_ky') ";
    try {
        $obj_database->query($insert_sql);
        header ('location:../index.html');
    } catch(Exception $erro_insert) {
        echo "Lỗi: ".$erro_insert;
    }
    
?>