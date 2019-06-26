<?php
    require 'ket_noi_database.php';
    //require '../../php/kiem_tra_dang_nhap.php';
    $select_bai_viet = "SELECT id_bai_viet, id_sinh_vien, chuyen_muc, tieu_de, luot_xem, so_binh_luan, luot_thich, luot_khong_thich, ngay_dang
                         FROM bai_viet";
    $bang_ket_qua_bv = $obj_database->query($select_bai_viet);
 ?>