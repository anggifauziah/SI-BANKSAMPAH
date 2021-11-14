<?php
include('koneksi_db.php');

$nama			= $_POST['nama'];
$jenisKelamin   = $_POST['jenisKelamin'];
$alamat			= $_POST['alamat'];
$telp 			= $_POST['telp'];
$username		= $_POST['username'];
$password		= $_POST['password'];
$level			= 2;

$kode_nasabah 	= $_POST['kode_nasabah'];
$pekerjaan		= $_POST['pekerjaan'];
$tgldaftar		= $_POST['tgldaftar'];
$tgldaftar	 	= date("Y-m-d");
$norek			= $_POST['norek'];
$saldo			= 0;
$pinjam			= 0;

// query SQL untuk insert data
$users	= "INSERT INTO tb_users (nama, jenis_kelamin, alamat, telp, username, password, level_user) VALUES ('$nama', '$jenisKelamin', '$alamat', '$telp', '$username', '$password', '$level')";
$result = mysqli_query($koneksi, $users);

if($users) {
	$users_id = mysqli_insert_id($koneksi); // mengambil id terakhir yang diinput ke tb_users
	$nasabah = "INSERT INTO tb_nasabah (kode_nasabah, users_id, pekerjaan, tgl_daftar, nomor_rekening, saldo, pinjaman) VALUES ('$kode_nasabah', '$users_id','$pekerjaan', '$tgldaftar', '$norek', '$saldo', '$pinjam')";
	$result = mysqli_query($koneksi, $nasabah);
}

if ($result) {
	//jika sukses, lakukan :
	header("location:menu-nasabah.php");
} else {
	//jika gagal lakukan :
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br>ERROR : ".mysqli_error($koneksi);
	echo "<br><a href='form-tambah-nasabah.php'>Kembali ke form</a>";
}
?>