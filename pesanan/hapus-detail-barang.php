<?php
include("../layoout/connect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
    $id_barang = $_GET["idbarang"]; //id barang get dari detail
    $id_detpesanan = $_GET["iddetail"]; //id detailbarang get dari detail
    $idp    = $_GET['idpesanan']; //id pesanan untuk menu detail

    //cek stok barang
    $qstok = mysqli_query($connect,"SELECT * FROM tb_barang WHERE id_barang = '$id_barang'");
    $fq = mysqli_fetch_array($qstok);
    $stokbarang = $fq['stok_barang'];

    //cek qty detail pesananan
    $qqty = mysqli_query($connect,"SELECT * FROM tb_detailpesanan WHERE id_detailpesanan = '$id_detpesanan'");
    $fqq = mysqli_fetch_array($qqty);
    $qty = $fqq['qty']; 

    //var penambahan barang
    $stokkembali = $stokbarang + $qty;

    //update tambah stok dan hapus barang
    $update = mysqli_query($connect,"UPDATE tb_barang SET stok_barang = '$stokkembali' WHERE id_barang = $id_barang");
    $delete = mysqli_query($connect,"DELETE FROM tb_detailpesanan WHERE id_detailpesanan = '$id_detpesanan' AND id_barang = '$id_barang'");

    if ($update&&$delete) {
       echo '<script>
        alert("BARANG TELAH DIHAPUS");
        </script>';
        header('location:index-pesanan.php');
    } else {
       echo '<script>
        alert("ERROR GAGAL MENGHAPUS BARANG");
        </script>';
        header('location:index-pesanan.php');

    }
?>