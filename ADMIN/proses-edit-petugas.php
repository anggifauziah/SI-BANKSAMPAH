<?php
include 'koneksi_db.php';
// menyimpan data kedalam variabel
$id   			= $_POST['idPetugas'];
$namaPetugas	= $_POST['namaPetugas'];
$alamat			= $_POST['alamat'];
$telp 			= $_POST['telp'];
$jabatan		= $_POST['jabatan'];

// query SQL untuk update data
$query  = "UPDATE tb_petugas SET nama_petugas = '$namaPetugas', alamat_petugas = '$alamat', telp_petugas = '$telp', jabatan = '$jabatan' WHERE id_petugas = '$id'";
$result = mysqli_query($koneksi, $query);

if($result){
        // mengalihkan ke halaman index.php
		header("location: menu-petugas.php");
    }else{
        echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form-tambah-petugas.php'>Kembali ke form</a>";
    }
?>