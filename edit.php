<!DOCTYPE html>
<html lang="en">
<head>
    <title>Aplikasi Data Siswa</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<h2><strong>Aplikasi Data Siswa</strong></h2>
    <p><a href="index.php" class="btn btn-outline-primary" style="width: 150px;">Beranda</a>
        <a href="tambah.php" class="btn btn-outline-success" style="width: 150px;">Tambah Data</a>
        <a href="report.php" class="btn btn-outline-danger" style="width: 150px;">Print PDF</a>
    </p>

    <h3>Edit Data Siswa</h3>
    <?php
    // proses mengambil data ke database untuk ditampilkan di form edit berdasarkan
    // siswa_id yang didapatkan dari GET id-> etid.php?id=siswa_id

    // include atau memasukkan file koneksi ke database
    include('koneksi.php');
    
    // membuat variabel $id yang nilainya adalah dari URL GET id -> edit.php?id=siswa_id
    $id = $_GET['id'];

    // melakukan query ke database dg SELECT tabel siswa dengan kondisi WHERE siswa_id = '$id"
    $show = mysql_query("SELECT * FROM siswa WHERE siswa_id='$id'");

    // cek apakah data dari hasil query ada atau tidak
    if (mysql_num_rows($show) == 0) {
        // jika tidak ada data yang sesuai maka akan langsung diarahkan ke halaman depan atau beranda -> index.php
        echo '<script>window.history.back()</script>';
    } else {

        // jika data ditemukan, maka membuat variabel $data
        $data = mysql_fetch_assoc($show); // mengambil data ke database yang nantinya akan ditampilkan diform edit di bawah
    }
    ?>
    <form action="edit-proses.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- membuat inputan hidden dan nilainya adalah siswa_id -->
        <table cellpadding="3" cellspacing="0">
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td><input type="text" name="nis" value="<?php echo $data['siswa_nis']; ?>" required></td> <!-- value diambil dari hasil query -->
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" name="nama" size="30" value="<?php echo $data['siswa_nama']; ?>" required></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>
                    <select name="kelas" required>
                        <option value="">Pilih kelas</option>
                        <option value="X" <?php if ($data['siswa_kelas'] == 'X') {echo 'selected';} ?>>X</option>
                        <option value="XI" <?php if ($data['siswa_kelas'] == 'XI') {echo 'selected';} ?>>XI</option>
                        <option value="XII" <?php if ($data['siswa_kelas'] == 'XII') {echo 'selected';} ?>>XII</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td>
                    <select name="jurusan" required>
                        <option value="">Pilih jurusan</option>
                        <option value="Teknik Komputer dan Jaringan" <?php if($data['siswa_jurusan'] == 'Teknik Komputer dan Jaringan') {echo 'selected';} ?>>Teknik Informatika dan Jaringan</option>
                        <option value="Multimedia" <?php if($data['siswa_jurusan'] == 'Multimedia') {echo 'selected';} ?>>Multimedia</option>
                        <option value="Akuntansi" <?php if($data['siswa_jurusan'] == 'Akuntansi') {echo 'selected';} ?>>Akuntansi</option>
                        <option value="Perbankan" <?php if($data['siswa_jurusan'] == 'Perbankan') {echo 'selected';} ?>>Perbankan</option>
                        <option value="Pemasaran" <?php if($data['siswa_jurusan'] == 'Pemasaran') {echo 'selected';} ?>>Pemasaran</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>
