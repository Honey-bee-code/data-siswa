<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Data Siswa</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <h2><strong>Aplikasi Data Siswa</strong></h2>
    <p><a href="index.php" class="btn btn-outline-primary" style="width: 150px;">Beranda</a>
        <a href="tambah.php" class="btn btn-outline-success" style="width: 150px;">Tambah Data</a>
        <a href="reportpdf/report.php" class="btn btn-outline-danger" style="width: 150px;">Print PDF</a>
    </p>
    <h3>Data Siswa</h3>
    <table cellpadding="5" cellspacing="0" border="1">
        <tr bgcolor="#cccccc">
            <th>No.</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Opsi</th>
        </tr>
    <?php
    // include file koneksi ke database
    include('koneksi.php');

    // query ke database dg SELECT table siswa diurutkan berdasarkan NIS paling besar
    $query = mysql_query("SELECT * FROM siswa ORDER BY siswa_nis DESC") or die (mysql_error());

    // cek apakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
    if(mysql_num_rows($query)==0) { // jika data hasil query diatas kosong
        // akan menampilkan row kosong
        echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
    } else { // jika data hasil query ada
        // maka akan melakukan perulangan while
        $no = 1;
        while ($data = mysql_fetch_assoc($query)) { // perulangan while dg membuat variabel $data yang akan mengambil data di database
            // menampilkan row dengan data di database
            echo '<tr>';
                echo '<td>' . $no . '</td>'; // menampilkan nomor urut
                echo '<td>' . $data['siswa_nis'] . '</td>';
                echo '<td>' . $data['siswa_nama'] . '</td>';
                echo '<td>' . $data['siswa_kelas'] . '</td>';
                echo '<td>' . $data['siswa_jurusan'] . '</td>';
                echo '<td><a href="edit.php?id='.$data['siswa_id'].'">Edit</a> /
                          <a href="hapus.php?id='.$data['siswa_id'].'" onclick= "return confirm (\'Yakin? akan menghapus data ini.\')">Hapus</a></td>'; // menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
            echo '</tr>';
            $no++; // menambah jumlah nomor urut setiap row
        }
    }
    ?>
    </table>
</body>
</html>
