<?php
    session_start();
    if($_SESSION['id_sinh_vien']!==md5('admin02051999'))
        header('location:../../index.html');
 ?>