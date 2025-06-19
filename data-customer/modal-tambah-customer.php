<?php
    include("../layoout/connect.php");
    if (isset($_POST['save'])) {
        $nama = $_POST['nama_customer'];
        $notelp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO tb_customer (nama_customer, no_telp, alamat) VALUES ('$nama', '$notelp', '$alamat')";
        $hasil = mysqli_query($connect,$query);
        
    }

    echo '<script> 
    window.location = "http://localhost/end-project/data-customer/index-customer.php"
</script>'
?>