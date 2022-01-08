<?php
require_once '../../config/config.php';
include '../../config/koneksi.php';
$id   = isset($_GET['id']) ? $_GET['id'] : header("location: /", true, 301);
$data = $koneksi->query("SELECT * FROM pendaftaran AS p
LEFT JOIN masyarakat AS pl ON p.id_masyarakat = pl.id_masyarakat 
WHERE p.id_pendaftaran = '$id'")->fetch_array();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Pencari Kerja</title>

    <style>
        @page {
            size: 86mm 50mm;
            margin: 0.5mm 0.5mm 0.5mm 0.5mm;
            
        }

        .kop {
            justify-content: space-between;
            font-size: 11px;
            line-height: 11px;
            font-weight: bold;
            text-align: center;
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .alamat {
            font-size: 6px;
            /* text-decoration: underline; */
            font-style: italic;
            justify-content: center;
            line-height: 10px;
            text-align: center;
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-top: -4px;
        }

        .gambar-kab {
            width: 23px;
            height: 30px;
        }

        .gambar-puskes {
            width: 25px;
            height: 30px;
        }

        .judul {
            text-align: center;
            font-size: 9px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 3px;
        }

        .kotak {
            font-size: 5px;
            width: 100%;
            height: 100%;
            border: 1px solid black;
        }

        table {
            height: 70px;
            font-size: 8px;
        }

        th {
            text-align: left;
            width: 78px;
        }

        .titik-tabel {
            width: 3px;
            text-align: center;
        }

        .foot-tabel {
            text-align: center;
            font-size: 7px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 3px;
        }

        .notif-bawah {
            font-style: italic;
            font-size: 6px;
            margin-bottom: 2px;
        }

    </style>
</head>

<body>

  
    <img src="<?=base_url('assets/dist/img/logo.png')?>" align="left" width="30" height="30">
    <div style="text-align:center;">    
    PEMERINTAH KABUPATEN TAPIN <br> DINAS TENAGA KERJA
    </div>
    <div class="alamat">
    Alamat :  Jl.Gubernur H.Aberani Sulaiman No.129
    </div>

    <hr size="1.5" style="margin-top: -1.5px; margin-bottom: 5px; color: black; font-weight: bold;">

    <div class="judul">
        KARTU PENCARI KERJA
    </div>

    <div class="kotak">
        <table width="100%" border="0">
            <tr>
                <th>No Daftar</th>
                <td class="titik-tabel">:</td>
                <td><?= $data['id_pendaftaran'] ?></td>
            </tr>
            <tr>
                <th>NIK</th>
                <td class="titik-tabel">:</td>
                <td><?= $data['nik'] ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td class="titik-tabel">:</td>
                <td><?= $data['nama_masyarakat'] ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td class="titik-tabel">:</td>
                <td><?= $data['jk']; ?></td>
            </tr>
            <tr valign="top">
                <th>Alamat</th>
                <td class="titik-tabel">:</td>
                <td><?= $data['alamat'] ?></td>
            </tr>
        </table>

        <div class="foot-tabel">
            TERIMAKASIH ATAS KEPERCAYAAN ANDA
        </div>

        <div class="notif-bawah">
            *Setiap kali berobat kartu ini harus dibawa
        </div>
    </div>


    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>