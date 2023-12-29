<?php
    include 'connect.php';
    session_start();
    if(isset($_POST['login'])){

        $username = $_POST['user'];
        $password = $_POST['pass'];
    
        $sql = "SELECT * FROM username_mhs WHERE nim = '$username' AND pass = '$password'";
        $result = mysqli_query($mysqli, $sql);

        $sql1 = "SELECT * FROM user_admin WHERE user = '$username' AND pass = '$password'";
        $result1 = mysqli_query($mysqli, $sql1);
        if($result -> num_rows > 0){

            $sql2 = "SELECT nama FROM mahasiswa where nim = $username";
            $result2 = $mysqli->query($sql2);
            $row = $result2->fetch_assoc();
            $name = $row['nama'];
            $_SESSION['user'] = $name;
            header("Location: userPage.php");
            
        }
        if($result1 -> num_rows > 0){
            $_SESSION['user'] = $username;
            header("Location: MainPage.php");
        }
        else{
            echo "<script> alert ('Email atau Password anda salah')</script>";
        }

    }

    ?>


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
    <!--Awal Ilustrasi-->
    <section class="image">
        <img src="image/startups,-entrepreneurship-and-growth.png" width="1000px" >
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
                            <input type="submit" value="Login" name ="login">
                        </div>
                        <div class="inputbox">
                        <span class ="daftar">Don't have an account ? <a href="register.php">Sign Up</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Akhir Login Page-->

</body>
</html>