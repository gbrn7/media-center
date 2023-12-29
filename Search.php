<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="tablemhs">
        <table id='mytable' border='1' class='tabel'>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Prodi</th>
                <th>Pengaduan</th>
                <th>Tanggapan</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>
        <tbody>
        <?php 
        include('connect.php');
            if(isset($_POST['cari'])) {
                //menampung variabel cari dari form pencarian
                $cari = $_POST['cari'];
                $query = "SELECT * FROM pengaduan WHERE nama like '%".$cari."%'";
            }
            $result = mysqli_query($mysqli, $query);
            if(!$result) {
                die("Query Error : ".mysqli_errno($mysqli)." - ".mysqli_error($mysqli));
            }
            while($row = $result->fetch_assoc()){
                //Mengubah $row['nama'] menjadi $nama saja
                extract($row);
                    
                //Membuat tabel baru per data
                echo "<tr>";
                    echo "<td>{$nim}</td>";
                    echo "<td>{$nama}</td>";
                    echo "<td>{$jurusan}</td>";
                    echo "<td>{$prodi}</td>";
                    echo "<td>{$pengaduan}</td>";
                    echo "<td>{$tanggapan}</td>";
                    echo "<td>{$kondisi}</td>";
                    echo "<td>";
                        //Menyiapkan link Edit untuk melakukan edit data
                        echo "<a href='editLpr.php?id={$id_pengaduan}' class = 'edit'>Edit</a>";
                        echo " / ";
                        //Menyipkan link Hapus untuk melakukan penghapusan data
                        echo "<a href='#' onclick='delete_data( {$id_pengaduan});' class = 'delete'>Hapus</a>";
                    echo "</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>