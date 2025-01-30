<?php

require_once "../config.php";

$title = "tambah user - Mts Al-Muhajirin";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}else {
    $msg = '.';
}

$alert = '';
if ($msg == 'cancel'){
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i> Tambah User Gagal, Username Sudah ada...
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'notimage'){
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i> Tambah User Gagal, File yang anda upload bukan gambar
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg == 'oversize'){
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i> Tambah User Gagal, ukuran melebihi 1 MB
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if ($msg ==  'added'){
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Tambah User Berhasil, Segera ganti password anda
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"> <a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Tambah User</li>

                        </ol>
                       <form action="proses-user.php" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Benar ingin menambahkan user?')">

                        <?php   
                        
                            if ($msg !== '') {
                                echo $alert;
                            }
                        
                        ?>
                        <div class="card">
  <div class="card-header">
    <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah User</span>
    <button type="reset" name="reset" class="btn btn-danger float-end"><i class="fa-solid fa-square-xmark"></i>  Reset</button>
    <button type="submit" name="submit" class="btn btn-primary float-end me-1"><i class="fa-solid fa-floppy-disk"></i>  Simpan</button> 


  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-8">
        <div class="mb-3 row">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <label for="" class="col-sm-1 col-form-label">:</label>
    <div class="col-sm-9"  style="margin-left: -50px;">
      <input type="text" pattern="{A-Za-z0-9}{5,}" title="minimal 5 kombinasi huruf besar huruf kecil dan angka" class="form-control border-0 border-bottom" id="username" name="username" maxlength="30" required>
    </div>  
  </div>

  <div class="mb-3 row">
    <label for="username" class="col-sm-2 col-form-label">Nama</label>
    <label for="" class="col-sm-1 col-form-label">:</label>
    <div class="col-sm-9"  style="margin-left: -50px;">
      <input type="text" class="form-control border-0 border-bottom" id="nama" name="nama" maxlength="30">
    </div>  
  </div>

  <div class="mb-3 row">
    <label for="username" class="col-sm-2 col-form-label">Jabatan</label>
    <label for="" class="col-sm-1 col-form-label">:</label>
    <div class="col-sm-9"  style="margin-left: -50px;">
      <select name="jabatan" id="jabatan" class="form-select border-0 border-bottom">
        <option value="" selected>--Pilih Jabatan--</option>
        <option value="kepsek" >Kepsek</option>
        <option value="Staf Tu" >Staf Tu</option>
        <option value="Guru Mapel">Guru Mapel</option>




      </select>
    </div>  
  </div> 
  </div>
        <div class="col-4 text-center px-5">
        <img src="../asset/image/default.png" alt="gambar user" class="mb-3" width="40%" >
        <input type="file" class="form-control form-control-sm" name="image">
        <small class="text-secondary" >Pilih Foto PNG , JPG / JPEG<br> Dengan Ukuran Max 1 MB</small>


    </div>
  </div>
</div>

</form>
                      </div>
                    </main>

                    

<?php  


    require_once "../template/footer.php";


?> 