<?php
session_start();
include "../../koneksi.php";
$id = addslashes($_POST['id']);
$jenis = addslashes($_POST['jenis_prestasi']);
$ket = addslashes($_POST['ket_prestasi']);

$sql = "INSERT INTO `prestasi` (`id_prestasi`, `id_pegawai`, `jenis_prestasi`, `ket_prestasi`) 
VALUES (NULL, '$id', '$jenis', '$ket');";
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
