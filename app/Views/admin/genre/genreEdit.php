<?= $this->extend('admin/templateAdmin'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3"><a href="/Genre/index" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a> Form Ubah Genre</h2>
            <form action="/Genre/update/<?= $genre['id_genre']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_genre" value="<?= $genre['id_genre']; ?>">
                <div class="row mb-3">
                    <label for="nama_genre" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_genre')) ? 'is-invalid' : ''; ?>" id="nama_genre" name="nama_genre" autofocus value="<?= (old('nama_genre')) ? old('nama_genre') : $genre['nama_genre'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_genre'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>