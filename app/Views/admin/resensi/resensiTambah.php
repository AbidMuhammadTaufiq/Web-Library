<?= $this->extend('admin/templateAdmin'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3"><a href="/Resensi/index" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a> Form Tambah Resensi</h2>
            <form action="/Resensi/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="judul_resensi" class="col-sm-2 col-form-label">Judul Resensi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('judul_resensi')) ? 'is-invalid' : ''; ?>" id="judul_resensi" name="judul_resensi" autofocus value="<?= old('judul_resensi'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul_resensi'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_judul" class="col-sm-2 col-form-label" onchange="this.form.submit()">Judul buku</label>
                    <div class="col-sm-10">
                        <select name="id_judul" class="form-control" aria-label="Default select example" required>
                            <option selected>Pilih judul buku...</option>
                            <?php foreach ($buku as $b) : ?>
                                <option value="<?= $b['id_judul']; ?>"><?= $b['judul_buku']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id" class="col-sm-2 col-form-label" onchange="this.form.submit()">Penulis resensi</label>
                    <div class="col-sm-10">
                        <select name="id" class="form-control" aria-label="Default select example" required>
                            <option selected>Pilih Penulis</option>
                            <?php foreach ($user as $u) : ?>
                                <option value="<?= $u->userid; ?>"><?= $u->fullname; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="isi_resensi" class="col-sm-2 col-form-label">Isi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="isi_resensi" name="isi_resensi" value="<?= old('isi_resensi'); ?>"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Add Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>