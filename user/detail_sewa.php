<?php
session_start();
if ($_SESSION['level'] != 'user') {
    header('location: ../index.php');
} else {
    require('../koneksi.php');
    include('../template/header.php');
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM sewa inner JOIN user ON sewa.id_user = user.id_user inner JOIN gedung on gedung.id_gedung = sewa.id_gedung WHERE id_sewa='$id'");
    $data = mysqli_fetch_array($query);
?>
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Sewa</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <tbody>
                                <tr>
                                    <th>ID Sewa</th>
                                    <td><?php echo $data['id_sewa'] ?></td>
                                </tr>
                                <tr>
                                    <th>Customer</th>
                                    <td><?php echo $data['nama'] ?></td>
                                </tr>
                                <tr>
                                    <th>Gedung</th>
                                    <td><?php echo $data['nama_gedung'] ?></td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp. <?php echo number_format($data['harga'], 0, '.', ',') ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Sewa</th>
                                    <td><?php echo $data['tgl_awal'] . ' s/d ' . $data['tgl_akhir'] ?></td>
                                </tr>
                                <tr>
                                    <th>Lama Sewa</th>
                                    <td><?php echo $data['durasi_sewa'] ?> hari</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>Rp. <?php echo number_format($data['total'], 0, '.', ',') ?></td>
                                </tr>
                                <?php
                                if ($data['status'] == 'pending') {
                                ?>
                                <?php } else { ?>
                                    <tr>
                                        <th>Bukti Bayar</th>
                                        <td><img src="../img/bukti/<?php echo $data['bukti_bayar'] ?>" alt="bukti" width="300px"></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <th>Status Pembayaran</th>
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
                                </tr>
                                <tr>
                                    <th>Tanggal Transaksi</th>
                                    <td><?php echo $data['tgl'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <?php
                        if ($data['status'] == 'pending') {
                        ?>
                            <a href="upload_bukti.php?id=<?php echo $data['id_sewa'] ?>" class="btn btn-success">Upload Bukti bayar</a>
                            <a href="batal.php?id=<?php echo $data['id_sewa'] ?>" class="btn btn-danger">Batalkan Pesanan</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->
        <!--Row-->
    </div>
    <!---Container Fluid-->
<?php include('../template/footer.php');
} ?>