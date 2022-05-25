<?php
session_start();
if ($_SESSION['level'] != 'user') {
    header('location: ../index.php');
} else {
    include('../template/header.php');
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

        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h6>Selamat datang <i class="fas fa-user"></i><b> <?php echo $_SESSION['nama'] ?></b></h6>
                </div>
            </div>
        </div>
        <!--Row-->
    </div>
    <!---Container Fluid-->
<?php include('../template/footer.php');
} ?>