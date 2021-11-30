<?php
include('koneksi_db.php');

$kode_jual		= $_POST['kode_jual'];
$kode_petugas	= $_POST['kode_petugas'];

$kode_pengepul  = $_POST['kode_pengepul'];

$id_jenis		= $_POST['id_jenis'];
$berat 			= $_POST['berat'];
$total			= $_POST['total'];
$tglJl			= $_POST['tglJl'];

$tglJl 			= date("Y-m-d");

//mengambil value kolom id_petugas
$petugas 	= mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE kode_petugas LIKE '%$kode_petugas%'");
$data1 		= mysqli_fetch_array($petugas);
$id1		= $data1['id_petugas'];

//mengambil value kolom id_pengepul
$users		= mysqli_query($koneksi, "SELECT * FROM tb_pengepul WHERE kode_pengepul = '$kode_pengepul'");
$data2	 	= mysqli_fetch_array($users);
$id2 		= $data2['id_pengepul'];

// query SQL untuk insert data
$jual = "INSERT INTO tb_penjualan (kode_jual, petugas_id, pengepul_id, jenis_sampah_id, berat_jual, total_jual, tanggal_jual) VALUES ('$kode_jual', '$id1', '$id2', '$id_jenis', '$berat', '$total', '$tglJl')";

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