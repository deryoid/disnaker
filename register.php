<?php
require 'config/config.php';
require 'config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<?php
include 'templates/head.php';
?>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light  navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-green elevation-2" style="background-color: dark;">
      <!-- dark-primary  -->
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="<?= base_url() ?>/assets/dist/img/logo.png" style="width: 30px;" alt="#" class="brand-image" style="opacity: 12">
        <span class="brand-text font-weight-light" style="color: white;"><b>DISNAKER</b></span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>/assets/dist/img/logo.png" class="img-circle elevation-1" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">
          <i>
            
          </i>
        </a>
      </div>
    </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('index') ?>" class="nav-link">
                <i class="nav-icon fas fa-home" style="color: white;"></i>
                <p style="color: white;">
                  Beranda
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('login') ?>" class="nav-link">
                <i class="nav-icon fas fa-lock" style="color: white;"></i>
                <p style="color: white;">
                  Masuk
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('register') ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-in-alt" style="color: white;"></i>
                <p style="color: white;">
                  Mendaftar
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
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
          <!-- left column -->
          <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

            <div class="row">
              <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Pendaftaran Akun Masyarakat</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card-body" style="background-color: white;">

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="username" required="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control form-pass" name="password" required="">
                        <div class="border-checkbox-group border-checkbox-group-primary">
                          <small>
                            <input class="border-checkbox form-cek" type="checkbox" id="checkbox1">
                            <label class="border-checkbox-label" for="checkbox1">Tampilkan Password</label>
                          </small>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" class="form-control form-pass" name="role" value="Masyarakat">
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer" style="background-color: white;">
                    <a href="<?= base_url('index') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
                    <button type="submit" name="submit" class="btn bg-gradient-success float-right mr-2"><i class="fa fa-save"> Daftar</i></button>
                  </div>
                  <!-- /.card-footer -->

                </div>

              </div>
              <!--/.col (left) -->
            </div>

          </form>

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <?php
    include 'templates/footer.php';
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
  include 'templates/script.php';
  ?>

  <script>
    $(document).ready(function() {
      $('.form-cek').click(function() {
        if ($(this).is(':checked')) {
          $('.form-pass').attr('type', 'text');
        } else {
          $('.form-pass').attr('type', 'password');
        }
      });

    });
  </script>
  <?php
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role  = $_POST['role'];

    $submit = $koneksi->query("INSERT INTO user VALUES (
        NULL,
        '$username', 
        '$password', 
        '$role')");

    if ($submit) {
      if ($role == "Masyarakat") {
        $tkn =  $koneksi->query("SELECT * FROM user ORDER BY id_user DESC LIMIT 1")->fetch_array();
        $koneksi->query("INSERT INTO masyarakat (id_user, nama_masyarakat , status) VALUES ('$tkn[id_user]', '$tkn[username]', 'Tidak Aktif')");
      }
      $_SESSION['pesan'] = "Data Berhasil Ditambahkan";
      echo "<script>window.location.replace('index');</script>";
    }
  }

  ?>
</body>

</html>