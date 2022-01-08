<?php
require 'config/config.php';
require 'config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<?php
include 'templates/head.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-green  navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Tentang</a>
      </li> -->
  </ul>


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <!-- Notifications Dropdown Menu -->
    <!--       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" title="Proposal Belum Terverifikasi">
          <i class="fas fa-envelope mr-2">&nbsp;Pemberitahuan</i>
          <span class="badge badge-warning navbar-badge">1</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <span class="dropdown-item dropdown-header"></span>
          <a href="#" class="dropdown-item">

          </a>
        </div>
      </li> -->
<!-- 
    <li class="nav-item dropdown img-square elevation-1">
      <a class="nav-link alert-logout" href="<?= base_url('logout') ?>">
        <i class="fas fa-door-open"></i>
      </a>
    </li> -->

  </ul>
</nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-green elevation-2"  style="background-color: #28A745;">
  <!-- dark-primary  -->
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
  <img src="<?= base_url() ?>/assets/dist/img/logo.png" style="width: 30px;" alt="#" class="brand-image" style="opacity: 12">
    <span class="brand-text font-weight-light"  style="color: white;"><b>DISNAKER</b></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-3 pb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>/assets/dist/img/1-av.jpg" class="img-circle elevation-1" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">
          <i>
            
          </i>
        </a>
      </div> -->
    <!-- </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
              <li class="nav-item">
            <a href="<?= base_url('index') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"   style="color: white;"></i>
              <p  style="color: white;">
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('login') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-in-alt"   style="color: white;"></i>
              <p  style="color: white;">
               Login
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('register') ?>" class="nav-link">
              <i class="nav-icon fas fa-ticket-alt"  style="color: white;"></i>
              <p  style="color: white;">
               Register
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
                            <div class="col-md-12">
                            <?php if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') { ?>
                            <div class="alert alert-danger success-alert" role="alert">
                                <i class="fa fa-check"> <?= $_SESSION['pesan']; ?></i>
                              </div>
                            <?php } $_SESSION['pesan'] = ''; ?>
                                <!-- Horizontal Form -->
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Lupa Password</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">

                                    <div class="form-group row text-center">
                                        <label class="col-sm-3 col-form-label">Masukkan Username*</label>
                                        <div class="col-sm-7">
                                        <input type="text" class="form-control" required="" name="username">
                                        </div>
                                    </div>

                                    <div class="card-footer" style="background-color: white;">
                                    <button type="submit" name="cari" class="btn btn-default btn-block bg-gradient-blue btn-xm"><i class="fa fa-search mr-1"></i>Cari</button>
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
  $(document).ready(function(){       
        $('.form-cek').click(function(){
            if($(this).is(':checked')){
                $('.form-pass').attr('type','text');
            }else{
                $('.form-pass').attr('type','password');
            }
        });

    });

</script>
<?php
if (isset($_POST['cari'])) {
        $username = $_POST['username'];

        $cekuser = $koneksi->query("SELECT * FROM user WHERE username = '$username'")->fetch_array();

    if ($cekuser) {
       
          echo "<script>window.location.replace('lupassproses?user=$cekuser[username]');</script>";
 
       $_SESSION['pesan'] = "Data Berhasil Ditemukan";
        
    }else{

      $_SESSION['pesan'] = "Nama Tidak Ada Gagal Lupa Password";
      echo "<script>window.history.back();</script>";
    }
}
    
?>
</body>

</html>