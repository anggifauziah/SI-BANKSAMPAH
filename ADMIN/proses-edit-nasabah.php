<?php
include 'koneksi_db.php';
// menyimpan data kedalam variabel
$id   			= $_POST['idNasabah'];
$namaNasabah	= $_POST['namaNasabah'];
$alamat			= $_POST['alamat'];
$telp 			= $_POST['telp'];
$pekerjaan		= $_POST['pekerjaan'];

// query SQL untuk update data
$query  = "UPDATE tb_nasabah SET nama_nasabah = '$namaNasabah', alamat_nasabah = '$alamat', telp_nasabah = '$telp', pekerjaan_nasabah = '$pekerjaan' WHERE id_nasabah = '$id'";
$result = mysqli_query($koneksi, $query);

if($result){
        // mengalihkan ke halaman index.php
		header("location: menu-nasabah.php");
    }else{
        echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form-tambah-nasabah.php'>Kembali ke form</a>";
    }
?>