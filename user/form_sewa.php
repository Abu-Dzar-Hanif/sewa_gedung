<?php
session_start();
if ($_SESSION['level'] != 'user') {
    header('location: ../index.php');
} else {
    require('../koneksi.php');
    include('../template/header.php');
    $tgla = date('Y-m-d', strtotime($_POST['tgl1']));
    $tglb = date('Y-m-d', strtotime($_POST['tgl2']));
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM gedung WHERE id_gedung = '$id'");
    $data = mysqli_fetch_array($query);
    $tgl1 = new DateTime($tgla);
    $tgl2 = new DateTime($tglb);
    $d = $tgl2->diff($tgl1)->days + 1;
?>
    <div class="container-fluid" id="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Sewa Gedung <?php echo $data['id_gedung'] ?></h6>
                    </div>
                    <div class="card-body">
                        <form action="insert_sewa.php" method="post">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <select name="id" id="id" class="form-control">
                                    <option value="<?php echo $data['id_gedung'] ?>">
                                        <?php echo $data['nama_gedung'] ?>
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgls1">Sewa dari tanggal</label>
                                <input type="txt" class="form-control" id="tgls1" name="tgls1" value="<?php echo $tgla ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tgls2">Sewa s/d tanggal</label>
                                <input type="txt" class="form-control" id="tgls2" name="tgls2" value="<?php echo $tglb ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $data['harga'] ?>" placeholder="Enter harga" readonly>
                            </div>
                            <div class="form-group">
                                <label for="harga">Lama sewa</label>
                                <input type="number" class="form-control" id="lama" name="lama" value="<?php echo $d ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="number" class="form-control" id="total" name="total" value="<?php echo $data['harga'] * $d ?>" readonly>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('../template/footer.php');
} ?>