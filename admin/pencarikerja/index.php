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
                            <h1 class="m-0 text-dark">Pencari Kerja</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">Data Master</a></li> -->
                                <li class="breadcrumb-item active">Pencari Kerja</li>
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
                            <div class="card card-outline">
                                <div class="card-header">
                                    <?php if ($data['pekerjaan'] == 'Belum Bekerja') { ?>
                                        <a href="tambah" class="btn bg-blue"><i class="fa fa-plus-circle"> Tambah Data</i></a>
                                        <a href="print" target="blank" class="btn bg-blue"><i class="fa fa-print"> Cetak</i></a>
                                    <?php } else {
                                        echo "<h2>Anda Sudah Bekerja ..!</h2>";
                                    } ?>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead class="bg-green">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Masyarakat</th>
                                                    <th>Instansi</th>
                                                    <th>Desa</th>
                                                    <th>Surat Lamaran</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM pencarian_kerja AS pk
                                            LEFT JOIN masyarakat AS m ON pk.id_masyarakat = m.id_masyarakat 
                                            LEFT JOIN instansi AS i ON pk.id_instansi = i.id_instansi
                                            LEFT JOIN desa AS d ON pk.id_desa = d.id_desa
                                            WHERE pk.id_masyarakat = '$_SESSION[id_masyarakat]'");
                                            while ($row = $data->fetch_array()) {
                                            ?>
                                                <tbody style="background-color: white">
                                                    <tr>
                                                        <td align="center"><?= $no++ ?></td>
                                                        <td align="center">
                                                            Nama : <?= $row['nama_masyarakat'] ?><br>
                                                            NIK : <?= $row['nik'] ?><br>
                                                            Telp/WA : <?= $row['no_wa'] ?><br>
                                                        </td>
                                                        <td>
                                                            Nama Instansi: <?= $row['nama_instansi'] ?><br>
                                                            Alamat : <?= $row['alamat_instansi'] ?><br>
                                                            Info Lowongan : <?= $row['info_instansi'] ?><br>
                                                        </td>
                                                        <td>
                                                            Asal : <?= $row['nama_desa'] ?>
                                                        </td>
                                                        <td align="center"><a href="<?= base_url(); ?>/filesuratlamaran/<?= $row['surat_lamaran'] ?>" data-toggle="lightbox" data-title="surat_lamaran" data-gallery="galery" title="Lihat" target="blank"><i class="fa fa-file-archive"> Lihat Lamaran</i></a></td>

                                                        <td align="center">
                                                            <a href="hapus?id=<?= $row['id_pencarian_kerja'] ?>" class="btn btn-danger btn-sm alert-hapus" title="Hapus"><i class="fa fa-times-circle"></i> Batalkan Pengajuan </a>
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