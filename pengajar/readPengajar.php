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
  <title>Pengajar VSGA</title>
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
    <h1>Data Pengajar VSGA</h1>
  </div>

  <div class="container-sm">
    <div class="card my-5">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID Pengajar</th>
              <th scope="col">Nama Pengajar</th>
              <th scope="col">Telepon</th>
              <th scope="col">Action</th>
            </tr>
          <tbody>
            <?php
            require '../configDatabase.php';

            $tabel = "select * from pengajar";
            $view = mysqli_query($database, $tabel);
            $urut = 1;

            while ($dataPengajar = mysqli_fetch_array($view)) {
              $id = $dataPengajar["id"];
              $idPengajar = $dataPengajar["idPengajar"];
              $namaPengajar = $dataPengajar["namaPengajar"];
              $telepon = $dataPengajar["telepon"];

            ?>
              <tr>
                <th scope="row"><?php echo $urut++ ?></th>
                <td scope="row"><?php echo $idPengajar ?></td>
                <td scope="row"><?php echo $namaPengajar ?></td>
                <td scope="row"><?php echo $telepon ?></td>

                <td scope="row">

                  <a href="updatePengajar.php?op=edit&id=<?php echo $id ?>" style="text-decoration: none;">
                    <button type="button" class="btn btn-warning">
                      Edit
                    </button>
                  </a>

                  <a href="deletePengajar.php?op=delete&id=<?php echo $id ?>
                  " onclick="return confirm('Yakin Ingin Hapus Pengajar ?')">
                    <button type="button" class="btn btn-danger">
                      Delete
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
        <a href="./createPengajar.php">
          <button type="button" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Data Pengajar
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