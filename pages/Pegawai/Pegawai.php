<?php
$sql = "SELECT * FROM detail_karyawan INNER JOIN akun_karyawan 
ON detail_karyawan.id_pegawai = akun_karyawan.id_karyawan INNER JOIN divisi 
ON detail_karyawan.divisi = divisi.id_divisi WHERE detail_karyawan.id_pegawai NOT IN ($id_user)";
$query = $koneksi->query($sql);
$no = 1;
?>

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">List Pegawai</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Pegawai</a>
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
                        <a class="btn btn-primary mb-4" href="dashboard.php?page=tambahpegawai">+ Tambah</a>
                        <div class="table-responsive">
                            <table id="zero-configuration" class="display table dt-responsive nowrap table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Divisi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($data = $query->fetch_array()) : ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $data['nama'] ?></td>
                                            <td><?php echo $data['username'] ?></td>
                                            <td><?php echo $data['nama_divisi'] ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Pilih
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?page=detailpegawai&id=<?php echo $data['id_karyawan'] ?>">Detail</a>
                                                        <a class="dropdown-item" href="<?php echo $base_url ?>pages/Pegawai/Delete.php?id=<?php echo $data['id_karyawan'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a>
                                                    </div>
                                                </div>
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