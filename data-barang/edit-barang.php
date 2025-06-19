<?php
include("../layoout/connect.php");
  if(isset($_POST['saveEdit'])){
    $nama = $_POST['nama_barang'];
    $stok = $_POST['stok_barang'];
    $harga = $_POST['harga_barang'];
    $id = $_POST['id_barang'];

    $query = mysqli_query($connect,"UPDATE tb_barang SET nama_barang='$nama', stok_barang='$stok', harga_barang='$harga' WHERE id_barang=$id");
   if ($query) {
    echo '<script>
      window.location = "http://localhost/end-project/data-barang/index-barang.php";
    </script>';
   } 
  }

?>