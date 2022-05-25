<?php
require('../koneksi.php');
$id = $_GET['id'];
$get_gedung = mysqli_query($koneksi, "SELECT id_gedung FROM sewa WHERE id_sewa = '$id'");
$dat = mysqli_fetch_array($get_gedung);
$id_gedung = $dat['id_gedung'];
$del = mysqli_query($koneksi, "DELETE FROM sewa WHERE id_sewa = '$id'");
if ($del) {
    $qup = mysqli_query($koneksi, "UPDATE gedung SET sts='free' WHERE id_gedung='$id_gedung'");
    if ($qup) {
        echo "<script>alert('Transaksi Dibatalkan');window.location='katalog_produk.php'</script>";
    }
}
