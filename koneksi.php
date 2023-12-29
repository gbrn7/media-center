<?php

//Setting Variabel
$host       = "localhost";
$username   = "root";
$pass       = "";
$database   = "uas_cust";

//Koneksi ke Database MySql
$conn = mysqli_connect($host, $username, $pass, $database);
if(!$conn){
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
?>
