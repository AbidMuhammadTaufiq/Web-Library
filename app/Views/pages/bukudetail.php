<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container my-5 d-flex align-items-center justify-content-center">

    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row justify-content-center">
                    <div class="col-md-4 m-2">
                        <img src="/img/<?= $buku['sampul']; ?>" class="img-fluid">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <p class="card-text"><b>Judul Buku : </b><?= $buku['judul_buku']; ?></p>
                                <p class="card-text"><b>ISBN : </b><?= $buku['isbn']; ?></p>
                                <p class="card-text"><b>Genre : </b><?= $buku['nama_genre']; ?></p>
                                <p class="card-text"><b>Penulis : </b><?= $buku['penulis']; ?></p>
                                <p class="card-text"><b>Penerbit : </b><?= $buku['nama_penerbit']; ?></p>
                                <p class="card-text"><b>Tahun Terbit : </b><?= $buku['tahun_terbit']; ?></p>
                                <p class="card-text"><b>Jumlah Halaman : </b><?= $buku['jumlah_halaman']; ?></p>
                                <p class="card-text"><b>Jumlah Eksemplar : </b><?= $copy; ?></p>
                                <p class="card-text"><b>tersedia : </b><?= $copy - $tersedia; ?></p>
                                <p class="card-text"><b>Penulis Resensi : </b></p>
                                <?php $n = 1; ?>
                                <?php foreach ($resensi as $r) : ?>
                                    <p class="card-text">
                                        <?= $n++; ?>.
                                        <a href="/pages/resensidetail/<?= $r['id_resensi']; ?>" style="text-decoration:none; color:black" onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='black'">
                                            <?= $r['fullname']; ?>
                                        </a>
                                    <?php endforeach; ?>
                                    </p>

                                    <div class="mt-2">
                                        <h6><b>Peminjamanan :</b></h6>
                                    </div>
                                    <table class="table table-bordered my-1">
                                        <tbody>
                                            <!-- <thead> -->
                                            <tr align="center" class="table-secondary">
                                                <th scope="col">No</th>
                                                <th scope="col">Eksemplar</th>
                                                <th scope="col">Peminjam</th>
                                                <th scope="col">Tanggal Pinjam</th>
                                                <th scope="col">Due Date</th>
                                            </tr>
                                            <!-- </thead> -->
                                            <?php $i = 1; ?>
                                            <?php if ($peminjaman != NULL || $peminjaman != "") : ?>
                                                <?php foreach ($peminjaman as $p) : ?>
                                                    <tr class="table-light">
                                                        <td scope="row"><?= $i++; ?></td>
                                                        <td><?= $p['eksemplar']; ?></td>
                                                        <td><?= $p['fullname']; ?></td>
                                                        <td><?= $p['tanggal_pinjam']; ?></td>
                                                        <td><?= $p['tanggal_kembali']; ?></td>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                                    </tr>
                                        </tbody>
                                    </table>
                                    <div class="mt-4">
                                        <a href="/pages/bukuindex">&laquo; kembali ke Halaman Buku</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>