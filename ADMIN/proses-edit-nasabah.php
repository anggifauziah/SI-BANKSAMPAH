<?php
include 'koneksi_db.php';
// menyimpan data kedalam variabel

$id   		= $_POST['id'];
$alamat		= $_POST['alamat'];
$telp 		= $_POST['telp'];
$pekerjaan	= $_POST['pekerjaan'];

function encrypt_aes($string) {
	$encrypt_method = "AES-256-CBC";
    $secret_key = 'sadgjakgdkjafkj';
    $secret_iv = 'This is my secret iv';

    $key = hash('sha256', $secret_key);  
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    return $output;
}

$e_alamat=encrypt_aes($alamat);
$e_telp=encrypt_aes($telp);
$e_kerja=encrypt_aes($pekerjaan);

// query SQL untuk update data
$query  = "UPDATE tb_users u, tb_nasabah n SET u.alamat = '$e_alamat', u.telp = '$e_telp', n.pekerjaan = '$e_kerja' WHERE u.id = '$id' AND n.users_id = '$id'";
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