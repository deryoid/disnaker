<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM pencarian_kerja WHERE id_pencarian_kerja = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "pencarian_kerja Berhasil dihapus";
   echo "<script>window.location.replace('../pencariakerja/');</script>";
}
