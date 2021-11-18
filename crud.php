<?php
require_once("koneksi.php");
session_start();

if (isset($_SESSION['id_user'])) {

  // HALAMAN
  $jumlahDatahalaman = 20;
  $jumlahHalaman = (618 / $jumlahDatahalaman);
  $halamanAktif = (isset($_GET["halaman"])) ? $_GET['halaman'] : 1;
  $awalData = ($jumlahDatahalaman * $halamanAktif) - $jumlahDatahalaman;

  $result = mysqli_query($conn, "SELECT * FROM t_jadwal INNER JOIN t_mapel ON t_jadwal.id_mapel = t_mapel.id_mapel
INNER JOIN t_guru ON t_jadwal.id_guru = t_guru.id_guru
INNER JOIN t_kelas ON t_jadwal.id_kelas = t_kelas.id_kelas
INNER JOIN t_ruangan ON t_jadwal.id_ruangan = t_ruangan.id_ruangan 
order by field(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'), waktu, nama_kelas  asc");



  if (isset($_POST['tambah'])) {
    $kelas = $_POST["id_kelas"];
    $guru = $_POST["id_guru"];
    $mapel = $_POST["id_mapel"];
    $ruangan = $_POST["id_ruangan"];
    $hari = $_POST["hari"];
    $waktu = $_POST["waktu"];
    $tahun = $_POST["tahun"];
    $jenis = $_POST["jenis"];


    // echo $kelas;
    // echo $mapel;
    // echo $guru;
    // echo $ruangan;
    // echo $hari;
    // echo $waktu;
    // echo $tahun;
    // echo $jenis;

    $query = "INSERT INTO `t_jadwal`(`id_jadwal`, `id_kelas`, `id_guru`, `id_mapel`, `id_ruangan`, `hari`, `waktu`, `tahun`, `jenis`) 
  VALUES ('NULL', $kelas, $guru, $mapel, $ruangan,'$hari','$waktu','$tahun','$jenis')";

    $result2 = $conn->query($query);
    echo mysqli_error($conn);

    if ($result) {
      echo "<script> alert('Data berhasil ditambahkan'); 
            document.location.href = 'crud.php';
      </script>";
    } else {
      echo "<script> alert('Data Gagal ditambahkan'); 
      document.location.href = 'crud.php';
  </script>";
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/v4-shims.css" />
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Cairo|Cuprum" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.jqueryui.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.5/css/scroller.jqueryui.min.css" />




    <link rel="shortcut icon" href="./img/logosmknfix.png" type="image/x-icon" />
    <title>Kelola Matapelajaran</title>
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
          </div>
        </div>
      </div>
    </div>


    <!-- TAMBAH MATA PELAJARAN -->
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card bg-white">
            <h5 class=" text-center display-4 mt-4">Kelola Mata Pelajaran</h5> </br>


            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#tambah">Tambah</button> </br>
            <div id='tambah' class="modal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"> Tambah Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div id="about-data">
                      <div class="shadow-lg card bg-white ">
                        <div class="card-title my-9">
                          <div class="card-body">
                            <div class="media-body">

                              <form action='' method='POST'>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-2 col-form-label"> Tahun Ajaran </label>
                                  <div class="col-sm-10">
                                    <select class="form-control" name='tahun' id="inputEmail3" placeholder="Masukan Fasilitas">
                                      <option value='2021 - 2022'> 2021 - 2022 </option>
                                      <option value='2022 - 2023'> 2022 - 2023 </option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-2 col-form-label"> Jenis </label>
                                  <div class="col-sm-10">
                                    <select class="form-control" name='jenis' id="inputEmail3" placeholder="Masukan Jenis">
                                      <option value='Sekolah'> Sekolah </option>
                                      <option value='UTS'> UTS </option>
                                      <option value='UAS'> UAS </option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-2 col-form-label"> Hari </label>
                                  <div class="col-sm-10">
                                    <select class="form-control" name='hari' id="inputEmail3" placeholder="Masukan Fasilitas">
                                      <option value='Senin'> Senin </option>
                                      <option value='Selasa'> Selasa </option>
                                      <option value='Rabu'> Rabu </option>
                                      <option value='Kamis'> Kamis </option>
                                      <option value='Jumat'> Jum'at </option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputNama" class="col-sm-2 col-form-label">Waktu </label>
                                  <div class="col-sm-10">
                                    <select class="form-control" name='waktu' id="inputEmail3" placeholder="Masukan Fasilitas">
                                      <option value='07.00 - 09-00'> 07.00 - 09.00 </option>
                                      <option value='09.00 - 11-00'> 09.00 - 11.00 </option>
                                      <option value='11.00 - 13-00'> 11.00 - 13.00 </option>
                                      <option value='13.00 - 15-00'> 13.00 - 15.00 </option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputPassword" class="col-sm-2 col-form-label">Mata Pelajaran </label>
                                  <div class="col-sm-10">
                                    <select class="form-control" name='id_mapel' id="inputEmail3" placeholder="Masukan Fasilitas">
                                      <option value=''> </option>
                                      <?php
                                      $sql_mapel = mysqli_query($conn, "SELECT * FROM t_mapel") or die(mysqli_error($conn));
                                      while ($mapel = mysqli_fetch_array($sql_mapel)) {
                                        echo '<option value="' . $mapel['id_mapel'] . '">' . $mapel['nama_mapel'] . '</option>';
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputNama" class="col-sm-2 col-form-label"> Guru </label>
                                  <div class="col-sm-10">
                                    <select class="form-control" name='id_guru' id="inputEmail3" placeholder="Masukan Fasilitas">
                                      <option value=''> </option>
                                      <?php
                                      $sql_guru = mysqli_query($conn, "SELECT * FROM t_guru") or die(mysqli_error($conn));
                                      while ($guru = mysqli_fetch_array($sql_guru)) {
                                        echo '<option value="' . $guru['id_guru'] . '">' . $guru['nama_guru'] . '</option>';
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputNama" class="col-sm-2 col-form-label"> Kelas </label>
                                  <div class="col-sm-10">
                                    <select class="form-control" name='id_kelas' id="inputEmail3" placeholder="Masukan Fasilitas">
                                      <option value=''> </option>
                                      <?php
                                      $sql_kelas = mysqli_query($conn, "SELECT * FROM t_kelas") or die(mysqli_error($conn));
                                      while ($kelas = mysqli_fetch_array($sql_kelas)) {
                                        echo '<option value="' . $kelas['id_kelas'] . '">' . $kelas['nama_kelas'] . '</option>';
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputNama" class="col-sm-2 col-form-label" value="<?= $row["ruangan"]; ?>"> Ruangan </label>
                                  <div class="col-sm-10">
                                    <select class="form-control" name='id_ruangan' id="inputEmail3" placeholder="Masukan Fasilitas">
                                      <option value=''> </option>
                                      <?php
                                      $sql_ruangan = mysqli_query($conn, "SELECT * FROM t_ruangan") or die(mysqli_error($conn));
                                      while ($ruangan = mysqli_fetch_array($sql_ruangan)) {
                                        echo '<option value="' . $ruangan['id_ruangan'] . '">' . $ruangan['nama_ruangan'] . '</option>';
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name='tambah' value='tambah'>Tambah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <table class="table table-striped table-hover" id="example">

              <thead>
                <tr>
                  <th> No </th>
                  <th> Hari </th>
                  <th> Waktu </th>
                  <th style="width:30%"> Mata Pelajaran </th>
                  <th> Guru </th>
                  <th> Kelas </th>
                  <th> Ruangan </th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <p>sas</p>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- EDIT MATA PELAJARAN -->

            <div id='edit' class="modal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"> Edit Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div id="about-data">
                      <div class="shadow-lg card bg-white ">
                        <div class="card-title my-9">
                          <div class="card-body">
                            <div class="media-body">
                              <form action='edit.php?id_jadwal=<?= $row['id_jadwal']; ?>' method='POST'>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-2 col-form-label"> Tahun Ajaran </label>
                                  <div class="col-sm-10">
                                    <select class="form-control" name='tahun' id="inputEmail3" placeholder="Masukan Fasilitas" value="<?= $row['tahun']; ?>">
                                      <option value='2021 - 2022'> 2020-2021 </option>
                                      <option value='2022 - 2023'> 2021-2022 </option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-2 col-form-label"> Jenis </label>
                                  <div class="col-sm-10">
                                    <select class="form-control" name='jenis' id="inputEmail3" placeholder="Masukan Jenis" value="<?= $row['jenis']; ?>">
                                      <option value='Sekolah'> Sekolah </option>
                                      <option value='UTS'> UTS </option>
                                      <option value='UAS'> UAS </option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-2 col-form-label"> Hari </label>
                                  <div class="col-sm-10">
                                    <select class="form-control" name='hari' id="inputEmail3" placeholder="Masukan Fasilitas" value="<?= $row['hari']; ?>">
                                      <option value='Senin'> Senin </option>
                                      <option value='Selasa'> Selasa </option>
                                      <option value='Rabu'> Rabu </option>
                                      <option value='Kamis'> Kamis </option>
                                      <option value='Jumat'> Jum'at </option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputNama" class="col-sm-2 col-form-label">Waktu </label>
                                  <div class="col-sm-10">
                                    <select class="form-control" name='waktu' id="inputEmail3" placeholder="Masukan Fasilitas" value="<?= $row['waktu']; ?>">
                                      <option value='07:00-09-00'> 07:00 - 09:00 </option>
                                      <option value='09:00-11-00'> 09:00 - 11-00 </option>
                                      <option value='11:00-13-00'> 11:00 - 13-00 </option>
                                      <option value='13:00-15-00'> 13:00 - 15-00 </option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputPassword" class="col-sm-2 col-form-label">Mata Pelajaran </label>
                                  <div class="col-sm-10">
                                    <select name="nama_mapel" class="form-control" required>
                                      <?php $query_mapel = mysqli_query($conn, "SELECT * FROM t_mapel");
                                      while ($mapel = mysqli_fetch_assoc($query_mapel)) {
                                      ?>
                                        <option value="<?= $mapel['id_mapel'] ?>" <?= $row['id_mapel'] == $mapel['id_mapel'] ? 'selected' : '' ?>> <?= $mapel['nama_mapel'] ?> </option>

                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputNama" class="col-sm-2 col-form-label"> Guru </label>
                                  <div class="col-sm-10">
                                    <select name="nama_guru" class="form-control" required>
                                      <?php $query_guru = mysqli_query($conn, "SELECT * FROM t_guru");
                                      while ($guru = mysqli_fetch_assoc($query_guru)) {
                                      ?>
                                        <option value="<?= $guru['id_guru'] ?>" <?= $row['id_guru'] == $guru['id_guru'] ? 'selected' : '' ?>> <?= $guru['nama_guru'] ?> </option>

                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputNama" class="col-sm-2 col-form-label"> Kelas </label>
                                  <div class="col-sm-10">
                                    <select name="nama_kelas" class="form-control" required>
                                      <?php $query_kelas = mysqli_query($conn, "SELECT * FROM t_kelas");
                                      while ($kelas = mysqli_fetch_assoc($query_kelas)) {
                                      ?>
                                        <option value="<?= $kelas['id_kelas'] ?>" <?= $row['id_kelas'] == $kelas['id_kelas'] ? 'selected' : '' ?>> <?= $kelas['nama_kelas'] ?> </option>

                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputNama" class="col-sm-2 col-form-label"> Ruangan </label>
                                  <div class="col-sm-10">
                                    <select name="nama_ruangan" class="form-control" required>
                                      <?php $query_ruangan = mysqli_query($conn, "SELECT * FROM t_ruangan");
                                      while ($ruangan = mysqli_fetch_assoc($query_ruangan)) {
                                      ?>
                                        <option value="<?= $ruangan['id_ruangan'] ?>" <?= $row['id_ruangan'] == $ruangan['id_ruangan'] ? 'selected' : '' ?>> <?= $ruangan['nama_ruangan'] ?> </option>

                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name='edit' value='tambah'>Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                  </div>
                </div>
              </div>

              <!--  Navigasi -->

            </div>
          </div>
        </div>
      </div>

      <div class=" container mt-5 mb-5">
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
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.3/js/dataTables.jqueryui.min.js"></script>
      <script src="https://cdn.datatables.net/scroller/2.0.5/js/dataTables.scroller.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script>
        $(document).ready(function() {
          var data = [];
          var no = 1;
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            data.push([no, <?php echo json_encode($row['hari']); ?>, <?php echo json_encode($row['waktu']); ?>, <?php echo json_encode($row['nama_mapel']); ?>, <?php echo json_encode($row['nama_guru']); ?>, <?php echo json_encode($row['nama_kelas']); ?>,
              <?php echo json_encode($row['nama_ruangan']); ?>, <?php echo json_encode($row['id_jadwal']); ?>,
            ]);
            no++;
          <?php endwhile ?>

          var table = $('#example').DataTable({
            data: data,
            deferRender: true,
            columnDefs: [{
              "targets": -1,
              "data": null,
              "defaultContent": "<a class='editMapel' href='javascript:void(0)' data-toggle='modal' data-target=''><i class='fa fa-edit'></i></a> <a class='deleteMapel' href='javascript:void(0)'> <i class = 'fa fa-trash ml-2 text-danger'> </i> </a > "
            }]
          });

          $('#example tbody').on('click', '.deleteMapel', function() {
            var data = table.row($(this).parents('tr')).data();
            console.log(data[7]);
            $(this).attr("href", "delete.php?id_jadwal=" + data[7]);
          });

          $('#example tbody').on('click', '.editMapel', function() {
            var data = table.row($(this).parents('tr')).data();
            console.log(data[7]);
            $(this).attr("data-target", "#edit" + data[7]);
          });
        });
      </script>
    <?php } ?>
  </body>

  </html>