<?php include("../layoout/head.php")?>
<?php include("../layoout/sidebar.php")?>

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <?php include("../layoout/header.php")?>
        <div class="container-fluid">
          <h1>
            PROFILE ADMIN
          </h1>
            <div class=" border rounded p-4 shadow-sm" style="border-width: 2px; border-color: #d0d0d0">
                <label for="namaUser" class="form-label">Username</label>
                <input class="form-control " type="text" value="<?php echo  isset($_SESSION['username']) ?  htmlspecialchars($_SESSION['username']) :'';?>" name="namaUser" readonly>    
                <label for="password" class="mt-4 form-label">Password</label>
                <input class="form-control" type="text" value="<?php echo  isset($_SESSION['password']) ?  htmlspecialchars($_SESSION['password']) :'';?>"  name="passUser" readonly>
                <a data-bs-target="#editUser" data-bs-modal="modal" data-bs-toggle="modal" class="btn btn-primary mt-3">EDIT</a>
              </div>

                <!-- EDIT PROFIL Modal -->
            <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editmodal" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editUser">Edit Profile </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
          
                  <form action="edit-user.php" method="post">
                    <div class="modal-body">
                      <label for="nama-barang" class="mb-2">Username</label>
                      <input autocomplete="off" type="text" placeholder="Username" class="form-control mb-3" name="username" id="username">
                      <label for="password" class="mb-2">Password</label>
                      <input autocomplete="off" type="password" placeholder="Password" class="form-control mb-3" name="password" id="password">
                    </div>
          
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="saveEdit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                </form>
              </div>
            </div>
        </div>
                <!-- Main Content -->

      <!-- End of Main Content -->
    </div>

<?php include("../layoout/footer.php")?>