<?php
require_once("koneksi.php");
$id = $_GET['id_jadwal'];
$query = "DELETE FROM t_jadwal where id_jadwal ='$id'";
$result = $conn->query($query);
if ($result) {
    echo "<script> alert('Data berhasil dihapus'); 
          document.location.href = 'crud.php';
    </script>";
} else {
    echo "<script> alert('Data Gagal dihapus'); 
    document.location.href = 'crud.php';
</script>";
    header('location:crud.php');
}
