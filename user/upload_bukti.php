<?php
session_start();
if ($_SESSION['level'] != 'user') {
    header('location: ../index.php');
} else {
    require('../koneksi.php');
    include('../template/header.php');
    $id = $_GET['id'];
?>
    <div class="container-fluid" id="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Upload Bukti Bayar</h6>
                    </div>
                    <div class="card-body">
                        <form action="insert_bukti.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="bukti">Bukti Bayar</label>
                                <input type="file" class="form-control" name="bukti" id="bukti" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('../template/footer.php');
} ?>