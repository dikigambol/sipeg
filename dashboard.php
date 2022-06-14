<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIPEG</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template">
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <!-- prism css -->
    <link rel="stylesheet" href="assets/plugins/prism/css/prism.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- data tables css -->
    <link rel="stylesheet" href="assets/plugins/data-tables/css/datatables.min.css">
    <!-- poopins font  -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- sweetalert  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    </link>
    <!-- select 2  -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<?php
session_start();
include "koneksi.php";
include "./services/baseUrl.php";
$isLogin = $_SESSION['isLogin'] ?? '';
if ($isLogin != "logged") {
    header("location: index.php");
}
$status = $_SESSION['status'] ?? '';
$deskripsi = $_SESSION['deskripsi'] ?? 'Redirecting...';
// state 
$id_user = $_SESSION['id_user'] ?? "";
$nama_lengkap = $_SESSION['nama'] ?? "";
$username = $_SESSION['username'] ?? "";
$divisi = $_SESSION['divisi'] ?? "";
$isKepala = $_SESSION['is_kepala'] ?? "";
?>

<body class="layout-6">
    <nav class="pcoded-navbar menu-light brand-lightblue icon-colored menupos-static">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="index.html" class="b-brand">
                    <span class="b-title" style="font-size: 20px;">Sistem Pegawai</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label style="font-size: large;">Menu</label>
                    </li>
                    <?php if ($divisi == "HRD") { ?>
                        <li data-username="Need Support" class="nav-item">
                            <a href="dashboard.php" class="nav-link">
                                <span class="pcoded-micon">
                                    <i class="fa fa-user"></i></span><span class="pcoded-mtext">
                                    Pegawai
                                </span></a>
                        </li>
                        <li data-username="Need Support" class="nav-item">
                            <a href="dashboard.php?page=atasan" class="nav-link">
                                <span class="pcoded-micon">
                                    <i class="fa fa-address-book"></i></span><span class="pcoded-mtext">
                                    List Atasan
                                </span></a>
                        </li>
                        <li data-username="Need Support" class="nav-item">
                            <a href="dashboard.php?page=izinpegawai" class="nav-link">
                                <span class="pcoded-micon">
                                    <i class="fa fa-envelope-open"></i></span><span class="pcoded-mtext">
                                    Izin Pegawai
                                </span></a>
                        </li>
                        <li data-username="Need Support" class="nav-item">
                            <a href="dashboard.php?page=jadwalpegawai" class="nav-link">
                                <span class="pcoded-micon">
                                    <i class="fa fa-calendar"></i></span><span class="pcoded-mtext">
                                    Jadwal Pegawai
                                </span></a>
                        </li>
                        <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
                            <a href="#" class="nav-link"><span class="pcoded-micon">
                                    <i class="fa fa-book"></i></span><span class="pcoded-mtext">Master Data</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li><a href="dashboard.php?page=pendidikan">Data Pendidikan</a></li>
                                <li><a href="dashboard.php?page=divisi">Data Divisi</a></li>
                                <li><a href="dashboard.php?page=jabatan">Data Jabatan</a></li>
                            </ul>
                        </li>
                    <?php } else if ($divisi != "HRD" && $isKepala == "true") { ?>
                        <li data-username="Need Support" class="nav-item">
                            <a href="dashboard.php" class="nav-link">
                                <span class="pcoded-micon">
                                    <i class="fa fa-user"></i></span><span class="pcoded-mtext">
                                    Anggota
                                </span></a>
                        </li>
                        <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
                            <a href="#" class="nav-link"><span class="pcoded-micon">
                                    <i class="fa fa-envelope-open"></i></span><span class="pcoded-mtext">Izin</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li><a href="dashboard.php?page=izinanggota">Izin Anggota</a></li>
                                <li><a href="dashboard.php?page=izin">Izin Saya</a></li>
                            </ul>
                        </li>
                        <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
                            <a href="#" class="nav-link"><span class="pcoded-micon">
                                    <i class="fa fa-calendar"></i></span><span class="pcoded-mtext">Jadwal</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li><a href="dashboard.php?page=jadwalanggota">Jadwal Anggota</a></li>
                                <li><a href="dashboard.php?page=jadwal">Jadwal Saya</a></li>
                            </ul>
                        </li>
                    <?php } else if ($divisi != "HRD" || $isKepala == "false") { ?>
                        <li data-username="Need Support" class="nav-item">
                            <a href="dashboard.php?page=izin" class="nav-link">
                                <span class="pcoded-micon">
                                    <i class="fa fa-envelope-open"></i></span><span class="pcoded-mtext">
                                    Izin
                                </span></a>
                        </li>
                        <li data-username="Need Support" class="nav-item">
                            <a href="dashboard.php?page=jadwal" class="nav-link">
                                <span class="pcoded-micon">
                                    <i class="fa fa-calendar"></i></span><span class="pcoded-mtext">
                                    Jadwal
                                </span></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1"><span></span></a>
            <a class="b-brand">
                <span class="b-title" style="font-size: 22px;">Sistem Pegawai</span>
            </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="#!">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle text-light" data-toggle="dropdown">
                            <i class="icon feather icon-settings text-light mr-1"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <span><?php echo $nama_lengkap ?></span>
                                <a href="auth/Auth.php?type=logout" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="dashboard.php?page=detailpegawai&id=<?php echo $id_user ?>" class="dropdown-item"><i class="feather icon-user"></i> Profile</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>

    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- konten  -->
                    <?php include "./services/dashConfig.php"; ?>
                    <!-- end konten -->
                </div>
            </div>
        </div>
    </div>
    <!-- main content end -->

    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

    <!-- datatable Js -->
    <script src="assets/plugins/data-tables/js/datatables.min.js"></script>
    <script src="assets/js/pages/tbl-datatable-custom.js"></script>

    <!-- prism Js -->
    <script src="assets/plugins/prism/js/prism.min.js"></script>

    <!-- sweetalert  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

    <!-- select 2  -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <?php if ($status == 'sukses') { ?>
        <script>
            swal({
                title: "Berhasil!",
                type: "success",
                text: 'Redirecting...',
                timer: 2000,
                showConfirmButton: false,
                showCancelButton: false
            }).then(function() {
                window.location.reload();
            })
        </script>
    <?php } else if ($status == 'gagal') { ?>
        <script>
            swal({
                title: "Gagal!",
                type: "error",
                text: '<?php echo $deskripsi ?>',
                timer: 2000,
                showConfirmButton: false,
                showCancelButton: false
            });
        </script>
    <?php } ?>

    <?php unset($_SESSION['status']); ?>
    <?php unset($_SESSION['deskripsi']); ?>

    <script>
        $(document).ready(function() {
            $('.select-2').select2({
                dropdownParent: $("#addModal")
            });
        });
    </script>
</body>

</html>