<?php
include "koneksi_db.php";
$id = $_GET['id'];
$result = ("SELECT j.id_pengepul, p.nama_pengepul, j.total_jual, j.tanggal_jual FROM tb_penjualan j INNER JOIN tb_pengepul p WHERE j.id_pengepul=p.id_pengepul AND j.id_jual LIKE '%$id%'");
$hasil = mysqli_query($koneksi,$result);
while($data = mysqli_fetch_array($hasil)) {
$idPengepul  = $data['id_pengepul'];
$nama       = $data['nama_pengepul'];
$jumlah     = $data['total_jual'];
$tgl        = $data['tanggal_jual'];
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
          <th align="left">ID Pengepul</th>
          <td width="20">:</td>
          <td width="170"><?php echo $idPengepul; ?></td>
        </tr>
        <tr>
          <th align="left">Nama</th>
          <td>:</td>
          <td><?php echo $nama; ?></td>
        </tr>
        <tr>
          <th align="left">Tanggal Jual</th>
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