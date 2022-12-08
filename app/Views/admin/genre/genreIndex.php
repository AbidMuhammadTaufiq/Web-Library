<?= $this->extend('admin/templateAdmin'); ?>

<?= $this->section('content'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Daftar Genre</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <a href="/admin/genre/genreTambah" class="btn btn-primary my-3">Tambah Genre</a>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <tr>
                            <th>Id Genre</th>
                            <th>Nama Genre</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($genre as $g) : ?>
                            <tr>
                                <td><?= $g['id_genre']; ?></td>
                                <td><?= $g['nama_genre']; ?></td>
                                <td>
                                    <a href="/admin/genre/genreEdit/<?= $g['id_genre']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>

                                    <form action="/admin/genre/<?= $g['id_genre']; ?>" method="POST" class="d-inline">
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