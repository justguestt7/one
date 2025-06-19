<?php
include("../layoout/connect.php");
  if(isset($_POST['saveEdit'])){
    $nama = $_POST['nama_customer'];
    $no = $_POST['no_telp'];
    $alamt = $_POST['alamat'];
    $id = $_POST['id_customer'];

    $query = mysqli_query($connect,"UPDATE tb_customer SET nama_customer='$nama', no_telp='$no', alamat='$alamt' WHERE id_customer=$id");
   if ($query) {
    echo '<script>
      window.location = "http://localhost/end-project/data-customer/index-customer.php";
    </script>';
   } 
  }
?>