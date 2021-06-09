<?php
include('koneksi_db.php');

$idTabung		= $_POST['idTabung'];
$idPetugas		= $_POST['idPetugas'];

$idNasabah   	= $_POST['idNasabah'];

$id_jenis		= $_POST['id_jenis'];
$berat 			= $_POST['berat'];
$total			= $_POST['total'];
$tgltbg		= $_POST['tgltbg'];

$tgltbg 		= date("Y-m-d");

//mengambil value kolom pinjaman_nasabah
$data     = mysqli_query($koneksi, "SELECT * FROM tb_nasabah WHERE id_nasabah=$idNasabah");
$row      = mysqli_fetch_array($data);
$tabung   = $row['saldo_nasabah'];

$tabungan = $tabung + $total;


// query SQL untuk insert data
$nasabah = "INSERT INTO tb_tabungan VALUES ('".$idTabung."', '".$idPetugas."', '".$idNasabah."', '".$id_jenis."', '".$berat."', '".$total."', '".$tgltbg."')";

$saldo = "UPDATE tb_nasabah SET saldo_nasabah=$tabungan WHERE id_nasabah=$idNasabah";

$result = mysqli_query($koneksi, $nasabah);
$result = mysqli_query($koneksi, $saldo);

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