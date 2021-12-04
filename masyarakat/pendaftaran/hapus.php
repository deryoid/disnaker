<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM pendaftaran WHERE id_pendaftaran = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "Pendaftaran Berhasil dihapus";
   echo "<script>window.location.replace('../pendaftaran/');</script>";
}
