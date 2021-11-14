<?php
include 'koneksi_db.php';
// menyimpan data kedalam variabel
$id_jenis_sampah   		= $_POST['id_jenis_sampah'];
$kode_jenis_sampah		= $_POST['kode_jenis_sampah'];
$nama_jenis_sampah		= $_POST['nama_jenis_sampah'];
$harga_beli				= $_POST['harga_beli'];
$harga_jual				= $_POST['harga_jual'];

// query SQL untuk update data
$query  = "UPDATE tb_jenis_sampah SET nama_jenis = '$nama_jenis_sampah', harga_beli = '$harga_beli', harga_jual = '$harga_jual' WHERE id_jenis_sampah = '$id_jenis_sampah'";
$result = mysqli_query($koneksi, $query);

if($result){
        // mengalihkan ke halaman index.php
		header("location: menu-jenis-sampah.php");
    }else{
        echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form-tambah-jenis.php'>Kembali ke form</a>";
    }
?>