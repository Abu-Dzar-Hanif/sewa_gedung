<?php
session_start();
if ($_SESSION['level'] != 'user') {
    header('location: ../index.php');
} else {
    require('../koneksi.php');
    include('../template/header.php');
?>
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Katalog</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Katalog</li>
            </ol>
        </div>
        <div class="row mb-3">
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM gedung WHERE sts='free' ORDER BY id_gedung DESC");
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card">
                        <img src="../img/<?php echo $data['foto'] ?>" class="card-img-top" alt="img">
                        <div class="card-body">
                            <div class="h5 font-weight-bold text-uppercase mb-1"><?php echo $data['nama_gedung'] ?></div>
                            <div class="mb-0 font-weight-bold text-gray-800">Rp. <?php echo number_format($data['harga'], 0, '.', ',') ?></div>
                            <a href="pilih_tgl.php?id=<?php echo $data['id_gedung'] ?>" class="btn btn-primary">Pesan sekarang</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!--Row-->
    </div>
    <!---Container Fluid-->
<?php include('../template/footer.php');
} ?>