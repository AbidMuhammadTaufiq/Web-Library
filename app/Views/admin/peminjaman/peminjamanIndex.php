<?= $this->extend('admin/templateAdmin'); ?>

<?= $this->section('content'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Daftar Peminjaman</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <a href="/admin/peminjaman/peminjamanTambah" class="btn btn-primary my-3">Tambah Peminjaman</a>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <tr>
                            <th>No.</th>
                            <th>Nama Buku</th>
                            <th>Eksemplar</th>
                            <th>Peminjam</th>
                            <th>Instansi</th>
                            <th>Tanggal Pinjam</th>
                            <th>Due Date</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($peminjaman as $p) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td><?= $p['judul_buku']; ?></td>
                                <td><?= $p['eksemplar']; ?></td>
                                <td><?= $p['fullname']; ?></td>
                                <td><?= $p['instansi']; ?></td>
                                <td><?= $p['tanggal_pinjam']; ?></td>
                                <td><?= $p['tanggal_kembali']; ?></td>
                                <td>
                                    <a href="/admin/peminjaman/peminjamanEdit/<?= $p['id_peminjaman']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>

                                    <form action="/admin/peminjaman/<?= $p['id_peminjaman']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure to delete?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                    <br><br>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->




<?= $this->endSection(); ?>