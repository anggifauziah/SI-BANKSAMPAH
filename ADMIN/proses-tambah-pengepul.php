<?php
include('koneksi_db.php');

$nama			= $_POST['nama_pengepul'];
$jenisKelamin   = $_POST['jenisKelamin'];
$alamat			= $_POST['alamat'];
$telp 			= $_POST['telp'];
$username		= $_POST['UN'];
$Password		= $_POST['PW'];
$level			= 4;

$kode_pengepul  = $_POST['kode_Pengepul'];

// query SQL untuk insert data
$users	= "INSERT INTO tb_users (nama, jenis_kelamin, alamat, telp, username, password, level_user) VALUES ('$nama', '$jenisKelamin', '$alamat', '$telp', '$username', '$Password', '$level')";
$result = mysqli_query($koneksi, $users);

if($users) {
	$users_id = mysqli_insert_id($koneksi); // mengambil id terakhir yang diinput ke tb_users
	$pengepul = "INSERT INTO tb_pengepul (kode_pengepul, users_id) VALUES ('$kode_kodePengepul', '$users_id')";
	$result = mysqli_query($koneksi, $pengepul);
}

if ($result) {
	//jika sukses, lakukan :
	header("location:menu-pengepul.php");
} else {
	//jika gagal lakukan :
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br>ERROR : ".mysqli_error($koneksi);
	echo "<br><a href='form-tambah-pengepul.php'>Kembali ke form</a>";
}

?>