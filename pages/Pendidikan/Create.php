<?php
session_start();
include "../../koneksi.php";
$namapendidikan = addslashes($_POST['nama_pendidikan']);

$sql = "INSERT INTO `pendidikan` (`id_pendidikan`, `nama_pendidikan`) VALUES (NULL, '$namapendidikan');";
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
