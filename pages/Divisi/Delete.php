<?php
session_start();
include("../../koneksi.php");
$id = $_GET['id'];

$sql = "DELETE FROM divisi WHERE id_divisi = '$id'";
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
