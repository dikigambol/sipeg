<?php
session_start();
include("../../koneksi.php");
$id = $_GET['id'];

$sql = "DELETE FROM jadwal_karyawan WHERE id_jadwal = '$id'";
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
