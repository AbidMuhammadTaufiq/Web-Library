<?= $this->extend('admin/templateAdmin'); ?>

<?= $this->section('content'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Daftar Rekomendasi Buku</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <a href="/admin/rekomendasi/rekomendasiTambah" class="btn btn-primary my-3">Tambah Rekomendasi Buku</a>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <tr>
                            <th>No.</th>
                            <th>Sampul</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($rekomendasi as $r) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td><img src="/img/<?= $r['sampul']; ?>" alt="sampul" height="100px"></td>
                                <td><?= $r['judul_buku']; ?></td>
                                <td>
                                    <form action="/admin/rekomendasi/<?= $r['id_rekomendasi']; ?>" method="POST" class="d-inline">
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