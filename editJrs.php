<html>
<head>
    <title>Jurusan</title>
    <link rel="stylesheet" href="CSS/cssEditJrsn.css">
</head>
    <!-- Awal Navbar -->
    <header>
            <img src="image/POLINEMA.png" width="40px" class="polinema">
            <h4 class="logo">MEDIA CENTER POLINEMA</h4>
        <nav>
            <ul class="link">
                <li><a href="MainPage.php">Home</a></li>
                <li><a href="Laporan.php"  >Pengaduan</a></li>
                <li><a href="Mahasiswa.php" >Tambah Data Mahasiswa</a></li>
                <li><a href="Jurusan.php" class="jurusan">Tambah Data Unit</a></li>
            </ul>
        </nav>

    </header>
    <!-- Akhir Navbar -->
    <!-- Awal Body -->
<img src="image/business,-entrepreneurship-and-growth1.png" width="900px" class="foto">

<?php
include 'connect.php';
//Jika adanya action dari user
$action = isset($_POST['action']) ? $_POST['action'] : "";

if($action=="update"){ //User melakukan Submit pada Form
  //real_escape_string digunakan untuk menghindari serangan pada database seperti SQL injection
  $query = "update jurusan set
            nama_jurusan     ='".$mysqli->real_escape_string($_POST['nama_jurusan'])."',
            nama_prodi       ='".$mysqli->real_escape_string($_POST['nama_prodi'])."'
            where id_jp       ='".$mysqli->real_escape_string($_REQUEST['id'])."'";

  //Eksekusi Query
    if($mysqli->query($query)){
        //Apabila Perubahan Berhasil
        header("Location: Jurusan.php");
    }else{
        //Apabila Perubahan Gagal
        echo "\n<a>Data gagal diubah</a>";
    }
}

$query = "select id_jp, nama_jurusan, nama_prodi
              from jurusan
              where id_jp='".$mysqli->real_escape_string($_REQUEST['id'])."'
              limit 0,1";

//Eksekusi Query
$result = $mysqli->query($query);

//Mengambil Result
$row = $result->fetch_assoc();

//Menugaskan result kepada variable secara spesific yang membuat form html kita bisa menampilkan value / datanya
$id_jp = $row['id_jp'];
$nama_jurusan = $row['nama_jurusan'];
$nama_prodi = $row['nama_prodi'];
?>

<form action='#' method='post' border='0'>
    <table class='tabel2'>
        <tr>
            <td>Nama Jurusan</td>
            <td><input type='text' name='nama_jurusan' value='<?php echo $nama_jurusan; ?>'/></td>
        </tr>
        <tr>
            <td>Nama Prodi</td>
            <td><input type='text' name='nama_prodi' value='<?php echo $nama_prodi; ?>'/></td>
        </tr>    
            <td></td>
            <td>
                <!--Melakukan identifikasi record apa yang diubah-->
                <input type='hidden' name='action' value='<?php echo $kode ?>'/>
                <input type='hidden' name='action' value='update'/>
                <input type='submit' value='Save'/>
            </td>
        </tr>
        </tr>
    </table>
</form>
</html>