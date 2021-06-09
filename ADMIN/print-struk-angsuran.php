<?php
include "koneksi_db.php";
$id = $_GET['id'];
$result = ("SELECT a.id_nasabah, n.norek_nasabah, n.nama_nasabah, a.total_angsur, a.tanggal_angsur FROM tb_angsuran a INNER JOIN tb_nasabah n WHERE a.id_nasabah=n.id_nasabah AND a.id_angsur LIKE '%$id%'");
$hasil = mysqli_query($koneksi,$result);
while($data = mysqli_fetch_array($hasil)) {
$idNasabah  = $data['id_nasabah'];
$norek      = $data['norek_nasabah'];
$nama       = $data['nama_nasabah'];
$jumlah     = $data['total_angsur'];
$tgl        = $data['tanggal_angsur'];
}
//ubah format bulan
function formatBulan($tgl){
  $bln    = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
  $pecah = explode('-', $tgl);
  return $pecah[2]. ' ' . $bln[((int)$pecah[1])-1]. ' ' .$pecah[0];
}
?>
<html>
  <head>
    <title>Admin - SI Bank Sampah</title>
    <link href="style/style.css" rel="stylesheet" type="text/css">
  </head>
  <body onload="window.print()">
    <table width="310" border="0" cellspacing="1" cellpadding="4" class="table-print">
      <tr>
        <td><strong><h3 align="center">BANK SAMPAH</h3></strong></td>
      </tr>
      <tr>
        <td align="center">Jl. Telang, No 31, Trunojoyo, <br> Bangkalan, Madura <br> Telpon : 07241111111 </td>
      </tr>
      <tr>
        <td>--------------------------------------------------------</td>
      </tr>
    </table>
    <table class="table-list" width="330" border="0" cellspacing="1" cellpadding="2">
      <thead>
      </thead>
      <tbody>
        <tr>
          <th align="left">ID Nasabah</th>
          <td width="20">:</td>
          <td width="170"><?php echo $idNasabah; ?></td>
        </tr>
        <tr>
          <th align="left">Rekening</th>
          <td>:</td>
          <td><?php echo $norek; ?></td>
        </tr>
        <tr>
          <th align="left">Nama</th>
          <td>:</td>
          <td><?php echo $nama; ?></td>
        </tr>
        <tr>
          <th align="left">Tanggal Angsur</th>
          <td>:</td>
          <td><?php echo formatBulan($tgl); ?></td>
        </tr>
        <tr>
          <th align="left">Jumlah</th>
          <td>:</td>
          <td>Rp<?php echo $jumlah; ?></td>
        </tr>
      </tbody>
    </table>
  </body>
</html>