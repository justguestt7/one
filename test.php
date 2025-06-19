
<form class="user" action="" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control form-control-user"
        name="username" placeholder="Username">
    </div>
    <div class="form-group">
        <label for="password">password</label>
        <input type="password" class="form-control form-control-user"
        name="password" placeholder="Password">
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
        Login
    </button>
</form>
 <?php
 if (isset($_POST['submit']))
 {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hasil = mysqli_query(mysqli_connect("localhost","root","","db_kasir"),"SELECT * FROM tb_user WHERE username='$username'")  ;
    $data = mysqli_fetch_array($hasil);

    if ($data['username']==$username && $data['password']==$password) {
        session_start();
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];

        'window.location = http://localhost/end-project/index-pesanan.php';
    }
 }
 
 ?>