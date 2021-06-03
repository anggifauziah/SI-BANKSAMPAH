<?php
include('koneksi_db.php');

$idPinjam 		= $_POST['idPinjam'];
$idPetugas		= $_POST['idPetugas'];

$idNasabah   	= $_POST['idNasabah'];

$jumpinjam		= $_POST['jumpinjam'];
$tglpinjam 		= $_POST['tglpinjam'];

$tglpinjam 		= date("Y-m-d");

//mengambil value kolom pinjaman_nasabah
$data     = mysqli_query($koneksi, "SELECT * FROM tb_nasabah WHERE id_nasabah=$idNasabah");
$row      = mysqli_fetch_array($data);
$pinjam   = $row['pinjaman_nasabah'];

$totalpinjam = $pinjam + $jumpinjam;


// query SQL untuk insert data
$nasabah = "INSERT INTO tb_pinjaman VALUES ('".$idPinjam."', '".$idPetugas."', '".$idNasabah."', '".$jumpinjam."', '".$tglpinjam."')";

$pinjaman = "UPDATE tb_nasabah SET pinjaman_nasabah=$totalpinjam WHERE id_nasabah=$idNasabah";

$result = mysqli_query($koneksi, $nasabah);
$result = mysqli_query($koneksi, $pinjaman);

if ($result) {
	//jika sukses, lakukan :
	header("location:menu-pinjaman.php");
} else {
	//jika gagal lakukan :
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br>ERROR : ".mysqli_error($koneksi);
	echo "<br><a href='form-tambah-pinjaman.php'>Kembali ke form</a>";
}
?>