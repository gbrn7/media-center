<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="CSS/cssLoginPage.css">
</head>
<body>

<?php
    include 'connect.php';

    if(isset($_POST['daftar'])){

        $username = $_POST['user'];
        $password = $_POST['pass'];
    
        $sql = "SELECT nim FROM mahasiswa WHERE nim = '$username'";
        $result = mysqli_query($mysqli, $sql);
        if($result -> num_rows > 0){
            $sql1 = "SELECT * FROM username_mhs WHERE nim = '$username'";
            $result1 = mysqli_query($mysqli, $sql1);
            if($result1 -> num_rows > 0){
                echo  "<script> alert ('Nim sudah didaftarkan')</script>";
            }
            else{
                if($password != null){
                    $query = "INSERT INTO username_mhs values ('$username','$password')";
                    $result2 = mysqli_query($mysqli, $query);
                    if($result2){
                        echo "<script> alert ('Selamat, Registrasi Berhasil!!')</script>";
                    }
                    else{
                        echo "<script> alert ('woopps, Ada Kesalahan')</script>";
                    }
                }
                else{
                    echo "<script> alert ('woopps, Ada Kesalahan')</script>";
                }
            }

        }
        else{
            echo "<script> alert ('Nim Tidak terdaftar')</script>";
        }

    }

    ?>
    <!--Awal Ilustrasi-->
    <section class="image">
        <img src="image/people-working-together-online.png" width="1000px" >
    </section>
    <!--Akhir Ilustrasi-->
    <!--Awal Login Page-->
    <section class="logPage">
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
        <div class="box">
            <div class="square" style="--i:0"></div>
            <div class="square" style="--i:1"></div>
            <div class="square" style="--i:2"></div>
            <div class="square" style="--i:3"></div>
            <div class="square" style="--i:4"></div>
            <div class="container">
                <div class="form" >
                    <img src="image/POLINEMA.png" width="70px" class="gambar">
                    <h2>Media Center</h2>
                    <h2>Politeknik Negeri Malang</h2>
                    <form action = " " method="POST">
                        <div class="inputbox">
                        <input type="text" placeholder="Nim/Username" name="user">
                        </div>
                        <div class="inputbox">
                            <input type="password" placeholder="Password" name ="pass">
                        </div>
                        <div class="inputbox">
                            <input type="submit" value="Sign up" name ="daftar">
                        </div>
                        <div class="inputbox">
                            <span class ="daftar">Already a member ?  <a href="LoginPage.php">Sign In</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Akhir Login Page-->

</body>
</html>