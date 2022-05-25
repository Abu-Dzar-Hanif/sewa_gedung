<?php
require('koneksi.php');
include('header.php');
?>
<!-- Container Fluid-->
<div class="container-fluid mt-50" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Katalog Gedung</h1>
    </div>

    <div class="row mb-3">
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM gedung ORDER BY id_gedung DESC");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card">
                    <img src="img/<?php echo $data['foto'] ?>" class="card-img-top" alt="img">
                    <div class="card-body">
                        <div class="h5 font-weight-bold text-uppercase mb-1"><?php echo $data['nama_gedung'] ?></div>
                        <div class="mb-0 font-weight-bold text-gray-800">Rp. <?php echo number_format($data['harga'], 0, '.', ',') ?></div>
                        <a href="login.php" class="btn btn-primary">Pesan sekarang</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!--Row-->

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!---Container Fluid-->
<?php include('footer.php'); ?>