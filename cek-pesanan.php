<?php
  $url="http://localhost/end-project/";
include("layoout/connect.php") ?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cek Pesanan - Kasir</title>
    <link rel="shortcut icon" type="image/png" href="<?= $url ?>assets/images/logos/envv.png" />
    <link rel="stylesheet" href="../end-project/assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100 ">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-5">
                        <div class="card mb-0">
                            <form action="" method="post">
                                <div class="card-body">
                                    <h2 class="text-center">CEK PESANAN</h2>
                                    <h6 class="text-center mb-3">CHECK PESANAN DENGAN NOMER PESANAN</h6>
                                    <h6 class="text-center mb-3">Contoh:2007XXXX</h6>
                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                        <input type="number" min="0" maxlength="8" class="form-control form-control-user" name="nopes">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button  type="submit" name="check" class="btn btn-primary">CARI</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
if (isset($_POST['check'])) {
    $no_pesanan = $_POST['nopes'];

    $hasil = mysqli_query($connect, "SELECT * FROM tb_detailpesanan WHERE id_pesanan = '$no_pesanan'");
    $fetch = mysqli_fetch_array($hasil);

    if ($fetch['id_pesanan'] == $no_pesanan) {
        session_start();
        $_SESSION['nopes'] = $fetch['id_pesanan'];

        echo '<script>
        alert("Pesanan Anda Sedang DiProses");
        window.location = "http://localhost/end-project/index-cek.php";
        </script>';
    } else {

        echo '<script>
        alert("Pesanan Tidak DiTemukan");
        window.location = "http://localhost/end-project/cek-pesanan.php";
        </script>';
    }
}
?>