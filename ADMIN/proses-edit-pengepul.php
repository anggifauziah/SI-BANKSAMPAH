<?php
include 'koneksi_db.php';
// menyimpan data kedalam variabel
$id   			= $_POST['id_Pengepul'];
$namaPengepul	= $_POST['nama_Pengepul'];
$JK			= $_POST['jenisKelamin'];
$alamat			= $_POST['alamat'];
$tlp		= $_POST['telp'];

// query SQL untuk update data
$query  = "UPDATE tb_pengepul SET nama_pengepul = '$nama_Pengepul', jk_pengepul = '$JK', alamat_pengepul = '$alamat', telp_pengepul = '$tlp' WHERE id_pengepul = '$id'";
$result = mysqli_query($koneksi, $query);

if($result){
        // mengalihkan ke halaman index.php
		header("location: menu-pengepul.php");
    }else{
        echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form-tambah-pengepul.php'>Kembali ke form</a>";
    }
?>