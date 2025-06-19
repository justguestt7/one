<?php
include("../layoout/connect.php");

$idp = $_GET['idpesanan'];

$query = mysqli_query($connect,"SELECT * FROM tb_detailpesanan WHERE id_pesanan = '$idp'");
$data = mysqli_fetch_array($query);
$barang = $data['id_barang'];
$qty = $data['qty'];

$qstok = mysqli_query($connect,"SELECT * FROM tb_barang WHERE id_barang = '$barang'");
$fq = mysqli_fetch_array($qstok);
$stokbarang = $fq['stok_barang'];

$stokkembali = $qty + $stokbarang;

$update = mysqli_query($connect,"UPDATE tb_barang SET stok_barang = '$stokkembali' WHERE id_barang = $barang");
$delete = mysqli_query($connect,"DELETE FROM tb_pesanan WHERE id_pesanan = '$idp'");


if ($update&&$delete) {
    echo '<script>
     alert("BARANG TELAH DIHAPUS");
     </script>';
     header('location:detail.php?idpesanan='.$idp);
 } else {
    echo '<script>
     alert("ERROR GAGAL MENGHAPUS BARANG");
     </script>';
     header('location:detail.php?idpesanan='.$idp);

 }
?>