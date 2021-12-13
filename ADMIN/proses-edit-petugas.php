<?php
include 'koneksi_db.php';
// menyimpan data kedalam variabel
$kode_petugas  	= $_POST['kode_petugas'];
$nama			= $_POST['nama'];
$alamat			= $_POST['alamat'];
$telp 			= $_POST['telp'];
$jabatan		= $_POST['jabatan'];

function encrypt_aes($string) {
	$encrypt_method = "AES-256-CBC";
    $secret_key = 'sadgjakgdkjafkj';
    $secret_iv = 'This is my secret iv';

    $key = hash('sha256', $secret_key);  
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    return $output;
}
// encrypt data
$nama 		= encrypt_aes($nama);
$alamat 	= encrypt_aes($alamat);
$telp		= encrypt_aes($telp);

// query SQL untuk update data
$petugas	= mysqli_query($koneksi, "SELECT users_id FROM tb_petugas WHERE kode_petugas = '$kode_petugas'");
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