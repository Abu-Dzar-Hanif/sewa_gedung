<?php
require('../koneksi.php');
if (isset($_POST['edit'])) {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $query = mysqli_query($koneksi, "UPDATE admin SET nama='$nama',username='$username',password='$pass' WHERE id_admin='$id'");
    if ($query) {
        header('location: data_admin.php');
    } else {
        echo "terjadi kesalahan";
    }
} else {
    echo "403 akses ilegal";
}
