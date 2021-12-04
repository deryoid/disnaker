<?php
require '../../config/config.php';
include '../../config/koneksi.php';
    $id = $_GET['id'];
    $datamhs = $koneksi->query("SELECT * FROM mahasiswa AS m 
    LEFT JOIN prodi AS p ON m.id_prodi = p.id_prodi
    WHERE m.id_mhs = '$id'")->fetch_array();

?>
<script type="text/javascript">
window.print();
</script>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FORMULIR PPL</title>
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
<img src="<?=base_url('assets/dist/img/favicon1.png')?>" align="left" width="90" height="90">
  <p align="center"><b>
    <font size="5">UNIT TEKNOLOGI INFORMASI DAN PANGKALAN DATA</font> <br> 
    <font size="5">UNIVERSITAS ISLAM NEGERI ANTASARI</font><br>
    <font size="5">BANJARMASIN</font> <br>
    <hr size="2px" color="black">
    <center><font size="2">Alamat : KAMPUS UIN ANTASARI Jl. Ahmad Yani Km. 4,5 Banjarmasin, Kalimantan Selatan, Indonesia, Kode Pos 70235. Telephone : (0511) 3252829</font></center>
    <hr size="2px" color="black">
  </b></p>

    <p style="text-align: center; margin-top: 2%;">
        <label>
            <b style="font-size: 28;"><u>BIODATA MAHASISWA</u></b> <br>
            <!-- <b style="font-size: 12;">Nomor</b> : <?= $row['nomor_sktu']; ?> -->
            <br>
            <br>
        </label>
        <table border="0" width="60%"  cellpadding=" 1">
        <p style="text-align: justify; font-size: 15; ">Biodata Mahasiswa Tahun <?php echo date('Y')?> :</p>
        </table>
        <div align="center">
        <table border="0" width="80%" style="text-align: left; font-size: 15; " cellpadding=" 1">
            <th rowspan="11">
            
            <img style="text-align: center;" border="5" align="middle" width="150px" height="210px" src="<?= base_url() ?>/fotomhs/<?= $datamhs['foto']?>">
            
            </th>
            <th rowspan="11">
            </th>
            <th rowspan="11">
            </th>
            <th rowspan="11">
            </th>
            <tr style="vertical-align: top;">
                <th width="8%">NPM</th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['npm'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th width="8%">Nama Mahasiswa</th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['nama'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th width="8%">Jenis Kelamin</th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['jk'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th width="8%">TTL</th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['tmp_lhr']." / ".tgl_indo($datamhs['tgl_lhr']))?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th>Prodi</th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['prodi'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th>Agama</th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['agama'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th>Alamat</th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['alamat'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th width="20%">Telp/No. Whatsapp</th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['telp'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th width="20%">Angkatan</th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['angkatan'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th width="20%">Status Kuliah</th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['status_kul'])?></b></td>
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
    Banjarmasin , <?php echo tgl_indo(date('Y-m-d')); ?><br>
    
    <br><br><br><br>
    <u><?= $datamhs['nama']?></u> <br>
    <?= $datamhs['npm'] ?>
  </h5>

</div> 


</body>

</html>