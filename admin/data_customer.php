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
            <h1 class="h3 mb-0 text-gray-800">Data Customer</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Customer</li>
            </ol>
        </div>
        <!-- Row -->
        <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Customer</h6>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Telpon</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Telpon</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id_user DESC");
                                $no = 1;
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td><?php echo $data['notelp'] ?></td>
                                        <td><?php echo $data['username'] ?></td>
                                        <td><?php echo $data['password'] ?></td>
                                        <td><?php echo $data['level'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!---Container Fluid-->
    <?php include('../template/footer.php');
} ?>