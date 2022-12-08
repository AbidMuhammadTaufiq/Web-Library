<?= $this->extend('admin/templateAdmin'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3"><a href="/Peminjaman/index" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a> Form Ubah Peminjaman</h2>
            <form action="/Peminjaman/update/<?= $peminjaman['id_peminjaman']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_peminjaman" value="<?= $peminjaman['id_peminjaman']; ?>">

                <div class="row mb-3">
                    <label for="id_copy" class="col-sm-2 col-form-label" onchange="this.form.submit()">Buku dan Eksemplar</label>
                    <div class="col-sm-10">
                        <select name="id_copy" class="form-control" aria-label="Default select example">
                            <option value=""></option>
                            <?php foreach ($copy as $c) : ?>
                                <option value="<?= $c['id_copy']; ?>" <?= $peminjaman['id_copy'] == $c['id_copy'] ? 'selected' : null ?>><?= $c['judul_buku']; ?> - <?= $c['eksemplar']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="id" class="col-sm-2 col-form-label" onchange="this.form.submit()">Peminjam dan Instansi</label>
                    <div class="col-sm-10">
                        <select name="id" class="form-control" aria-label="Default select example">
                            <option value=""></option>
                            <?php foreach ($user as $u) : ?>
                                <option value="<?= $u->userid; ?>" <?= $peminjaman['id'] == $u->userid ? 'selected' : null ?>><?= $u->fullname; ?> - <?= $u->instansi; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="datepicker" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="datepicker" name="tanggal_pinjam" value="<?= (old('tanggal_pinjam')) ? old('tanggal_pinjam') : $peminjaman['tanggal_pinjam'] ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="date" class="col-sm-2 col-form-label">Due Date</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="date" name="tanggal_kembali" value="<?= (old('tanggal_kembali')) ? old('tanggal_kembali') : $peminjaman['tanggal_kembali'] ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Edit Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>