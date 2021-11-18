<?php
  require_once("koneksi.php");
  if(isset($_POST['Buat'])) {
    $nama = $_POST['Nama'];
    $email = $_POST['Email'];
    $nomor = $_POST['Nomor'];
    $tanggal = $_POST['Tanggal'];
    $password = $_POST['Password'];
    $alamat = $_POST['Alamat'];
    $role = 1;

    $sql = "INSERT into akun values(NULL,'$nama','$email','$nomor','$tanggal','$password','$alamat','$role')";
    $result = $conn->query($sql);
    if($result==TRUE){
      header('location:index.php');
    } else{
      die('Anda salah');
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.10.0/css/v4-shims.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Cairo|Cuprum"
      rel="stylesheet"
    />
    <link rel="shortcut icon" href="./img/icon/icon.png" type="image/x-icon" />
    <title>Buat Akun</title>
  </head>
  <body data-spy="scroll" data-target=".navbar">
    <!-- Navbar -->
    <div id="header">
      <nav class="navbar navbar-expand-sm navbar-dark bg-primary fixed-top">
        <div class="container">
          <button
            class="navbar-toggler"
            data-toggle="collapse"
            data-target="#Navbar"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <a href="#" class="navbar-brand"><h2>Buat Akun</h2></a>
          <ul class="nav navbar-nav navbar-right">
          <a class="my-2 my-sm-0 nav-item nav-link" href="index.php"> Beranda </a>
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
                <div class="card-title my-5">
                <div class="card-body"> 

                    <div class="media-body">
                      <h5 class=" text-center display-4">Buat Akun</h5> </br>
                      <form action='' method='POST'>
            <div class="form-group row">
              <label for="inputNama" class="col-sm-2 col-form-label">Nama </label>
              <div class="col-sm-10">
                <input type="text" name='Nama' class="form-control" id="inputNama" placeholder="Masukan Nama">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email </label>
              <div class="col-sm-10">
                <input type="email" name='Email' class="form-control" id="inputEmail" placeholder="Masukan Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputNama" class="col-sm-2 col-form-label">Nomor HP </label>
              <div class="col-sm-10">
                <input type="number" name='Nomor' class="form-control" id="inputNama" placeholder="Masukan Nomor HP">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputNama" class="col-sm-2 col-form-label">Tanggal Lahir </label>
              <div class="col-sm-10">
                <input type=date name='Tanggal' class="form-control" id="inputNama" placeholder="Masukan Tanggal Lahir">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Password </label>
              <div class="col-sm-10">
                <input type="password" name='Password' class="form-control" id="inputPassword" placeholder="Masukan Password">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputNama" class="col-sm-2 col-form-label">Alamat </label>
              <div class="col-sm-10">
                <input type="text" name='Alamat' class="form-control" id="inputNama" placeholder="Masukan Alamat">
              </div>
            </div>
          <button type=submit class="col-lg-12 btn btn-primary" name='Buat' value=Buat> Buat Akun </button> 
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

      <div class="container mt-5 mb-5">
    </div>

    <!-- Footer -->
    <footer>
      <div class="container-fluid bg-primary">
        <div class="row">
          <div class="col">
            <div class="container">
              <p class="text-white text-center pt-3">
                Copyright © 2021 VILLARIAN
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap Script -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
