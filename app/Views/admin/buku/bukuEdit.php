<?= $this->extend('admin/templateAdmin'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3"><a href="/Buku/index" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a> Form Ubah Judul</h2>
            <form action="/Buku/update/<?= $buku['id_judul']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_judul" value="<?= $buku['id_judul']; ?>">
                <input type="hidden" name="sampulLama" value="<?= $buku['sampul']; ?>">
                <div class="row mb-3">
                    <label for="judul_buku" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('judul_buku')) ? 'is-invalid' : ''; ?>" id="judul_buku" name="judul_buku" autofocus value="<?= (old('judul_buku')) ? old('judul_buku') : $buku['judul_buku'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul_buku'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="isbn" name="isbn" value="<?= (old('isbn')) ? old('isbn') : $buku['isbn'] ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nama_genre" class="col-sm-2 col-form-label" onchange="this.form.submit()">Genre</label>
                    <div class="col-sm-10">
                        <select name="id_genre" class="form-control" aria-label="Default select example">
                            <option value=""></option>
                            <?php foreach ($genre as $g) : ?>
                                <option value="<?= $g['id_genre']; ?>" <?= $buku['id_genre'] == $g['id_genre'] ? 'selected' : null ?>><?= $g['nama_genre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $buku['penulis'] ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nama_penerbit" class="col-sm-2 col-form-label" onchange="this.form.submit()">Penerbit</label>
                    <div class="col-sm-10">
                        <select name="id_penerbit" class="form-control" aria-label="Default select example">
                            <option value=""></option>
                            <?php foreach ($penerbit as $p) : ?>
                                <option value="<?= $p['id_penerbit']; ?>" <?= $buku['id_penerbit'] == $p['id_penerbit'] ? 'selected' : null ?>><?= $p['nama_penerbit']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= (old('tahun_terbit')) ? old('tahun_terbit') : $buku['tahun_terbit'] ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="jumlah_halaman" class="col-sm-2 col-form-label">Jumlah Halaman</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jumlah_halaman" name="jumlah_halaman" value="<?= (old('jumlah_halaman')) ? old('jumlah_halaman') : $buku['jumlah_halaman'] ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $buku['sampul']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                            <label class="custom-file-label" for="sampul"><?= $buku['sampul']; ?></label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>