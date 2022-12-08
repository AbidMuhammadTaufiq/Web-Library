<?= $this->extend('admin/templateAdmin'); ?>

<?= $this->section('content'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Daftar Judul</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <a href="/admin/buku/bukuTambah" class="btn btn-primary my-3">Tambah Judul</a>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <tr>
                            <th>Sampul</th>
                            <th>Judul</th>
                            <th>Genre</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($buku as $b) : ?>
                            <tr>
                                <td><img src="/img/<?= $b['sampul']; ?>" alt="sampul" height="100px"></td>
                                <td><?= $b['judul_buku']; ?></td>
                                <td><?= $b['nama_genre']; ?></td>
                                <td><?= $b['penulis']; ?></td>
                                <td><?= $b['nama_penerbit']; ?></td>
                                <td><?= $b['tahun_terbit']; ?></td>
                                <td>
                                    <a href="/admin/buku/bukuEdit/<?= $b['id_judul']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>

                                    <form action="/admin/buku/<?= $b['id_judul']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('are you sure to delete?')"><i class="fas fa-trash"></i></button>
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