<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container py-5">
    <div class="row mt-4">
        <h1 class="mb-4">Daftar Resensi</h1>
        <hr>
        <div class="container-fluid">
            <div class="card-group mb-3" id="card_buku">
                <div class="row row-cols-2 row-cols-md-5 g-4 mx-1 my-1">
                    <?php foreach ($resensi as $r) : ?>
                        <div class="col">
                            <div class="card border-1" style="width: 9rem;">
                                <img src="/img/<?= $r['sampul']; ?>" class="img-fluid rounded" style="height:12rem;">
                                <div class="card-body">
                                    <h6 class="card-title text-center" id="text-limitedd" style="height:2.6rem;">
                                        <a href="/pages/resensidetail/<?= $r['id_resensi']; ?>" style="text-decoration:none; color:black">
                                            <?= $r['judul_resensi']; ?>
                                        </a>
                                    </h6>
                                    <h6 class="card-title text-center" style="height:1.3rem; color: #6b6b6b; font-size:smaller">
                                        <i>By <?= $r['fullname']; ?></i>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>

<?= $this->endSection(); ?>