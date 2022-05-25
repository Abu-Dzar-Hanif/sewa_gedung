<?php
session_start();
if ($_SESSION['level'] != 'admin') {
    header('location: ../index.php');
} else {
    require('../koneksi.php');
    include('../template/header.php');
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '$id'");
    $data = mysqli_fetch_array($query);
?>
    <div class="container-fluid" id="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Admin <?php echo $data['id_admin'] ?></h6>
                    </div>
                    <div class="card-body">
                        <form action="update_admin.php?id=<?php echo $data['id_admin'] ?>" method="post">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="txt" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'] ?>" placeholder="Enter nama">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="txt" class="form-control" id="username" name="username" value="<?php echo $data['username'] ?>" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo $data['password'] ?>" placeholder="Enter password">
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