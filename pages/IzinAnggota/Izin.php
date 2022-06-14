<?php
$sql = "SELECT * FROM izin_karyawan INNER JOIN akun_karyawan 
ON izin_karyawan.id_pegawai = akun_karyawan.id_karyawan INNER JOIN detail_karyawan 
ON akun_karyawan.id_karyawan = detail_karyawan.id_pegawai INNER JOIN divisi 
ON detail_karyawan.divisi = divisi.id_divisi WHERE divisi.nama_divisi = '$divisi'
AND akun_karyawan.id_karyawan NOT IN ($id_user)";
$query = $koneksi->query($sql);
$no = 1;
?>

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Izin Anggota</h5>
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