<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
$defPage = "";

if ($divisi == "HRD") {
    $defPage = "./pages/Pegawai/Pegawai.php";
} else if ($divisi != "HRD" && $isKepala == "true") {
    $defPage = "./pages/Anggota/Anggota.php";
} else if ($divisi != "HRD" && $isKepala == "false") {
    $defPage = "./pages/Izin/Izin.php";
}

switch ($page) {
    case 'pendidikan':
        include "./pages/Pendidikan/Pendidikan.php";
        break;
    case 'jabatan':
        include "./pages/Jabatan/Jabatan.php";
        break;
    case 'divisi':
        include "./pages/Divisi/Divisi.php";
        break;
    case 'tambahpegawai':
        include "./pages/Pegawai/Tambah_Pegawai.php";
        break;
    case 'detailpegawai':
        include "./pages/Pegawai/Detail_Pegawai.php";
        break;
    case 'atasan':
        include "./pages/Atasan/Atasan.php";
        break;
    case 'izin':
        include "./pages/Izin/Izin.php";
        break;
    case 'jadwal':
        include "./pages/Jadwal/Jadwal.php";
        break;
    case 'izinpegawai':
        include "./pages/IzinPegawai/Izin.php";
        break;
    case 'jadwalpegawai':
        include "./pages/JadwalPegawai/Jadwal.php";
        break;
    case 'izinanggota':
        include "./pages/IzinAnggota/Izin.php";
        break;
    case 'jadwalanggota':
        include "./pages/JadwalAnggota/Jadwal.php";
        break;
    default:
        include $defPage;
}
