<?php
    require 'ket_noi_database.php';
    $ma_sp=$_POST['ma_sp'];
    $delete = "DELETE FROM san_pham
               WHERE ma_sp='$ma_sp'";
    $obj->query($delete);
    header ('Location: admin.php');
 ?>