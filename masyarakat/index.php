<?php
require '../config/config.php';
require '../config/koneksi.php';
require '../config/tglindo.php';
?>
<!DOCTYPE html>
<html>
<?php
include '../templates/head.php';

$data = $koneksi->query("SELECT * FROM masyarakat WHERE id_masyarakat = '$_SESSION[id_masyarakat]'")->fetch_array(); 
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php
    include '../templates/navbar.php';
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
    include '../templates/sidebar.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Pelanggan</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard </li>
              </ol>
            </div>

          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->

          <div class="alert alert-success" role="alert">
            <h5><b>
                <i class="fa fa-info-circle"></i>
                
                <?php
                  if ($data['status'] == 'Tidak Aktif' OR $data['status'] ==  NULL) {
                    echo "Selamat Datang Masyarakat di Aplikasi Pembuatan Kartu Pencari Kerja Dinas Ketenaga Kerjaan Kabupaten Tapin, Menunggu Verifikasi Terlebih Dahulu ...!";
                  }else{
                    echo "Selamat Datang ".$_SESSION['nama_masyarakat'];
                  }
                ?> 

              </b></h5>
          </div>

          

          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <?php
    include '../templates/footer.php';
    ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Script -->
  <?php
  include '../templates/script.php';
  ?>
</body>

</html>

