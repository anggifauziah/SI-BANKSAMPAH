<?php
include 'koneksi_db.php';
// menyimpan data kedalam variabel

$id   		= $_POST['id'];
$alamat		= $_POST['alamat'];
$telp 		= $_POST['telp'];
$pekerjaan	= $_POST['pekerjaan'];

// query SQL untuk update data
$query  = "UPDATE tb_users u, tb_nasabah n SET u.alamat = '$alamat', u.telp = '$telp', n.pekerjaan = '$pekerjaan' WHERE u.id = '$id' AND n.users_id = '$id'";
$result = mysqli_query($koneksi, $query);

if($result){
        // mengalihkan ke halaman index.php
		header("location: menu-nasabah.php");
    }else{
        echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br>error : ".mysqli_error($koneksi);
		echo "<br><a href='form-edit-nasabah.php'>Kembali ke form</a>";
    }
?>