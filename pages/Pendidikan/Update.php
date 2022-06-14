<?php
session_start();
include "../../koneksi.php";
$namapendidikan = addslashes($_POST['nama_pendidikan']);
$id = addslashes($_POST['id_pendidikan']);

$sql = "UPDATE pendidikan SET nama_pendidikan = '$namapendidikan' WHERE id_pendidikan = $id";
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
