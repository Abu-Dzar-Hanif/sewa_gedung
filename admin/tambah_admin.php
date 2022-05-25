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
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Admin</h6>
                    </div>
                    <div class="card-body">
                        <form action="insert_admin.php" method="post">
                            <div class="form-group">
                                <?php
                                $query = mysqli_query($koneksi, "SELECT MAX(id_admin) AS max_code FROM admin");
                                $data = mysqli_fetch_array($query);
                                $a = $data['max_code'];
                                $urut = (int)substr($a, 3, 3);
                                $urut++;
                                $id = "ADM" . sprintf("%03s", $urut);
                                ?>
                                <label for="id">ID</label>
                                <input type="txt" class="form-control" id="id" name="id" value="<?php echo $id ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="txt" class="form-control" id="nama" name="nama" placeholder="Enter nama">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="txt" class="form-control" id="username" name="username" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
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