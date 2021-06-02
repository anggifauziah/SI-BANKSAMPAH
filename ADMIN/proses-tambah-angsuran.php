<?php
include('koneksi_db.php');

$idAngsur 		= $_POST['idAngsur'];
$idPetugas		= $_POST['idPetugas'];

$idNasabah   	= $_POST['idNasabah'];

$id_jenis		= $_POST['id_jenis'];
$berat 			= $_POST['berat'];
$total			= $_POST['total'];
$tglangsur		= $_POST['tglangsur'];

//mengambil value kolom pinjaman_nasabah
$data     = mysqli_query($koneksi, "SELECT * FROM tb_nasabah WHERE id_nasabah=$idNasabah");
$row      = mysqli_fetch_array($data);
$pinjam   = $row['pinjaman_nasabah'];

$angsuran = $pinjam - $total;


// query SQL untuk insert data
$nasabah = "INSERT INTO tb_angsuran VALUES ('".$idAngsur."', '".$idPetugas."', '".$idNasabah."', '".$id_jenis."', '".$berat."', '".$total."', '".$tglangsur."')";

$pinjaman = "UPDATE tb_nasabah SET pinjaman_nasabah=$angsuran WHERE id_nasabah=$idNasabah";

$result = mysqli_query($koneksi, $nasabah);
$result = mysqli_query($koneksi, $pinjaman);

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