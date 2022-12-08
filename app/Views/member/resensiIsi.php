<?= $this->extend('member/templateMember'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary"><a href="/member/resensiIndex" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a> Isi Resensi</h3>
        </div>
        <div class="card-body" style="color: black;">
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
        </div>
    </div>
</div>

<?= $this->endSection(); ?>