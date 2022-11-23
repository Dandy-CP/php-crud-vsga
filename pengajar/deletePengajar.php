<?php
require '../configDatabase.php';

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if ($op == 'delete') {
  $id = $_GET['id'];
  $viewTabel = "delete from pengajar where id ='$id'";
  $push = mysqli_query($database, $viewTabel);
  if ($push) {
    $sukses = "Data Berhasil Di Hapus";
    header("refresh:1;url=readPengajar.php");
  } else {
    $error = "Data Gagal Di Hapus";
  }
}
