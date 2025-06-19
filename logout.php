<?php include("../end-project/layoout/head.php"); ?>
<?php

session_destroy();
echo '<script>
        alert("Selamat Tinggal");
        window.location = "http://localhost/end-project/login.php";
       </script>';


?>