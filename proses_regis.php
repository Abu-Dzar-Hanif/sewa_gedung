<?php
require('koneksi.php');
if (isset($_POST['regis'])) {
    $query_code = mysqli_query($koneksi, "SELECT MAX(id_user) AS max_code FROM user");
    $data = mysqli_fetch_array($query_code);
    $a = $data['max_code'];
    $urut = (int)substr($a, 3, 3);
    $urut++;
    $id = "USR" . sprintf("%03s", $urut);
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $lvl = 'user';
    $query = mysqli_query($koneksi, "INSERT INTO user(id_user,nama,notelp,username,password,level) VALUES('$id','$nama','$telp','$username','$pass','$lvl')");
    if ($query) {
        header('location: login.php');
    } else {
        echo "terjadi kesalahan | silahakn <a href=register.php>register</a> lagi";
    }
}
