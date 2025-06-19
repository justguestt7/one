<?php
  $url="http://localhost/end-project/";
  session_start();
  include("layoout/connect.php");
  if(isset($_SESSION['nopes'])){
    $idpesan = $_SESSION['nopes'];
    
    $qpelanggan = mysqli_query($connect,"SELECT * FROM tb_pesanan JOIN tb_customer WHERE tb_pesanan.id_customer = tb_customer.id_customer AND tb_pesanan.id_pesanan = '$idpesan'");
    
    $np = mysqli_fetch_array($qpelanggan);
    $namapelanggan = $np['nama_customer'];
  } else {
        echo '<script>
        alert("SESSION GAGAL");
        window.location = "http://localhost/end-project/cek-pesanan.php";
        </script>';
  }


?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kasir</title>
    <link rel="shortcut icon" type="image/png" href="<?=$url?>assets/images/logos/envv.png" />
    <link rel="stylesheet" href="<?=$url?>assets/css/styles.min.css" />
  
<!--  Main wrapper -->
<div class="body-wrapper">
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="navbar-collapse justify-content-start px-0" id="navbarNav">
            <ul class="navbar-nav flex-row align-items-center justify-content-start">
                <a href="logout.php" class="btn btn-outline-dark mx-3 mt-2 d-block" onclick="return confirm('Sudah selesai??')">Keluar</a>
            </ul>
          </div>
        </nav>
      </header>


  <!-- Main Content -->
  <div class="container-fluid mt-5">
    <div class=" border rounded p-4 shadow-sm" style="border-width: 2px; border-color: #d0d0d0">
      <h1 class="mb-3">NOMOR PESANAN : <?= $idpesan; ?></h1>
      <h3 class="mb-3">NAMA PELANGGAN : <?= $namapelanggan; ?></h3>

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Pesanan Barang
      </button>




      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable">
          <thead class="text-dark fs-4">
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Harga Satuan</th>
              <th>Subtotal</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $query = "SELECT * FROM tb_detailpesanan JOIN tb_barang ON tb_barang.id_barang = tb_detailpesanan.id_barang WHERE id_pesanan = '$idpesan'";
            $hasil = mysqli_query($connect, $query);
            $no = 1;

            while ($detail = mysqli_fetch_array($hasil)) :
              $subtotal = $detail["qty"] * $detail["harga_barang"];
              $namabarang = $detail['nama_barang'];
              $qty = $detail["qty"];
              $harga = $detail["harga_barang"];
              $iddetail = $detail["id_detailpesanan"]
            ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $namabarang ?></td>
                <td><?= number_format($qty) ?></td>
                <td>Rp<?= number_format($harga) ?></td>
                <td>Rp<?= number_format($subtotal) ?></td>
                <td>
                  <button href="detail.php" class="btn btn-primary">Edit</button>
                  <a name="hapus" href="<?= $url ?>pesanan/hapus-detail-barang.php?iddetail=<?= $iddetail ?> & idbarang=<?= $detail["id_barang"] ?> & idpesanan=<?= $idpesan ?>" class="btn btn-danger">Hapus Barang</a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- End of Main Content -->
</div>



<?php include("layoout/footer.php") ?>