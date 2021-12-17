<?php
include ('koneksi_db.php');
// menyimpan data id kedalam variabel
$id       = $_GET['id'];

$data     = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE id = $id");
$row      = mysqli_fetch_array($data);
$username = $row['username'];

$query   = "UPDATE tb_users SET password='$username' WHERE id=$id";
$result  = mysqli_query($koneksi, $query);

if ($result) {
	echo "<script>alert('Password berhasil direset !!');
	document.location='menu-nasabah.php';
  	</script>";
	//header("location: menu-nasabah.php");
} else {
	echo "Maaf, terjadi kesalahan saat mencoba untuk reset password.";
	echo "<br>error : ".mysqli_error($koneksi);
	echo "<br><a href='menu-nasabah.php'>Kembali ke menu</a>";
}
?>