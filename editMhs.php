<html>
<head>
    <title>Mahasiswa</title>
    <link rel="stylesheet" href="CSS/cssEditMhs.css">
</head>
    <!-- Awal Navbar -->
    <header>
            <img src="image/POLINEMA.png" width="40px" class="polinema">
            <h4 class="logo">MEDIA CENTER POLINEMA</h4>
        <nav>
            <ul class="link">
                <li><a href="MainPage.php">Home</a></li>
                <li><a href="Laporan.php"  >Pengaduan</a></li>
                <li><a href="Mahasiswa.php" class="mahasiswa">Tambah Data Mahasiswa</a></li>
                <li><a href="Jurusan.php">Tambah Data Unit</a></li>
            </ul>
        </nav>

    </header>
    <!-- Akhir Navbar -->
<!-- Awal Body -->
<img src="image/business,-entrepreneurship-and-growth.png" width="900px" class="foto">
<div class="form">
    <?php
    
    include 'connect.php';
    //Jika adanya action dari user
    $action = isset($_POST['action']) ? $_POST['action'] : "";
    
    if($action=="update"){ //User melakukan Submit pada Form
      //real_escape_string digunakan untuk menghindari serangan pada database seperti SQL injection
      $query = "update mahasiswa set
                nim             ='".$mysqli->real_escape_string($_POST['nim'])."',
                nama            ='".$mysqli->real_escape_string($_POST['nama'])."',
                jurusan         ='".$mysqli->real_escape_string($_POST['jurusan'])."',
                prodi           ='".$mysqli->real_escape_string($_POST['prodi'])."',
                no_telp         ='".$mysqli->real_escape_string($_POST['no_telp'])."'
                where id_mahasiswa  ='".$mysqli->real_escape_string($_REQUEST['id'])."'";
    
      //Eksekusi Query
        if($mysqli->query($query)){
            //Apabila Perubahan Berhasil
            header("Location: Mahasiswa.php");
        }else{
            //Apabila Perubahan Gagal
            echo "\n<a>Data gagal diubah</a>";
        }
    }
    
    $query = "select id_mahasiswa, nim, nama, jurusan, prodi, no_telp
                  from mahasiswa
                  where id_mahasiswa='".$mysqli->real_escape_string($_REQUEST['id'])."'
                  limit 0,1";
    
    //Eksekusi Query
    $result = $mysqli->query($query);
    
    //Mengambil Result
    $row = $result->fetch_assoc();
    
    //Menugaskan result kepada variable secara spesific yang membuat form html kita bisa menampilkan value / datanya
    $id_mahasiswa = $row['id_mahasiswa'];
    $nim = $row['nim'];
    $nama = $row['nama'];
    $jurusan = $row['jurusan'];
    $prodi = $row['prodi'];
    $no_telp = $row['no_telp'];
    ?>
    
    <?php
        //PHP ini digunakan untuk menyambungkan dengan database agar bisa menampilkan pilihan jurusan lewat tabel Jurusan
        include 'connect.php';
    
        //Query dipergunakan untuk menampilkan data jurusan
        $query = "select * from jurusan";
        $result = mysqli_query($mysqli, $query);
    ?>
    </div>
    
    <form action='#' method='post' border='0'>
        <table class='tabel2'>
            <tr>
                <td>NIM</td>
                <td><input type='text' name='nim' value='<?php echo $nim; ?>'/></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type='text' name='nama' value='<?php echo $nama; ?>'/></td>
            </tr>
                <td>Pilih Jurusan</td>
                <td>
                <select name="jurusan">
                        <?php while($row = mysqli_fetch_array($result)):; ?>
                        <option value="<?=$row['nama_jurusan']?>"><?php echo $row[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td><input type='text' name='prodi' value='<?php echo $prodi; ?>'/></td>
            </tr>
            <tr>
                <td>No_telp</td>
                <td><input type='text' name='no_telp' value='<?php echo $no_telp; ?>'/></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <!--Melakukan identifikasi record apa yang diubah-->
                    <input type='hidden' name='action' value='<?php echo $nim ?>'/>
                    <input type='hidden' name='action' value='update'/>
                    <input type='submit' value='Save'/>
                </td>
            </tr>
            </tr>
        </table>
    </form>
</div>


</html>