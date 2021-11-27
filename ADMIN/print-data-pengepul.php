<?php
include "koneksi_db.php";
$id     = $_GET['id'];
$query  = "SELECT p.kode_pengepul, u.nama, u.jenis_kelamin, u.alamat, u.telp, u.username, u.password FROM tb_pengepul p INNER JOIN tb_users u ON p.users_id = u.id WHERE u.id = $id";
$result = mysqli_query($koneksi, $query);
while($data = mysqli_fetch_array($result)) {
$kode_pengepul = $data['kode_pengepul'];
$nama         = $data['nama'];
$jk           = $data['jenis_kelamin'];
$alamat       = $data['alamat'];
$telp         = $data['telp'];
$UN           = $data['username'];
$PW           = $data['password'];

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
          <th align="left">Kode Pengepul</th>
          <td>:</td>
          <td><?php echo $kode_pengepul; ?></td>
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
          <th align="left">Username</th>
          <td>:</td>
          <td><?php echo $UN; ?></td>
        </tr>
        <tr>
          <th align="left">Password</th>
          <td>:</td>
          <td><?php echo $PW; ?></td>
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