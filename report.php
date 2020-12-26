<?php
include('koneksi2.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"SELECT * FROM siswa");
$html .= '<center><h3>Daftar Nama Siswa</h3></center><br/>';
$html .= '<br/>';
$html .= '<br/><table cellpadding="5" cellspacing="1" border="1" width="100%">
 <tr style="background-color:#cccccc">
 <th>No</th>
 <th>NIS</th>
 <th>Nama</th>
 <th>Kelas</th>
 <th>Jurusan</th>
 </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$row['siswa_nis']."</td>
 <td>".$row['siswa_nama']."</td>
 <td>".$row['siswa_kelas']."</td>
 <td>".$row['siswa_jurusan']."</td>
 </tr>";
 $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_siswa.pdf');
?>