<?php include("../layoout/head.php") ?>
<?php include("../layoout/sidebar.php") ?>

<!--  Main wrapper -->
<div class="body-wrapper">
  <?php include("../layoout/header.php") ?>

  <!-- Main Content -->
  <div class="container-fluid">
    <div class="card-body">
      <h1 class="mb-3">GUDANG BARANG</h1>

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
        Tambah Barang Baru
      </button>

      <!-- TAMBAH BARANG Modal -->
      <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Baru</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="modal-tambah-barang.php" method="post">
              <div class="modal-body">
                <label for="nama-barang" class="mb-2">Nama Barang</label>
                <input autocomplete="off" type="text" placeholder="Nama Barang" class="form-control mb-3" name="nama_barang" id="nama-barang">
                <label for="stok-barang" class="mb-2">Stok Barang</label>
                <input autocomplete="off" type="number" placeholder="Stok" class="form-control mb-3" name="stok_barang" id="stok-barang">
                <label for="harga-barang" class="mb-2">Harga Barang (Rp.)</label>
                <input autocomplete="off" type="number" placeholder="Rp XXXXXX" min="1" class="form-control" name="harga_barang" id="harga-barang">
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="save" class="btn btn-primary">Save changes</button>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>



    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable">
        <thead class="text-dark fs-4">
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Stok Barang</th>
            <th>Harga Barang</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $hasil = mysqli_query($connect, "SELECT * FROM tb_barang");
          $no = 1;
          while ($data = mysqli_fetch_array($hasil)) :
          ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data["nama_barang"] ?></td>
              <td><?= number_format($data["stok_barang"]) ?></td>
              <td>Rp<?= number_format($data["harga_barang"]) ?></td>

              <td>
                <a data-bs-toggle="modal" data-bs-target="#edit<?= $data['id_barang'] ?>" data-id="<?= $data['id_barang'] ?>" class="btn btn-primary">EDIT</a>
                <a href="<?= $url ?>data-barang/hapus-barang.php?id=<?= $data['id_barang'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus barang ini??')">HAPUS</a>
              </td>
            </tr>

            <!-- EDIT BARANG Modal -->
            <div class="modal fade" id="edit<?= $data['id_barang'] ?>" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editmodal">Edit Barang </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <form action="edit-barang.php" method="post">
                    <div class="modal-body">
                      <label for="nama-barang" class="mb-2">Nama Barang</label>
                      <input autocomplete="off" type="text" placeholder="Nama Barang" class="form-control mb-3" name="nama_barang" id="nama-barang" value="<?= $data['nama_barang'] ?>">
                      <label for="stok-barang" class="mb-2">Stok Barang</label>
                      <input autocomplete="off" type="number" placeholder="Stok" class="form-control mb-3" name="stok_barang" id="stok-barang" value="<?= $data['stok_barang'] ?>">
                      <label for="harga-barang" class="mb-2">Harga Barang (Rp.)</label>
                      <input autocomplete="off" type="number" placeholder="Rp XXXXXX" min="1" class="form-control" name="harga_barang" id="harga-barang" value="<?= $data['harga_barang'] ?>">
                      <input type="hidden" name="id_barang" value="<?= $data['id_barang'] ?>">
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="saveEdit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                </form>
              </div>
            </div>

          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- End of Main Content -->
</div>

<?php include("../layoout/footer.php") ?>