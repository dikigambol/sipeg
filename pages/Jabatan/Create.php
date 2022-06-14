<?php
session_start();
include "../../koneksi.php";
$namajabatan = addslashes($_POST['nama_jabatan']);

$sql = "INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES (NULL, '$namajabatan');";
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
