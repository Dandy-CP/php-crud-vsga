<?php
require '../configDatabase.php';

$noRegis = "";
$tglHadir = "";
$pertemuanKe = "";
$namaKelas = "";
$idPengajar = "";
$materi = "";
$image_url = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if ($op == "edit") {
  $id = $_GET['id'];
  $getTable = "select * from presensi where id = '$id'";
  $table = mysqli_query($database, $getTable);
  $fetch = mysqli_fetch_array($table);
  $idPeserta = $fetch['idPeserta'];
  $tglHadir = $fetch['tglHadir'];
  $pertemuanKe = $fetch['pertemuanKe'];
  $namaKelas = $fetch['namaKelas'];
  $idPengajar = $fetch['idPengajar'];
  $materi = $fetch['materi'];
  $image_url = $fetch['image_url'];

  if ($id == "") {
    $error = "Data Tidak Di Temukan";
  }
}

if (isset($_POST["simpan"]) && isset($_FILES['my_image'])) {
  $idPeserta = $_POST['idPeserta'];
  $tglHadir = $_POST['tglHadir'];
  $pertemuanKe = $_POST['pertemuanKe'];
  $namaKelas = $_POST['namaKelas'];
  $idPengajar = $_POST['idPengajar'];
  $materi = $_POST['materi'];

  $img_name = $_FILES['my_image']['name'];
  $img_size = $_FILES['my_image']['size'];
  $tmp_name = $_FILES['my_image']['tmp_name'];
  $err = $_FILES['my_image']['error'];

  $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
  $img_ex_lc = strtolower($img_ex);
  $allowed_exs = array("jpg", "jpeg", "png");

  if ($idPeserta && $tglHadir && $pertemuanKe && $namaKelas && $idPengajar && $materi && in_array($img_ex_lc, $allowed_exs)) {

    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
    $img_upload_path = '../uploads/' . $new_img_name;
    move_uploaded_file($tmp_name, $img_upload_path);

    $tablePresensi = "update presensi set idPeserta='$idPeserta', tglHadir='$tglHadir', pertemuanKe='$pertemuanKe', namaKelas='$namaKelas', idPengajar='$idPengajar', materi='$materi', image_url='$new_img_name' where id ='$id'";
    $send = mysqli_query($database, $tablePresensi);

    if ($send) {
      $sukses = "Data Berhasil Di Update";
    } else {
      $error = "Data Gagal Di Update";
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
  <title>Update Data Presensi</title>
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
    <h1>Tambah Presensi Peserta VSGA</h1>
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
      header("refresh:2;url=readPresensi.php");
    }
    ?>
  </div>
  <div class="container" style="margin-top: 65px;">
    <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">

      <div class="fromLine">
        <input type="text" placeholder="ID Peserta" id="idPeserta" name="idPeserta" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="25" value="<?php echo $idPeserta ?>" style="width: 200px; margin-right:20px;" />

        <input type="date" placeholder="ID Pengajar" id="tglHadir" name="tglHadir" value="<?php echo $tglHadir ?>" style="width: 350px; margin-right:20px;" />

        <input type="number" placeholder="Pertemuan Ke" id="pertemuanKe" name="pertemuanKe" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5" value="<?php echo $pertemuanKe ?>" style="width: 165px;" />
      </div>

      <div class="fromLine">
        <input type="text" placeholder="Nama Kelas" id="namaKelas" name="namaKelas" value="<?php echo $namaKelas ?>" />

        <input type="number" placeholder="ID Pengajar" id="idPengajar" name="idPengajar" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" value="<?php echo $idPengajar ?>" style="width: 150px;" />
      </div>

      <input placeholder="Materi Pembelajaran" id="materi" name="materi" style="height: 100px" value="<?php echo $materi ?>">

      <label for="" style="text-align: center;">Upload Bukti Kehadiran</label>
      <input type="file" id="my_image" name="my_image" value="<?php echo $image_url ?>" />

      <button type="submit" name="simpan" id="submit"> Simpan Data Presensi </button>
      <a href="./readPresensi.php">Lihat Data Presensi</a>
    </form>
  </div>
  <script type=module src="../components.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
</body>

</html>