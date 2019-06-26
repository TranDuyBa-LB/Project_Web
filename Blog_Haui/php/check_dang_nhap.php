<?php
    session_start();
    if(empty($_SESSION['id_sinh_vien']))
        header('location:./index.html');
 ?>