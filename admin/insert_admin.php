<?php
require('../koneksi.php');
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $lvl = 'admin';
    $query = mysqli_query($koneksi, "INSERT INTO admin(id_admin,nama,username,password,level) VALUES('$id','$nama','$username','$pass','$lvl')");
    if ($query) {
        header('location: data_admin.php');
    } else {
        echo "terjadi kesalahan";
    }
} else {
    echo "403 akses ilegal";
}
