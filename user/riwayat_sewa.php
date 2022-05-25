<?php
session_start();
if ($_SESSION['level'] != 'user') {
    header('location: ../index.php');
} else {
    require('../koneksi.php');
    include('../template/header.php');
    $idusr = $_SESSION['id'];
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

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Sewa</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID Sewa</th>
                                    <th>Customer</th>
                                    <th>Gedung</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM sewa inner JOIN user ON sewa.id_user = user.id_user inner JOIN gedung on gedung.id_gedung = sewa.id_gedung WHERE sewa.id_user='$idusr'");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $data['id_sewa'] ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td><?php echo $data['nama_gedung'] ?></td>
                                        <td>
                                            <?php
                                            if ($data['status'] == 'pending') {
                                            ?>
                                                <span class="badge badge-danger"><?php echo $data['status'] ?></span>
                                            <?php
                                            } elseif ($data['status'] == 'konfirmasi') {
                                            ?>
                                                <span class="badge badge-warning"><?php echo $data['status'] ?></span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="badge badge-success"><?php echo $data['status'] ?></span>
                                            <?php } ?>
                                        </td>
                                        <td><a href="detail_sewa.php?id=<?php echo $data['id_sewa'] ?>" class="btn btn-sm btn-primary">Detail</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        <!--Row-->
        <!--Row-->
    </div>
    <!---Container Fluid-->
<?php include('../template/footer.php');
} ?>