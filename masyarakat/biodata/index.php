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
            <h1 class="m-0 text-dark">Biodata Masyarakat</h1>
        </div>

        </div>
    </div>
    </div>

<section class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
               <?php if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') { ?>
                <div class="alert alert-success success-alert" role="alert">
                     <i class="fa fa-check"> <?= $_SESSION['pesan']; ?></i>
                  </div>
                <?php } $_SESSION['pesan'] = ''; ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title float-right">
                <!-- <a href="ubahpw" class="btn btn-info"><i class="fa fa-key mr-1"></i>Ubah Password</a> -->
                <a href="edit" class="btn btn-success"><i class="fa fa-edit mr-1"></i>Update Biodata Masyarakat</a>
                <!-- <a href="print?id=<?= $data['id_mhs'];?>" class="btn btn-primary" target="blank"><i class="fa fa-print mr-1"></i>Print Biodata</a> -->
            </h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
          <!-- ./col -->
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-user"></i>
                  Biodata Masyarakat
                </h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <dl class="row">
                  <dt class="col-sm-4">NAMA </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data['nama_masyarakat']; ?></dd>
                  <dt class="col-sm-4">NIK </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data['nik']; ?></dd>
                  <dt class="col-sm-4">JENIS KELAMIN </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data['jk']; ?></dd>
                  <dt class="col-sm-4">EMAIL </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data['email']; ?></dd>
                  <dt class="col-sm-4">ALAMAT </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data['alamat']; ?></dd>
                  <dt class="col-sm-4">PEKERJAAN </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data['pekerjaan']; ?></dd>
                  <dt class="col-sm-4">TELP/WA </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data['no_wa']; ?></dd>
                  <dt class="col-sm-4">STATUS PELANGGAN </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data['status']; ?></dd>
                  
                </dl>
              </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <!-- <div class="col-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-image"></i>
                  Foto
                </h3>
              </div> 

              <div class="card-body">
                
                  <img style="text-align: center;" width="250px" height="300px" src="<?= base_url() ?>/fotomhs/<?= $data['foto']?>">
                
              </div> 

            </div>
          </div> -->
          <!-- ./col-->

          </div>
        </div>
    </div>


    </div>
    </div>
</div>
</section>

</div>

<?php 
    include '../../templates/footer.php'; 
    include_once '../../templates/script.php'; 
?>