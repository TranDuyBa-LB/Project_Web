<?php
    session_start();
    if(isset($_SESSION['tai_khoan'])){
        header('Location: admin.php');
    } else {
        header('Location: login.php');
    }
 ?>