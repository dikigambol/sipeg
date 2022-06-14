<?php
session_start();
include "../../koneksi.php";
$id = addslashes($_POST['id']);
$jenis = addslashes($_POST['jenis_prestasi']);
$ket = addslashes($_POST['ket_prestasi']);

$sql = "UPDATE prestasi SET jenis_prestasi = '$jenis', ket_prestasi = '$ket' 
WHERE id_prestasi = $id";
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
