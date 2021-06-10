<?php
include "koneksi_db.php";
$id = $_GET['id'];
$result = ("SELECT * FROM tb_nasabah WHERE id_nasabah LIKE '%$id%'");
$hasil = mysqli_query($koneksi,$result);
while($data = mysqli_fetch_array($hasil)) {
$idNasabah  = $data['id_nasabah'];
$norek      = $data['norek_nasabah'];
$nama       = $data['nama_nasabah'];
$jk         = $data['jk_nasabah'];
$alamat     = $data['alamat_nasabah'];
$telp       = $data['telp_nasabah'];
$pekerjaan  = $data['pekerjaan_nasabah'];
$tgldaftar  = $data['tgl_daftar'];

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
          <th align="left">ID Nasabah</th>
          <td>:</td>
          <td><?php echo $idNasabah; ?></td>
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