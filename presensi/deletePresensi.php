<?php
  require '../configDatabase.php';

  if (isset($_GET['op'])) {
    $op = $_GET['op'];
  } else {
    $op = "";
  }

  if ($op == 'delete') {
    $id = $_GET['id'];
    $tablePresensi = "delete from presensi where id ='$id'";
    $push = mysqli_query($database, $tablePresensi);
    if ($push) {
      $sukses = "Data Berhasil Di Hapus";
      header("refresh:1;url=readPresensi.php");
    } else {
      $error = "Data Gagal Di Hapus";
    }
  }
?>
