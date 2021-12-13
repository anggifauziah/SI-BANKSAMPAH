<?php
include "koneksi_db.php";
$id = $_GET['id'];
$result = ("SELECT n.kode_nasabah, n.nomor_rekening, u.nama, t.jumlah_tarik, t.tanggal_tarik
            FROM tb_tarik_tabungan t, tb_nasabah n, tb_users u
            WHERE t.nasabah_id=n.id_nasabah and n.users_id = u.id AND t.kode_tarik_tabungan LIKE '%$id%'");
$hasil = mysqli_query($koneksi,$result);
while($data = mysqli_fetch_array($hasil)) {
$kode_nasabah = $data['kode_nasabah'];
$norek        = $data['nomor_rekening'];
$nama         = $data['nama'];
$jumlah       = $data['jumlah_tarik'];
$tgl          = $data['tanggal_tarik'];
}

//ubah format bulan
function formatBulan($tgl){
  $bln    = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
  $pecah = explode('-', $tgl);
  return $pecah[2]. ' ' . $bln[((int)$pecah[1])-1]. ' ' .$pecah[0];
}
function decrypt_aes($string) {
  $encrypt_method = "AES-256-CBC";
  $secret_key = 'sadgjakgdkjafkj';
  $secret_iv = 'This is my secret iv';

  $key = hash('sha256', $secret_key);  
  $iv = substr(hash('sha256', $secret_iv), 0, 16);

  $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
  return $output;
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
          <td width="170"><?php echo decrypt_aes($kode_nasabah); ?></td>
        </tr>
        <tr>
          <th align="left">Rekening</th>
          <td>:</td>
          <td><?php echo decrypt_aes($norek); ?></td>
        </tr>
        <tr>
          <th align="left">Nama</th>
          <td>:</td>
          <td><?php echo decrypt_aes($nama); ?></td>
        </tr>
        <tr>
          <th align="left">Tanggal Tarik</th>
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