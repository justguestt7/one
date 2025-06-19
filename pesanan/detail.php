<?php include("../layoout/head.php")?>
<?php include("../layoout/sidebar.php")?>
<?php

if(isset($_GET['idpesanan'])){
    $idp = $_GET['idpesanan'];

    $qpelanggan = mysqli_query($connect,
    "SELECT * FROM tb_pesanan JOIN tb_customer WHERE tb_pesanan.id_customer = tb_customer.id_customer AND tb_pesanan.id_pesanan = '$idp'");
    
    $np = mysqli_fetch_array($qpelanggan);
    $namapelanggan = $np['nama_customer'];

  } else {
    header('location:index-pesanan.php');
  };
?>

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <?php include("../layoout/header.php")?>
      
      <!-- Main Content -->
      <div class="container-fluid">
          <div class="card-body">
            <h1 class="mb-3">NOMOR PESANAN : <?=$idp;?></h1>
            <h3 class="mb-3">NAMA PELANGGAN : <?=$namapelanggan;?></h3>
            
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
                      $query = "SELECT * FROM tb_detailpesanan JOIN tb_barang ON tb_barang.id_barang = tb_detailpesanan.id_barang WHERE id_pesanan = '$idp'";
                      $hasil = mysqli_query($connect,$query);
                      $no = 1;

                      while ($detail = mysqli_fetch_array($hasil)) :
                        $subtotal = $detail["qty"]*$detail["harga_barang"];
                        $namabarang = $detail['nama_barang'];
                        $qty = $detail["qty"];
                        $harga = $detail["harga_barang"];
                        $iddetail = $detail["id_detailpesanan"]
                    ?>
                    <tr>
                      <td><?=$no++?></td>
                      <td><?=$namabarang?></td>
                      <td><?=number_format($qty)?></td>
                      <td>Rp<?=number_format($harga)?></td>
                      <td>Rp<?=number_format($subtotal)?></td>
                      <td>
                        <button href="detail.php" class="btn btn-primary">Edit</button>
                        <a name="hapus" href="<?=$url?>pesanan/hapus-detail-barang.php?iddetail=<?=$iddetail?> & idbarang=<?=$detail["id_barang"]?> & idpesanan=<?=$idp?>" class="btn btn-danger">Hapus Barang</a>
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

<?php include("../layoout/footer.php")?>


          <!-- DETAIL BARANG Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Baru</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php
                ?>
                <form action="modal-detail.php" method="post">
                  <div class="modal-body">
                    <label for="usr" class="form-label mb-2">Pilih Barang</label>
                    
                    <select class="form-control form-select" name="id_barang" id="" required >
                      <option value="">Pilih Barang</option>
                      
                      <?php
                        $input_barang = mysqli_query($connect,"SELECT * FROM tb_barang WHERE id_barang NOT IN (SELECT id_barang FROM tb_detailpesanan WHERE id_pesanan = '$idp')");

                        while($db = mysqli_fetch_array($input_barang)) :
                            $idbarang = $db['id_barang'];
                            $namabarang = $db['nama_barang'];
                      ?>

                            <option value="<?=$idbarang?>"> <?=$namabarang?>  </option>

                          <?php endwhile; ?>
                    </select>

                      <input type="number" name="qty" class="form-control mt-2" placeholder="Jumlah" required min="1">
                      <input type="hidden" name="idpesanan" value="<?=$idp?>">
                      
                  </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="save" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
