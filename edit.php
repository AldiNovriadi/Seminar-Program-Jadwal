<?php
require_once("koneksi.php");

if (isset($_GET["id_jadwal"])) {
    print_r($_POST);
    $id = $_GET['id_jadwal'];
    $tahun = $_POST['tahun'];
    $jenis = $_POST['jenis'];
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];
    $mapel = $_POST['nama_mapel'];
    $guru = $_POST['nama_guru'];
    $kelas = $_POST['nama_kelas'];
    $ruangan = $_POST['nama_ruangan'];
    $query = "UPDATE t_jadwal set tahun='$tahun' , jenis='$jenis' , hari='$hari', waktu='$waktu', id_mapel='$mapel', id_guru='$guru', id_kelas='$kelas', id_ruangan='$ruangan' WHERE id_jadwal='$id'
";

    $jadwal = $conn->query($query);
    // echo mysqli_error($conn);
    if ($jadwal) {
        echo "<script> alert('Data berhasil diedit'); 
          document.location.href = 'crud.php';
    </script>";
    } else {
        echo "<script> alert('Data Gagal diedit'); 
    document.location.href = 'crud.php';
</script>";
        header('location:crud.php');
    }
}
