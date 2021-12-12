<?php
include "koneksi_db.php";
$id            = $_GET['id'];
$query         = "SELECT n.kode_nasabah, n.nomor_rekening, u.nama, j.nama_jenis, t.berat_tabung, t.total_tabung, t.tanggal_tabung FROM tb_tabungan t, tb_nasabah n, tb_jenis_sampah j, tb_users u WHERE t.nasabah_id = n.id_nasabah AND n.users_id = u.id AND t.jenis_sampah_id = j.id_jenis_sampah AND t.id_tabung = '$id'";
$result        = mysqli_query($koneksi, $query);
while($data = mysqli_fetch_array($result)) {
$kode_nasabah  = $data['kode_nasabah'];
$norek         = $data['nomor_rekening'];
$nama          = $data['nama'];
$jenis         = $data['nama_jenis'];
$berat         = $data['berat_tabung'];
$jumlah        = $data['total_tabung'];
$tgl           = $data['tanggal_tabung'];
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
          <td><?php echo $berat; ?> Kg</td>
        </tr>
        <tr>
          <th align="left">Tanggal Tabung</th>
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