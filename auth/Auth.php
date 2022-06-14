<?php
session_start();
include "../koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$type = $_GET['type'];
if ($type == "login") {
    $sql = "SELECT * FROM akun_karyawan INNER JOIN detail_karyawan 
    ON akun_karyawan.id_karyawan = detail_karyawan.id_pegawai INNER JOIN divisi 
    ON detail_karyawan.divisi = divisi.id_divisi WHERE akun_karyawan.username = '$username' 
    AND akun_karyawan.password = '$password';";
    $query = $koneksi->query($sql);
    if (mysqli_num_rows($query) == 1) {
        $data = $query->fetch_array();
        $id = $data['id_karyawan'];
        $isKepala = "false";
        $sqlSearch = "SELECT * FROM list_atasan WHERE id_pegawai = '$id'";
        $querySearch = $koneksi->query($sqlSearch);
        if (mysqli_num_rows($querySearch) == 1) {
            $isKepala = "true";
        }
        $_SESSION['id_user'] = $id;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['divisi'] = $data['nama_divisi'];
        $_SESSION['is_kepala'] = $isKepala;
        $_SESSION['isLogin'] = 'logged';
        header("location:../dashboard.php");
    } else {
        $_SESSION["status"] = 'gagal';
        header("location:../index.php");
    }
} else if ($type == "logout") {
    unset($_SESSION['id_user']);
    unset($_SESSION['nama']);
    unset($_SESSION['username']);
    unset($_SESSION['divisi']);
    unset($_SESSION['is_kepala']);
    unset($_SESSION['isLogin']);
    header("location:../index.php");
}
