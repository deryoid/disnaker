<aside class="main-sidebar sidebar-dark-green elevation-2">
  <!-- dark-primary  -->
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url() ?>/assets/dist/img/logo.png" style="width: 30px;" alt="#" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light"><b>DISNAKER</b></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>/assets/dist/img/avatar1.png" class="img-circle elevation-1" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">
          <i>
            <?php
            if ($_SESSION['role'] == "Administrator") {
              echo "Administrator";
            } elseif ($_SESSION['role'] == "Masyarakat") {
              echo $_SESSION['nama_masyarakat'];
            } elseif ($_SESSION['role'] == "Kadis") {
              echo "Kadis";
            }
            ?>
          </i>
        </a>
      </div>
    </div>




    <?php if ($_SESSION['role'] == "Administrator") { ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('admin/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/user') ?>" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/desa') ?>" class="nav-link">
                  <i class="fas fa-chalkboard nav-icon"></i>
                  <p>Desa</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('admin/instansi') ?>" class="nav-link">
              <i class="fas fa-building nav-icon"></i>
              <p>Instansi</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('admin/masyarakat') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Masyarakat
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('admin/antrian') ?>" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Antrian Cetak Kartu
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/masyarakat/print') ?>" target="blank" class="nav-link">
                  <p>Masyarakat</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/user/print') ?>" target="blank" class="nav-link">
                  <p>Info User (Admin)</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/antrian/print') ?>" target="blank" class="nav-link">
                  <p>Informasi KK (Pengajuan Baru)</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/antrian/printproses') ?>" target="blank" class="nav-link">
                  <p>Informasi KK (Proses)</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/antrian/printselesai') ?>" target="blank" class="nav-link">
                  <p>Informasi KK (Selesai)</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/pencarikerja/print') ?>" target="blank" class="nav-link">
                  <p>Desa Pencari Kerja Terbanyak</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->



    <?php } elseif ($_SESSION['role'] == "Masyarakat") { ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('masyarakat/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-edit"></i>
              <p>
                Profil
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('masyarakat/biodata') ?>" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Biodata
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('masyarakat/biodata/ubahpw') ?>" class="nav-link">
                  <i class="nav-icon fas fa-lock"></i>
                  <p>
                    Ganti Password
                  </p>
                </a>
              </li>
            </ul>
          </li>


          <?php
          $data = $koneksi->query("SELECT * FROM masyarakat WHERE id_masyarakat = '$_SESSION[id_masyarakat]'")->fetch_array();
          if ($data['status'] == 'Tidak Aktif' or $data['status'] ==  NULL) {
          } else {
          ?>
            <li class="nav-item">
              <a href="<?= base_url('masyarakat/pendaftaran') ?>" class="nav-link">
                <i class="nav-icon fas fa-address-card"></i>
                <p>
                  Pendaftaran/Pengajuan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('masyarakat/pencarikerja') ?>" class="nav-link">
                <i class="nav-icon fas fa-search"></i>
                <p>
                  Pencari Kerja
                </p>
              </a>
            </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    <?php } elseif ($_SESSION['role'] == "Owner") { ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('owner/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?= base_url('owner/antrian') ?>" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Antrian Baru
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('owner/prosesantrian') ?>" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Proses Pengerjaan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('owner/prosespengambilan') ?>" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Pengambilan
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    <?php } ?>
  </div>
  <!-- /.sidebar -->
</aside>