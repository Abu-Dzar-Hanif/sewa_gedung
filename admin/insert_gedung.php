<?php
require('../koneksi.php');
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $type =  array('png', 'jpg', 'jpeg');
    $foto = $_FILES['foto']['name'];
    $x = explode('.', $foto);
    $typ = strtolower(end($x));
    $size = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    $sts = 'free';
    if (in_array($typ, $type) === true) {
        if ($size <= 5000000) {
            move_uploaded_file($file_tmp, '../img/' . $foto);
            $query = mysqli_query($koneksi, "INSERT INTO gedung(id_gedung,nama_gedung,harga,foto,sts) VALUES('$id','$nama','$harga','$foto','$sts')");
            if ($query) {
                header('location: data_gedung.php');
            } else {
                echo "terjadi kesalahan";
            }
        } else {
            echo "ukuran foto terlalu besar";
        }
    } else {
        echo "type foto tidak valid";
    }
} else {
    echo "403 akses ilegal";
}
