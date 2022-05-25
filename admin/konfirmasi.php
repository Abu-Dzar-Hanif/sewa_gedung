<?php
require('../koneksi.php');
$id = $_GET['id'];
$query = mysqli_query($koneksi, "UPDATE sewa SET status='dibayar' WHERE id_sewa = '$id'");
if ($query) {
    echo "<script>alert('Transaksi dikonfirmasi');window.location='data_transaksi.php'</script>";
}
