<?php
include 'koneksi_db.php';
// menyimpan data kedalam variabel
$id   			= $_POST['id_jenis'];
$namaJenis	= $_POST['nama_jenis'];
$bl			= $_POST['Beli'];
$jl		= $_POST['Jual'];

// query SQL untuk update data
$query  = "UPDATE tb_jenis_sampah SET nama_jenis = '$namaJenis', harga_beli = '$bl', harga_jual = '$jl' WHERE id_jenis = '$id'";
$result = mysqli_query($koneksi, $query);

if($result){
        // mengalihkan ke halaman index.php
		header("location: menu-jenis-sampah.php");
    }else{
        echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form-tambah-jenis.php'>Kembali ke form</a>";
    }
?>