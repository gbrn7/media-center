<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/cssAdmin.css">
</head>
<body>
    <?php
    include 'connect.php';
    session_start();
    $query = "select count(id_pengaduan) as jml from pengaduan";
    $query2 = "select count(id_pengaduan) as jml from pengaduan where kondisi = 'Selesai Ditanggapi'";
    $query3 = "select count(id_pengaduan) as jml from pengaduan where kondisi = 'Belum Ditanggapi'";
    $result = $mysqli->query($query);
    $result2 = $mysqli->query($query2);
    $result3 = $mysqli->query($query3);
    $row = $result->fetch_assoc();
    $row2 = $result2->fetch_assoc();
    $row3 = $result3->fetch_assoc();

    $jml = $row['jml'];
    $jml2 = $row2['jml'];
    $jml3 = $row3['jml'];

    ?>
    <!-- Awal Navbar -->
    <header>
            <img src="image/POLINEMA.png" width="40px" class="polinema">
            <h4 class="logo">MEDIA CENTER POLINEMA</h4>
            <img src="image/user-interface0.png" height="25px" class="profile">
        <nav>
            <ul class="link">
            
                <li><?php echo $_SESSION['user'] ?></li>
                <li><a href="MainPage.php" class="home">Home</a></li>
                <li><a href="Laporan.php">Pengaduan</a></li>
                <li><a href="Mahasiswa.php">Tambah Data Mahasiswa</a></li>
                <li><a href="Jurusan.php">Tambah Data Unit</a></li>
            </ul>
        </nav>

    </header>
    <!-- Akhir Navbar -->
        <!--Awal body-->
        <section class="kontenatas">
            <div class="square" style="--i:0"></div>
            <div class="square" style="--i:1"></div>
            <div class="square" style="--i:2"></div>
            <div class="square" style="--i:3"></div>
            <div class="square" style="--i:4"></div>
            <img src="image/busy-project-manager-overwhelmed-by-work.png" width="900px" class="foto">
            <div class="shortcut">
                <div class="konten">
                    <h1 class="Big">
                        Media Center
                    </h1>
                    <h1 class="Big">
                        Politeknik Negeri Malang
                    </h1>
                    <p class="deskripsi"> Layanan Pengaduan Mahasiswa Politeknik Negeri Malang</p>
                    <a href="Laporan.php"><button type="submit" class="tombol">Buat Pengaduan</button></a>
                    
                </div>
            </div>

        </section>

        <div class="totalpengaduan">
            <div class="box">
                <table width = "700px" cellpadding="40" cellspacing = "8" >
                    <tr>
                        <td align="center"><h1>PENGADUAN</h1></tr>
                    </tr>
                    <tr>
                        <td align="center"><h1><?php echo $jml ?></h1></td>
                    </tr>
                    <tr>
                        <td align="center"><h3>Total Laporan Pengaduan</h3></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="report"> 
            <div class="kotak">
                
                <table width = "700px" cellpadding="40" cellspacing = "8">
                    <tr>
                        <td></td>
                        <td align="center"><h1>STATUS</h1></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center"><h1><?php echo $jml3 ?></h1></td>
                        <td align="center"><h1><?php echo $jml2 ?></h1></td>
                        <td align="center"><h1><?php echo $jml ?></h1></td>
                    </tr>
                    <tr>
                        <td align="center"><h3>Belum Ditanggapi</h3></td>
                        <td align="center"><h3>Sudah Ditanggapi</h3></td>
                        <td align="center"><h3>Total Pengaduan</h3></td>
                    </tr>
                </table>
            </div>

        </div>
        <!--Akhir body-->

        <!--Awal Footer-->
        <div class="footer">
            <table>
                <tr>
                    <td  align="center"><p>© 2021 Polinema College Student. All rights reserved.</p></td>
                </tr>
                <tr>
                    <td  align="center"><a href="LoginPage.php">Logout</a></td>
                </tr>
            </table>
            
        </div>
        <!--Akhir Footer-->
</body>
</html>