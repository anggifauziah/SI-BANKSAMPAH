<?php
include 'koneksi_db.php';
// menyimpan data kedalam variabel
$id_config  = $_POST['id_config'];
$judul		= $_POST['judul'];
$content	= $_POST['content'];

// query SQL untuk update data
$query  = "UPDATE tb_config SET judul = '$judul', isi = '$content' WHERE id_config = '$id_config'";
$result = mysqli_query($koneksi, $query);

if($result){
        // mengalihkan ke halaman index.php
		header("location: menu-configuration.php");
    }else{
        echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form-tambah-jenis.php'>Kembali ke form</a>";
    }
?>