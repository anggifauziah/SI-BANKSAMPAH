<?php
include('koneksi_db.php');

$idJual		= $_POST['idJual'];
$idPetugas		= $_POST['idPetugas'];

$idPengepul   	= $_POST['idPengepul'];

$id_jenis		= $_POST['id_jenis'];
$berat 			= $_POST['berat'];
$total			= $_POST['total'];
$tglJl		= $_POST['tglJl'];

$tglJl 		= date("Y-m-d");

// query SQL untuk insert data
$jual = "INSERT INTO tb_penjualan VALUES ('".$idJual."', '".$idPetugas."', '".$idPengepul."', '".$id_jenis."', '".$berat."', '".$total."', '".$tglJl."')";

$result = mysqli_query($koneksi, $jual);

if ($result) {
	//jika sukses, lakukan :
	header("location:menu-penjualan.php");
} else {
	//jika gagal lakukan :
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br>ERROR : ".mysqli_error($koneksi);
	echo "<br><a href='menu-penjualan.php'>Kembali ke form</a>";
}
?>