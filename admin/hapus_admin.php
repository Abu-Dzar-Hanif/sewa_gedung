<?php
require('../koneksi.php');
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = '$id'");
if ($query) {
    header('location: data_admin.php');
}
