<?php
$sql = "SELECT * FROM `izin_karyawan` WHERE id_pegawai = $id_user";
$query = $koneksi->query($sql);
$no = 1;
?>

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">List Izin</h5>
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
                        <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModal">+ Tambah Izin</button>
                        <!-- Modal -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="<?php echo $base_url ?>pages/Izin/Create.php" method="POST">
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $id_user ?>">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Izin</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Jenis Izin :</label>
                                                <select name="jenis_izin" class="form-control">
                                                    <option value="">- pilh -</option>
                                                    <option value="Sakit/Keperluan">Sakit/Keperluan</option>
                                                    <option value="Cuti">Cuti</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tanggal Izin :</label>
                                                <input type="date" class="form-control" name="tgl_izin">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Keterangan Izin :</label>
                                                <textarea name="ket_izin" rows="5" class="form-control"></textarea>
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
                            <table id="zero-configuration" class="display table dt-responsive nowrap table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
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
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Pilih
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal<?php echo $data['id_izin'] ?>">Edit</a>
                                                        <a class="dropdown-item" href="<?php echo $base_url ?>pages/Izin/Delete.php?id=<?php echo $data['id_izin'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editModal<?php echo $data['id_izin'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="<?php echo $base_url ?>pages/Izin/Update.php" method="POST">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Izin</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" class="form-control" name="id_izin" value="<?php echo $data['id_izin'] ?>">
                                                                <div class="form-group">
                                                                    <label for="">Jenis Izin :</label>
                                                                    <select name="jenis_izin" class="form-control">
                                                                        <option value="">- pilh -</option>
                                                                        <?php
                                                                        $valJI = $data['jenis_izin'];
                                                                        ?>
                                                                        <option <?php if ($valJI == "Sakit/Keperluan") {
                                                                                    echo "selected";
                                                                                } ?> value="Sakit/Keperluan">Sakit/Keperluan</option>
                                                                        <option <?php if ($valJI == "Cuti") {
                                                                                    echo "selected";
                                                                                } ?> value="Cuti">Cuti</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Tanggal Izin :</label>
                                                                    <input type="date" class="form-control" name="tgl_izin" value="<?php echo $data['tgl_izin'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Keterangan Izin :</label>
                                                                    <textarea name="ket_izin" rows="5" class="form-control"><?php echo $data['keterangan'] ?></textarea>
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