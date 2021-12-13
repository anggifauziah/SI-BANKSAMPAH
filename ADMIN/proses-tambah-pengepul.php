<?php
include('koneksi_db.php');

$nama			= $_POST['nama_Pengepul'];
$jenisKelamin   = $_POST['jenisKelamin'];
$alamat			= $_POST['alamat'];
$telp 			= $_POST['telp'];
$username		= $_POST['UN'];
$Password		= $_POST['PW'];
$level			= 3;

$kode_pengepul  = $_POST['kode_Pengepul'];

function encrypt_decrypt($action, $string) {
	$output = false;

	$encrypt_method = "AES-256-CBC";
	$secret_key = 'sadgjakgdkjafkj';
	$secret_iv = 'This is my secret iv';

	$key = hash('sha256', $secret_key);
	
	$iv = substr(hash('sha256', $secret_iv), 0, 16);

	if ( $action == 'encrypt' ) {
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);
	} else if( $action == 'decrypt' ) {
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	}

	return $output;
}

$encrypted_pw = encrypt_decrypt('encrypt', $Password);
$encrypted_un = encrypt_decrypt('encrypt', $username);
$encrypted_almt = encrypt_decrypt('encrypt', $alamat);
$encrypted_nm= encrypt_decrypt('encrypt',$nama);
$encrypted_telp = encrypt_decrypt('encrypt', $telp);


// query SQL untuk insert data
$users	= "INSERT INTO tb_users (nama, jenis_kelamin, alamat, telp, username, password, level_user) VALUES ('$encrypted_nm', '$jenisKelamin', '$encrypted_almt', '$encrypted_telp', '$encrypted_un', '$encrypted_pw', '$level')";
$result = mysqli_query($koneksi, $users);

if($users) {
	$users_id = mysqli_insert_id($koneksi); // mengambil id terakhir yang diinput ke tb_users
	$pengepul = "INSERT INTO tb_pengepul (kode_pengepul, users_id) VALUES ('$kode_pengepul', '$users_id')";
	$result = mysqli_query($koneksi, $pengepul);}

if ($result) {
	//jika sukses, lakukan :
	header("location:menu-pengepul.php");
} else {
	//jika gagal lakukan :
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br>ERROR : ".mysqli_error($koneksi);
	echo "<br><a href='form-tambah-pengepul.php'>Kembali ke form</a>";
}

?>