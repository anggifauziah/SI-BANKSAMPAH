<?php
include 'koneksi_db.php';
// menyimpan data kedalam variabel
$id   		= $_POST['idPetugas'];
$nama		= $_POST['nama'];
$alamat		= $_POST['alamat'];
$telp 		= $_POST['telp'];
$jabatan	= $_POST['jabatan'];

// query SQL untuk update data
$petugas	= mysqli_query($koneksi, "SELECT users_id FROM tb_petugas WHERE kode_petugas = '$id'");
$hasil 		= mysqli_fetch_array($petugas);
$iduser		= $hasil['users_id'];
$users  	= "UPDATE tb_users SET nama = '$nama', alamat = '$alamat', telp = '$telp' WHERE id = '$iduser'";
$result 	= mysqli_query($koneksi, $users);

if ($petugas) {
	$query  = "UPDATE tb_petugas SET jabatan = '$jabatan' WHERE users_id = '$iduser'";
	$result = mysqli_query($koneksi, $query);
}

if($result){
        // mengalihkan ke halaman index.php
		header("location: menu-petugas.php");
    }else{
        echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br>error : ".mysqli_error($koneksi);
		echo "<br><a href='form-tambah-petugas.php'>Kembali ke form</a>";
    }
?>