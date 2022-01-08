<?php
require '../../config/config.php';
require '../../config/koneksi.php';
require '../../config/day.php';
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
                            <h1 class="m-0 text-dark">Proses Pembuatan Kartu Ketenaga Kerjaan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">Data Master</a></li> -->
                                <li class="breadcrumb-item active">Proses Pembuatan Kartu Ketenaga Kerjaan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary card-outline">
                            <div class="card-header">
                                    <a href="print" target="blank" class="btn bg-info"><i class="fa fa-print"> Cetak</i></a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                                    ?>
                                        <div class="alert alert-info alertinfo" role="alert">
                                            <i class="fa fa-check-circle"> <?= $_SESSION['pesan']; ?></i>
                                        </div>
                                    <?php
                                        $_SESSION['pesan'] = '';
                                    }
                                    ?>

                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead class="bg-green">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Nomor Antrian</th>
                                                    <th>Persyaratan</th>
                                                    <th>Tanggal</th>
                                                    <th>Status</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM pendaftaran AS p
                                            LEFT JOIN masyarakat AS pl ON p.id_masyarakat = pl.id_masyarakat 
                                            WHERE p.status_pendaftaran = 'Proses'");
                                            while ($row = $data->fetch_array()) {
                                            ?>
                                                <tbody style="background-color: white">
                                                    <tr>
                                                        <td align="center"><?= $no++ ?></td>
                                                        <td align="center"><h1><?= $row['nomor_antrian'] ?></h1></td>
                                                        <td>
                                                            <ul>
                                                            <li>KTP : <a href="<?= base_url(); ?>/filektp/<?= $row['ktp']?>" data-toggle="lightbox" data-title="ktp" data-gallery="galery" title="Lihat" target="blank"><i class="fa fa-file-archive"> Lihat KTP</i></a></li>
                                                            <li>KK : <a href="<?= base_url(); ?>/filekk/<?= $row['kk']?>" data-toggle="lightbox" data-title="kk" data-gallery="galery" title="Lihat" target="blank"><i class="fa fa-file-archive"> Lihat KK</i></a></li>
                                                            <li>PAS FOTO : <a href="<?= base_url(); ?>/filefoto/<?= $row['foto']?>" data-toggle="lightbox" data-title="foto" data-gallery="galery" title="Lihat" target="blank"><i class="fa fa-file-archive"> Lihat Foto</i></a></li>
                                                            <li>Ket : <?= $row['ket'] ?></li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                            <li>Tanggal Pembuatan : <?= $row['tgl_buat'] ?></li>
                                                            <li>Tanggal Ambil : <?= $row['tgl_ambil'] ?></li>
                                                            </ul>
                                                        </td>
                                                        <td align="center"><span class="badge badge-primary"><?= $row['status_pendaftaran'] ?></span></td>
                                                        
                                                        <td align="center">
                                                            <a href="edit?id=<?= $row['id_pendaftaran'] ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"> Selesai</i></a>
                                                        
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php } ?>
                                        </table>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
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

    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    </script>

</body>

</html>


 <!-- MODAL Print -->
 <div id="modal_print" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cetak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
    <!-- Start content -->
        <div class="content">
            <div class="container"> 
                <div class="row">
                     <div class="col-sm-12">
                          <div class="card-box">
                                <form class="form-horizontal" action="printperbaikan" method="POST" target="blank">

                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Pilih Petugas </label>
                                            <div class="col-sm-12">
                                            <select class="form control select2" name="nama_petugas" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $sd = $koneksi->query("SELECT nama_petugas FROM perbaikan AS p
                                                    LEFT JOIN petugas AS ps ON p.id_petugas = ps.id_petugas
                                                    
                                                    GROUP BY nama_petugas");
                                                    foreach ($sd as $item) {
                                                    ?>
                                                        <option value="<?= $item['nama_petugas'] ?>"><?= $item['nama_petugas'] ?></option>
                                                        
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <input type="submit" name="print" class="btn btn-success" value="Print">

                                </form>
                                       
                                </div>
                            </div>                          
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>

 <!-- MODAL Print -->
 <div id="modal_printatm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cetak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
    <!-- Start content -->
        <div class="content">
            <div class="container"> 
                <div class="row">
                     <div class="col-sm-12">
                          <div class="card-box">
                                <form class="form-horizontal" action="printperbaikanatm" method="POST" target="blank">

                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Pilih ATM </label>
                                            <div class="col-sm-12">
                                            <select class="form control select2" name="id_sektoratm" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $atm = $koneksi->query("SELECT * FROM sektor_atm AS sa 
                                                    LEFT JOIN barang AS b ON sa.kode_barang = b.kode_barang");
                                                    foreach ($atm as $item) {
                                                    ?>
                                                        <option value="<?= $item['id_sektoratm'] ?>"><?= $item['kode_barang'] ?> | <?= $item['nama_barang'] ?> | <?= $item['bank'] ?></option>
                                                        
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <input type="submit" name="print" class="btn btn-success" value="Print">

                                </form>
                                       
                                </div>
                            </div>                          
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>