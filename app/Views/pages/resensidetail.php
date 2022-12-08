<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container py-5">
    <div class="row mt-4">
        <h2 class="mb-4">Detail Resensi</h2>

        <div class="card mb-3" style="max-width: 100%;">

            <div class="card-body">
                <img src="/img/<?= $resensi['sampul']; ?>" alt="" class="img-fluid gambarr mx-auto d-block mb-4">

                <h2 class="card-title mb-5 text-center" style="font-family: 'Lato', Georgia, Times, serif; font-weight:500"><?= $resensi['judul_resensi']; ?></h2>
                <p class="card-text" style="color: #6b6b6b;">By <?= $resensi['fullname']; ?>
                <p class="card-text"><b>Judul buku : </b><?= $resensi['judul_buku']; ?>
                <p class="card-text"><b>ISBN : </b><?= $resensi['isbn']; ?>
                <p class="card-text"><b>Genre buku : </b><?= $resensi['nama_genre']; ?>
                <p class="card-text"><b>Penulis : </b><?= $resensi['penulis']; ?>
                <p class="card-text"><b>Penerbit : </b><?= $resensi['nama_penerbit']; ?>
                <p class="card-text"><b>Jumlah halaman : </b><?= $resensi['jumlah_halaman']; ?>

                </p>
                <p class="card-text" style="text-align: justify;"><strong>Isi :</strong>
                    <br>
                    <?= $resensi['isi_resensi']; ?>
                </p>

                <br><br>

                <a href="/pages/resensiindex">&laquo; Kembali</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>