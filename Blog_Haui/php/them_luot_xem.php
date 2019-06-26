<?php
    require 'ket_noi_database.php';
    $id_bai_viet = (int)$_GET['id_bai_viet'];
    $update_so_luot_xem= "UPDATE bai_viet
                                  SET luot_xem=luot_xem+1
                                  WHERE id_bai_viet = $id_bai_viet";
    $obj_database->query($update_so_luot_xem);
?>