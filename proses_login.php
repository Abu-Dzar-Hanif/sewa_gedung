<?php
require('koneksi.php');
if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user' and password = '$pass'"));
    $cek_adm = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$user' and password = '$pass'"));
    if ($cek == 1) {
        $data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user' and password = '$pass'"));
        session_start();
        $_SESSION['id'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['level'] = $data['level'];
        echo "<script>alert('Login berhasil');window.location='user/'</script>";
    } else if ($cek_adm == 1) {
        $data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$user' and password = '$pass'"));
        session_start();
        $_SESSION['id'] = $data['id_admin'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['level'] = $data['level'];
        echo "<script>alert('Login berhasil');window.location='admin/'</script>";
    } else {
        echo "<script>alert('Login gagal');window.location='login.php'</script>";
    }
}
