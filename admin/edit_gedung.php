<?php
session_start();
if ($_SESSION['level'] != 'admin') {
    header('location: ../index.php');
} else {
    require('../koneksi.php');
    include('../template/header.php');
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM gedung WHERE id_gedung = '$id'");
    $data = mysqli_fetch_array($query);
?>
    <div class="container-fluid" id="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Gedung <?php echo $data['id_gedung'] ?></h6>
                    </div>
                    <div class="card-body">
                        <form action="update_gedung.php?id=<?php echo $data['id_gedung'] ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="txt" class="form-control" id="nama" name="nama" value="<?php echo $data['nama_gedung'] ?>" placeholder="Enter nama">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $data['harga'] ?>" placeholder="Enter harga">
                            </div>
                            <div class="form-group">
                                <label for="foto">
                                    <img src="../img/<?php echo $data['foto'] ?>" alt="img" width="100px">
                                </label>
                                <input type="file" class="form-control" name="foto" id="foto" required>
                            </div>
                            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('../template/footer.php');
} ?>