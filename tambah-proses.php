<?php

// cek dulu, jika tombol tambah di klik
if (isset($_POST['tambah'])) {

    // include atau memasukkan file koneksi ke database
    include('koneksi.php');

    // jika tombol tambah benar di klik maka lanjut prosesnya
    $nis        = $_POST['nis']; // membuat variabel $nis dan datanya dari inputan
    $nama       = mysql_real_escape_string($_POST['nama']); // membuat variabel $nama dan datanya dari inputan
    $kelas      = $_POST['kelas']; // membuat variabel $kelas dan datanya dari inputan
    $jurusan    = $_POST['jurusan']; // membuat variabel $jurusan dan datanya dari inputan

    // melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
    $input = mysql_query("INSERT INTO siswa VALUES(NULL, '$nis', '$nama', '$kelas', '$jurusan')")
            or die (mysql_error());

    // jika query input sukses
    if ($input) {
        echo 'Data berhasil di tambahkan!';     // pesan jika proses tambah sukses
        echo '<a href="tambah.php">Kembali</a>'; // membuat link untuk kembali ke halaman tambah
    } else {
        echo 'Gagal menambahkan data !';
        echo '<a href="tambah.php">Kembali</a>';
    }
} else { // jika tidak terdeteksi tombol tambah diklik
    
    // redirect atau dikembalikan ke halaman tambah
    echo '<script>window.history.back()</script>';
}
?>