<?php
require_once("koneksi.php");
session_start();

$sql = "SELECT * FROM t_jadwal";

$result = $conn->query($sql);
$no = 1;
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
  <title>Home</title>
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
              <a class="my-2 my-sm-0 nav-item nav-link text-light" data-toggle="modal" data-target="#login" href="#"> Login Admin </a>
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
  <div class="bg-g text-center text-light">
    <div class="container">
      <h1 class="display-3">. </h1>
      <a href='https://www.instagram.com/smkn1mjly/'> <img src="./img/logosmknfix.png" width='150px' height='150px'> </a>
      <h1 class="display-4">SMK NEGERI 1 MAJALAYA</h1>
      <p class="lead">THE BEST SCHOOL</p>
      <p class="lead">Jl. H.Idris No.99 Desa Sukamukti, Kecamatan Majalaya, Kabupaten Bandung, Jawa Barat 40382 </br> (022) 5952443 </p>

      </br>
      <div class="row">
        <div class="col-sm-1.5">
          <a href='https://www.instagram.com/tbsm_skone/'> <img class="card-img-top" src="./img/logotbsmfix.png" width='75px' height='75px'> </a>
        </div>
        <div class="col-sm-1.5 offset-sm-2">
          <a href='https://www.instagram.com/titl_smkn1majalaya/'> <img class="card-img-top" src="./img/logotitlfix.png" width='75px' height='75px'> </a>
        </div>
        <div class="col-sm-1.5 offset-sm-2">
          <a href='https://www.instagram.com/mm.smkn1majalaya.official/'> <img class="card-img-top" src="./img/logotmmfix.png" width='75px' height='75px'> </a>
        </div>
        <div class="col-sm-1.5 offset-sm-2">
          <a href='https://www.instagram.com/tkj.smkn1majalaya.official/'> <img class="card-img-top" src="./img/logotkjfix.png" width='75px' height='75px'> </a>
        </div>
        <div class="col-sm-1.5 offset-sm-2">
          <a href='https://www.instagram.com/teismkn1majalaya/'> <img class="card-img-top" src="./img/logoteifix.png" width='75px' height='75px'> </a>
        </div>

      </div>
    </div>
  </div>

  <div class="modal" id="login" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action='login.php' method='POST'>
            <div class="form-group row">
              <label for="inputUsername" class="col-sm-2 col-form-label">Username </label>
              <div class="col-sm-10">
                <input type="username" name='username' class="form-control" id="inputUsername" placeholder="Masukan Username">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Password </label>
              <div class="col-sm-10">
                <input type="password" name='password' class="form-control" id="inputPassword" placeholder="Masukan Password">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name='login'>Login</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </form>
        </div>
      </div>
    </div>
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