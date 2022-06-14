<?php
$sql = "SELECT * FROM izin_karyawan INNER JOIN akun_karyawan 
ON izin_karyawan.id_pegawai = akun_karyawan.id_karyawan INNER JOIN detail_karyawan 
ON akun_karyawan.id_karyawan = detail_karyawan.id_pegawai INNER JOIN divisi 
ON detail_karyawan.divisi = divisi.id_divisi";
$query = $koneksi->query($sql);
$no = 1;
?>

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Izin Pegawai</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Izin</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-body">
    <div class="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card lay-customizer">
                    <div class="card-block">
                        <div class="table-responsive">
                            <table id="zero-configuration" class="display table dt-responsive nowrap table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Izin</th>
                                        <th>Tanggal Izin</th>
                                        <th>Keterangan Izin</th>
                                        <th>Status Izin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($data = $query->fetch_array()) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $no++ ?>
                                            </td>
                                            <td>
                                                <?php echo $data['nama'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['jenis_izin'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['tgl_izin'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['keterangan'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['status'] ?>
                                            </td>
                                            <td>
                                                <?php if ($data['status'] == "Belum Disetujui") { ?>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Pilih
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="<?php echo $base_url ?>pages/IzinPegawai/Acc.php?id=<?php echo $data['id_izin']?>&type=setujui" 
                                                            onclick="return confirm('Anda yakin ingin menyetujui ?')">Setujui</a>
                                                            <a class="dropdown-item" href="<?php echo $base_url ?>pages/IzinPegawai/Acc.php?id=<?php echo $data['id_izin']?>&type=tolak" 
                                                            onclick="return confirm('Anda yakin ingin menolak ?')">Tolak</a>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <button class="btn btn-primary btn-sm" disabled>
                                                        Confirmed
                                                    </button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endwhile ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>