<?php 

require_once "../config.php";


//jika tombol simpan di tekan
if (isset($_POST['submit'])){
    // ambil file di element yang di posting
    $username = trim(htmlspecialchars($_POST['username']));
    $nama     = trim(htmlspecialchars($_POST['nama']));
    $jabatan  = $_POST['jabatan'];
    $gambar   = trim(htmlspecialchars($_FILES['image']['name']));
    $password = 1234;
    $pass     = password_hash($password, PASSWORD_DEFAULT);


    //cek username
    $cekUsername = mysqli_query($koneksi, "SELECT * FROM  tbl_user WHERE username = '$username'");
    if (mysqli_num_rows($cekUsername) > 0 ){
        header("location:add-user.php?msg=cancel");
        return;
    }




//upload gambar
if ($gambar != null) {
    $url = 'add-user.php';
    $gambar = uploadimg($url);
}else {
     $gambar = 'default.png';
}

mysqli_query($koneksi, "INSERT INTO tbl_user VALUES(null,'$username','$pass','$nama','','$jabatan','$gambar') ");

header("location:add-user.php?msg=added");
return;

}  