<?php
session_start();
include "../../koneksi.php";
$id = $_GET['id'];
$type = $_GET['type'];
$status = '';

if ($type == "setujui") {
    $status = "Disetujui";
} else {
    $status = "Ditolak";
}

$sql = "UPDATE `izin_karyawan` SET `status` = '$status' WHERE id_izin = $id";
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
