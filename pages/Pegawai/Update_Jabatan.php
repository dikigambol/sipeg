<?php
session_start();
include "../../koneksi.php";
$id = addslashes($_POST['id']);
$jabatan = addslashes($_POST['jabatan']);
$divisi = addslashes($_POST['divisi']);
$awal = addslashes($_POST['awal']);
$akhir = addslashes($_POST['akhir']);

$sql = "UPDATE riwayat_jabatan SET id_jabatan = '$jabatan', id_divisi = '$divisi', 
periode_awal = '$awal', periode_akhir = '$akhir' WHERE id_riwayat_jabatan = $id";
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
