<!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="informasi.php">Informasi</a></li>
              <li <?php if (empty($_SESSION)) { echo "style='display:none'"; } ?>><a href="profil.php">Profil</a></li>
              <li <?php if (empty($_SESSION)) { echo "style='display:none'"; } ?>><a href="tabungan.php">Tabungan</a></li>
              <li <?php if (empty($_SESSION)) { echo "style='display:none'"; } ?>><a href="pinjaman.php">Pinjaman</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </div>
          <?php
          include('koneksi_db.php');
          $query   = mysqli_query($koneksi,"SELECT judul, isi FROM tb_config WHERE id_config = 11 OR id_config = 12 ");
          $query2 = mysqli_query($koneksi,"SELECT isi FROM tb_config WHERE id_config = 10 ");
          $data2   = mysqli_fetch_array($query2);
          $isi = $data2['isi'];
          $jln = substr($isi, 0, 13);
          $no  = substr($isi, 13, 7);
          $alamat = substr($isi, 20, 6);
          ?>
          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              <?php echo $jln; ?><br>
              <?php echo $no; ?><br>
              <?php echo $alamat; ?><br>
            </p>
            <?php
              while($data = mysqli_fetch_array($query)) {
            ?>
                <strong><?php echo $data['judul'] ?></strong>
                <?php echo ":".$data['isi']; ?>
            <?php
              }
            ?>
          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>SI-Bank Sampah</h3>
            <p>Tabungan, Pinjaman dan catatan elektronik Bank Sampah </p>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>SI-Bank Sampah</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->