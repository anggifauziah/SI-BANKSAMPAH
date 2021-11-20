<?php
include('koneksi_db.php');

$nama			= $_POST['nama'];
$jenisKelamin   = $_POST['jk'];
$alamat			= $_POST['alamat'];
$telp 			= $_POST['telp'];
$username 		= $_POST['username'];
$password 		= $_POST['password'];
$level 			= 3;

$idPetugas 		= $_POST['idPetugas'];
$jabatan		= $_POST['jabatan'];

// query SQL untuk insert data

$users = "INSERT INTO tb_users (nama, jenis_kelamin, alamat, telp, username, password, level_user) VALUES ('$nama', '$jenisKelamin', '$alamat', '$telp', '$username', '$password', '$level')";
$result = mysqli_query($koneksi, $users);

if ($users) {
	$users_id	= mysqli_insert_id($koneksi); //mengambil id terakhir yang diinput ke tb_users
	$petugas 	= "INSERT INTO tb_petugas (kode_petugas, users_id, jabatan) VALUES ('$idPetugas', '$users_id', '$jabatan')";
	$result 	= mysqli_query($koneksi, $petugas);
}

if ($result) {
	//jika sukses, lakukan :
	header("location:menu-petugas.php");
} else {
	//jika gagal lakukan :
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br>ERROR : ".mysqli_error($koneksi);
	echo "<br><a href='form-tambah-petugas.php'>Kembali ke form</a>";
}
?>