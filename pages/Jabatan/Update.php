<?php
session_start();
include "../../koneksi.php";
$namajabatan = addslashes($_POST['nama_jabatan']);
$id = addslashes($_POST['id_jabatan']);

$sql = "UPDATE jabatan SET nama_jabatan = '$namajabatan' WHERE id_jabatan = $id";
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
