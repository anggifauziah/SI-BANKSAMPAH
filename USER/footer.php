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

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Jl. Masjid<br>
              No.13<br>
              Sroyo <br><br>
              <strong>Phone:</strong> 081357780664<br>
              <strong>Email:</strong> banksampahsroyo@gmail.com<br>
            </p>

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