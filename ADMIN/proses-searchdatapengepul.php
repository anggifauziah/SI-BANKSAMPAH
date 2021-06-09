<?php
include "koneksi_db.php"; // Load file koneksi_db.php

$idPengepul = $_POST['idPengepul']; // Ambil data idNasabah yang dikirim lewat AJAX

$query = mysqli_query($koneksi, "SELECT * FROM tb_pengepul WHERE id_pengepul=$idPengepul"); // Tampilkan data nasabah dengan idPengepul tersebut
$row   = mysqli_num_rows($query); // Hitung ada berapa data dari hasil eksekusi $query

if ($row > 0) {
  $data = mysqli_fetch_array($query); // ambil data pengepul tersebut

  // BUat sebuah array
  $callback = array(
  'status'      => 'success', // Set array status dengan success
  'nama_pengepul' => $data['nama_pengepul'], // Set array namaNasabah dengan isi kolom nama_nasabah pada tabel tb_nasabah
  'jk'          => $data['jk_pengepul'], // Set array jk dengan isi kolom jk_nasabah pada tabel tb_nasabah
  'alamat'      => $data['alamat_pengepul'], // Set array alamat dengan isi kolom alamat_nasabah pada tabel tb_nasabah
  'telp'        => $data['telp_pengepul'], // Set array telp dengan isi kolom telp_nasabah pada tabel tb_nasabah
  );
} else {
  $callback = array('status' => 'failed'); // set array status dengan failed
}

echo json_encode($callback); // konversi varibael $callback menjadi JSON
?>