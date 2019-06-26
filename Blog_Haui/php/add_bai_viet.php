<?php
    require 'ket_noi_database.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    session_start();
    $id_sinh_vien = (int)$_SESSION['id_sinh_vien'];
    $chuyen_muc;
    if(!empty($_POST['chuyen_muc']) && $_POST['chuyen_muc']!=='T?o m?i')
        $chuyen_muc = $_POST['chuyen_muc'];
    else 
        if(empty($_POST['chuyen_muc_moi']))
            $chuyen_muc = 'Chưa xác định';
        else {
            $chuyen_muc=$_POST['chuyen_muc_moi'];
            $ngay_tao = date('d/m/y');
            $insert_chuyen_muc_sql = "INSERT INTO chuyen_muc(ten_chuyen_muc, ngay_tao)
                           VALUES ('$chuyen_muc','$ngay_tao')";
            $obj_database->query($insert_chuyen_muc_sql);
        }
    $tieu_de = $_POST['tieu_de'];
    $tom_tat = $_POST['tom_tat'];
    $noi_dung = $_POST['noi_dung'];
    $ngay_dang = date('d/m/y - g:i/A');
    $insert_bai_viet_sql = "INSERT INTO bai_viet(id_sinh_vien, chuyen_muc, tieu_de, tom_tat, noi_dung, ngay_dang)
                   VALUES ($id_sinh_vien, '$chuyen_muc', '$tieu_de', '$tom_tat', '$noi_dung', '$ngay_dang') ";
    try {
        $obj_database->query($insert_bai_viet_sql);
        header('location:../nguoi_dung.php');
    } catch (Exception $erro_insert){
        echo "Lỗi: ".$erro_insert;
    }
 ?>