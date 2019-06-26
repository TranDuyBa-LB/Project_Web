<?php
    require 'check_admin.php';
    require 'ket_noi_database.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ten_chuyen_muc = $_GET['ten_chuyen_muc'];
    $ngay_tao = date('m/d/y');
    $insert_chuyen_muc = "INSERT INTO chuyen_muc(ten_chuyen_muc,ngay_tao)
                          VALUES ('$ten_chuyen_muc','$ngay_tao') ";
    $obj_database->query($insert_chuyen_muc);
    header('location:../../admin.php');
 ?>