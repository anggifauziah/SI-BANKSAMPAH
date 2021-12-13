<?php
include('koneksi_db.php');

$kode_tabung		= $_POST['kode_tabung'];
$kode_petugas		= $_POST['kode_petugas'];

$kode_nasabah   	= $_POST['kode_nasabah'];

$id_jenis_sampah	= $_POST['id_jenis_sampah'];
$berat 				= $_POST['berat'];
$total				= $_POST['total'];
$tanggal_tabung		= $_POST['tanggal_tabung'];
$tanggal_tabung 	= date("Y-m-d");

function encrypt_aes($string) {
	$encrypt_method = "AES-256-CBC";
    $secret_key = 'sadgjakgdkjafkj';
    $secret_iv = 'This is my secret iv';

    $key = hash('sha256', $secret_key);  
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    return $output;
}

$kode_nasabah = encrypt_aes($kode_nasabah);

//mengambil value kolom id petugas
$data1        = mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE kode_petugas LIKE '%$kode_petugas%'");
$row1      	  = mysqli_fetch_array($data1);
$id_petugas   = $row1['id_petugas'];

//mengambil value kolom id nasabah dan saldo
$data2        = mysqli_query($koneksi, "SELECT * FROM tb_nasabah WHERE kode_nasabah= '$kode_nasabah'");
$row2      	  = mysqli_fetch_array($data2);
$id_nasabah   = $row2['id_nasabah'];
$saldo   	  = $row2['saldo'];
$tabung 	  = $saldo + $total;


// query SQL untuk insert data
$tabungan = "INSERT INTO tb_tabungan (kode_tabung, petugas_id, nasabah_id, jenis_sampah_id, berat_tabung, total_tabung, tanggal_tabung) VALUES ('$kode_tabung', '$id_petugas', '$id_nasabah', '$id_jenis_sampah', '$berat', '$total', '$tanggal_tabung')";

// query SQL untuk update data
$nasabah  = "UPDATE tb_nasabah SET saldo=$tabung WHERE kode_nasabah= '$kode_nasabah'";

$result = mysqli_query($koneksi, $tabungan);
$result = mysqli_query($koneksi, $nasabah);

if ($result) {
	//jika sukses, lakukan :
	header("location:menu-tabung.php");
} else {
	//jika gagal lakukan :
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br>ERROR : ".mysqli_error($koneksi);
	echo "<br><a href='form-tambah-tabungan.php'>Kembali ke form</a>";
}
?>