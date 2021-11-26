<?php
include('koneksi_db.php');

$kode_pinjam		= $_POST['kode_pinjam'];
$kode_petugas		= $_POST['kode_petugas'];

$kode_nasabah   	= $_POST['kode_nasabah'];

$jumlah				= $_POST['jumlah'];
$tanggal_pinjam		= $_POST['tanggal_pinjam'];
$tanggal_pinjam 	= date("Y-m-d");

//mengambil value kolom id petugas
$data1      = mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE kode_petugas LIKE '%$kode_petugas%'");
$row1      	= mysqli_fetch_array($data1);
$id_petugas	= $row1['id_petugas'];

//mengambil value kolom pinjaman_nasabah
$data2     	= mysqli_query($koneksi, "SELECT * FROM tb_nasabah WHERE kode_nasabah=$kode_nasabah");
$row2      	= mysqli_fetch_array($data2);
$id_nasabah = $row2['id_nasabah'];
$pinjam   	= $row2['pinjaman'];
$pinjam     = $pinjam + $jumlah;


// query SQL untuk insert data
$Pinjaman  = "INSERT INTO tb_pinjaman (kode_pinjam, petugas_id, nasabah_id, jumlah_pinjam, tanggal_pinjam) VALUES ('$kode_pinjam', '$id_petugas', '$id_nasabah', '$jumlah', '$tanggal_pinjam')";

$nasabah = "UPDATE tb_nasabah SET pinjaman=$pinjam WHERE kode_nasabah=$kode_nasabah";

$result = mysqli_query($koneksi, $Pinjaman);
$result = mysqli_query($koneksi, $nasabah);

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