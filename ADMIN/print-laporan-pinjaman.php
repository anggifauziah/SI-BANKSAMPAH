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
		// Buat query untuk menampilkan semua data Pinjaman
		$query = "SELECT p.id_pinjam, p.id_petugas, p.id_nasabah, n.norek_nasabah, n.nama_nasabah, p.jumlah_pinjam, p.tanggal_pinjam FROM tb_pinjaman p INNER JOIN tb_nasabah n WHERE p.id_nasabah = n.id_nasabah";

		$label = "Semua Data Pinjaman";
	}else{ // Jika terisi
		// Buat query untuk menampilkan data Pinjaman sesuai periode tanggal
		$query = "SELECT p.id_pinjam, p.id_petugas, p.id_nasabah, n.norek_nasabah, n.nama_nasabah, p.jumlah_pinjam, p.tanggal_pinjam FROM tb_pinjaman p INNER JOIN tb_nasabah n WHERE p.id_nasabah = n.id_nasabah AND (tanggal_pinjam BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";

		$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
		$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
		$label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
	}
	?>

	<h4 style="margin-bottom: 5px;">Data Laporan Pinjaman</h4>
	<?php echo $label ?>

	<table class="table" border="1" width="100%" style="margin-top: 10px;">
		<tr>
			<th>No</th>
            <th>Tanggal Pinjam</th>
            <th>ID Petugas</th>
            <th>ID Nasabah</th>
            <th>Nomor Rekening</th>
            <th>Nama Nasabah</th>
            <th>Jumlah Pinjam</th>
		</tr>

		<?php
		$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
		$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
		$nomor = 1;

		if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
			while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
				$tgl = date('d-m-Y', strtotime($data['tanggal_pinjam'])); // Ubah format tanggal jadi dd-mm-yyyy

				echo "<tr>";
				echo "<td style='width: 5%;'>".$nomor++."</td>";
                echo "<td>".$tgl."</td>";
                echo "<td>".$data['id_petugas']."</td>";
                echo "<td>".$data['id_nasabah']."</td>";
                echo "<td>".$data['norek_nasabah']."</td>";
                echo "<td>".$data['nama_nasabah']."</td>";
                echo "<td>Rp".$data['jumlah_pinjam']."</td>";
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
$pdf->Output('Laporan Pinjaman.pdf', 'D');
?>
