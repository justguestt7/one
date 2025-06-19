<?php $url="http://localhost/end-project/"?>
<?php include("connect.php")?>
<?php session_start();?>
<?php if (!$_SESSION['username']) {
      echo'<script>
        alert("Silahkan login terlebih dahulu");
        window.location = "http://localhost/end-project/login.php";
      </script>';
}

?>
 
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kasir</title>
    <link rel="shortcut icon" type="image/png" href="<?=$url?>assets/images/logos/envv.png" />
    <link rel="stylesheet" href="<?=$url?>assets/css/styles.min.css" />
  