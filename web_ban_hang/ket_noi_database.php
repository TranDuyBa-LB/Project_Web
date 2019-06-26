<?php
    $hostname='localhost';
    $dbname='cua_hang';
    $name_admin = 'cua_hang';
    $pass = 'Ba123456789';
    $obj = new PDO("mysql:host=$hostname; dbname=$dbname",$name_admin,$pass);
 ?>