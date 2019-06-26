<?php
    require 'ket_noi_database.php';
    $id_bai_viet = (int)$_GET['id_bai_viet'];
    echo $id_bai_viet;
    $delete_binh_luan = "DELETE FROM binh_luan
                        WHERE id_bai_viet = $id_bai_viet";
    try {
        $obj_database->query($delete_binh_luan);
    } catch (Exception $erro_delete){
        echo 'Lỗi DELETE: '.$erro_delete;
    }
    $delete_bai_viet = "DELETE FROM bai_viet
                        WHERE id_bai_viet = $id_bai_viet";
    try {
        $obj_database->query($delete_bai_viet);
    } catch (Exception $erro_delete){
        echo 'Lỗi DELETE: '.$erro_delete;
    }
    header ('location:../nguoi_dung.php');
 ?>