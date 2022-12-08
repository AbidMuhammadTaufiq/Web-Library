<?= $this->extend('admin/templateAdmin'); ?>

<?= $this->section('content'); ?>

<!-- container -->
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3"><a href="/Copy/index" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a> Form Tambah Copy</h2>
            <form action="/Copy/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama_judul" class="col-sm-2 col-form-label" onchange="this.form.submit()">judul</label>
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
                    <label for="eksemplar" class="col-sm-2 col-form-label" onchange="this.form.submit()">Eksemplar</label>
                    <div class="col-sm-10">
                        <select name="eksemplar" class="form-control" aria-label="Default select example" required>
                            <option selected>Pilih eksemplar buku...</option>
                            <?php $i = 1; ?>
                            <?php while ($i < 10) : ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php $i++; ?>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kondisi" class="col-sm-2 col-form-label">kondisi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kondisi" name="kondisi" value="<?= old('kondisi'); ?>" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Add Data</button>
            </form>
        </div>
    </div>
</div>
<!-- /container -->

<?= $this->endSection(); ?>