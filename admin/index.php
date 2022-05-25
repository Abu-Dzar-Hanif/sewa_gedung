<?php
session_start();
if ($_SESSION['level'] != 'admin') {
    header('location: ../index.php');
} else {
    require('../koneksi.php');
    include('../template/header.php');
?>
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="row mb-3">
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <?php
                                $query = mysqli_query($koneksi, "SELECT COUNT(status) AS sts FROM sewa WHERE status='konfirmasi'");
                                $dat = mysqli_fetch_array($query);
                                ?>
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Konfrimasi Transaksi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dat['sts'] ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->

    </div>
    <!---Container Fluid-->
<?php include('../template/footer.php');
} ?>