<?php
  $host = "localhost";
  $user = "root";
  $password= "";
  $db = "pesertavsga";

  session_start();
  $database = mysqli_connect($host, $user, $password, $db);
  if (!$database) {
    die("Gagal Terhubung Ke Database");
  }
