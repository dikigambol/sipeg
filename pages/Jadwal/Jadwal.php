<?php
$sql = "SELECT * FROM `jadwal_karyawan` WHERE id_pegawai = $id_user";
$query = $koneksi->query($sql);
$no = 1;
?>

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">List Jadwal</h5>
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
                        <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModal">+ Tambah Jadwal</button>
                        <!-- Modal -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?php echo $base_url ?>pages/Jadwal/Create.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $id_user ?>">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Hari :</label>
                                                <select name="hari" class="form-control">
                                                    <option value="">- pilh -</option>
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jumat">Jumat</option>
                                                    <option value="Sabtu">Sabtu</option>
                                                    <option value="Sabtu">Minggu</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Jam Masuk :</label>
                                                <input type="text" class="form-control" name="jam_masuk" placeholder="ex. 08:00">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Jam Keluar :</label>
                                                <input type="text" class="form-control" name="jam_keluar" placeholder="ex. 16:00">
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
                            <table class="display table dt-responsive nowrap table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hari</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
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
                                                <?php echo $data['hari'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['jam_masuk'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['jam_keluar'] ?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Pilih
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal<?php echo $data['id_jadwal'] ?>">Edit</a>
                                                        <a class="dropdown-item" href="<?php echo $base_url ?>pages/Jadwal/Delete.php?id=<?php echo $data['id_jadwal'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editModal<?php echo $data['id_jadwal'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="<?php echo $base_url ?>pages/Jadwal/Update.php" method="POST">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" class="form-control" name="id" value="<?php echo $data['id_jadwal'] ?>">
                                                                <div class="form-group">
                                                                    <label for="">Hari :</label>
                                                                    <select name="hari" class="form-control">
                                                                        <option value="">- pilh -</option>
                                                                        <?php
                                                                        $valH = $data['hari'];
                                                                        ?>
                                                                        <option <?php if ($valH == "Senin") {
                                                                                    echo "selected";
                                                                                } ?> value="Senin">Senin</option>
                                                                        <option <?php if ($valH == "Selasa") {
                                                                                    echo "selected";
                                                                                } ?> value="Selasa">Selasa</option>
                                                                        <option <?php if ($valH == "Rabu") {
                                                                                    echo "selected";
                                                                                } ?> value="Rabu">Rabu</option>
                                                                        <option <?php if ($valH == "Kamis") {
                                                                                    echo "selected";
                                                                                } ?> value="Kamis">Kamis</option>
                                                                        <option <?php if ($valH == "Jumat") {
                                                                                    echo "selected";
                                                                                } ?> value="Jumat">Jumat</option>
                                                                        <option <?php if ($valH == "Sabtu") {
                                                                                    echo "selected";
                                                                                } ?> value="Sabtu">Sabtu</option>
                                                                        <option <?php if ($valH == "Minggu") {
                                                                                    echo "selected";
                                                                                } ?> value="Minggu">Minggu</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Jam Masuk :</label>
                                                                    <input type="text" class="form-control" name="jam_masuk" placeholder="ex. 08:00" value="<?php echo $data['jam_masuk'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Jam Keluar :</label>
                                                                    <input type="text" class="form-control" name="jam_keluar" placeholder="ex. 16:00" value="<?php echo $data['jam_keluar'] ?>">
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