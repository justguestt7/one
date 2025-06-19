<?php include("../layoout/connect.php");

$iduser = $_GET['id'];

$del = mysqli_query($connect,"DELETE FROM tb_user WHERE id_user = '$iduser'");

echo '<script>
    "window.location = http://localhost/end-project/data-user/index-user.php"
</script>'


?>