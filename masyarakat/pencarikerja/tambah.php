<?php
require '../../config/config.php';
require '../../config/koneksi.php';
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
                            <h1 class="m-0 text-dark">Pencari Kerja</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                                <!-- <li class="breadcrumb-item active">Data Master</li> -->
                                <li class="breadcrumb-item active">Pencari Kerja</li>
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
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Info Instansi</h3>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr align="center">
                                                        <th>No</th>
                                                        <th>Nama Instansi </th>
                                                        <th>Info Instansi</th>
                                                        <th>Alamat Instansi</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $no = 1;
                                                $data = $koneksi->query("SELECT * FROM instansi ORDER BY id_instansi ASC");
                                                while ($row = $data->fetch_array()) {
                                                ?>
                                                    <tbody style="background-color: white">
                                                        <tr>
                                                            <td align="center"><?= $no++ ?></td>
                                                            <td><?= $row['nama_instansi'] ?></td>
                                                            <td><?= $row['info_instansi'] ?></td>
                                                            <td><?= $row['alamat_instansi'] ?></td>
                                                        </tr>
                                                    </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>

                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Masyarakat</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" class="form-control" name="id_masyarakat" value="<?php echo $_SESSION['id_masyarakat'] ?>">
                                                <input type="text" class="form-control" value="<?php echo $_SESSION['nama_masyarakat'] ?>" readonly>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Instansi</label>
                                            <div class="col-sm-10">
                                                <select class="form control select2" name="id_instansi" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $sd = $koneksi->query("SELECT * FROM instansi");
                                                    foreach ($sd as $item) {
                                                    ?>
                                                        <option value="<?= $item['id_instansi'] ?>"><?= $item['nama_instansi'] ?><?= $item['info_instansi'] ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Desa</label>
                                            <div class="col-sm-10">
                                                <select class="form control select2" name="id_desa" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $sd = $koneksi->query("SELECT * FROM desa");
                                                    foreach ($sd as $item) {
                                                    ?>
                                                        <option value="<?= $item['id_desa'] ?>"><?= $item['nama_desa'] ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Surat Lamaran(FILE)</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="surat_lamaran">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('masyarakat/pencarikerja/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
                                        <button type="submit" name="submit" class="btn bg-gradient-primary float-right mr-2"><i class="fa fa-save"> Ajukan</i></button>
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
        $id_masyarakat        = $_POST['id_masyarakat'];
        $id_instansi   = $_POST['id_instansi'];
        $id_desa   = $_POST['id_desa'];

        if (!empty($_FILES['surat_lamaran']['name'])) {

            // UPLOAD file PEMOHON
            $surat_lamaran      = $_FILES['surat_lamaran']['name'];
            $x_surat_lamaran    = explode('.', $surat_lamaran);
            $ext_surat_lamaran  = end($x_surat_lamaran);
            $nama_surat_lamaran = rand(1, 99999) . '.' . $ext_surat_lamaran;
            $size_surat_lamaran = $_FILES['surat_lamaran']['size'];
            $tmp_surat_lamaran  = $_FILES['surat_lamaran']['tmp_name'];
            $dir_surat_lamaran  = '../../filesuratlamaran/';
            $allow_ext        = array('png', 'jpg', 'JPG', 'jpeg', 'zip', 'rar', 'pdf');
            $allow_size       = 2048 * 2048 * 1;
            // var_dump($nama_file); die();

            if (in_array($ext_surat_lamaran, $allow_ext) === true) {
                if ($size_surat_lamaran <= $allow_size) {
                    move_uploaded_file($tmp_surat_lamaran, $dir_surat_lamaran . $nama_surat_lamaran);
                    // if (file_exists($dir_file . $filelama)) {
                    //     unlink($dir_file . $filelama);
                    // }
                    // $e .= "Upload Success"; 
                } else {
                    echo "
                <script type='text/javascript'>
                setTimeout(function () {    
                    swal({
                        title: '',
                        text:  'Ukuran File Terlalu Besar, Maksimal 1 Mb',
                        type: 'warning',
                        timer: 3000,
                        showConfirmButton: true
                    });     
                },10);  
                window.setTimeout(function(){ 
                    window.history.back();
                } ,2000);   
                </script>";
                }
            }


            $submit = $koneksi->query("INSERT INTO pencarian_kerja VALUES (
            NULL,
            '$id_masyarakat',
            '$id_instansi',
            '$id_desa',
            '$nama_surat_lamaran'
            )");

            // var_dump($submit, $koneksi->error);die();

            if ($submit) {

                $_SESSION['pesan'] = "Data Pencari Kerja Ditambahkan";
                echo "<script>window.location.replace('../pencarian_kerja/');</script>";
            }
        }
    }
    ?>


</body>

</html>