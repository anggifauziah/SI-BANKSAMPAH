<?php
include "koneksi_db.php";
$id = $_GET['id'];
$result = ("SELECT p.id_nasabah, n.norek_nasabah, n.nama_nasabah, p.jumlah_pinjam, p.tanggal_pinjam
            FROM tb_pinjaman p INNER JOIN tb_nasabah n
            WHERE p.id_pinjam LIKE '%$id%'");
$hasil = mysqli_query($koneksi,$result);
while($data = mysqli_fetch_array($hasil)) {
$idNasabah  = $data['id_nasabah'];
$norek      = $data['norek_nasabah'];
$nama       = $data['nama_nasabah'];
$jumlah     = $data['jumlah_pinjam'];
$tgl        = $data['tanggal_pinjam'];
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
          <th align="left">Tanggal Pinjam</th>
          <td>:</td>
          <td><?php echo $tgl; ?></td>
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