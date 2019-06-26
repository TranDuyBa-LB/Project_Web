<?php
    require 'ket_noi_database.php';
    //require '../../php/kiem_tra_dang_nhap.php';
    $select_gop_y = "SELECT *
                         FROM y_kien_nguoi_dung";
    $bang_gop_y = $obj_database->query($select_gop_y);
 ?>