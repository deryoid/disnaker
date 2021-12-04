<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';

      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php';  

?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Formulir Biodata Masyarakat</h1>
        </div>

        </div>
    </div>
    </div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card card-green">
                <div class="card-header">
                    <h3 class="card-title">Formulir Biodata Masyarakat</h3>
                </div>

            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="saveformulir">
                    <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NAMA</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_masyarakat" required="" value="<?= $data['nama_masyarakat'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nik" required="" value="<?= $data['nik'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">EMAIL</label>
                        <div class="col-sm-8">
                        <input type="email" class="form-control" name="email" required="" value="<?= $data['email'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">JK</label>
                        <div class="col-sm-8">
                            <select class="form-control select2" data-placeholder="Pilih Jenis Kelamin" id="jk" name="jk" required="">
                                    <option value=""></option>
                                    <option value="Laki - Laki" <?php if ($data['jk'] == "Laki - Laki") {
                                                              echo "selected";
                                                            } ?>>Laki - Laki</option>
                                    <option value="Perempuan" <?php if ($data['jk'] == "Perempuan") {
                                                                echo "selected";
                                                              } ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ALAMAT</label>
                        <div class="col-sm-8">
                        <textarea type="text" class="form-control" name="alamat" required="" ><?= $data['alamat'] ?></textarea>
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">PEKERJAAN</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" name="pekerjaan" required="" value="<?= $data['pekerjaan'] ?>">
                        </div>
                    </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">TELP/WA</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" name="no_wa" required="" value="<?= $data['no_wa'] ?>">
                        </div>
                    </div>


                 </div>

                    <div class="card-footer">
                        <button name="submit" class="btn btn-success" ><i class="fa fa-save mr-2"></i>Tambah Informasi</button>
                        <!-- onclick="return saveformulir();" -->
                        <a href="../biodata/" class="btn btn-default"><i class="fa fa-arrow-circle-left mr-2"></i>Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</section>
</div>

<?php 
    include '../../templates/footer.php'; 
    include '../../templates/script.php'; 

?>



<?php 
    if (isset($_POST['submit'])) {
        $nama_masyarakat            = $_POST['nama_masyarakat'];
        $nik           = $_POST['nik'];
        $email             = $_POST['email'];
        $jk           = $_POST['jk'];
        $alamat           = $_POST['alamat'];
        $pekerjaan          = $_POST['pekerjaan'];
        $no_wa          = $_POST['no_wa'];
    

    $submit = $koneksi->query("UPDATE masyarakat SET 
                            nama_masyarakat = '$nama_masyarakat',
                            nik = '$nik',
                            email = '$email',
                            jk = '$jk',
                            alamat = '$alamat',
                            pekerjaan = '$pekerjaan', 
                            no_wa = '$no_wa'
                            WHERE id_masyarakat = '$data[id_masyarakat]'");



    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Diubah";
        echo "<script>window.location.replace('../biodata/');</script>";
    }
}
?>



