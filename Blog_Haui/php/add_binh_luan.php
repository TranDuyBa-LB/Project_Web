<?php
    require 'ket_noi_database.php';
    $noi_dung_binh_luan = $_POST['binh_luan_moi'];
    $id_sinh_vien = (int)$_POST['id_sinh_vien'];
    $id_bai_viet = (int)$_POST['id_bai_viet'];
    $insert_binh_luan = "INSERT INTO binh_luan(id_bai_viet, id_sinh_vien, noi_dung_binh_luan)
                         VALUES ($id_bai_viet, $id_sinh_vien, '$noi_dung_binh_luan') ";
    $obj_database->query($insert_binh_luan);
    $update_so_luot_binh_luan = "UPDATE bai_viet
                                  SET so_binh_luan=so_binh_luan+1
                                  WHERE id_bai_viet = $id_bai_viet";
    $obj_database->query($update_so_luot_binh_luan);
    header("location:../bai_viet.php?id_bai_viet=$id_bai_viet");
?>