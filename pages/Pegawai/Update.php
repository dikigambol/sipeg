<?php
session_start();
include "../../koneksi.php";
$id = addslashes($_POST['id']);
$nama = addslashes($_POST['nama']);
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);
$noktp = addslashes($_POST['no_ktp']);
$tempatlahir = addslashes($_POST['tempat_lahir']);
$tanggallahir = addslashes($_POST['tanggal_lahir']);
$jk = addslashes($_POST['jenis_kelamin']);
$pendidikan = addslashes($_POST['pendidikan']);
$status_nikah = addslashes($_POST['status_pernikahan']);
$divisi = addslashes($_POST['divisi']);
$tanggal_masuk = addslashes($_POST['tanggal_masuk']);
$tanggal_keluar = addslashes($_POST['tanggal_keluar']);
$nomor_telepon = addslashes($_POST['nomor_telepon']);
$alamat_ktp = addslashes($_POST['alamat_ktp']);

$pass = "";

if ($password != '') {
    $pass = ", password = '$password'";
}

$sql = "UPDATE akun_karyawan SET nama = '$nama'$pass WHERE id_karyawan = $id";
$query = $koneksi->query($sql);
if ($query == true) {
    $_SESSION['nama'] = $nama;
    $sql2 = "UPDATE `detail_karyawan` SET `no_ktp` = '$noktp', `tempat_lahir` = '$tempatlahir', `tanggal_lahir` = '$tanggallahir', 
    `jenis_kelamin` = '$jk', `pendidikan` = '$pendidikan', `status_pernikahan` = '$status_nikah', `alamat_ktp` = '$alamat_ktp', 
    `divisi` = '$divisi', `tanggal_masuk` = '$tanggal_masuk', `tanggal_keluar` = '$tanggal_keluar', `no_telepon` = '$nomor_telepon' 
    WHERE `id_pegawai` = $id;";
    $query2 = $koneksi->query($sql2);
    if ($query2 == true) {
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
} else {
    $_SESSION["status"] = 'gagal';
    echo "<script>
window.history.go(-1);
</script>";
}
