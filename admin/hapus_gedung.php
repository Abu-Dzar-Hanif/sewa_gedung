<?php
require('../koneksi.php');
$id = $_GET['id'];
$query_un = mysqli_query($koneksi, "SELECT * FROM gedung WHERE id_gedung = '$id'");
$data_ = mysqli_fetch_array($query_un);
unlink('../img/' . $data_['foto']);
$query = mysqli_query($koneksi, "DELETE FROM gedung WHERE id_gedung = '$id'");
if ($query) {
    header('location: data_gedung.php');
}
