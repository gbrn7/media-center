<html>
<head>
    <title>Mahasiswa</title>
    <link rel="stylesheet" href="CSS/cssMahasiswa.css">
</head>
<?php
session_start();
?>
<body>
    
    <!-- Awal Navbar -->
    <header>
            <img src="image/POLINEMA.png" width="40px" class="polinema">
            <h4 class="logo">MEDIA CENTER POLINEMA</h4>
            <img src="image/user-interface0.png" height="25px" class="profile">
        <nav>
            <ul class="link">
                <li><?php echo $_SESSION['user'] ?></li>
                <li><a href="MainPage.php">Home</a></li>
                <li><a href="Laporan.php"  >Pengaduan</a></li>
                <li><a href="Mahasiswa.php" class="mahasiswa">Tambah Data Mahasiswa</a></li>
                <li><a href="Jurusan.php">Tambah Data Unit</a></li>
            </ul>
        </nav>

    </header>
    <!-- Akhir Navbar -->
<!--Awal Body-->
<img src="image/busy-project-manager-overwhelmed-by-work1.png" width="1000px" class="foto">
<?php
//Jika adanya action dari user
$action = isset($_POST['action']) ? $_POST['action'] : "";

if($action=='create'){ //User melakukan Submit pada Form

  //Include Koneksi Database
  include 'connect.php';
  $nim = $_POST['nim'];
  $sql = "SELECT * from mahasiswa Where nim = '$nim'";
  $result = mysqli_query($mysqli, $sql);
  if($result -> num_rows > 0){
    echo "<script> alert ('Nim yang anda masukkan sudah ada Gan!!')</script>";
  }
  else{
      //Insert Query
      //real_escape_string digunakan untuk menghindari serangan pada database seperti SQL injection
      $query = "insert into mahasiswa set
                nim             ='".$mysqli->real_escape_string($_POST['nim'])."',
                nama            ='".$mysqli->real_escape_string($_POST['nama'])."',
                jurusan         ='".$mysqli->real_escape_string($_POST['jurusan'])."',
                prodi           ='".$mysqli->real_escape_string($_POST['prodi'])."',
                no_telp         ='".$mysqli->real_escape_string($_POST['no_telp'])."'";
    
      //Execute Query
      if($mysqli->query($query)){
          //Kalau penambahan sukses
      }else{
          //Kalau penambahan gagal
          echo "\n<a>Gagal menambahkan data</a>";
      }
  }
  //Menutup Koneksi database
  $mysqli->close();
}
?>

<?php
    //PHP ini digunakan untuk menyambungkan dengan database agar bisa menampilkan pilihan jurusan lewat tabel Jurusan
    include 'connect.php';

    //Query dipergunakan untuk menampilkan data jurusan
    $query = "select * from jurusan";
    $result = mysqli_query($mysqli, $query);
?>

<!--JavaScript dibawah digunakan untuk memvalidasi form agar tidak kosong-->
<script type="text/javascript" src="validasi/validMhs.js"></script>

<div class="form">
    <form name="Mahasiswa" action='#' method='post' onsubmit="return validasi()" border='0'>
        <table class='tabel2'>
            <tr>
                <td>NIM</td>
                <td><input type='text' name='nim'/></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type='text' name='nama'/></td>
            </tr>
                <td>Pilih Jurusan</td>
                <td>
                    <select name="jurusan">
                        <option disabled>-----PILIH JURUSAN-----</option>
                        <?php while($row = mysqli_fetch_array($result)):; ?>
                        <option value="<?=$row['nama_jurusan']?>"><?php echo $row[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td><input type='text' name='prodi'/></td>
            </tr>
            <tr>
                <td>No Telepon</td>
                <td><input type='text' name='no_telp'/></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type='hidden' name='action' value='create'/>
                    <input type='submit' value='Save'/>
                </td>
            </tr>
            </tr>
        </table>
    </form>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#000000" fill-opacity="1" d="M0,64L21.8,90.7C43.6,117,87,171,131,202.7C174.5,235,218,245,262,234.7C305.5,224,349,192,393,176C436.4,160,480,160,524,181.3C567.3,203,611,245,655,245.3C698.2,245,742,203,785,192C829.1,181,873,203,916,192C960,181,1004,139,1047,154.7C1090.9,171,1135,245,1178,234.7C1221.8,224,1265,128,1309,106.7C1352.7,85,1396,139,1418,165.3L1440,192L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path></svg>
<div class="tablemhs">
    
<?php
    include 'connect.php';

    $action = isset($_GET['action']) ? $_GET['action'] : "";

    if($action == 'delete'){ //Apabila user melakukan submit pada tombol Hapus
    //real_escape_string digunakan untuk menghindari serangan pada database seperti SQL injection
    $query = "DELETE from mahasiswa where id_mahasiswa = ".$mysqli->real_escape_string($_GET['id'])."";
    //Mengeksekusi Query
    if($mysqli->query($query)){
        //Apabila Penghapusan Berhasil
        echo "\nData telah dihapus";
    }else{
        //Apabila Penghapusan Gagal
        echo "\nDatabase error : Data gagal dihapus";
    }
}

    //Query untuk mengambil seluruh record dari Database
    $query = "select * from mahasiswa";

    //Mengeksekusi Query
    $result = $mysqli->query($query);

    //Mengambil jumlah baris yang direturn
    $num_results = $result->num_rows;

    if($num_results > 0){ //Apabila sudah ada data dalam Database

    echo "<div class='badan'>";
    echo "<div class='halaman'>";
    echo "<table border='1' class='tabel'>"; //Awal mula tabel
    
    //Membuat Heading Tabel
    echo "<tr>";
        echo "<th>NIM</th>";
        echo "<th>Nama</th>";
        echo "<th>Jurusan</th>";
        echo "<th>Prodi</th>";
        echo "<th>No Telepon</th>";
        echo "<th>Aksi</th>";
    echo "</tr>";

    //Looping untuk menampilkan setiap datanya
    while($row = $result->fetch_assoc()){
        //Mengubah $row['nama'] menjadi $nama saja
        extract($row);

        //Membuat tabel baru per data
        echo "<tr>";
            echo "<td>{$nim}</td>";
            echo "<td>{$nama}</td>";
            echo "<td>{$jurusan}</td>";
            echo "<td>{$prodi}</td>";
            echo "<td>{$no_telp}</td>";
            echo "<td>";
                //Menyiapkan link Edit untuk melakukan edit data
                echo "<a href='editMhs.php?id={$id_mahasiswa}' class = 'edit'>Edit</a>";
                echo " / ";
                //Menyipkan link Hapus untuk melakukan penghapusan data
                echo "<a href='#' onclick='delete_data( {$id_mahasiswa});' class = 'delete'>Hapus</a>";
            echo "</td>";
        echo "</tr>";
    }

    echo "</table>"; //Akhir dari tabel
    echo "</div>";
    echo "</div>";

    }else{
        //Apabila Database kosong
        echo "<a>Data tidak ditemukan</a>";
    }

    $result->free();
    $mysqli->close();

?> 
</div>
<!--Akhir Body-->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ff" fill-opacity="1" d="M0,224L34.3,208C68.6,192,137,160,206,165.3C274.3,171,343,213,411,202.7C480,192,549,128,617,122.7C685.7,117,754,171,823,181.3C891.4,192,960,160,1029,160C1097.1,160,1166,192,1234,181.3C1302.9,171,1371,117,1406,90.7L1440,64L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>
        <!--Awal Footer-->
        <div class="footer">
            <p>© 2021 Polinema College Student. All rights reserved.</p>
        </div>
        <!--Akhir Footer-->
<script type='text/javascript'>

    function delete_data (id_mahasiswa){
        //Memberikan Prompt pada user
        var answer = confirm('Apakah anda yakin?');

        if(answer){ //Apabila user memilih ok
            //Men-direct menuju url dengan action sebagai delete dan id dari data yang akan dihapus
            window.location='Mahasiswa.php?action=delete&id=' + id_mahasiswa;
        }
    }
</script>

</body>
</html>