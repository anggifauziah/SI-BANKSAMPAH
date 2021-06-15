<?php
include "koneksi_db.php";
$id = $_GET['id'];
$result = ("SELECT pj.id_jual, pj.id_petugas, p.id_pengepul, p.nama_pengepul, j.nama_jenis, pj.berat_jual, pj.total_jual, pj.tanggal_jual FROM tb_penjualan pj, tb_pengepul p, tb_jenis_sampah j WHERE p.id_pengepul = pj.id_pengepul AND j.id_jenis = pj.id_jenis AND pj.id_jual LIKE '%$id%'");
$hasil = mysqli_query($koneksi,$result);
while($data = mysqli_fetch_array($hasil)) {
$idPengepul = $data['id_pengepul'];
$nama       = $data['nama_pengepul'];
$jenis      = $data['nama_jenis'];
$berat      = $data['berat_jual'];
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
        <td align="center">Jl. Masjid No.013 Sroyo <br> Telepon : 081357780664 </td>
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
          <th align="left">Jenis Sampah</th>
          <td>:</td>
          <td><?php echo $jenis; ?></td>
        </tr>
        <tr>
          <th align="left">Berat Sampah</th>
          <td>:</td>
          <td><?php echo $berat; ?>kg</td>
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