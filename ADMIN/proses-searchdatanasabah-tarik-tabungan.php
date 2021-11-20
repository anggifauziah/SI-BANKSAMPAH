<?php
include "koneksi_db.php"; // Load file koneksi_db.php

$idnasabah = $_POST['idNasabah']; // Ambil data idNasabah yang dikirim lewat AJAX

$query = mysqli_query($koneksi, "SELECT n.nomor_rekening, n.pekerjaan, u.nama, u.jenis_kelamin, u.alamat, u.telp FROM tb_nasabah n, tb_users u WHERE n.users_id = u.id and kode_nasabah=$idnasabah"); // Tampilkan data nasabah dengan idNasabah tersebut
$row   = mysqli_num_rows($query); // Hitung ada berapa data dari hasil eksekusi $query

if ($row > 0) {
  $data = mysqli_fetch_array($query); // ambil data nasabah tersebut

  // BUat sebuah array
  $callback = array(
  'status'      => 'success', // Set array status dengan success
  'norek'       => $data['nomor_rekening'], // Set array norek dengan isi kolom norek_nasabah pada tabel tb_nasabah
  'namaNasabah' => $data['nama'], // Set array namaNasabah dengan isi kolom nama_nasabah pada tabel tb_nasabah
  'jk'          => $data['jenis_kelamin'], // Set array jk dengan isi kolom jk_nasabah pada tabel tb_nasabah
  'alamat'      => $data['alamat'], // Set array alamat dengan isi kolom alamat_nasabah pada tabel tb_nasabah
  'telp'        => $data['telp'], // Set array telp dengan isi kolom telp_nasabah pada tabel tb_nasabah
  'pekerjaan'   => $data['pekerjaan'], // Set array pekerjaan dengan isi kolom pekerjaan_nasabah pada tabel tb_nasabah
  );
} else {
  $callback = array('status' => 'failed'); // set array status dengan failed
}

echo json_encode($callback); // konversi varibael $callback menjadi JSON
?>