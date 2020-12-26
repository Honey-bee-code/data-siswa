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
        <a href="report.php" class="btn btn-outline-danger" style="width: 150px;">Print PDF</a>
    </p>

    <h3>Tambah Data Siswa</h3>
    <form action="tambah-proses.php" method="post">
        <table cellpadding="3" cellspacing="0">
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td><input type="text" name="nis" required></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" name="nama" size="30" required></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>
                    <select name="kelas" required>
                        <option value="">Pilih Kelas</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td>
                    <select name="jurusan" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                        <option value="Multimedia">Multimedia</option>
                        <option value="Akuntansi">Akuntansi</option>
                        <option value="Perbankan">Perbankan</option>
                        <option value="Pemasaran">Pemasaran</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td><input type="submit" name="tambah" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>
</html>
