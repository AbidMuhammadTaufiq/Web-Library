<?= $this->extend('admin/templateAdmin'); ?>

<?= $this->section('content'); ?>

<!-- container -->
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3"><a href="/Peminjaman/index" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a> Form Tambah Peminjaman</h2>
            <form action="/Peminjaman/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="eksemplar" class="col-sm-2 col-form-label" onchange="this.form.submit()">buku</label>
                    <div class="col-sm-10">
                        <select name="id_copy" class="form-control" aria-label="Default select example" required>
                            <option selected>Pilih Buku dan Eksemplar...</option>
                            <?php foreach ($copy as $c) : ?>
                                <option value="<?= $c['id_copy']; ?>"><?= $c['judul_buku']; ?> - <?= $c['eksemplar']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="id" class="col-sm-2 col-form-label" onchange="this.form.submit()">Peminjam</label>
                    <div class="col-sm-10">
                        <select name="id" class="form-control" aria-label="Default select example" required>
                            <option selected>Pilih Peminjam dan Instansi...</option>
                            <?php foreach ($user as $u) : ?>
                                <option value="<?= $u->userid; ?>"><?= $u->fullname; ?> - <?= $u->instansi; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="datepicker" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="datepicker" name="tanggal_pinjam" value="<?= old('tanggal_pinjam'); ?>" required autocomplete="off">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="date" class="col-sm-2 col-form-label">Due Date</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="date" name="tanggal_kembali" value="<?= old('tanggal_kembali'); ?>" required autocomplete="off">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Add Data</button>
            </form>
        </div>
    </div>
</div>
<!-- /container -->

<?= $this->endSection(); ?>