<?php 
$host = "localhost";
$user = "root";
$password = "root";
$name = "pkl_disnaker";

$koneksi = mysqli_connect($host, $user, $password, $name);

if (!$koneksi) {
   die("Gagal Terkoneksi".mysqli_connect_errno()." - ".mysqli_connect_error());
   exit();
 }
?>