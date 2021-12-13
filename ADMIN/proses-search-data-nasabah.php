<?php
include "koneksi_db.php"; // Load file koneksi_db.php

$kode_nasabah = $_POST['kode_nasabah']; // Ambil data kode_nasabah yang dikirim lewat AJAX

function encrypt_aes($string) {
  $encrypt_method = "AES-256-CBC";
  $secret_key = 'sadgjakgdkjafkj';
  $secret_iv = 'This is my secret iv';

  $key = hash('sha256', $secret_key);  
  $iv = substr(hash('sha256', $secret_iv), 0, 16);

  $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
  return $output;
}
function decrypt_aes($string) {
  $encrypt_method = "AES-256-CBC";
  $secret_key = 'sadgjakgdkjafkj';
  $secret_iv = 'This is my secret iv';

  $key = hash('sha256', $secret_key);  
  $iv = substr(hash('sha256', $secret_iv), 0, 16);

  $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
  return $output;
}

//35629730917303
$kode_nasabah = encrypt_aes($kode_nasabah);
$query = mysqli_query($koneksi, "SELECT n.nomor_rekening, u.nama, u.jenis_kelamin, u.alamat, u.telp, n.pekerjaan FROM tb_nasabah n, tb_users u WHERE n.users_id = u.id AND kode_nasabah LIKE '%$kode_nasabah%'"); // Tampilkan data nasabah dengan kode_nasabah tersebut
$row   = mysqli_num_rows($query); // Hitung ada berapa data dari hasil eksekusi $query

if ($row > 0) {
  $data = mysqli_fetch_array($query); // ambil data nasabah tersebut

  // Buat sebuah array
  $callback = array(
  'status'        => 'success', // Set array status dengan success
  'norek'         => decrypt_aes($data['nomor_rekening']), // Set array norek dengan isi kolom nomor_rekening pada tabel tb_nasabah
  'nama'          => decrypt_aes($data['nama']), // Set array namaNasabah dengan isi kolom nama pada tabel tb_users
  'jenis_kelamin' => $data['jenis_kelamin'], // Set array jk dengan isi kolom jenis_kelamin pada tabel tb_users
  'alamat'        => decrypt_aes($data['alamat']), // Set array alamat dengan isi kolom alamat pada tabel tb_users
  'telp'          => decrypt_aes($data['telp']), // Set array telp dengan isi kolom telp pada tabel tb_users
  'pekerjaan'     => decrypt_aes($data['pekerjaan']), // Set array pekerjaan dengan isi kolom pekerjaan pada tabel tb_nasabah
  );
} else {
  $callback = array('status' => 'failed'); // set array status dengan failed
}

echo json_encode($callback); // konversi varibael $callback menjadi JSON
?>