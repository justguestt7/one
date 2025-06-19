<?php include("../layoout/head.php")?>
<?php include("../layoout/sidebar.php")?>

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <?php include("../layoout/header.php")?>
      
      <!-- Main Content -->
      <div class="container-fluid">
        <div class="card-body">
          <h1 class="mb-3">KELOLA ADTMIN</h1>
          
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Admin 
          </button>
          
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Admin </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

              <form action="" method="post">
                <div class="modal-body">
                    <label for="usr" class="mb-2">Username</label>
                    <input autocomplete="off" type="text" class="form-control mb-3" name="username" id="usr">
                    <label for="stok-barang" class="mb-2">Password</label>
                    <input autocomplete="off" type="password" class="form-control mb-3" name="password" id="password-field"> 
                    <span toggle="#password-field" class="ti ti-eye"></span>

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
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $hasil = mysqli_query($connect,"SELECT * FROM tb_user");
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($hasil)) :
                  ?>
                  <tr>
                    <td><?=$no++?></td>
                    <td><?=$data["username"]?></td>
                    <td><?=$data["password"]?></td>

                  </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Admin </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                        <form action="" method="post">
                          <div class="modal-body">
                              <label for="usr" class="mb-2">Username</label>
                              <input autocomplete="off" autocomplete="off" type="text" class="form-control mb-3" name="username" id="usr">
                              <label for="stok-barang" class="mb-2">Password</label>
                              <input autocomplete="off" autocomplete="off" type="number" class="form-control mb-3" name="password" id="stok-barang">

                            </div>
                            
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="save" class="btn btn-primary">Save changes</button>
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

<?php include("../layoout/footer.php")?>