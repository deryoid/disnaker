<?php
require '../../config/config.php';
require '../../config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<?php
include '../../templates/head.php';

$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM instansi WHERE id_instansi = '$id'");
$row = $data->fetch_array();
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php
        include '../../templates/navbar.php';
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include '../../templates/sidebar.php';
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Instansi</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Master</li>
                                <li class="breadcrumb-item active">Instansi</li>
                                <li class="breadcrumb-item active">Tambah Data</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- left column -->
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Horizontal Form -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Instansi</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nama Instansi</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="nama_instansi" value="<?= $row['nama_instansi'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Info Instansi</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="info_instansi" value="<?= $row['info_instansi']?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Alamat Instansi</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="alamat_instansi"><?= $row['alamat_instansi'] ?></textarea>
                                            </div>
                                        </div>



                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/instansi/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
                                        <button type="submit" name="submit" class="btn bg-gradient-primary float-right mr-2"><i class="fa fa-save"> Simpan</i></button>
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

        <?php include_once "../../templates/footer.php"; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once "../../templates/script.php"; ?>


    <?php
    if (isset($_POST['submit'])) {
        $nama_instansi = $_POST['nama_instansi'];
        $info_instansi  = $_POST['info_instansi'];
        $alamat_instansi  = $_POST['alamat_instansi'];


        $submit = $koneksi->query("UPDATE instansi SET 
        nama_instansi = '$nama_instansi',
        info_instansi = '$info_instansi',
        alamat_instansi = '$alamat_instansi'
        WHERE id_instansi = '$id'");


        if ($submit) {
            $_SESSION['pesan'] = "Data Berhasil Diubah";
            echo "<script>window.location.replace('../instansi/');</script>";
        }
    }

    ?>
</body>

</html>