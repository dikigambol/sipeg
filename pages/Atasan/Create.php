<?php
session_start();
include "../../koneksi.php";
$id = addslashes($_POST['id']);
$keterangan = addslashes($_POST['keterangan']);

$sqlGetDivisi = "SELECT * FROM detail_karyawan INNER JOIN akun_karyawan 
ON detail_karyawan.id_pegawai = akun_karyawan.id_karyawan INNER JOIN divisi 
ON detail_karyawan.divisi = divisi.id_divisi WHERE detail_karyawan.id_pegawai = $id";
$queryDivisi = $koneksi->query($sqlGetDivisi);
$dataDivisi = $queryDivisi->fetch_array();
$divisi = $dataDivisi['nama_divisi'] ?? '';

$sqlSearch = "SELECT * FROM list_atasan WHERE divisi = '$divisi'";
$querySearch = $koneksi->query($sqlSearch);

if (mysqli_num_rows($querySearch) == 1) {
    $sqlDelete = "DELETE FROM list_atasan WHERE divisi = '$divisi'";
    $queryDelete = $koneksi->query($sqlDelete);
    if ($queryDelete == true) {
        $sql = "INSERT INTO `list_atasan` (`id_atasan`, `id_pegawai`, `divisi`, `keterangan`) VALUES (NULL, '$id', '$divisi', '$keterangan');";
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
    }
} else {
    $sql = "INSERT INTO `list_atasan` (`id_atasan`, `id_pegawai`, `divisi`, `keterangan`) VALUES (NULL, '$id', '$divisi', '$keterangan');";
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
}
