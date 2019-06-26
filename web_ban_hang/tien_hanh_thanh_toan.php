<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngay=date('h:i-d/m/y');
    $ten_san_pham = $_POST['ten_san_pham'];
    $so_luong = (float)$_POST['so_luong'];
    $gia_mot_san_pham = $_POST['gia_mot_san_pham'];
    $don_gia = $_POST['don_gia'];
    $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
    $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
    $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
    require 'ket_noi_database.php';
    $add = "INSERT INTO don_hang(ten_san_pham, so_luong, gia_san_pham, don_gia, ten_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan, ngay_dat)
            VALUES ('$ten_san_pham', $so_luong, '$gia_mot_san_pham', '$don_gia', '$ten_nguoi_nhan', '$sdt_nguoi_nhan', '$dia_chi_nguoi_nhan', '$ngay')";
    $obj->query($add);
    header('Location: index.php');
 ?>