<?php 
 
require '../../config/config.php';
require '../../config/koneksi.php';


   $id    = $_GET['id'];
   $hapus = $koneksi->query("DELETE FROM desa WHERE id_desa = '$id'");

   session_start();
   if ($hapus) {
  		$_SESSION['pesan'] = "Data Berhasil Dihapus";
        echo "<script>window.location.replace('../desa/');</script>";
    }
   
 ?>