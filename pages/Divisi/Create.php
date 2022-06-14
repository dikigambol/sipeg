<?php
session_start();
include "../../koneksi.php";
$namadivisi = addslashes($_POST['nama_divisi']);

$sql = "INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES (NULL, '$namadivisi');";
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
