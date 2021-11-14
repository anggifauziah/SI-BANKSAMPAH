<?php
include "koneksi_db.php";
$id = $_GET['id'];
$result = "SELECT n.kode_nasabah, n.nomor_rekening, u.nama, j.nama_jenis, a.berat_angsur, a.total_angsur, a.tanggal_angsur FROM tb_angsuran a, tb_nasabah n, tb_jenis_sampah j, tb_users u WHERE a.nasabah_id = n.id_nasabah AND n.users_id = u.id AND a.jenis_sampah_id = j.id_jenis_sampah AND a.id_angsur = '$id'";
$hasil = mysqli_query($koneksi,$result);
while($data = mysqli_fetch_array($hasil)) {
$kode_nasabah  = $data['kode_nasabah'];
$norek         = $data['nomor_rekening'];
$nama          = $data['nama'];
$jenis         = $data['nama_jenis'];
$berat         = $data['berat_angsur'];
$jumlah        = $data['total_angsur'];
$tgl           = $data['tanggal_angsur'];
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
          <th align="left" width="200">Kode Nasabah (NIK)</th>
          <td width="20">:</td>
          <td width="170"><?php echo $kode_nasabah; ?></td>
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