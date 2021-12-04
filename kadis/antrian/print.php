<?php
include '../../config/config.php';
include '../../config/koneksi.php';

$no = 1;
$tglmulai   = $_POST['tglmulai'];
$tglselesai = $_POST['tglselesai'];

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

    <p align="center"><b>
            <font size="5">Laporan Antrian <br>
            <?= tgl_indo($tglmulai)." - ".tgl_indo($tglselesai); ?></font> <br>
            <hr size="2px" color="black">
        </b></p>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                <thead class="bg-blue">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Nomor Antrian</th>
                                                    <th>Informasi</th>
                                                    <th>Tanggal</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM pendaftaran AS p
                                            LEFT JOIN pelanggan AS pl ON p.id_pelanggan = pl.id_pelanggan 
                                            WHERE p.status_pendaftaran = 'Menunggu Antrian' AND (tgl_pendaftaran BETWEEN '$tglmulai' AND '$tglselesai') ORDER BY tgl_pendaftaran ASC");
                                            while ($row = $data->fetch_array()) {
                                            ?>
                                                <tbody style="background-color: white">
                                                    <tr>
                                                    <td align="center"><?= $no++?></td>
                                                    <td align="center"><h1><?= $row['nomor_antrian'] ?></h1></td>
                                                        <td>
                                                            <ul>
                                                            <li>No Pol/Plat : <?= $row['no_pol'] ?></li>
                                                            <li>Merk : <?= $row['merk'] ?></li>
                                                            <li>Nama Pemilik : <?= $row['nama_pemilik'] ?></li>
                                                            <li>Ket : <?= $row['ket'] ?></li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                            <li>Tanggal Service : <?= $row['tgl_service'] ?></li>
                                                            <li>Tanggal Ambil : <?= $row['tgl_ambil'] ?></li>
                                                            </ul>
                                                        </td>
                                                        <td align="center"><?= $row['status_pendaftaran'] ?></td>
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
    Banjarmasin , <?php echo tgl_indo(date('Y-m-d')); ?><br>
    
    <br><br><br><br>
    Pimpinan
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