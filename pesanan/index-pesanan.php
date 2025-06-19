<?php include("../layoout/head.php") ?>
<?php include("../layoout/sidebar.php") ?>

<!--  Main wrapper -->
<div class="body-wrapper">
  <?php include("../layoout/header.php") ?>

  <!-- Main Content -->
  <div class="container-fluid">
    <div class="card-body">
      <h1 class="mb-3">DATA PESANAN</h1>

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Pesanan Baru
      </button>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan Baru</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
            $input_customer = mysqli_query($connect, "SELECT * FROM tb_customer");
            $input_user = mysqli_query($connect, "SELECT * FROM tb_user");

            ?>
            <form action="modal-tambah-pesanan.php" method="post">
              <div class="modal-body">
                <label for="usr" class="form-label mb-2">Nama Customer</label>

                <select class="form-control form-select" name="id_customer" id="" required>
                  <option value="">Pilih Customer</option>
                  <?php while ($data_customer = mysqli_fetch_array($input_customer)) : ?>
                    <option value="<?= $data_customer['id_customer'] ?>"> <?= $data_customer['nama_customer'] ?> - <?= $data_customer['alamat'] ?> </option>
                  <?php endwhile; ?>
                </select>

                <label for="" class="form-label mb-2">Nama User</label>
                <select class="form-control form-select" name="id_user" id="" required>
                  <option value="">Pilih User</option>
                  <?php while ($data_user = mysqli_fetch_array($input_user)) : ?>
                    <option value="<?= $data_user['id_user'] ?>"><?= $data_user['username'] ?></option>
                  <?php endwhile; ?>
                </select>



              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="save" class="btn btn-primary">Save changes</button>
              </div>
          </div>
          </form>
        </div>
      </div>



      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable">
          <thead class="text-dark fs-4">
            <tr>
              <th>No Pesanan</th>
              <th>Nama Customer</th>
              <th>Jumlah Barang</th>
              <th>Tanggal</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM tb_pesanan 
                    JOIN tb_customer ON tb_customer.id_customer = tb_pesanan.id_customer
                    JOIN tb_user ON tb_user.id_user = tb_pesanan.id_user";
            $hasil = mysqli_query($connect, $query);
            $no = 1;
            while ($pesanan = mysqli_fetch_array($hasil)) :

              //hitung jumlah order barang
              $hitungjml = mysqli_query($connect, "SELECT * FROM tb_detailpesanan WHERE id_pesanan ='$pesanan[id_pesanan]' ");
              $jmlpesan = mysqli_num_rows($hitungjml);

            ?>
              <tr>
                <td><?= $pesanan['id_pesanan'] ?></td>
                <td><?= $pesanan["nama_customer"] ?></td>
                <td><?= $jmlpesan; ?></td>
                <td><?= $pesanan["tanggal"] ?></td>
                <td>
                  <a href="<?= $url ?>pesanan/detail.php?idpesanan=<?= $pesanan['id_pesanan'] ?>" class="btn btn-primary">Lihat Detail</a>
                  <a name="hapus" href="<?= $url ?>pesanan/hapus-pesanan.php?idpesanan=<?= $pesanan['id_pesanan'] ?>" class="btn btn-danger">Hapus Pesanan</a>
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

<?php include("../layoout/footer.php") ?>