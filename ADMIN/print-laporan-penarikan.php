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
		$query = "SELECT t.tanggal_tarik, pt.kode_petugas, n.kode_nasabah, n.nomor_rekening, u.nama, t.jumlah_tarik FROM tb_tarik_tabungan t, tb_petugas pt, tb_nasabah n, tb_users u WHERE t.petugas_id = pt.id_petugas AND t.nasabah_id = n.id_nasabah AND n.users_id = u.id";

		$label = "Semua Data Penarikan";
	}else{ // Jika terisi
		// Buat query untuk menampilkan data Pinjaman sesuai periode tanggal
		$query = "SELECT t.tanggal_tarik, pt.kode_petugas, n.kode_nasabah, n.nomor_rekening, u.nama, t.jumlah_tarik FROM tb_tarik_tabungan t, tb_petugas pt, tb_nasabah n, tb_users u WHERE t.petugas_id = pt.id_petugas AND t.nasabah_id = n.id_nasabah AND n.users_id = u.id AND (tanggal_pinjam BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";

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
        <td align="center">
          <?php
          	$queryConfig   = mysqli_query($koneksi,"SELECT judul, isi FROM tb_config WHERE id_config = 1 OR id_config = 2 OR id_config = 3 ");
            while($dataConfig = mysqli_fetch_array($queryConfig)) {
              $isi = preg_replace('#</?p.*?>#is', '', $dataConfig['isi']);
              if ($dataConfig['judul'] == "Telepon"){
                echo "Telepon : ".$isi;
              } else {
                echo $isi."<br>";
              }
            }
          ?>
        </td>
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
            <th>Tanggal Tarik</th>
            <th>Kode Petugas</th>
            <th>Kode Nasabah (NIK)</th>
            <th>Nomor Rekening</th>
            <th>Nama Nasabah</th>
            <th>Jumlah Tarik</th>
		</tr>

		<?php
		function decrypt_aes($string) {
			$encrypt_method = "AES-256-CBC";
			$secret_key = 'sadgjakgdkjafkj';
			$secret_iv = 'This is my secret iv';

			$key = hash('sha256', $secret_key);  
			$iv = substr(hash('sha256', $secret_iv), 0, 16);

			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
			return $output;
		  }
		$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
		$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
		$nomor = 1;

		if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
			while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
				$tgl = date('d-m-Y', strtotime($data['tanggal_tarik'])); // Ubah format tanggal jadi dd-mm-yyyy

				echo "<tr>";
				echo "<td style='width: 5%;'>".$nomor++."</td>";
                echo "<td style='width: 5%;'>".$tgl."</td>";
                echo "<td style='width: 5%;'>".$data['kode_petugas']."</td>";
                echo "<td style='width: 18%;'>".$data['kode_nasabah']."</td>";
                echo "<td style='width: 15%;'>".$data['nomor_rekening']."</td>";
                echo "<td style='width: 18%;'>".decrypt_aes($data['nama'])."</td>";
                echo "<td>Rp".$data['jumlah_tarik']."</td>";
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
$pdf->Output('Laporan Penarikan.pdf', 'D');
?>
