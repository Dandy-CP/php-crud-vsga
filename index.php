<?php
require 'configDatabase.php';

if (!empty($_SESSION["id"])) {
  $id = $_SESSION["id"];
  $checkUser = mysqli_query($database, "SELECT * FROM user WHERE id = $id");
  $userIndex = mysqli_fetch_assoc($checkUser);
} else {
  echo "<script> alert('Login Terlebih Dahulu'); </script>";
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/home.css">
  <title>Home</title>
</head>

<body>

  <div class="containerContent">
    <h1>Hai Selamat Datang Kembali, <?php echo $userIndex["namaUser"]; ?></h1>
    <h3>Hari ini adalah Hari, <?php setlocale(LC_ALL, 'IND');
                              echo (strftime("%A %d %B %Y")); ?></h3>
    <h2>Silahkan Pilih Tombol Di Bawah Untuk Melakukan Kegiatan</h2>
    <div class="buttonContent">
      <button><a href="./peserta/createPeserta.php">Tambah Data Peserta</a></button>
      <button><a href="./pengajar/createPengajar.php">Tambah Data Pengajar</a></button>
      <button><a href="./presensi/createPresensi.php">Tambah Data Presensi</a></button>
    </div>
    <div class="buttonContent">
      <button><a href="./peserta/readPeserta.php">Lihat Data Peserta</a></button>
      <button><a href="./pengajar/readPengajar.php">Lihat Data Pengajar</a></button>
      <button><a href="./presensi/readPresensi.php">Lihat Data Presensi</a></button>
    </div>
    <button><a href="logout.php">LogOut</a></button>
  </div>

</body>

</html>