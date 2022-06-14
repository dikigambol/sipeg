<?php
$sql = "SELECT * FROM akun_karyawan INNER JOIN detail_karyawan 
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
                    <h5 class="m-b-10">Jadwal Anggota</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Jadwal</a>
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
                                        <th>Divisi</th>
                                        <th>Status Jadwal</th>
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
                                                <?php echo $data['nama_divisi'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                $idPeg = $data['id_karyawan'];
                                                $sqlSearch = "SELECT * FROM jadwal_karyawan WHERE id_pegawai = '$idPeg'";
                                                $querySearch = $koneksi->query($sqlSearch);
                                                if (mysqli_num_rows($querySearch) > 0) {
                                                    echo "Sudah Ada";
                                                } else {
                                                    echo "Belum Ada";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Pilih
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modal<?php echo $data['id_karyawan'] ?>">Detail</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="Modal<?php echo $data['id_karyawan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">List Jadwal</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php
                                                        $idPeg2 = $data['id_karyawan'];
                                                        $sql2 = "SELECT * FROM jadwal_karyawan WHERE id_pegawai = $idPeg2";
                                                        $query2 = $koneksi->query($sql2);
                                                        $no2 = 1;
                                                        ?>
                                                        <?php while ($data2 = $query2->fetch_array()) : ?>
                                                            <p><?php echo $no2++ ?>. <?php echo $data2['hari'] ?>, <?php echo $data2['jam_masuk'] ?> - <?php echo $data2['jam_keluar'] ?></p>
                                                        <?php endwhile ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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