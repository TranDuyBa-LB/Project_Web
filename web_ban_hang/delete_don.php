<?php
    require 'ket_noi_database.php';
    $ten_nguoi_nhan = $_GET['ten_nguoi_nhan'];
    $delete = "DELETE FROM don_hang WHERE ten_nguoi_nhan='$ten_nguoi_nhan'";
    $obj->query($delete);
    header('Location: don_hang.php');
?>