<html>
<head>
    <title>Jurusan</title>
    <link rel="stylesheet" href="CSS/cssJrsn.css">
</head>
<body>
<?php
session_start();
?>
    <!-- Awal Navbar -->
    <header>
            <img src="image/POLINEMA.png" width="40px" class="polinema">
            <h4 class="logo">MEDIA CENTER POLINEMA</h4>
            <img src="image/user-interface0.png" height="25px" class="profile">
        <nav>
            <ul class="link">
                <li><?php echo $_SESSION['user'] ?></li>
                <li><a href="MainPage.php">Home</a></li>
                <li><a href="Laporan.php" >Pengaduan</a></li>
                <li><a href="Mahasiswa.php" >Tambah Data Mahasiswa</a></li>
                <li><a href="Jurusan.php"  class="jurusan">Tambah Data Unit</a></li>
            </ul>
        </nav>

    </header>
    <!-- Akhir Navbar -->
<!-- Awal Body -->

<img src="image/two-travelers-taking-a-train.png" width="1100px" class="foto">
<?php
//Jika adanya action dari user
$action = isset($_POST['action']) ? $_POST['action'] : "";

if($action=='create'){ //User melakukan Submit pada Form

  //Include Koneksi Database
  include 'connect.php';
  $jrsn = $_POST['nama_jurusan'];
  $prodi = $_POST['nama_prodi'];
  $sql = "SELECT * from jurusan Where nama_jurusan = '$jrsn' AND nama_prodi = '$prodi'";
  $result = mysqli_query($mysqli, $sql);
  if($result->num_rows){
    echo "<script> alert('Jurusan dan prodi sudah ada Gann!!')</script>";
  }
  else{
      //Insert Query
      //real_escape_string digunakan untuk menghindari serangan pada database seperti SQL injection
      $query = "insert into jurusan set
                nama_jurusan          ='".$mysqli->real_escape_string($_POST['nama_jurusan'])."',
                nama_prodi            ='".$mysqli->real_escape_string($_POST['nama_prodi'])."'";
    
      //Execute Query
      if($mysqli->query($query)){
          //Kalau penambahan sukses
      }else{
          //Kalau penambahan gagal
          echo "\nGagal menambahkan data";
      }
  }
  //Menutup Koneksi database
  $mysqli->close();
}
?>

<!--JavaScript dibawah digunakan untuk memvalidasi form agar tidak kosong-->
<script type="text/javascript" src="validasi/validJrs.js"></script>
<div class="form">
    <form name='Jurusan' action='#' method='post' onsubmit="return validasi()" border='0'>
        <table class='tabel2'>
            <tr>
                <td>Nama Jurusan</td>
                <td><input type='text' name='nama_jurusan'/></td>
            </tr>
            <tr>
                <td>Nama Prodi</td>
                <td><input type='text' name='nama_prodi'/></td>
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
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="000" fill-opacity="1" d="M0,64L24,64C48,64,96,64,144,69.3C192,75,240,85,288,122.7C336,160,384,224,432,245.3C480,267,528,245,576,224C624,203,672,181,720,186.7C768,192,816,224,864,245.3C912,267,960,277,1008,234.7C1056,192,1104,96,1152,80C1200,64,1248,128,1296,160C1344,192,1392,192,1416,192L1440,192L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z"></path></svg>
<div class="tablemhs">

<?php
    include 'connect.php';

    $action = isset($_GET['action']) ? $_GET['action'] : "";

    if($action == 'delete'){ //Apabila user melakukan submit pada tombol Hapus
    //real_escape_string digunakan untuk menghindari serangan pada database seperti SQL injection
    $query = "DELETE from jurusan where id_jp = ".$mysqli->real_escape_string($_GET['id'])."";
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
    $query = "select * from jurusan ORDER BY nama_jurusan;";

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
        echo "<th>Nama Jurusan</th>";
        echo "<th>Nama Prodi</th>";
        echo "<th>Aksi</th>";
    echo "</tr>";

    //Looping untuk menampilkan setiap datanya
    while($row = $result->fetch_assoc()){
        //Mengubah $row['nama'] menjadi $nama saja
        extract($row);

        //Membuat tabel baru per data
        echo "<tr>";
            echo "<td>{$nama_jurusan}</td>";
            echo "<td>{$nama_prodi}</td>";
            echo "<td>";
                //Menyiapkan link Edit untuk melakukan edit data
                echo "<a href='editJrs.php?id={$id_jp}' class = 'edit'>Edit</a>";
                echo " / ";
                //Menyipkan link Hapus untuk melakukan penghapusan data
                echo "<a href='#' onclick='delete_data( {$id_jp} );' class = 'delete'>Hapus</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>"; //Akhir dari tabel
    echo "</div>";
    echo "</div>";

    }else{
        //Apabila Database kosong
        echo "Database tidak ditemukan";
    }

    $result->free();
    $mysqli->close();
?> 
</div>

<!-- Akhir Body -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="000" fill-opacity="1" d="M0,32L24,74.7C48,117,96,203,144,213.3C192,224,240,160,288,144C336,128,384,160,432,160C480,160,528,128,576,117.3C624,107,672,117,720,149.3C768,181,816,235,864,224C912,213,960,139,1008,106.7C1056,75,1104,85,1152,90.7C1200,96,1248,96,1296,106.7C1344,117,1392,139,1416,149.3L1440,160L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"></path></svg>
        <!--Awal Footer-->
        <div class="footer">
            <p>© 2021 Polinema College Student. All rights reserved.</p>
        </div>
        <!--Akhir Footer-->
<script type='text/javascript'>

    function delete_data (id_jp){
        //Memberikan Prompt pada user
        var answer = confirm('Apakah anda yakin?');

        if(answer){ //Apabila user memilih ok
            //Men-direct menuju url dengan action sebagai delete dan id dari data yang akan dihapus
            window.location='Jurusan.php?action=delete&id=' + id_jp;
        }
    }
</script>

</body>
</html>