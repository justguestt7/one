<?php
    include("../layoout/connect.php");
    if (isset($_POST['save'])) {
        $idp = $_POST['idpesanan'];
        $id_barang = $_POST['id_barang'];
        $qty = $_POST['qty'];

        //check stock
        $qstock = mysqli_query($connect,"SELECT * FROM tb_barang WHERE id_barang = '$id_barang'");
        $fetch = mysqli_fetch_array($qstock);
        $fstock = $fetch['stok_barang'];

        if ($fstock >= $qty) {

            $stock = $fstock - $qty;
            $updatestock = mysqli_query($connect, "UPDATE tb_barang SET stok_barang = '$stock' WHERE id_barang = '$id_barang'");
            $update = "INSERT INTO tb_detailpesanan (id_pesanan,id_barang,qty) VALUES ($idp,$id_barang,$qty)";
            $hasil = mysqli_query($connect,$update);

            if ($hasil && $updatestock) {
                echo '<script>
                    alert("Barang Telah DiTambahkan");
                </script>';
                header('location:detail.php?idpesanan='.$idp);
            } else {
                echo '<script>
                alert("Tidak Tersedia");
            </script>';
            header('location:detail.php?idpesanan='.$idp);
            }

        } else {
            echo '<script>
                alert("Stock Habis / Tidak Mencukupi");
            </script>';
            header('location:detail.php?idpesanan='.$idp);
        }



    }
?>