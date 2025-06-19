<?php include("layoout/connect.php")?>


<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Customer - Kasir</title>
        <link rel="shortcut icon" type="image/png" href="<?=$url?>assets/images/logos/envv.png" />
        <link rel="stylesheet" href="../end-project/assets/css/styles.min.css" />
    </head>

    <body>
    <!--  Body Wrapper -->
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed">
            <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
                <div class="d-flex align-items-center justify-content-center w-100">
                    <div class="row justify-content-center w-100">
                        <div class="col-md-8 col-lg-6 col-xxl-3">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                        <img src="<?=$url?>assets/images/logos/KASIR.png" width="180" alt="" style="object-fit:cover, object-position:fill;">
                                    </a>
                                    <p class="text-center">CEK PESANAN</p>
                                    <form action="" method="post">
                                        <div class="mb-3 from-group">
                                            <label for="exampleInputEmail1" class="form-label">NOMER PESANAN</label>
                                            <input autocomplete="off" name="username" type="text" class="form-control form-control-user" id="exampleInputEmail1" aria-describedby="username">
                                        </div>
                                        <div class="mb-4 from-group">
                                            <label for="exampleInputPassword1" class="form-label">NAMA PELANGGAN</label>
                                            <input type="password" name="password"  class="form-control form-control-user" id="exampleInputPassword1">
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Login</button>
                                    </form>
                                </div>
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