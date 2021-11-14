<?php
session_start();
include 'koneksi_db.php';
$pesan = "";
if (isset($_POST['submit'])) {
$username = $_POST['username'];
$password = $_POST['password'];
$query_login = "SELECT * FROM tb_users WHERE username = '$username' AND password = '$password'";
$cek = mysqli_num_rows($sql = mysqli_query($koneksi, $query_login));
$data = mysqli_fetch_assoc($sql);
if ($cek > 0) {
$_SESSION['id']         = $data['id'];
$_SESSION['username']   = $data['username'];
$_SESSION['password']   = $data['password'];
$_SESSION['level_user'] = $data['level_user'];

if ($data['level_user']==1) {
header("location: ../ADMIN/index.php");
}elseif ($data['level_user']==2) {
header("location: ../USER/index.php");
}
}else{
$pesan = "<script>alert('Username or Password incorrect !!')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">\
    <title>LOGIN - SI Bank Sampah</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
  </head>
  <body class="bg-dark">
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form method="post" action="">
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input class="form-control" id="exampleInputEmail1" type="username" name="username" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input class="form-control" id="exampleInputPassword1" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="checkbox" onclick="myFunction()"> Show Password
            </div>
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="LOGIN">
            <?php
            echo $pesan;
            ?>
          </form>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script type="text/javascript">
    function myFunction() {
    var x = document.getElementById("exampleInputPassword1");
    if (x.type === "password") {
    x.type = "text";
    } else {
    x.type = "password";
    }
    }
    </script>

  </body>
</html>