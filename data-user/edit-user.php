<?php
include("../layoout/head.php");
include("../layoout/connect.php");

if (isset($_POST['saveEdit'])) {
    $usernow = $_SESSION['username'];
    $passnow = $_SESSION['password'];
    $id_user = $_SESSION['id_user'];
    $userchange = $_POST['username'];
    $passchange = $_POST['password'];

    // Prevent empty username or password
    if (empty($userchange) || empty($passchange)) {
        echo '<script>
            alert("Username dan Password tidak boleh kosong");
            window.location = "profile-user.php";
        </script>';
        exit;
    }

    // Prevent using the same username and password
    if ($usernow == $userchange && $passnow == $passchange) {
        echo '<script>
            alert("Data dan Password tidak boleh sama");
            window.location = "profile-user.php";
        </script>';
        exit;
    }

    // Check if username already exists (other than current user)
    $check = mysqli_query($connect, "SELECT * FROM tb_user WHERE username='$userchange' AND id_user != '$id_user'");
    if (mysqli_num_rows($check) > 0) {
        echo '<script>
            alert("Username sudah digunakan oleh user lain");
            window.location = "profile-user.php";
        </script>';
        exit;
    }

    // Update user data
    $query = "UPDATE tb_user SET username='$userchange', password='$passchange' WHERE id_user='$id_user'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        session_destroy();
        echo '<script>
            alert("Data berhasil diubah dan silahkan login kembali");
            window.location = "http://localhost/end-project/login.php";
        </script>';
    } else {
        echo '<script>
            alert("Gagal mengubah data");
            window.location = "profile-user.php";
        </script>';
    }
}
?>