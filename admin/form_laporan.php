<?php
session_start();
if ($_SESSION['level'] != 'admin') {
    header('location: ../index.php');
} else {
    require('../koneksi.php');
    include('../template/header.php');
?>
    <div class="container-fluid" id="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pilih tanggal Laporan</h6>
                    </div>
                    <div class="card-body">
                        <form action="laporan.php" method="post">
                            <div class="form-group" id="simple-date4">
                                <div class="input-daterange input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Dari Tanggal</span>
                                    </div>
                                    <input type="text" class="input-sm form-control" name="tgl1" readonly>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Sampai Tanggal</span>
                                    </div>
                                    <input type="text" class="input-sm form-control" name="tgl2" readonly>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('../template/footer.php');
} ?>