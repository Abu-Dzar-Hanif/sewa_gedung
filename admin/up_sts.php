<?php 
require('../koneksi.php');
$id = $_GET['id'];
$query = mysqli_query($koneksi,"UPDATE gedung SET sts='free' WHERE id_gedung='$id'");
if($query){
    header('location: data_gedung.php');
}
