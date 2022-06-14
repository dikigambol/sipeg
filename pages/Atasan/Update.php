<?php
session_start();
include "../../koneksi.php";
$id = addslashes($_POST['id_atasan']);
$ket = addslashes($_POST['keterangan']);

$sql = "UPDATE list_atasan SET keterangan = '$ket' WHERE id_atasan = $id";
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
