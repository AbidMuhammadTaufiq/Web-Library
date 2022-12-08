<?= $this->extend('admin/templateAdmin'); ?>

<?= $this->section('content'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Daftar Resensi</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <a href="/Resensi/create" class="btn btn-primary my-3">Tambah Resensi</a>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <tr>
                            <th>Sampul</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Isi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resensi as $r) : ?>
                            <tr>
                                <td><img src="/img/<?= $r['sampul']; ?>" alt="sampul" height="100px"></td>
                                <td><?= $r['judul_resensi']; ?></td>
                                <td><?= $r['fullname']; ?></td>
                                <td>
                                    <a href="/admin/resensi/resensiIsi/<?= $r['id_resensi']; ?>" class="btn btn-success">Detail</a>
                                </td>
                                <td>
                                    <a href="/admin/resensi/resensiEdit/<?= $r['id_resensi']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>

                                    <form action="/admin/resensi/<?= $r['id_resensi']; ?>" method="POST" class="d-inline">
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