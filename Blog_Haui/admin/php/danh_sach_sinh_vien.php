<?php
    require 'ket_noi_database.php';
    //require '../../php/kiem_tra_dang_nhap.php';
    $select_sinh_vien = "SELECT id_sinh_vien, biet_danh, truong_dang_hoc, email, ngay_dang_ky
                         FROM nguoi_dung";
    $bang_ket_qua_sv = $obj_database->query($select_sinh_vien);
 ?>