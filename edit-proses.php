<?php

// cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])) {

    //include atau memasukkan file koneksi ke database
    include('koneksi.php');

    // jika tombol tambah benar di klik maka lanjut prosesnya
    $id         = $_POST['id']; // membuat variabel $id dan datanya dari inputan
    $nis        = $_POST['nis']; // membuat variabel $nis dan datanya dari inputan
    $nama       = mysql_real_escape_string($_POST['nama']); // membuat variabel $nama dan datanya dari inputan
        strpos($nama, '<') or die ('nama tidak valid'); // anti SQL injection
    $kelas      = $_POST['kelas']; // membuat variabel $kelas dan datanya dari inputan
    $jurusan    = $_POST['jurusan']; // membuat variabel $jurusan dan datanya dari inputan

    // melakukan query dengan perintah UPDATE untuk update data ke database
    $update = mysql_query("UPDATE siswa SET siswa_nis='$nis', siswa_nama='$nama', siswa_kelas='$kelas', siswa_jurusan='$jurusan' WHERE siswa_id='$id'")
            or die(mysql_error());
    
    // jika update sukses
    if($update) {

        echo 'Data berhasil di simpan!';
        echo '<a href="edit.php?id=' . $id . '">Kembali</a>';
    } else {
        echo 'Gagal menyimpan data!';
        echo '<a href="edit.php?id=' . $id . '">Kembali</a>'; 
    }
} else {
    echo '<script>window.history.back()</script>';
}
?>
