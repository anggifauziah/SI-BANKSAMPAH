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
        </td>
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
          <td><?php echo decrypt_aes($kode_nasabah); ?></td>
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
          <th align="left">Jenis Kelamin</th>
          <td>:</td>
          <td><?php echo $jk; ?></td>
        </tr>
        <tr>
          <th align="left">Alamat</th>
          <td>:</td>
          <td><?php echo decrypt_aes($alamat); ?></td>
        </tr>
        <tr>
          <th align="left">Telepon</th>
          <td>:</td>
          <td><?php echo decrypt_aes($telp); ?></td>
        </tr>
        <tr>
          <th align="left">Pekerjaan</th>
          <td>:</td>
          <td><?php echo decrypt_aes($pekerjaan); ?></td>
        </tr>
        <tr>
          <th align="left">Tanggal daftar</th>
          <td>:</td>
          <td><?php echo $tgldaftar; ?></td>
        </tr>
        <tr>
          <th align="left">Username</th>
          <td>:</td>
          <td><?php echo decrypt_aes($norek); ?></td>
        </tr>
        <tr>
          <th align="left">Password</th>
          <td>:</td>
          <td><?php echo decrypt_aes($norek); ?></td>
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