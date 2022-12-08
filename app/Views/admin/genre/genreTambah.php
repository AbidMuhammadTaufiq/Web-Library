<?= $this->extend('admin/templateAdmin'); ?>

<?= $this->section('content'); ?>

<!-- container -->
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3"><a href="/Genre/index" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a> Form Tambah Genre</h2>
            <form action="/Genre/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama_genre" class="col-sm-2 col-form-label">Nama Genre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_genre')) ? 'is-invalid' : ''; ?>" id="nama_genre" name="nama_genre" autofocus value="<?= old('nama_genre'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_genre'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Add Data</button>
            </form>
        </div>
    </div>
</div>
<!-- /container -->

<?= $this->endSection(); ?>