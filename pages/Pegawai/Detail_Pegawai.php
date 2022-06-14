<?php
$type = $_GET['type'] ?? '';

$sqlPendidikan = "SELECT * FROM pendidikan";
$queryPendidikan = $koneksi->query($sqlPendidikan);

$sqlDivisi = "SELECT * FROM divisi";
$queryDivisi = $koneksi->query($sqlDivisi);

$sqlDivisi2 = "SELECT * FROM divisi";
$queryDivisi2 = $koneksi->query($sqlDivisi2);

$sqlDivisi3 = "SELECT * FROM divisi";
$queryDivisi3 = $koneksi->query($sqlDivisi3);

$sqlJabatan = "SELECT * FROM jabatan";
$queryJabatan = $koneksi->query($sqlJabatan);

$sqlJabatan2 = "SELECT * FROM jabatan";
$queryJabatan2 = $koneksi->query($sqlJabatan2);

$id = $_GET['id'];
$no = 1;
$no2 = 1;

$sqlDetail = "SELECT * FROM detail_karyawan INNER JOIN akun_karyawan 
ON detail_karyawan.id_pegawai = akun_karyawan.id_karyawan INNER JOIN divisi 
ON detail_karyawan.divisi = divisi.id_divisi WHERE detail_karyawan.id_pegawai = $id";
$queryDetail = $koneksi->query($sqlDetail);
$dataDetail = $queryDetail->fetch_array();

$sqlRiwayatJabatan = "SELECT * FROM riwayat_jabatan INNER JOIN divisi ON riwayat_jabatan.id_divisi = divisi.id_divisi 
INNER JOIN jabatan ON riwayat_jabatan.id_jabatan = jabatan.id_jabatan WHERE riwayat_jabatan.id_pegawai = $id";
$queryRiwayatJabatan = $koneksi->query($sqlRiwayatJabatan);

$sqlPrestasi = "SELECT * FROM prestasi WHERE id_pegawai = $id";
$queryPrestasi = $koneksi->query($sqlPrestasi);
?>

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Detail Pegawai</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Pegawai</a></li>
                    <li class="breadcrumb-item"><a href="#!">Detail Pegawai</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-body">
    <div class="page-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Profil Pegawai</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo $base_url ?>pages/Pegawai/Update.php" method="POST">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $dataDetail['id_karyawan'] ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" value="<?php echo $dataDetail['nama'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" value="<?php echo $dataDetail['username'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor KTP</label>
                                        <input type="number" class="form-control" name="no_ktp" value="<?php echo $dataDetail['no_ktp'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $dataDetail['tempat_lahir'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $dataDetail['tanggal_lahir'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="">- pilih -</option>
                                            <?php
                                            $valJK = $dataDetail['jenis_kelamin'];
                                            ?>
                                            <option <?php if ($valJK == "Laki-Laki") {
                                                        echo "selected";
                                                    } ?> value="Laki-Laki">Laki-Laki</option>
                                            <option <?php if ($valJK == "Perempuan") {
                                                        echo "selected";
                                                    } ?> value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pendidikan</label>
                                        <select name="pendidikan" class="form-control">
                                            <option value="">- pilih -</option>
                                            <?php
                                            $pendidikanId = $dataDetail['pendidikan'];
                                            while ($data = $queryPendidikan->fetch_array()) {
                                                $selected = "";
                                                if ($pendidikanId == $data['id_pendidikan']) {
                                                    $selected = "selected";
                                                }
                                            ?>
                                                <option <?php echo $selected; ?> value="<?php echo $data['id_pendidikan'] ?>">
                                                    <?php echo $data['nama_pendidikan'] ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status Pernikahan</label>
                                        <select name="status_pernikahan" class="form-control">
                                            <option value="">- pilih -</option>
                                            <?php
                                            $valSN = $dataDetail['status_pernikahan'];
                                            ?>
                                            <option <?php if ($valSN == "Single") {
                                                        echo "selected";
                                                    } ?> value="Single">Single</option>
                                            <option <?php if ($valSN == "Menikah") {
                                                        echo "selected";
                                                    } ?> value="Menikah">Menikah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Divisi</label>
                                        <select name="divisi" class="form-control" <?php 
                                        if($divisi != "HRD"){
                                            echo "readonly";
                                        }
                                        ?>>
                                            <option value="">- pilih -</option>
                                            <?php
                                            $divisiId = $dataDetail['divisi'];
                                            while ($data2 = $queryDivisi->fetch_array()) {
                                                $selected = "";
                                                if ($divisiId == $data2['id_divisi']) {
                                                    $selected = "selected";
                                                }
                                            ?>
                                                <option <?php echo $selected; ?> value="<?php echo $data2['id_divisi'] ?>">
                                                    <?php echo $data2['nama_divisi'] ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tanggal_masuk" 
                                        <?php
                                         if($divisi != "HRD"){
                                            echo "readonly";
                                        }
                                        ?>
                                        value="<?php echo $dataDetail['tanggal_masuk'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Keluar</label>
                                        <input type="date" class="form-control" name="tanggal_keluar" 
                                        <?php
                                         if($divisi != "HRD"){
                                            echo "readonly";
                                        }
                                        ?>
                                        value="<?php echo $dataDetail['tanggal_keluar'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <input type="number" class="form-control" name="nomor_telepon" value="<?php echo $dataDetail['no_telepon'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat KTP</label>
                                        <textarea name="alamat_ktp" rows="3" class="form-control"><?php echo $dataDetail['alamat_ktp'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php if ($type != "kepala") { ?>
                                <button type="submit" class="btn btn-primary mt-3 float-right">Simpan</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Riwayat Jabatan</h5>
                    </div>
                    <div class="card-body">
                        <?php if ($divisi == "HRD") { ?>
                            <button class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#addModal">+ tambah jabatan</button>
                        <?php } ?>
                        <!-- Modal -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="<?php echo $base_url ?>pages/Pegawai/Create_Jabatan.php" method="POST">
                                    <input name="id" type="hidden" class="form-control" placeholder="ex. Desember 2020" value="<?php echo $id ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Jabatan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Jabatan :</label>
                                                <select name="jabatan" class="form-control">
                                                    <option value="">- pilih -</option>
                                                    <?php while ($dataJabatan = $queryJabatan->fetch_array()) { ?>
                                                        <option value="<?php echo $dataJabatan['id_jabatan'] ?>">
                                                            <?php echo $dataJabatan['nama_jabatan'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Divisi :</label>
                                                <select name="divisi" class="form-control">
                                                    <option value="">- pilih -</option>
                                                    <?php while ($dataDivisi = $queryDivisi2->fetch_array()) { ?>
                                                        <option value="<?php echo $dataDivisi['id_divisi'] ?>">
                                                            <?php echo $dataDivisi['nama_divisi'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Periode Awal :</label>
                                                <input name="awal" type="text" class="form-control" placeholder="ex. Desember 2020">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Periode Akhir :</label>
                                                <input name="akhir" type="text" class="form-control" placeholder="ex. Desember 2020 atau Sekarang">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="display table dt-responsive nowrap table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jabatan</th>
                                        <th>Divisi</th>
                                        <th>Periode Awal</th>
                                        <th>Periode Akhir</th>
                                        <?php if ($divisi == "HRD") { ?>
                                            <th>Aksi</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($dataRiwayatJabatan = $queryRiwayatJabatan->fetch_array()) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $no++ ?>
                                            </td>
                                            <td><?php echo $dataRiwayatJabatan['nama_jabatan'] ?></td>
                                            <td><?php echo $dataRiwayatJabatan['nama_divisi'] ?></td>
                                            <td><?php echo $dataRiwayatJabatan['periode_awal'] ?></td>
                                            <td><?php echo $dataRiwayatJabatan['periode_akhir'] ?></td>
                                            <?php if ($divisi == "HRD") { ?>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Pilih
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal<?php echo $dataRiwayatJabatan['id_riwayat_jabatan'] ?>">Edit</a>
                                                            <a class="dropdown-item" href="<?php echo $base_url ?>pages/Pegawai/Delete_Jabatan.php?id=<?php echo $dataRiwayatJabatan['id_riwayat_jabatan'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?php } ?>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editModal<?php echo $dataRiwayatJabatan['id_riwayat_jabatan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Jabatan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="<?php echo $base_url ?>pages/Pegawai/Update_Jabatan.php" method="POST">
                                                            <input name="id" type="hidden" class="form-control" placeholder="ex. Desember 2020" value="<?php echo $dataRiwayatJabatan['id_riwayat_jabatan'] ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="">Jabatan :</label>
                                                                    <select name="jabatan" class="form-control">
                                                                        <option value="">- pilih -</option>
                                                                        <?php
                                                                        $jabatanId = $dataRiwayatJabatan['id_jabatan'];
                                                                        while ($dataJabatan2 = $queryJabatan2->fetch_array()) {
                                                                            $selected = "";
                                                                            if ($jabatanId == $dataJabatan2['id_jabatan']) {
                                                                                $selected = "selected";
                                                                            }
                                                                        ?>
                                                                            <option <?php echo $selected; ?> value="<?php echo $dataJabatan2['id_jabatan'] ?>">
                                                                                <?php echo $dataJabatan2['nama_jabatan'] ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Divisi :</label>
                                                                    <select name="divisi" class="form-control">
                                                                        <option value="">- pilih -</option>
                                                                        <?php
                                                                        $divisiId = $dataRiwayatJabatan['id_divisi'];
                                                                        while ($dataDivisi2 = $queryDivisi3->fetch_array()) {
                                                                            $selected = "";
                                                                            if ($divisiId == $dataDivisi2['id_divisi']) {
                                                                                $selected = "selected";
                                                                            }
                                                                        ?>
                                                                            <option <?php echo $selected; ?> value="<?php echo $dataDivisi2['id_divisi'] ?>">
                                                                                <?php echo $dataDivisi2['nama_divisi'] ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Periode Awal :</label>
                                                                    <input name="awal" type="text" class="form-control" placeholder="ex. Desember 2020" value="<?php echo $dataRiwayatJabatan['periode_awal'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Periode Akhir :</label>
                                                                    <input name="akhir" type="text" class="form-control" placeholder="ex. Desember 2020 atau Sekarang" value="<?php echo $dataRiwayatJabatan['periode_akhir'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    <?php endwhile ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Prestasi</h5>
                    </div>
                    <div class="card-body">
                        <?php if ($divisi == "HRD") { ?>
                            <button class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#addModal2">+ tambah prestasi</button>
                        <?php } ?>
                        <!-- Modal -->
                        <div class="modal fade" id="addModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="<?php echo $base_url ?>pages/Pegawai/Create_Prestasi.php" method="POST">
                                    <input name="id" type="hidden" class="form-control" placeholder="ex. Desember 2020" value="<?php echo $id ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Prestasi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Jenis Prestasi :</label>
                                                <input type="text" class="form-control" name="jenis_prestasi">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Keterangan Prestasi :</label>
                                                <textarea name="ket_prestasi" rows="5" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="display table dt-responsive nowrap table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Prestasi</th>
                                        <th>Keterangan Prestasi</th>
                                        <?php if ($divisi == "HRD") { ?>
                                            <th>Aksi</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($dataPrestasi = $queryPrestasi->fetch_array()) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $no2++ ?>
                                            </td>
                                            <td><?php echo $dataPrestasi['jenis_prestasi'] ?></td>
                                            <td><?php echo $dataPrestasi['ket_prestasi'] ?></td>
                                            <?php if ($divisi == "HRD") { ?>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Pilih
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal2<?php echo $dataPrestasi['id_prestasi'] ?>">Edit</a>
                                                            <a class="dropdown-item" href="<?php echo $base_url ?>pages/Pegawai/Delete_Prestasi.php?id=<?php echo $dataPrestasi['id_prestasi'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?php } ?>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editModal2<?php echo $dataPrestasi['id_prestasi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Prestasi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="<?php echo $base_url ?>pages/Pegawai/Update_Prestasi.php" method="POST">
                                                            <input name="id" type="hidden" class="form-control" placeholder="ex. Desember 2020" value="<?php echo $dataPrestasi['id_prestasi'] ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="">Jenis Prestasi :</label>
                                                                    <input type="text" name="jenis_prestasi" class="form-control" value="<?php echo $dataPrestasi['jenis_prestasi'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Keterangan Prestasi :</label>
                                                                    <textarea name="ket_prestasi" rows="5" class="form-control"><?php echo $dataPrestasi['ket_prestasi'] ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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