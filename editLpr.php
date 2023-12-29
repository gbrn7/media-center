<html>
<head>
    <title>Pengaduan</title>
    <link rel="stylesheet" href="CSS/cssEditLaporan.css">
</head>
    <!-- Awal Navbar -->
    <header>
            <img src="image/POLINEMA.png" width="40px" class="polinema">
            <h4 class="logo">MEDIA CENTER POLINEMA</h4>
        <nav>
            <ul class="link">
                <li><a href="MainPage.php">Home</a></li>
                <li><a href="Laporan.php"  class="laporan">Pengaduan</a></li>
                <li><a href="Mahasiswa.php" >Tambah Data Mahasiswa</a></li>
                <li><a href="Jurusan.php" >Tambah Data Unit</a></li>
            </ul>
        </nav>

    </header>
    <!-- Akhir Navbar -->
    <!-- Awal Body -->
<img src="image/business,-entrepreneurship-and-growth2.png" width="900px" class="foto">
<div class="form">

</div>
<?php
include 'connect.php';
//Jika adanya action dari user
$action = isset($_POST['action']) ? $_POST['action'] : "";

if($action=="update"){ //User melakukan Submit pada Form
  //real_escape_string digunakan untuk menghindari serangan pada database seperti SQL injection
  $query = "update pengaduan set
            nim                      ='".$mysqli->real_escape_string($_POST['nim'])."',
            nama                     ='".$mysqli->real_escape_string($_POST['nama'])."',
            jurusan                  ='".$mysqli->real_escape_string($_POST['jurusan'])."',
            prodi                    ='".$mysqli->real_escape_string($_POST['prodi'])."',
            pengaduan                ='".$mysqli->real_escape_string($_POST['pengaduan'])."',
            tanggapan                ='".$mysqli->real_escape_string($_POST['tanggapan'])."',
            kondisi                  ='".$mysqli->real_escape_string($_POST['kondisi'])."'
            where id_pengaduan       ='".$mysqli->real_escape_string($_REQUEST['id'])."'";

  //Eksekusi Query
    if($mysqli->query($query)){
        //Apabila Perubahan Berhasil
        header("Location: Laporan.php");

    }else{
        //Apabila Perubahan Gagal
        echo "\n<a>Data gagal diubah</a>";
    }
}

$query = "select id_pengaduan, nim, nama, jurusan, prodi, pengaduan, tanggapan, kondisi
              from pengaduan
              where id_pengaduan='".$mysqli->real_escape_string($_REQUEST['id'])."'
              limit 0,1";

//Eksekusi Query
$result = $mysqli->query($query);

//Mengambil Result
$row = $result->fetch_assoc();

//Menugaskan result kepada variable secara spesific yang membuat form html kita bisa menampilkan value / datanya
$id_pengaduan = $row['id_pengaduan'];
$nim = $row['nim'];
$nama = $row['nama'];
$jurusan = $row['jurusan'];
$prodi = $row['prodi'];
$pengaduan = $row['pengaduan'];
$tanggapan = $row['tanggapan'];
$kondisi = $row['kondisi'];
?>

<?php
    //PHP ini digunakan untuk menyambungkan dengan database agar bisa menampilkan pilihan jurusan lewat tabel Jurusan
    include 'connect.php';

    //Query dipergunakan untuk menampilkan data jurusan
    $query = "select * from jurusan";
    $result = mysqli_query($mysqli, $query);
?>

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
                    <option selected='jurusan' value="<?=$row['nama_jurusan']?>"><?php echo $row[1]; ?></option>
                    <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Prodi</td>
            <td><input type='text' name='prodi' value='<?php echo $prodi; ?>'/></td>
        </tr>
        <tr>
            <td>Pengaduan</td>
            <td><textarea rows="4" cols="50" name='pengaduan'><?php echo $pengaduan; ?></textarea></td>
        </tr>
        <tr>
            <td>Tanggapan</td>
            <td><textarea rows="4" cols="50" name='tanggapan'><?php echo $tanggapan; ?></textarea></td>
        </tr>
        </tr>
            <td>Status</td>
            <td>
                <select name="kondisi">
                <option value="Selesai Ditanggapi">Selesai Ditanggapi</option>
                <option value="Belum Ditanggapi">Belum Ditanggapi</option>
                </select>
            </td>
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
</html>