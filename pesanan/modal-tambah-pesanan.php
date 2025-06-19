<?php
    include("../layoout/connect.php");
    if (isset($_POST['save'])) {
        $customer = $_POST['id_customer'];
        $user = $_POST['id_user'];

        $update = "INSERT INTO tb_pesanan (id_customer,id_user) VALUES ($customer,$user)";
        $hasil = mysqli_query($connect,$update);
    
    if ($hasil) {
        echo
            '<script>
                alert("Update diTambahkan");
                window.location = "http://localhost/end-project/pesanan/index-pesanan.php";
            </script>';

    } else {
        echo
        '<script>
            alert(Update Gagal);
        </script>';
    };
    }

?>