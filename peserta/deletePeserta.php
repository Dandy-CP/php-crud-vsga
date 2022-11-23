<?php
  require '../configDatabase.php';

  if (isset($_GET['op'])) {
    $op = $_GET['op'];
  } else {
    $op = "";
  }

  if ($op == 'delete') {
    $idpeserta = $_GET['id'];
    $viewTabel = "delete from peserta where id ='$idpeserta'";
    $push = mysqli_query($database, $viewTabel);
    if ($push) {
      $sukses = "Data Berhasil Di Hapus";
      header("refresh:1;url=readPeserta.php");
    } else {
      $error = "Data Gagal Di Hapus";
    }
  }
?>