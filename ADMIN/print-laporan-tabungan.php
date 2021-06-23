<?php ob_start(); ?>
<html>
<head>
	<title>Admin - SI Bank Sampah</title>
	<style>
		.table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		.table th {
			padding: 5px;
		}
		.table td {
			word-wrap:break-word;
			width: 16%;
			padding: 5px;
		}
	</style>
</head>
<body>
	<?php
	// Load file koneksi.php
	include "koneksi_db.php";

	$tgl_awal = @$_GET['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
	$tgl_akhir = @$_GET['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

	if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
		// Buat query untuk menampilkan semua data Angsuran
		$query = "SELECT t.id_tabung, t.id_petugas, t.id_nasabah, n.nama_nasabah, j.nama_jenis, t.berat_tabung, t.total_tabung, t.tanggal_tabung FROM tb_tabungan t, tb_nasabah n, tb_jenis_sampah j WHERE t.id_nasabah = n.id_nasabah AND j.id_jenis = t.id_jenis ORDER BY t.id_tabung ASC";

		$label = "Semua Data Tabungan";
	}else{ // Jika terisi
		// Buat query untuk menampilkan data Angsuran sesuai periode tanggal
		$query = "SELECT t.id_tabung, t.id_petugas, t.id_nasabah, n.nama_nasabah, j.nama_jenis, t.berat_tabung, t.total_tabung, t.tanggal_tabung FROM tb_tabungan t, tb_nasabah n, tb_jenis_sampah j WHERE t.id_nasabah = n.id_nasabah AND j.id_jenis = t.id_jenis AND (tanggal_tabung BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";

		$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
		$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
		$label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
	}
	?>

	<h4 style="margin-bottom: 5px;">Data Laporan Tabungan</h4>
	<?php echo $label ?>

	<table class="table" border="1" width="100%" style="margin-top: 10px;">
		<tr>
			<th>No</th>
            <th>Tanggal Tabung</th>
            <th>ID Nasabah</th>
            <th>Nama Nasabah</th>
            <th>Jenis Sampah</th>
            <th>Berat Sampah</th>
            <th>Total Tabung</th>
		</tr>

		<?php
		$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
		$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
		$nomor = 1;

		if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
			while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
				$tgl = date('d-m-Y', strtotime($data['tanggal_tabung'])); // Ubah format tanggal jadi dd-mm-yyyy

				echo "<tr>";
				echo "<td style='width: 5%;'>".$nomor++."</td>";
                echo "<td>".$tgl."</td>";
                echo "<td style='width: 18%;'>".$data['id_nasabah']."</td>";
                echo "<td>".$data['nama_nasabah']."</td>";
                echo "<td>".$data['nama_jenis']."</td>";
                echo "<td style='width: 5%;'>".$data['berat_tabung']."</td>";
                echo "<td>Rp".$data['total_tabung']."</td>";
				echo "</tr>";
			}
		}else{ // Jika data tidak ada
			echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
		}
		?>
	</table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require 'vendor/libraries/html2pdf/autoload.php';

$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Laporan Tabungan.pdf', 'D');
?>
