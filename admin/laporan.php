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
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Laporan Transaksi Periode <?php echo $_POST['tgl1'] . ' s/d ' . $_POST['tgl2'] ?>
                        </h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID Sewa</th>
                                    <th>Customer</th>
                                    <th>Gedung</th>
                                    <th>Harga</th>
                                    <th>Periode</th>
                                    <th>Sewa</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $tgl1 = date('Y-m-d', strtotime($_POST['tgl1']));
                                $tgl2 = date('Y-m-d', strtotime($_POST['tgl2']));
                                $query = mysqli_query($koneksi, "SELECT * FROM sewa inner JOIN user ON sewa.id_user = user.id_user inner JOIN gedung on gedung.id_gedung = sewa.id_gedung WHERE status = 'dibayar' AND tgl BETWEEN '$tgl1' AND '$tgl2'");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $data['id_sewa'] ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td><?php echo $data['nama_gedung'] ?></td>
                                        <td><?php echo number_format($data['harga'], 0, '.', ',') ?></td>
                                        <td><?php echo $data['tgl_awal'] . ' s/d ' . $data['tgl_akhir'] ?></td>
                                        <td><?php echo $data['durasi_sewa'] . ' hari' ?></td>
                                        <td><?php echo number_format($data['total'], 0, '.', ',') ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <?php
                                    $qsum = mysqli_query($koneksi, "SELECT SUM(total) as ttl FROM sewa");
                                    $sum = mysqli_fetch_array($qsum);
                                    ?>
                                    <th colspan="6" class="text-center">
                                        Total pendapatan
                                    </th>
                                    <th><?php echo number_format($sum['ttl'], 0, '.', ','); ?></th>
                                </tr>
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
<?php include('../template/footer.php');
} ?>