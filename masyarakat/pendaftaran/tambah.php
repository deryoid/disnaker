<?php
require '../../config/config.php';
require '../../config/koneksi.php';

function set_nomor_antri($angka)
{
    if ($angka < 100 && $angka > 9) {
        return '0' . $angka;
    } elseif ($angka > 99) {
        return $angka;
    } else {
        return '00' . $angka;
    }
}

?>
<!DOCTYPE html>
<html>
<?php
include '../../templates/head.php';
$tgl      = date('Y-m-d');
$ceknomor = $koneksi->query("SELECT MAX(nomor_antrian) AS nomor FROM pendaftaran WHERE tgl_pendaftaran = '$tgl'")->fetch_array();
// var_dump($ceknomor['nomor']);
$ambilnomor = $ceknomor['nomor'] + 1;
$no_antri = set_nomor_antri($ambilnomor);


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
                            <h1 class="m-0 text-dark">Pendaftaran/Pengajuan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Master</li>
                                <li class="breadcrumb-item active">Pendaftaran/Pengajuan</li>
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
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Pendaftaran/Pengajuan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">

                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Nomor Antrian</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nomor_antrian" value="<?= $no_antri ?>" name="nomor_antrian" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">KTP</label>
                                            <div class="col-sm-10">
                                            <input type="file" class="form-control" id="ktp" name="ktp">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">KK</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="kk">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Pas Foto</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="foto">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Tanggal Pendaftaran</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tgl_pendaftaran" value="<?php echo date('Y-m-d');?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" class="form-control" name="ket"></textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('masyarakat/pendaftaran/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
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
        $nomor_antrian            = $_POST['nomor_antrian'];
        $tgl_pendaftaran          = $_POST['tgl_pendaftaran'];
        $ket                      = $_POST['ket'];
        $id_masyarakat             = $_SESSION['id_masyarakat'];

        if (!empty($_FILES['ktp']['name'])) {
          
            // UPLOAD file PEMOHON
            $ktp      = $_FILES['ktp']['name'];
            $x_ktp    = explode('.', $ktp);
            $ext_ktp  = end($x_ktp);
            $nama_ktp = rand(1, 99999) . '.' . $ext_ktp;
            $size_ktp = $_FILES['ktp']['size'];
            $tmp_ktp  = $_FILES['ktp']['tmp_name'];
            $dir_ktp  = '../../filektp/';
            $allow_ext        = array('png', 'jpg', 'JPG', 'jpeg', 'zip', 'rar', 'pdf');
            $allow_size       = 2048 * 2048 * 1;
            // var_dump($nama_file); die();

            if (in_array($ext_ktp, $allow_ext) === true) {
                if ($size_ktp <= $allow_size) {
                    move_uploaded_file($tmp_ktp, $dir_ktp . $nama_ktp);
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
            } else {
                echo "
            <script type='text/javascript'>
            setTimeout(function () {    
                swal({
                    title: 'Format File Tidak Didukung',
                    text:  'Format File Harus Berupa PNG,JPG,RAR, ZIP',
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
         if (!empty($_FILES['kk']['name'])) {
          
            // UPLOAD file PEMOHON
            $kk      = $_FILES['kk']['name'];
            $x_kk    = explode('.', $kk);
            $ext_kk  = end($x_kk);
            $nama_kk = rand(1, 99999) . '.' . $ext_kk;
            $size_kk = $_FILES['kk']['size'];
            $tmp_kk  = $_FILES['kk']['tmp_name'];
            $dir_kk  = '../../filekk/';
            $allow_ext        = array('png', 'jpg','JPG', 'jpeg', 'zip', 'rar', 'pdf');
            $allow_size       = 2048 * 2048 * 1;

            if (in_array($ext_kk, $allow_ext) === true) {
                if ($size_kk <= $allow_size) {
                    move_uploaded_file($tmp_kk, $dir_kk . $nama_kk);
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
            } else {
                echo "
            <script type='text/javascript'>
            setTimeout(function () {    
                swal({
                    title: 'Format File Tidak Didukung',
                    text:  'Format File Harus Berupa PNG,JPG,RAR, ZIP',
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
        if (!empty($_FILES['foto']['name'])) {
          
            // UPLOAD file PEMOHON
            $foto      = $_FILES['foto']['name'];
            $x_foto    = explode('.', $foto);
            $ext_foto  = end($x_foto);
            $nama_foto = rand(1, 99999) . '.' . $ext_foto;
            $size_foto = $_FILES['foto']['size'];
            $tmp_foto  = $_FILES['foto']['tmp_name'];
            $dir_foto  = '../../filefoto/';
            $allow_ext        = array('png', 'jpg','JPG', 'jpeg', 'zip', 'rar', 'pdf');
            $allow_size       = 2048 * 2048 * 1;

            if (in_array($ext_foto, $allow_ext) === true) {
                if ($size_foto <= $allow_size) {
                    move_uploaded_file($tmp_foto, $dir_foto . $nama_foto);
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
            } else {
                echo "
            <script type='text/javascript'>
            setTimeout(function () {    
                swal({
                    title: 'Format File Tidak Didukung',
                    text:  'Format File Harus Berupa PNG,JPG,RAR, ZIP',
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

        $submit = $koneksi->query("INSERT INTO pendaftaran VALUES (
            NULL,
            '$nomor_antrian',
            '$nama_ktp',
            '$nama_kk',
            '$nama_foto',
            '$tgl_pendaftaran',
            NULL,
            NULL,
            '$ket',
            'Menunggu Antrian',
            '$id_masyarakat'
            )");
        // var_dump($submit,$koneksi->error);
        // die();
        if ($submit) {

            $_SESSION['pesan'] = "Data pendaftaran Ditambahkan";
            echo "<script>window.location.replace('../pendaftaran/');</script>";
        }
    }
    ?>


</body>

</html>
