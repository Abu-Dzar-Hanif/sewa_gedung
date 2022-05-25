<?php
date_default_timezone_set('asia/jakarta');
session_start();
require('../koneksi.php');
if (isset($_POST['submit'])) {
    $query_code = mysqli_query($koneksi, "SELECT MAX(id_sewa) AS max_code FROM sewa");
    $data = mysqli_fetch_array($query_code);
    $a = $data['max_code'];
    $urut = (int)substr($a, 6, 3);
    $urut++;
    $huruf = date('dmy');
    $id_sewa = $huruf . sprintf("%03s", $urut);
    $id_gedung = $_POST['id'];
    $tgl1 = $_POST['tgls1'];
    $tgl2 = $_POST['tgls2'];
    $lama = $_POST['lama'];
    $total = $_POST['total'];
    $sts = 'pending';
    $tgl_buat = date('Y-m-d');
    $id_usr = $_SESSION['id'];
    $query = mysqli_query($koneksi, "INSERT INTO sewa(id_sewa,id_gedung,tgl_awal,tgl_akhir,durasi_sewa,total,status,id_user,tgl) VALUES('$id_sewa','$id_gedung','$tgl1','$tgl2','$lama','$total','$sts','$id_usr','$tgl_buat')");
    if ($query) {
        $sts_g = 'booking';
        $q_up = mysqli_query($koneksi, "UPDATE gedung SET sts='$sts_g' WHERE id_gedung='$id_gedung'");
        if ($q_up) {
            echo "<script>alert('Pesanan berhasil dibuat');window.location='riwayat_sewa.php'</script>";
        }
    }
}

echo "asabsb";
