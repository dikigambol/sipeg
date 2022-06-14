<?php
$sqlPendidikan = "SELECT * FROM pendidikan";
$queryPendidikan = $koneksi->query($sqlPendidikan);

$sqlDivisi = "SELECT * FROM divisi";
$queryDivisi = $koneksi->query($sqlDivisi);
?>

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Tambah Pegawai</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Pegawai</a></li>
                    <li class="breadcrumb-item"><a href="#!">Tambah Pegawai</a></li>
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
                        <form action="<?php echo $base_url ?>pages/Pegawai/Create.php" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor KTP</label>
                                        <input type="number" class="form-control" name="no_ktp">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="">- pilih -</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pendidikan</label>
                                        <select name="pendidikan" class="form-control">
                                            <option value="">- pilih -</option>
                                            <?php while ($data = $queryPendidikan->fetch_array()) : ?>
                                                <option value="<?php echo $data['id_pendidikan'] ?>"><?php echo $data['nama_pendidikan'] ?></option>
                                            <?php endwhile ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status Pernikahan</label>
                                        <select name="status_pernikahan" class="form-control">
                                            <option value="">- pilih -</option>
                                            <option value="Single">Single</option>
                                            <option value="Menikah">Menikah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Divisi</label>
                                        <select name="divisi" class="form-control">
                                            <option value="">- pilih -</option>
                                            <?php while ($data2 = $queryDivisi->fetch_array()) : ?>
                                                <option value="<?php echo $data2['id_divisi'] ?>"><?php echo $data2['nama_divisi'] ?></option>
                                            <?php endwhile ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tanggal_masuk">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <input type="number" class="form-control" name="nomor_telepon">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat KTP</label>
                                        <textarea name="alamat_ktp" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 float-right">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>