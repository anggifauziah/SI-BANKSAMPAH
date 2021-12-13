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
function decrypt_aes($string) {
  $encrypt_method = "AES-256-CBC";
  $secret_key = 'sadgjakgdkjafkj';
  $secret_iv = 'This is my secret iv';

  $key = hash('sha256', $secret_key);  
  $iv = substr(hash('sha256', $secret_iv), 0, 16);

  $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
  return $output;
$dec_kode=decrypt_aes($kodeNasabah);
$dec_norek=decrypt_aes($norek);
$dec_nama=decrypt_aes($nama);
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
          <th align="left">Kode Nasabah</th>
          <td width="20">:</td>
          <td width="170"><?php echo $dec_kode; ?></td>
        </tr>
        <tr>
          <th align="left">No. Rekening</th>
          <td>:</td>
          <td><?php echo $dec_norek; ?></td>
        </tr>
        <tr>
          <th align="left">Nama</th>
          <td>:</td>
          <td><?php echo $dec_nama; ?></td>
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