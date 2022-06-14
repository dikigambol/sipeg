<?php
session_start();
include "../../koneksi.php";
$id = addslashes($_POST['id']);
$jenis = addslashes($_POST['jenis_izin']);
$tgl = addslashes($_POST['tgl_izin']);
$ket = addslashes($_POST['ket_izin']);

$sql = "INSERT INTO `izin_karyawan` (`id_izin`, `id_pegawai`, `jenis_izin`, `tgl_izin`, `keterangan`, `status`) 
VALUES (NULL, '$id', '$jenis', '$tgl', '$ket', 'Belum Disetujui');";
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
