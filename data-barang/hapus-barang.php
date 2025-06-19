<?php
    include("../layoout/connect.php");

        $id = $_GET['id'];
        $query = "DELETE FROM tb_barang WHERE id_barang = $id";

        $update = mysqli_query($connect,$query);

    echo '<script> 
        window.location = "http://localhost/end-project/data-barang/index-barang.php"
    </script>'
?>