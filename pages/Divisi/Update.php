<?php
session_start();
include "../../koneksi.php";
$namadivisi = addslashes($_POST['nama_divisi']);
$id = addslashes($_POST['id_divisi']);

$sql = "UPDATE divisi SET nama_divisi = '$namadivisi' WHERE id_divisi = $id";
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
