<?php
include('koneksi_db.php');

$nama			= $_POST['nama'];
$jenisKelamin   = $_POST['jenisKelamin'];
$alamat			= $_POST['alamat'];
$telp 			= $_POST['telp'];
$username		= $_POST['username'];
$password		= $_POST['password'];
$level			= 2;

$kode_nasabah 	= $_POST['kode_nasabah'];
$pekerjaan		= $_POST['pekerjaan'];
$tgldaftar		= $_POST['tgldaftar'];
$tgldaftar	 	= date("Y-m-d");
$norek			= $_POST['norek'];
$saldo			= 0;
$pinjam			= 0;

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

$encrypted_pw = encrypt_decrypt('encrypt', $password);
$encrypted_un = encrypt_decrypt('encrypt', $username);
$encrypted_almt = encrypt_decrypt('encrypt', $alamat);
$encrypted_nm= encrypt_decrypt('encrypt',$nama);
$encrypted_telp = encrypt_decrypt('encrypt', $telp);
$encrypted_kode = encrypt_decrypt('encrypt', $kode_nasabah);
$encrypted_kerja = encrypt_decrypt('encrypt', $pekerjaan);
$encrypted_norek = encrypt_decrypt('encrypt', $norek);

// query SQL untuk insert data
$users	= "INSERT INTO tb_users (nama, jenis_kelamin, alamat, telp, username, password, level_user) VALUES ('$encrypted_nm', '$jenisKelamin', '$encrypted_almt', '$encrypted_telp', '$encrypted_un', '$encrypted_pw', '$level')";
$result = mysqli_query($koneksi, $users);

if($users) {
	$users_id = mysqli_insert_id($koneksi); // mengambil id terakhir yang diinput ke tb_users
	$nasabah = "INSERT INTO tb_nasabah (kode_nasabah, users_id, pekerjaan, tgl_daftar, nomor_rekening, saldo, pinjaman) VALUES ('$encrypted_kode', '$users_id','$encrypted_kerja', '$tgldaftar', '$encrypted_norek', '$saldo', '$pinjam')";
	$result = mysqli_query($koneksi, $nasabah);
}

if ($result) {
	//jika sukses, lakukan :
	header("location:menu-nasabah.php");
} else {
	//jika gagal lakukan :
	echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	echo "<br>ERROR : ".mysqli_error($koneksi);
	echo "<br><a href='form-tambah-nasabah.php'>Kembali ke form</a>";
}
?>