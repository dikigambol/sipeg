<?php
session_start();
include "../../koneksi.php";
$id = addslashes($_POST['id']);
$hari = addslashes($_POST['hari']);
$masuk = addslashes($_POST['jam_masuk']);
$keluar = addslashes($_POST['jam_keluar']);

$sql = "INSERT INTO `jadwal_karyawan` (`id_jadwal`, `id_pegawai`, `hari`, `jam_masuk`, `jam_keluar`) 
VALUES (NULL, '$id', '$hari', '$masuk', '$keluar');";
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
