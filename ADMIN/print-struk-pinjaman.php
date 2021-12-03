<?php
include "koneksi_db.php";
$id = $_GET['id'];
$result = ("SELECT p.id_pinjam, p.tanggal_pinjam, n.kode_nasabah,n.nomor_rekening, u.nama, p.jumlah_pinjam FROM tb_pinjaman p, tb_nasabah n, tb_users u where p.nasabah_id=n.id_nasabah and n.users_id=u.id ORDER BY p.id_pinjam ASC");
$hasil = mysqli_query($koneksi,$result);
while($data = mysqli_fetch_array($hasil)) {
$kodeNasabah  = $data['kode_nasabah'];
$norek        = $data['nomor_rekening'];
$nama       = $data['nama'];
$jumlah     = $data['jumlah_pinjam'];
$tgl        = $data['tanggal_pinjam'];

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
          <th align="left">Kode Nasabah</th>
          <td width="20">:</td>
          <td width="170"><?php echo $kodeNasabah; ?></td>
        </tr>
        <tr>
          <th align="left">No. Rekening</th>
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