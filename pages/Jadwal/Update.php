<?php
session_start();
include "../../koneksi.php";
$id = addslashes($_POST['id']);
$hari = addslashes($_POST['hari']);
$masuk = addslashes($_POST['jam_masuk']);
$keluar = addslashes($_POST['jam_keluar']);

$sql = "UPDATE jadwal_karyawan SET hari = '$hari', jam_masuk = '$masuk', jam_keluar = '$keluar' 
WHERE id_jadwal = $id";
$query = $koneksi->query($sql);

if ($query == true) {
    $_SESSION["status"] = 'sukses';
    echo "<script>
    window.history.go(-1);
    </script>";
} else {
    $_SESSION["status"] = 'gagal';
    echo "<script>
    window.history.go(-1);
    </script>";
}
