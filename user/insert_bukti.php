<?php
require('../koneksi.php');
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $type =  array('png', 'jpg', 'jpeg');
    $foto = $_FILES['bukti']['name'];
    $x = explode('.', $foto);
    $typ = strtolower(end($x));
    $size = $_FILES['bukti']['size'];
    $file_tmp = $_FILES['bukti']['tmp_name'];
    $sts = 'konfirmasi';
    if (in_array($typ, $type) === true) {
        if ($size <= 5000000) {
            move_uploaded_file($file_tmp, '../img/bukti/' . $foto);
            $query = mysqli_query($koneksi, "UPDATE sewa SET status='$sts',bukti_bayar='$foto' WHERE id_sewa='$id'");
            if ($query) {
                echo "<script>alert('Upload berhasil , admin akan mengkonfirmasi bukti bayar anad');window.location='riwayat_sewa.php'</script>";
            }
        }
    }
}
