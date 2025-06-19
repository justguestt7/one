<?php
    include("../layoout/connect.php");
    if (isset($_POST['save'])) {
        $nama = $_POST["nama_barang"];
        $stok = $_POST["stok_barang"];
        $harga = $_POST["harga_barang"];

        $update = "INSERT INTO tb_barang (nama_barang, stok_barang, harga_barang) VALUES ('$nama',$stok,$harga)";
        $hasil = mysqli_query($connect,$update);
   
    if ($hasil) {
        echo
        '<script>
            alert("Barang Sukses diTambahkan") 
            window.location = "http://localhost/end-project/data-barang/index-barang.php"
        </script>';
    } else {
        echo
        '<script>
            alert("Gagal Tambah Barang");
        </script>';
    };
    };

?>