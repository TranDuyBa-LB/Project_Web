<?php 
    $address_host = 'localhost';
    $name_database = 'blog_sv';
    $pass_user_database = 'Ba123456789';
    try {
        $obj_database = new PDO ("mysql:host=$address_host;dbname=$name_database",$name_database,$pass_user_database);
    } catch (Exception $erro){
        echo 'Lỗi: '.$erro;
    }
?>
