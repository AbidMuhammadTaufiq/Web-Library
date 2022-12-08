<?= $this->extend('admin/templateAdmin'); ?>

<?= $this->section('content'); ?>

<!-- container -->
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3"><a href="/Buku/index" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a> Form Tambah Judul</h2>
            <form action="/Buku/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="judul_buku" class="col-sm-2 col-form-label">judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('judul_buku')) ? 'is-invalid' : ''; ?>" id="judul_buku" name="judul_buku" autofocus value="<?= old('judul_buku'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul_buku'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="isbn" name="isbn" value="<?= old('isbn'); ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_genre" class="col-sm-2 col-form-label" onchange="this.form.submit()">genre</label>
                    <div class="col-sm-10">
                        <select name="id_genre" class="form-control" aria-label="Default select example" required>
                            <option selected>Pilih genre buku...</option>
                            <?php foreach ($genre as $g) : ?>
                                <option value="<?= $g['id_genre']; ?>"><?= $g['nama_genre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- <div class="row mb-3">
                    <label for="nama_genre" class="col-sm-2 col-form-label">genre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_genre" name="nama_genre" value="">
                    </div>
                </div> -->
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= old('penulis'); ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_penerbit" class="col-sm-2 col-form-label">penerbit</label>
                    <div class="col-sm-10">
                        <select name="id_penerbit" class="form-control" aria-label="Default select example" required>
                            <option selected>Pilih penerbit buku...</option>
                            <?php foreach ($penerbit as $p) : ?>
                                <option value="<?= $p['id_penerbit']; ?>"><?= $p['nama_penerbit']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun terbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= old('tahun_terbit'); ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlah_halaman" class="col-sm-2 col-form-label">Jumlah Halaman</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jumlah_halaman" name="jumlah_halaman" value="<?= old('jumlah_halaman'); ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/default.png" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                            <label class="custom-file-label" for="sampul"></label>
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