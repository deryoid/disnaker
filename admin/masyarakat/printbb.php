<?php
include '../../config/config.php';
include '../../config/koneksi.php';

$no = 1;

$bln = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
);

?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN DATA </title>
</head>

<body>

    <img src="<?= base_url('assets/dist/img/logo.png') ?>" align="left" width="90" height="100">
    <p align="center"><b>
            <font size="5">PEMERINTAH KABUPATEN TAPIN </font> <br>
            <font size="5">DINAS TENAGA KERJA</font><br><br><br>
            <hr size="2px" color="black">
            <center>
                <font size="2">Alamat : Jl.Gubernur H.Aberani Sulaiman No.129</font>
            </center>
            <hr size="2px" color="black">
        </b></p>
        Masyarakat yang Belum Bekerja
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead class="bg-green">
                        <tr align="center">
                            <th>No</th>
                            <th>Masyarakat </th>
                            <th>E-mail</th>
                            <th>Status Pekerjaan</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    $data = $koneksi->query("SELECT * FROM masyarakat AS p
                LEFT JOIN user AS u ON p.id_user = u.id_user
                WHERE p.pekerjaan = 'Belum Bekerja'");
                    while ($row = $data->fetch_array()) {
                    ?>
                        <tbody style="background-color: white">
                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td>
                                    Nama : <?= $row['nama_masyarakat'] ?><br>
                                    NIK : <?= $row['nik'] ?><br>
                                    Telp/WA : <?= $row['no_wa'] ?><br>
                                    Status : <b><?= $row['status'] ?></b><br>
                                </td>
                                <td align="center"><?= $row['email'] ?></td>
                                <td align="center"><b><?= $row['pekerjaan'] ?></b></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <br>

    </div>

    </div>
    <div style="text-align: center; display: inline-block; float: right;">
        <h5>
            Tapin , <?php echo tgl_indo(date('Y-m-d')); ?><br>

            <br><br><br><br>
            Kepala Dinas
        </h5>

    </div>

</body>

</html>

<script>
    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }

    ?>
</script>