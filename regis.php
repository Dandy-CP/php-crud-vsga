<?php
require 'configDatabase.php';
if (isset($_POST["submit"])) {
  $namaUser = $_POST["name"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  $duplikatUser = mysqli_query($database, "SELECT * FROM user WHERE username='$username'");

  if (mysqli_num_rows($duplikatUser) > 0) {
    echo "<script> alert('Username Sudah Di Gunakan Coba Username Yang Lain.'); </script>";
  } else {
    if ($password) {
      $push = "INSERT INTO user VALUES('','$namaUser','$username','$password')";
      mysqli_query($database, $push);
      echo "<script> alert('Pendaftaran Berhasil'); </script>";
      header("Location: login.php");
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/regisAndLogin.css">
  <title>Daftar</title>
</head>

<body>
  <div class="container">
    <div class="box">
      <img src="img/digitalentLogo.png" alt="">
      <form action="" method="POST" autocomplete="off">
        <h1>Pendaftaran User VSGA</h1>
        <input type="text" placeholder="Nama Anda" id="name" name="name" required>
        <input type="text" placeholder="User Name" name="username" id="username" required>
        <input type="password" placeholder="Password" name="password" id="password" required>
        <button type="submit" name="submit" id="submit"> Daftar </button>
        <p>Sudah Punya Akun? <a href="login.php">Login</a></p>
      </form>
    </div>
  </div>
</body>

</html>