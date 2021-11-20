<?php
include 'koneksi_db.php'; // menambahkan koneksi

$id    = $_POST['id']; // mengambil value id
$jenis = mysqli_query($koneksi,"SELECT * FROM tb_jenis_sampah WHERE id_jenis_sampah='$id'"); //mendapatkan isi dari tabel tb_jenis_sampah

$getJenis = mysqli_fetch_assoc($jenis); //karena berbentuk objek
echo $getJenis['harga_jual']; //menampilkan data harga melalui $getJenis

 ?>
