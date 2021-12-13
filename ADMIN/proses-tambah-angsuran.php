<?php
include('koneksi_db.php');

$kode_angsur		= $_POST['kode_angsur'];
$kode_petugas		= $_POST['kode_petugas'];

$kode_nasabah   	= $_POST['kode_nasabah'];

$id_jenis_sampah	= $_POST['id_jenis_sampah'];
$berat 				= $_POST['berat'];
$total				= $_POST['total'];
$tanggal_angsur		= $_POST['tanggal_angsur'];
$tanggal_angsur 	= date("Y-m-d");

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
$data1      = mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE kode_petugas LIKE '%$kode_petugas%'");
$row1      	= mysqli_fetch_array($data1);
$id_petugas	= $row1['id_petugas'];

//mengambil value kolom pinjaman_nasabah
$data2     	= mysqli_query($koneksi, "SELECT * FROM tb_nasabah WHERE kode_nasabah='$kode_nasabah'");
$row2      	= mysqli_fetch_array($data2);
$id_nasabah = $row2['id_nasabah'];
$pinjam   	= $row2['pinjaman'];
$angsur     = $pinjam - $total;


// query SQL untuk insert data
$angsuran  = "INSERT INTO tb_angsuran (kode_angsur, petugas_id, nasabah_id, jenis_sampah_id, berat_angsur, total_angsur, tanggal_angsur) VALUES ('$kode_angsur', '$id_petugas', '$id_nasabah', '$id_jenis_sampah', '$berat', '$total', '$tanggal_angsur')";

$nasabah = "UPDATE tb_nasabah SET pinjaman=$angsur WHERE kode_nasabah=$kode_nasabah";

$result = mysqli_query($koneksi, $angsuran);
$result = mysqli_query($koneksi, $nasabah);

if ($result) {
	//jika sukses, lakukan :
	header("location:menu-angsuran.php");
} else {
	//jika gagal lakukan :
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br>ERROR : ".mysqli_error($koneksi);
	echo "<br><a href='form-tambah-anguran.php'>Kembali ke form</a>";
}
?>