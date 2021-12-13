<?php
include('koneksi_db.php');

$kode_tarik		= $_POST['kode_tarik'];
$kode_petugas	= $_POST['kode_petugas'];

$kode_nasabah  	= $_POST['kode_nasabah'];

$jumtarik		= $_POST['jumtarik'];
$tgltarik 		= $_POST['tgltarik'];

$tgltarik 		= date("Y-m-d");

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

//mengambil value kolom id_petugas
$petugas 	= mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE kode_petugas LIKE '%$kode_petugas%'");
$data_p 	= mysqli_fetch_array($petugas);
$id_p		= $data_p['id_petugas'];

//mengambil value kolom id_nasabah dan saldo
$users		= mysqli_query($koneksi, "SELECT * FROM tb_nasabah WHERE kode_nasabah = '$kode_nasabah'");
$data_u 	= mysqli_fetch_array($users);
$id_u 		= $data_u['id_nasabah'];
$saldo   	= $data_u['saldo'];


if ($saldo <= 50000) {
	echo "<script>alert('Tidak bisa tarik! Saldo tidak mencukupi!, $saldo');
	document.location='menu-tarik.php';
  	</script>";
} else {
	$totalsaldo = $saldo - $jumtarik;
	// query SQL untuk insert data
	$nasabah = "INSERT INTO tb_tarik_tabungan (kode_tarik_tabungan, petugas_id, nasabah_id, jumlah_tarik, tanggal_tarik) VALUES ('$kode_tarik', '$id_p', '$id_u', '$jumtarik', '$tgltarik')";

	// query SQL untuk update data
	$newsaldo = "UPDATE tb_nasabah SET saldo = '$totalsaldo' WHERE kode_nasabah = '$kode_nasabah'";

	$result = mysqli_query($koneksi, $nasabah);
	$result = mysqli_query($koneksi, $newsaldo);
}

if ($result) {
	//jika sukses, lakukan :
	header("location:menu-tarik.php");
} else {
	//jika gagal lakukan :
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br>ERROR : ".mysqli_error($koneksi);
	echo "<br><a href='form-tambah-tarik.php'>Kembali ke form</a>";
}
?>