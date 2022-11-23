<?php
require '../configDatabase.php';

$sukses = "";
$error = "";

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if ($op == "edit") {
  $idpeserta = $_GET['id'];
  $viewTabel = "select * from peserta where id = '$idpeserta'";
  $tabel = mysqli_query($database, $viewTabel);
  $fetch = mysqli_fetch_array($tabel);
  $idpeserta = $fetch['id'];
  $noRegis = $fetch['noRegis'];
  $nama = $fetch['nama'];
  $usia = $fetch['usia'];
  $alamat = $fetch['alamat'];

  if ($idpeserta == "") {
    $error = "Data Tidak Di Temukan";
  }
}

if (isset($_POST["simpan"])) {
  $noRegis = $_POST["noRegis"];
  $nama = $_POST["nama"];
  $usia = $_POST["usia"];
  $alamat = $_POST["alamat"];

  if ($noRegis && $nama && $usia && $alamat) {
    $tabelPeserta = "update peserta set noRegis='$noRegis', nama='$nama', usia='$usia', alamat='$alamat' where id ='$idpeserta'";
    $send = mysqli_query($database, $tabelPeserta);

    if ($send) {
      $sukses = "Data Berhasil Di Update";
    } else {
      $error = " Data Gagal Di Update";
    }
  } else {
    $error = "Lengkapi Semua Data";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/sidebarMenu.css">
  <link rel="stylesheet" href="../style/header.css">
  <link rel="stylesheet" href="../style/form.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
  <title>Edit Peserta</title>
</head>

<body>
  <side-menu></side-menu>

  <div class="headerTop">
    <img src="../img/digitalent.png" alt="logoDigitalent" width="100px" draggable="false">
    <img src="../img/kominfo.png" alt="logoKominfo" width="50px" draggable="false">
    <img src="../img/logoVSGA.png" alt="logoVSGA" width="200px" draggable="false">
  </div>
  <div class="header">
    <div class="headerImage">
      <img src="../img/undraw_add_tasks_re_s5yj.svg" alt="imageHero" width="500px" draggable="false">
    </div>
    <h1>Edit Data Peserta VSGA</h1>
  </div>

  <div class="errorMsg">
    <?php
    if ($error) {
    ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
      </div>
    <?php
    }
    ?>

    <?php
    if ($sukses) {
    ?>
      <div class="alert alert-success" role="alert">
        <?php echo $sukses ?>
      </div>
    <?php
      header("refresh:2;url=readPeserta.php");
    }
    ?>
  </div>

  <div class="container">
    <form action="" method="POST" autocomplete="off">
      <input type="text" placeholder="ID Peserta" id="noRegis" name="noRegis" value="<?php echo $noRegis ?>" />

      <div class="fromLine">
        <input type="text" placeholder="Nama Lengkap Peserta" id="nama" name="nama" value="<?php echo $nama ?>" />

        <input type="number" placeholder="Usia" id="usia" name="usia" value="<?php echo $usia ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="2" />
      </div>

      <input placeholder="Alamat Lengkap Peserta" rows="3" id="alamat" name="alamat" value="<?php echo $alamat ?>" />

      <button type="submit" name="simpan" id="simpan"> Update Data Peserta </button>
      <a href="./readPeserta.php">Lihat Data Peserta</a>
    </form>
  </div>

  <script type=module src="../components.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
</body>

</html>