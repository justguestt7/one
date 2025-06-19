<?php include("../layoout/head.php")?>
<?php include("../layoout/sidebar.php")?>

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <?php include("../layoout/header.php")?>
      
      <!-- Main Content -->
      <div class="container-fluid">
        <div class="card-body">
          <h1 class="mb-3">KELOLA CUSTOMER</h1>
          
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Customer
          </button>
          
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Customer</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

              <form action="modal-tambah-customer.php" method="post">
                <div class="modal-body">
                    <label for="Nama-customer" class="mb-2">Nama Customer</label>
                    <input autocomplete="off" type="text" class="form-control mb-3" name="nama_customer" id="Nama-customer">
                    <label for="no-telp" class="mb-2">Nomor Telepon</label>
                    <input autocomplete="off" type="number" class="form-control mb-3" name="no_telp" id="no-telp">
                    <label for="alamat" class="mb-2">Alamat</label>
                    <input autocomplete="off" type="text" class="form-control" name="alamat" id="alamat">
                  </div>
                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="save" class="btn btn-primary">Save Changes</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          
          
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable">
                <thead class="text-dark fs-4">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php //looping
                    $hasil = mysqli_query($connect,"SELECT * FROM tb_customer");
                    $no = 1;
                    while ($data = mysqli_fetch_array($hasil)) :
                  ?>
                  <tr>
                    <td><?=$no++?></td>
                    <td><?=$data["nama_customer"]?></td>
                    <td><?=$data["no_telp"]?></td>
                    <td><?=$data["alamat"]?></td>
                    <td>
                      <a data-bs-toggle="modal" data-bs-target="#edit<?=$data['id_customer']?>" class="btn btn-primary">EDIT</a>
                      <a href="<?=$url?>data-barang/hapus-barang.php?id=<?=$data['id_customer']?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus orang ini??')"> HAPUS </a>
                    </td>
                  </tr>

                    <!-- EDIT CUSTOMER Modal -->
                    <div class="modal fade" id="edit<?=$data['id_customer']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Customer <strong><?=$data['nama_customer']?></strong></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                          <form action="edit-customer.php" method="post">
                            <div class="modal-body">
                              <label for="Nama-customer" class="mb-2">Nama Customer</label>
                              <input autocomplete="off" type="text" class="form-control mb-3" name="nama_customer" id="Nama-customer" value="<?=$data['nama_customer']?>">
                              <label for="no-telp" class="mb-2">Nomor Telepon</label>
                              <input autocomplete="off" type="number" class="form-control mb-3" name="no_telp" id="no-telp" value="<?=$data['no_telp']?>">
                              <label for="alamat" class="mb-2">Alamat</label>
                              <input autocomplete="off" type="text" class="form-control" name="alamat" id="alamat" value="<?=$data['alamat']?>">
                              <input type="hidden" name="id_customer" value="<?=$data['id_customer']?>">
                            </div>
                            
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="saveEdit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        </div>
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

<?php include("../layoout/footer.php")?>


