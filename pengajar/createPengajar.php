<?php
require '../configDatabase.php';

$idPengajar = "";
$namaPengajar = "";
$telepon = "";
$sukses = "";
$error = "";

if (isset($_POST["simpan"])) {
  $idPengajar = $_POST["idPengajar"];
  $namaPengajar = $_POST["namaPengajar"];
  $telepon = $_POST["telepon"];

  if ($idPengajar && $namaPengajar && $telepon) {

    $tabelPengajar = "insert into pengajar(idPengajar, namaPengajar, telepon) values ('$idPengajar', '$namaPengajar', '$telepon')";
    $send = mysqli_query($database, $tabelPengajar);

    if ($send) {
      $sukses = "Berhasil Memasukan Data";
    } else {
      $error = "Data Gagal Di Masukan";
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
  <title>Tambah Data Pengajar</title>
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
    <h1>Tambah Pengajar VSGA</h1>
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
      header("refresh:2;url=readPengajar.php");
    }
    ?>
  </div>
  <div class="container">
    <form action="" method="POST" autocomplete="off">
      <div class="fromLine">
        <input type="number" class="form-control fs-5" placeholder="ID" id="idPengajar" name="idPengajar" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" value="<?php echo $idPengajar ?>" style="margin-right: 20px;" />

        <input type="text" class="form-control fs-5" placeholder="Nama Pengajar" id="namaPengajar" name="namaPengajar" value="<?php echo $namaPengajar ?>" style="margin-right: 0px;" />
      </div>

      <input type="number" class="form-control fs-5" placeholder="Nomor Telpon" id="telepon" name="telepon" value="<?php echo $telepon ?>" />

      <button type="submit" name="simpan" id="submit"> Simpan Data </button>
      <a href="./readPengajar.php">Lihat Data Pengajar</a>
    </form>
  </div>
  <script type=module src="../components.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
</body>

</html>