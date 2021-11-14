<?php
include "koneksi_db.php";
$id     = $_GET['id'];
$query  = "SELECT n.kode_nasabah, n.nomor_rekening, u.nama, u.jenis_kelamin, u.alamat, u.telp, n.pekerjaan, n.tgl_daftar, u.username, u.password FROM tb_nasabah n INNER JOIN tb_users u ON n.users_id = u.id WHERE u.id = $id";
$result = mysqli_query($koneksi, $query);
while($data = mysqli_fetch_array($result)) {
$kode_nasabah = $data['kode_nasabah'];
$norek        = $data['nomor_rekening'];
$nama         = $data['nama'];
$jk           = $data['jenis_kelamin'];
$alamat       = $data['alamat'];
$telp         = $data['telp'];
$pekerjaan    = $data['pekerjaan'];
$tgldaftar    = $data['tgl_daftar'];

}
?>
<html>
  <head>
    <title>Admin - SI Bank Sampah</title>
    <link href="style/style.css" rel="stylesheet" type="text/css">
  </head>
  <body onload="window.print()">
    <table width="500" border="0" cellspacing="1" cellpadding="4" class="table-print">
      <tr>
        <td><strong><h3 align="center">BANK SAMPAH</h3></strong></td>
      </tr>
      <tr>
        <td align="center">Jl. Masjid No.013 Sroyo <br> Telepon : 081357780664 </td>
      </tr>
      <tr>
        <td>-------------------------------------------------------------------------------------------</td>
      </tr>
    </table>

    <table class="table-list" width="500" border="0" cellspacing="5" cellpadding="5">
      <thead>
      </thead>
      <tbody>
        <tr>
          <th align="left">Kode Nasabah</th>
          <td>:</td>
          <td><?php echo $kode_nasabah; ?></td>
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
          <th align="left">Jenis Kelamin</th>
          <td>:</td>
          <td><?php echo $jk; ?></td>
        </tr>
        <tr>
          <th align="left">Alamat</th>
          <td>:</td>
          <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
          <th align="left">Telepon</th>
          <td>:</td>
          <td><?php echo $telp; ?></td>
        </tr>
        <tr>
          <th align="left">Pekerjaan</th>
          <td>:</td>
          <td><?php echo $pekerjaan; ?></td>
        </tr>
        <tr>
          <th align="left">Tanggal daftar</th>
          <td>:</td>
          <td><?php echo $tgldaftar; ?></td>
        </tr>
        <tr>
          <th align="left">Username</th>
          <td>:</td>
          <td><?php echo $norek; ?></td>
        </tr>
        <tr>
          <th align="left">Password</th>
          <td>:</td>
          <td><?php echo $norek; ?></td>
        </tr>
        <tr>
          <td colspan="3">------------------------------------------------------------------------------------------</td>
        </tr>
        <tr>
          <td colspan="3">
            <p align="justify">
              NB : <br>
              Harap melakukan perubahan password jika sudah login pada akun Bank Sampah Anda.
            </p>
          </td>
      </tbody>
    </table>
  </body>
</html>