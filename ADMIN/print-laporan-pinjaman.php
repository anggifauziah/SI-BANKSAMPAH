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
		$query = "SELECT p.tanggal_pinjam, pt.kode_petugas, n.kode_nasabah, n.nomor_rekening, u.nama, p.jumlah_pinjam FROM tb_pinjaman p, tb_petugas pt, tb_nasabah n, tb_users u WHERE p.petugas_id = pt.id_petugas AND p.nasabah_id = n.id_nasabah AND n.users_id = u.id";

		$label = "Semua Data Pinjaman";
	}else{ // Jika terisi
		// Buat query untuk menampilkan data Pinjaman sesuai periode tanggal
		$query = "SELECT p.tanggal_pinjam, pt.kode_petugas, n.kode_nasabah, n.nomor_rekening, u.nama, p.jumlah_pinjam FROM tb_pinjaman p, tb_petugas pt, tb_nasabah n, tb_users u WHERE p.petugas_id = pt.id_petugas AND p.nasabah_id = n.id_nasabah AND n.users_id = u.id AND (tanggal_pinjam BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";

		//$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
		//$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
		//$label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
		function formatBulan($tgl){
          $bln    = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
          $pecah = explode('-', $tgl);
          return $pecah[2]. ' ' . $bln[((int)$pecah[1])-1]. ' ' .$pecah[0];
        }

		if (date("m", strtotime($tgl_awal)) != date("m", strtotime($tgl_akhir))){
            $label =  'Periode Tanggal '.(formatBulan(date(" -m-d", strtotime($tgl_awal)))." s/d ".formatBulan(date("Y-m-d", strtotime($tgl_akhir))));
        } elseif (date("Y", strtotime($tgl_awal)) != date("Y", strtotime($tgl_akhir))){
            $label =  'Periode Tanggal '.(formatBulan(date("Y-m-d", strtotime($tgl_awal)))." s/d ".formatBulan(date("Y-m-d", strtotime($tgl_akhir))));
        } else {
            $label =  'Periode Tanggal '.(date("d", strtotime($tgl_awal))." s/d ".formatBulan(date("Y-m-d", strtotime($tgl_akhir))));
        }
	}
	?>

	<table width="100%" border="0" align="center">
      <tr>
        <td><strong><h3 align="center">...BANK SAMPAH...</h3></strong></td>
      </tr>
      <tr>
        <td align="center">Jl. Masjid No. 13, <br> Sroyo <br> Telpon : 081357780664 </td>
      </tr>
      <tr>
        <td align="center">------------------------------------------------------------------------------------------------------------------------</td>
      </tr>
      <tr>
      	<td><h4 align="center" style="margin-bottom: 5px;">Data Laporan Tabungan</h4></td>
      </tr>
      <tr>
      	<td align="center"><?php echo $label ?></td>
      </tr>
    </table>
    <br>

	<table class="table" border="1" width="100%" style="margin-top: 10px;">
		<tr>
			<th>No</th>
            <th>Tanggal Pinjam</th>
            <th>Kode Petugas</th>
            <th>Kode Nasabah (NIK)</th>
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
                echo "<td style='width: 5%;'>".$tgl."</td>";
                echo "<td style='width: 5%;'>".$data['kode_petugas']."</td>";
                echo "<td style='width: 18%;'>".$data['kode_nasabah']."</td>";
                echo "<td style='width: 15%;'>".$data['nomor_rekening']."</td>";
                echo "<td style='width: 18%;'>".$data['nama']."</td>";
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
