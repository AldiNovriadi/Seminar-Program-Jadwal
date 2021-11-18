<?php
require_once("koneksi.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/v4-shims.css" />
  <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Cairo|Cuprum" rel="stylesheet" />
  <link rel="shortcut icon" href="./img/logosmknfix.png" type="image/x-icon" />
  <title>Jadwal Matapelajaran</title>
</head>

<body data-spy="scroll" data-target=".navbar">
  <!-- Navbar -->
  <div id="header">
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary fixed-top">
      <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#NavbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="hidden-xs">
          <a href="" class="navbar-brand ">
            <h3 class="d-none d-sm-block"><img src="./img/logosmknfix.png" width='35px' height='35px'> SMK Negeri 1 Majalaya </h3>
            <img class="d-block d-sm-none" src="./img/logosmknfix.png" width='35px' height='35px'>
          </a>
        </div>
        <div class="collapse navbar-collapse" id="NavbarCollapse">
          <ul class="nav navbar-nav ml-auto">
            <a class="my-2 my-sm-0 nav-item nav-link text-light" href="index.php"> Home </a>
            <a class="my-2 my-sm-0 nav-item nav-link text-light" href="jadwal.php"> Jadwal </a>
            <a class="my-2 my-sm-0 nav-item nav-link text-light" href="crud.php"> Mata Pelajaran </a>
            <a class="my-2 my-sm-0 nav-item nav-link text-light"> | </a>
            <?php
            if (!isset($_SESSION['id_user'])) {
            ?>
              <a class="my-2 my-sm-0 nav-item nav-link text-light" href="index.php"> Login Admin </a>
            <?php
            } else { ?>
              <a class="my-2 my-sm-0 nav-item nav-link text-light"> <?php echo $_SESSION['username'] ?> </a>
              <a class="my-2 my-sm-0 nav-item nav-link text-light" href="logout.php"> Logout </a>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- Showcase -->
  <div id="bg-img"></div>

  <!-- About Me  -->
  <div id="about">
    <div class="container">
      <div class="row">
        <div class="col">
          <div id="about-data">
            <div class="shadow-lg card bg-white ">
              <div class="card-title my-3">
                <div class="card-body">
                  <div class="media-body">
                    <h5 class=" text-center display-4">Jadwal Matapelajaran</h5> </br>
                    <form action='' method='POST'>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"> Tahun Ajaran </label>
                        <div class="col-sm-10">
                          <select class="form-control" name='tahun' id="inputEmail3" placeholder="Masukan Fasilitas">
                            <option value='2021'> 2021-2022 </option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"> Jenis </label>
                        <div class="col-sm-10">
                          <select class="form-control" name='jenis' id="inputEmail3" placeholder="Masukan Fasilitas">
                            <option value='sekolah'> Sekolah </option>
                            <option value='uts'> UTS </option>
                            <option value='uas'> UAS </option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"> Kelas </label>
                        <div class="col-sm-10">
                          <select class="form-control" name='kelas' id="inputEmail3" placeholder="Masukan Fasilitas">
                            <option value=''> </option>
                            <?php
                            $sql_kelas = mysqli_query($conn, "SELECT * FROM t_kelas") or die(mysqli_error($conn));
                            while ($kelas = mysqli_fetch_array($sql_kelas)) {
                              echo '<option value="' . $kelas['nama_kelas'] . '">' . $kelas['nama_kelas'] . '</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"> Guru </label>
                        <div class="col-sm-10">
                          <select class="form-control" name='guru' id="inputEmail3" placeholder="Masukan Fasilitas">
                            <option value=''> </option>
                            <?php
                            $sql_guru = mysqli_query($conn, "SELECT * FROM t_guru order by nama_guru asc") or die(mysqli_error($conn));
                            while ($guru = mysqli_fetch_array($sql_guru)) {
                              echo '<option value="' . $guru['nama_guru'] . '">' . $guru['nama_guru'] . '</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"> Hari </label>
                        <div class="col-sm-10">
                          <select class="form-control" name='hari' id="inputEmail3" placeholder="Masukan Fasilitas">
                            <option value=''> </option>
                            <option value='senin'> Senin </option>
                            <option value='selasa'> Selasa </option>
                            <option value='rabu'> Rabu </option>
                            <option value='kamis'> Kamis </option>
                            <option value='jumat'> Jumat </option>
                          </select>
                        </div>
                      </div>
                      <button type=submit class="col-lg-12 btn btn-primary" name='cari'> Cari</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <div class="card bg-white">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th> No </th>
                <th> Hari </th>
                <th> Waktu </th>
                <th style="width:30%"> Mata Pelajaran </th>
                <th> Guru </th>
                <th> Kelas </th>
                <th> Ruangan </th>
              </tr>
            </thead>
            <tbody>
              <?php
              include("koneksi.php");
              if (isset($_POST['cari'])) {
                $tahun = $_POST['tahun'];
                $jenis = $_POST['jenis'];
                $kelas = $_POST['kelas'];
                $guru = $_POST['guru'];
                $hari = $_POST['hari'];

                if ($tahun != "" || $jenis != "" || $kelas != "" || $guru != "" || $hari != "") {
                  $query = "SELECT t_jadwal.id_jadwal, t_jadwal.hari, t_jadwal.waktu, t_mapel.nama_mapel, t_guru.nama_guru, t_kelas.nama_kelas, t_ruangan.nama_ruangan FROM t_jadwal INNER JOIN t_mapel ON t_jadwal.id_mapel = t_mapel.id_mapel
                  INNER JOIN t_guru ON t_jadwal.id_guru = t_guru.id_guru
                  INNER JOIN t_kelas ON t_jadwal.id_kelas = t_kelas.id_kelas
                  INNER JOIN t_ruangan ON t_jadwal.id_ruangan = t_ruangan.id_ruangan WHERE t_jadwal.tahun 
                  LIKE '%$tahun%' AND  jenis 
                  LIKE '%$jenis%' AND t_kelas.nama_kelas 
                  LIKE '%$kelas%' AND t_guru.nama_guru 
                  LIKE '%$guru%' AND hari 
                  LIKE '%$hari%' 
                  order by field(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'), waktu, nama_kelas asc";
                  $data = mysqli_query($conn, $query) or die('error');
                  if (mysqli_num_rows($data) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($data)) {
                      $id = $row['id_jadwal'];
                      $hari = $row['hari'];
                      $waktu = $row['waktu'];
                      $mapel = $row['nama_mapel'];
                      $guru = $row['nama_guru'];
                      $kelas = $row['nama_kelas'];
                      $ruangan = $row['nama_ruangan'];
              ?>
                      <tr>
                        <td> <?php echo $no++; ?> </td>
                        <td> <?php echo $hari ?> </td>
                        <td> <?php echo $waktu ?> </td>
                        <td> <?php echo $mapel ?> </td>
                        <td> <?php echo $guru ?> </td>
                        <td> <?php echo $kelas ?> </td>
                        <td> <?php echo $ruangan ?> </td>
                      </tr>
                    <?php
                    }
                  } else {
                    ?>
                    <tr>
                      <td> Belum ada data</td>
                    </tr>
              <?php
                  }
                }
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-5 mb-5">
  </div>

  <!-- Footer -->
  <footer>
    <div class="container-fluid bg-primary">
      <div class="row">
        <div class="col">
          <div class="container">
            <p class="text-white text-center pt-3">
              Copyright © 2021 ALDI NOVRIADI
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap Script -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>