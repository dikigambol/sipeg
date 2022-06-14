<?php
session_start();
include "../../koneksi.php";
$id = addslashes($_POST['id_izin']);
$jenis = addslashes($_POST['jenis_izin']);
$tgl = addslashes($_POST['tgl_izin']);
$ket = addslashes($_POST['ket_izin']);

$sql = "UPDATE izin_karyawan SET jenis_izin = '$jenis', tgl_izin = '$tgl', keterangan = '$ket' 
WHERE id_izin = $id";
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
