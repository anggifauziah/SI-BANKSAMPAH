<?php
include "koneksi_db.php"; // Load file koneksi_db.php

$idpengepul = $_POST['idPengepul']; // Ambil data idPengepul yang dikirim lewat AJAX

$query = mysqli_query($koneksi, "SELECT u.nama, u.jenis_kelamin, u.alamat, u.telp FROM tb_pengepul p, tb_users u WHERE p.users_id = u.id and kode_pengepul LIKE '%$idpengepul%'"); // Tampilkan data dengan idPengepul tersebut
$row   = mysqli_num_rows($query); // Hitung ada berapa data dari hasil eksekusi $query

if ($row > 0) {
  $data = mysqli_fetch_array($query); // ambil data pengepul tersebut

  // BUat sebuah array
  $callback = array(
  'status'      => 'success', // Set array status dengan success
  'namaPengepul' => $data['nama'], // Set array namaNasabah dengan isi kolom nama pada tabel tb_users
  'jk'          => $data['jenis_kelamin'], // Set array jk dengan isi kolom jk pada tabel tb_users
  'alamat'      => $data['alamat'], // Set array alamat dengan isi kolom alamat pada tabel tb_users
  'telp'        => $data['telp'], // Set array telp dengan isi kolom telp pada tabel tb_users
  );
} else {
  $callback = array('status' => 'failed'); // set array status dengan failed
}

echo json_encode($callback); // konversi varibael $callback menjadi JSON
?>