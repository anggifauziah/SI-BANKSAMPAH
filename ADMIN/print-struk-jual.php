<?php
include "koneksi_db.php";
$id = $_GET['id'];

$result = ("SELECT p.kode_pengepul, u.nama, j.nama_jenis, pj.berat_jual, pj.total_jual, pj.tanggal_jual 
            FROM tb_penjualan pj, tb_pengepul p, tb_users u, tb_jenis_sampah j 
            WHERE p.id_pengepul = pj.pengepul_id AND p.users_id = u.id AND j.id_jenis_sampah = pj.jenis_sampah_id AND pj.kode_jual LIKE '%$id%'");
$hasil = mysqli_query($koneksi,$result);
while($data = mysqli_fetch_array($hasil)) {
$kode_pengepul = $data['kode_pengepul'];
$nama          = $data['nama'];
$jenis         = $data['nama_jenis'];
$berat         = $data['berat_jual'];
$jumlah        = $data['total_jual'];
$tgl           = $data['tanggal_jual'];
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
        <td align="center">
          <?php
            $queryConfig   = mysqli_query($koneksi,"SELECT judul, isi FROM tb_config WHERE id_config = 1 OR id_config = 2 OR id_config = 3 ");
            while($dataConfig = mysqli_fetch_array($queryConfig)) {
              $isi = preg_replace('#</?p.*?>#is', '', $dataConfig['isi']);
              if ($dataConfig['judul'] == "Telepon"){
                echo "Telepon : ".$isi;
              } else {
                echo $isi."<br>";
              }
            }
          ?>
        </td>
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
          <th align="left">Kode Pengepul</th>
          <td width="20">:</td>
          <td width="170"><?php echo $kode_pengepul; ?></td>
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