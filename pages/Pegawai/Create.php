<?php
session_start();
include "../../koneksi.php";
$nama = addslashes($_POST['nama']);
$username = addslashes($_POST['username']);
$password = addslashes($_POST['username']);
$noktp = addslashes($_POST['no_ktp']);
$tempatlahir = addslashes($_POST['tempat_lahir']);
$tanggallahir = addslashes($_POST['tanggal_lahir']);
$jk = addslashes($_POST['jenis_kelamin']);
$pendidikan = addslashes($_POST['pendidikan']);
$status_nikah = addslashes($_POST['status_pernikahan']);
$divisi = addslashes($_POST['divisi']);
$tanggal_masuk = addslashes($_POST['tanggal_masuk']);
$nomor_telepon = addslashes($_POST['nomor_telepon']);
$alamat_ktp = addslashes($_POST['alamat_ktp']);

$sql = "INSERT INTO `akun_karyawan` (`id_karyawan`, `nama`, `username`, `password`) 
VALUES (NULL, '$nama', '$username', '$password');";
$query = $koneksi->query($sql);

if ($query == true) {
    $getIdSql = "SELECT id_karyawan FROM akun_karyawan WHERE username = '$username';";
    $queryGetId = $koneksi->query($getIdSql);
    $data = $queryGetId->fetch_array();
    $id = $data['id_karyawan'];

    $sql2 = "INSERT INTO `detail_karyawan` (`id_detail`, `id_pegawai`, `no_ktp`, `tempat_lahir`, 
    `tanggal_lahir`, `jenis_kelamin`, `pendidikan`, `status_pernikahan`, `alamat_ktp`, `divisi`, `tanggal_masuk`, `tanggal_keluar`, `no_telepon`) 
    VALUES (NULL, '$id', '$noktp', '$tempatlahir', '$tanggallahir', '$jk', '$pendidikan', '$status_nikah', '$alamat_ktp', 
    '$divisi', '$tanggal_masuk', NULL, '$nomor_telepon');";
    $query2 = $koneksi->query($sql2);

    if ($query2 == true) {
        $_SESSION["status"] = 'sukses';
        echo "<script>
        window.history.go(-1);
        </script>";
    } else {
        $sql = "DELETE FROM akun_karyawan WHERE id_karyawan = '$id'";
        $query = $koneksi->query($sql);
        $_SESSION["status"] = 'gagal';
        $_SESSION["deskripsi"] = 'Nomor KTP telah digunakan!';
        echo "<script>
            window.history.go(-1);
            </script>";
    }
} else {
    $_SESSION["status"] = 'gagal';
    $_SESSION["deskripsi"] = 'Username telah digunakan!';
    echo "<script>
        window.history.go(-1);
        </script>";
}
