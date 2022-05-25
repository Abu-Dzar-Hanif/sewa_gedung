<?php
require('../koneksi.php');
if (isset($_POST['edit'])) {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $type =  array('png', 'jpg', 'jpeg');
    $foto = $_FILES['foto']['name'];
    $x = explode('.', $foto);
    $typ = strtolower(end($x));
    $size = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    if ($foto <> '') {
        if (in_array($typ, $type) === true) {
            if ($size <= 5000000) {
                $query_un = mysqli_query($koneksi, "SELECT * FROM gedung WHERE id_gedung = '$id'");
                $data_ = mysqli_fetch_array($query_un);
                unlink('../img/' . $data_['foto']);
                move_uploaded_file($file_tmp, '../img/' . $foto);
                $query = mysqli_query($koneksi, "UPDATE gedung SET nama_gedung='$nama',harga='$harga',foto='$foto' WHERE id_gedung='$id'");
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
        $query = mysqli_query($koneksi, "UPDATE gedung SET nama_gedung='$nama',harga='$harga' WHERE id_gedung='$id'");
        if ($query) {
            header('location: data_gedung.php');
        } else {
            echo "terjadi kesalahan";
        }
    }
} else {
    echo "403 akses ilegal";
}
