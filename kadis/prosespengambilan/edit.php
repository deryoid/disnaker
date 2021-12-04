<?php
require '../../config/config.php';
require '../../config/koneksi.php';
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pendaftaran WHERE id_pendaftaran = '$id'");
$row  = $data->fetch_array();
?>
<!DOCTYPE html>
<html>
<?php
include '../../templates/head.php';
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
                            <h1 class="m-0 text-dark">Pengambilan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pengambilan</li>
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
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Pengerjaan Selesai dan Pengambilan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">

                                    <div class="form-group row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <b>
                                                <td><h2><b>Nomor Antrian Pelanggan : <?= $row['nomor_antrian']?></b></h2></td>
                                                <td>No Pol/Plat : <?= $row['no_pol'] ?></td>
                                                <td>Merk Mobil : <?= $row['merk'] ?></td>
                                                <td>Nama Pemilik : <?= $row['nama_pemilik'] ?></td>
                                                <hr>
                                                <td>Keterangan : <?= $row['ket'] ?></td>    
                                                <hr>
                                                <td>Tanggal Service : 
                                                    <?php 
                                                    if ($row['tgl_service'] == NULL)  {
                                                        echo "<u>Menunggu Informasi</u>";
                                                    } else{
                                                        echo $row['tgl_service'];
                                                    }
                                                    
                                                    ?>
                                                </td>    
                                                <td>Status : <?= $row['status_pendaftaran'] ?></td> <br>
                                            </b>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Tanggal Service</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tgl_service" value="<?= $row['tgl_service'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Tanggal Pengambilan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tgl_ambil" value="<?= $row['tgl_ambil'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                            <select class="form-control" data-placeholder="Pilih" id="status_pendaftaran" name="status_pendaftaran">
                                                    <option value="Selesai" <?php if ($row['status_pendaftaran'] == "Selesai") {
                                                                            echo "selected";
                                                                            } ?>>Selesai</option>
                                            </select>
                                            </div>
                                        </div>
                                       

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/antrian/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
                                        <button type="submit" name="submit" class="btn bg-gradient-primary float-right mr-2"><i class="fa fa-check"> Proses</i></button>
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
        $status_pendaftaran        = $_POST['status_pendaftaran'];

        $submit = $koneksi->query("UPDATE pendaftaran SET  
                            status_pendaftaran = '$status_pendaftaran'
                            WHERE 
                            id_pendaftaran = '$id'");

        if ($submit) {
            $_SESSION['pesan'] = "Data Sudah Diproses";
            echo "<script>window.location.replace('../prosespengambilan/');</script>";
        }
    }

    ?>

</body>

</html>