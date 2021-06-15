<?php
include('koneksi_db.php');

$idTarik 		= $_POST['idTarik'];
$idPetugas		= $_POST['idPetugas'];

$idNasabah   	= $_POST['idNasabah'];

$jumtarik		= $_POST['jumtarik'];
$tgltarik 		= $_POST['tgltarik'];

$tgltarik 		= date("Y-m-d");

//mengambil value kolom pinjaman_nasabah
$data     = mysqli_query($koneksi, "SELECT * FROM tb_nasabah WHERE id_nasabah=$idNasabah");
$row      = mysqli_fetch_array($data);
$saldo   = $row['saldo_nasabah'];


if ($saldo <= 50000) {
	echo "<script>alert('Tidak bisa tarik! Saldo tidak mencukupi!');
	document.location='menu-tarik.php';
  	</script>";
} else {
	$totalsaldo = $saldo - $jumtarik;
	// query SQL untuk insert data
	$nasabah = "INSERT INTO tb_tarik_tabungan VALUES ('".$idTarik."', '".$idPetugas."', '".$idNasabah."', '".$jumtarik."', '".$tgltarik."')";

	$newsaldo = "UPDATE tb_nasabah SET saldo_nasabah=$totalsaldo WHERE id_nasabah=$idNasabah";

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