<?php
session_start();
include "../../koneksi.php";
$id = addslashes($_POST['id']);
$jabatan = addslashes($_POST['jabatan']);
$divisi = addslashes($_POST['divisi']);
$awal = addslashes($_POST['awal']);
$akhir = addslashes($_POST['akhir']);

$sql = "INSERT INTO `riwayat_jabatan` (`id_riwayat_jabatan`, `id_pegawai`, `id_divisi`, `id_jabatan`, `periode_awal`, `periode_akhir`) 
VALUES (NULL, '$id', '$divisi', '$jabatan', '$awal', '$akhir');";
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
