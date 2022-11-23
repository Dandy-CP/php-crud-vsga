<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/sidebarMenu.css">
  <link rel="stylesheet" href="../style/header.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <title>Presensi Peserta</title>
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
      <img src="../img/undraw_pair_programming_re_or4x.svg" alt="imageHero" width="500px" draggable="false">
    </div>
    <h1>Data Presensi Peserta VSGA</h1>
  </div>

  <div class="container-sm">
    <div class="card my-5">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID Peserta</th>
              <th scope="col">Tgl Hadir</th>
              <th scope="col">pertemuan Ke</th>
              <th scope="col">Nama Kelas</th>
              <th scope="col">ID Pengajar</th>
              <th scope="col">Materi</th>
              <th scope="col">Bukti Hadir</th>
              <th scope="col">Action</th>
            </tr>
          <tbody>
            <?php
            require '../configDatabase.php';

            $selectTable = "select * from presensi";
            $table = mysqli_query($database, $selectTable);
            $urut = 1;

            while ($dataPresensi = mysqli_fetch_array($table)) {
              $id = $dataPresensi['id'];
              $idPeserta = $dataPresensi['idPeserta'];
              $tglHadir = $dataPresensi['tglHadir'];
              $pertemuanKe = $dataPresensi['pertemuanKe'];
              $namaKelas = $dataPresensi['namaKelas'];
              $idPengajar = $dataPresensi['idPengajar'];
              $materi = $dataPresensi['materi'];
              $image_url = $dataPresensi['image_url'];

            ?>
              <tr>
                <th scope="row"><?php echo $urut++ ?></th>
                <td scope="row"><?php echo $idPeserta ?></td>
                <td scope="row"><?php echo $tglHadir ?></td>
                <td scope="row"><?php echo $pertemuanKe ?></td>
                <td scope="row"><?php echo $namaKelas ?></td>
                <td scope="row"><?php echo $idPengajar ?></td>
                <td scope="row"><?php echo $materi ?></td>
                <td scope="row"><img src="../uploads/<?php echo $image_url ?>" alt="" style="width: 200px;"></td>

                <td scope="row">
                  <a href="updatePresensi.php?op=edit&id=<?php echo $id ?>" style="text-decoration: none;">
                    <button type="button" class="btn btn-warning">
                      <i class="bi bi-pencil-square"></i>
                    </button>
                  </a>

                  <a href="deletePresensi.php?op=delete&id=<?php echo $id ?>
                  " onclick="return confirm('Yakin Ingin Hapus Peserta ?')">
                    <button type="button" class="btn btn-danger">
                      <i class="bi bi-trash"></i>
                    </button>
                  </a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
          </thead>
        </table>
        <a href="./createPresensi.php">
          <button type="button" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Data Presensi
          </button>
        </a>
      </div>
    </div>
  </div>
  <script type=module src="../components.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
</body>

</html>