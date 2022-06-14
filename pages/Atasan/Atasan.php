<?php
$sql = "SELECT * FROM detail_karyawan INNER JOIN akun_karyawan 
ON detail_karyawan.id_pegawai = akun_karyawan.id_karyawan INNER JOIN divisi 
ON detail_karyawan.divisi = divisi.id_divisi";
$query = $koneksi->query($sql);

$sql2 = "SELECT * FROM detail_karyawan INNER JOIN akun_karyawan 
ON detail_karyawan.id_pegawai = akun_karyawan.id_karyawan INNER JOIN divisi 
ON detail_karyawan.divisi = divisi.id_divisi";
$query2 = $koneksi->query($sql2);

$sqlList = "SELECT * FROM list_atasan INNER JOIN akun_karyawan 
ON list_atasan.id_pegawai = akun_karyawan.id_karyawan";
$queryList = $koneksi->query($sqlList);

$no = 1;
?>

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">List Atasan</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">List Atasan</a>
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
                        <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModal">+ Tambah</button>
                        <!-- Modal -->
                        <div class="modal fade" id="addModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Atasan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?php echo $base_url ?>pages/Atasan/Create.php" method="POST">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Nama Pegawai</label>
                                                <select class="form-control select-2" name="id">
                                                    <option value="">- pilih -</option>
                                                    <?php while ($data = $query->fetch_array()) : ?>
                                                        <option value="<?php echo $data['id_karyawan'] ?>"><?php echo $data['nama'] ?></option>
                                                    <?php endwhile ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Keterangan</label>
                                                <textarea name="keterangan" rows="3" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="zero-configuration" class="display table dt-responsive nowrap table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pegawai</th>
                                        <th>Divisi</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($dataList = $queryList->fetch_array()) : ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $dataList['nama'] ?></td>
                                            <td><?php echo $dataList['divisi'] ?></td>
                                            <td><?php echo $dataList['keterangan'] ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Pilih
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal<?php echo $dataList['id_atasan'] ?>">Edit</a>
                                                        <a class="dropdown-item" href="<?php echo $base_url ?>pages/Atasan/Delete.php?id=<?php echo $dataList['id_atasan'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editModal<?php echo $dataList['id_atasan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="<?php echo $base_url ?>pages/Atasan/Update.php" method="POST">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Atasan</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" class="form-control" name="id_atasan" value="<?php echo $dataList['id_atasan'] ?>">
                                                                <div class="form-group">
                                                                    <label for="">Nama Pegawai</label>
                                                                    <input type="text" value="<?php echo $dataList['nama'] ?>" class="form-control" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Keterangan</label>
                                                                    <textarea name="keterangan" rows="3" class="form-control"><?php echo $dataList['keterangan'] ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </form>
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