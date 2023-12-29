<?php

//Setting Variabel
$host       = "localhost";
$username   = "root";
$pass       = "";
$database   = "uas_cust";

//Koneksi ke Database MySql
$mysqli = new mysqli($host, $username, $pass, $database);

if(mysqli_connect_errno()){
    echo "Koneksi gagal";
    exit;
}
?>
