<?php
require '../../config/config.php';
include '../../config/koneksi.php';
    $id = $_GET['id'];
    $datamasy = $koneksi->query("SELECT * FROM masyarakat 
    WHERE id_masyarakat = '$id'")->fetch_array();

?>
<script type="text/javascript">
window.print();
</script>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FORMULIR PENGAJUAN PENDAFTARAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="#">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" /> -->

    <style>
        .kop {
            text-align: center;
        }
    </style>
</head>

<body>
<img src="<?=base_url('assets/dist/img/logo.png')?>" align="left" width="90" height="100">
  <p align="center"><b>
    <font size="5">PEMERINTAH KABUPATEN TAPIN  </font> <br> 
    <font size="5">DINAS TENAGA KERJA</font><br><br><br>   
    <hr size="2px" color="black">
    <center><font size="2">Alamat :  Jl.Gubernur H.Aberani Sulaiman No.129</font></center>
    <hr size="2px" color="black">
  </b></p>

    <p style="text-align: center; margin-top: 2%;">
        <label>
            <b style="font-size: 28;"><u>FORMULIR BIODATA MASYARAKAT</u></b> <br>
            <!-- <b style="font-size: 12;">Nomor</b> : <?= $row['nomor_sktu']; ?> -->
            <br>
            <br>
        </label>
        <table border="0" width="60%"  cellpadding=" 1">
        <p style="text-align: justify; font-size: 15; ">Biodata Pencari Kerja Tahun <?php echo date('Y')?> :</p>
        </table>
        <div align="center">
        <table border="0" width="80%" style="text-align: left; font-size: 15; " cellpadding=" 1">
            
            <tr style="vertical-align: top;">
                <th width="8%">Nama </th>
                <td>:</td>
                <td><b><?= strtoupper($datamasy['nama_masyarakat'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th width="8%">NIK</th>
                <td>:</td>
                <td><b><?= strtoupper($datamasy['nik'])?></b></td>
            </tr>
            
            <tr style="vertical-align: top;">
                <th>Email</th>
                <td>:</td>
                <td><b><?= strtoupper($datamasy['email'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th>Jenis Kelamin</th>
                <td>:</td>
                <td><b><?= strtoupper($datamasy['jk'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th>Pekerjaan</th>
                <td>:</td>
                <td><b><?= strtoupper($datamasy['pekerjaan'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th>Alamat</th>
                <td>:</td>
                <td><b><?= strtoupper($datamasy['alamat'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th width="20%">Telp/No. Whatsapp</th>
                <td>:</td>
                <td><b><?= strtoupper($datamasy['no_wa'])?></b></td>
            </tr>
        </table>
        <br>
        
        </div>
        <br>
        <table border="0" width="60%"  cellpadding=" 1">
        <p style="text-align: justify; font-size: 15; ">Dengan Ini menyatakan bahwa data yang dibuat dengan benar.</p>
        </table>
       

<br>
<div style="text-align: center; display: inline-block; float: right;">
  <h5>
    Tapin , <?php echo tgl_indo(date('Y-m-d')); ?><br>
    
    <br><br><br><br>
    <u><?= $datamasy['nama_masyarakat']?></u>
  </h5>

</div> 


</body>

</html>

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