<?php

// cek dulu, apakah benar url sudah ada GET id
if (isset($_GET['id'])) {

    // include file koneksi
    include ('koneksi.php');

    // membuat variabel $id yang bernilai dari URL GET id
    $id = $_GET['id'];
    
    // cek ke database apakah ada siswa dengan siswa_id=$id
    $cek = mysql_query("SELECT siswa_id FROM siswa WHERE siswa_id='$id'")
            or die (mysql_error());
        
    // jika data siswa tidak ada
    if (mysql_num_rows($cek) == 0) {
        // redirect 
        echo '<script>window.history.back()</script>';
    } else {

        // jika data ada di database, maka melakukan query DELETE table
        $del = mysql_query("DELETE FROM siswa WHERE siswa_id='$id'");

        // jika query berhasil
        if($del) {
            echo 'Data siswa berhasil dihapus!';
            echo '<a href="index.php">Kembali</a>';
        }
    } 
} else {
            //redirect
            echo '<script>window.history.back()</script>';
}
?>