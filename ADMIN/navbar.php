  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">SI- Bank Sampah</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseData" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Data Master</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseData">
            <li>
              <a href="menu-jenis-sampah.php">Data Jenis Sampah</a>
            </li>
            <li>
              <a href="menu-petugas.php">Data Petugas</a>
            </li>
            <li>
              <a href="menu-pengepul.php">Data Pengepul</a>
            </li>
            <li>
              <a href="menu-nasabah.php">Data Nasabah</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseLaporan" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-copy"></i>
            <span class="nav-link-text">Laporan</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseLaporan">
            <li>
              <a href="laporan-tabungan.php">Laporan Tabungan</a>
            </li>
            <li>
              <a href="laporan-penarikan.php">Laporan Penarikan</a>
            </li>
            <li>
              <a href="laporan-pinjaman.php">Laporan Pinjaman</a>
            </li>
            <li>
              <a href="laporan-angsuran.php">Laporan Angsuran</a>
            </li>
            <li>
              <a href="laporan-penjualan.php">Laporan Penjualan</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tabungan">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTabungan" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Tabungan</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseTabungan">
            <li>
              <a href="menu-tabung.php">Tabung</a>
            </li>
            <li>
              <a href="menu-tarik.php">Tarik</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Peminjaman">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePeminjaman" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Peminjaman</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapsePeminjaman">
            <li>
              <a href="menu-pinjaman.php">Pinjaman</a>
            </li>
            <li>
              <a href="menu-angsuran.php">Angsuran</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Penjualan">
          <a class="nav-link" href="menu-penjualan.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Penjualan</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuration">
          <a class="nav-link" href="menu-configuration.php">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Configuration</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- End -->
