<?= $this->extend('admin/templateAdmin'); ?>

<?= $this->section('content'); ?>

<!-- container -->
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3"><a href="/Penerbit/index" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a> Form Tambah Penerbit</h2>
            <form action="/Penerbit/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama_penerbit" class="col-sm-2 col-form-label">Nama Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_penerbit')) ? 'is-invalid' : ''; ?>" id="nama_penerbit" name="nama_penerbit" autofocus value="<?= old('nama_penerbit'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_penerbit'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat_penerbit" class="col-sm-2 col-form-label">Alamat Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat_penerbit" name="alamat_penerbit" value="<?= old('alamat_penerbit'); ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tlp_penerbit" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tlp_penerbit" name="tlp_penerbit" value="<?= old('tlp_penerbit'); ?>" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Add Data</button>
            </form>
        </div>
    </div>
</div>
<!-- /container -->

<?= $this->endSection(); ?>