<?php
    require 'ket_noi_database.php';
    $thich = (int)$_GET['thich'];
    $khong_thich = (int)$_GET['khong_thich'];
    $id_bai_viet = (int)$_GET['id_bai_viet'];
    if(empty($khong_thich))
        $khong_thich = 0;
    if(empty($thich))
        $thich = 0;
    $update_luot_thich_va_khong_thich = "UPDATE bai_viet
                                         SET luot_thich=luot_thich+$thich, luot_khong_thich=luot_khong_thich+$khong_thich
                                         WHERE id_bai_viet = $id_bai_viet";
    $obj_database->query($update_luot_thich_va_khong_thich);
    header("location:../bai_viet.php?id_bai_viet=$id_bai_viet");
 ?>