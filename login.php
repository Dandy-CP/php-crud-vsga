<?php
require 'configDatabase.php';

if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $checkUser = mysqli_query($database, "SELECT * FROM user WHERE username='$username'");
  $loginFetch = mysqli_fetch_assoc($checkUser);

  if (mysqli_num_rows($checkUser) > 0) {
    if ($password == $loginFetch["password"]) {
      $_SESSION["login"] = true;
      $_SESSION["id"] = $loginFetch["id"];
      header("Location: index.php");
    } else {
      echo "<script> alert('Password Salah'); </script>";
    }
  } else {
    echo "<script> alert('Akun Tidak Terdaftar'); </script>";
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
  <title>Login</title>
</head>

<body>
  <div class="container">
    <div class="box">
      <img src="img/digitalentLogo.png" alt="">
      <form action="" method="POST" autocomplete="off">
        <h1>Login User VSGA</h1>
        <input type="text" placeholder="User Name" name="username" id="username" required>
        <input type="password" placeholder="Password" name="password" id="password" required>
        <button type="submit" name="submit" id="submit"> Login </button>
        <p>Belum Punya Akun? <a href="regis.php">Daftar</a></p>
      </form>
    </div>
  </div>
</body>

</html>