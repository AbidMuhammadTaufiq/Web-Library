<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container py-5">
    <div class="row mt-4">
        <h1 class="mb-4">Daftar Buku</h1>
        <hr>

        <!-- sort by and seacrh -->
        <div class="row mt-3">
            <div class="col-3">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Genre
                    </button>
                    <ul class="dropdown-menu">
                        <?php foreach ($genre as $g) : ?>
                            <li><a class="dropdown-item" href="<?= site_url('pages/bukuindex?id_genre=' . $g['id_genre']); ?>"><?= $g['nama_genre']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-8">
                <form action="" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Masukan Judul buku atau pengarang buku..." name="keyword">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card-group mb-3" id="card_buku">
                <div class="row row-cols-2 row-cols-md-5 g-4 mx-1 my-1">
                    <?php foreach ($buku as $b) : ?>
                        <div class="col">
                            <div class="card border-1" style="width: 9rem;">
                                <img src="/img/<?= $b['sampul']; ?>" class="img-fluid rounded" style="height:12rem;">
                                <div class="card-body">
                                    <h6 class="card-title text-center" id="text-limited" style="height:3.7rem;">
                                        <a href="/pages/bukudetail/<?= $b['id_judul']; ?>" style="text-decoration: none; color: black;">
                                            <?= $b['judul_buku']; ?>
                                        </a>
                                    </h6>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?= $pager->links('buku', 'buku_pagination'); ?>
        </div>
        <hr>
    </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Detail Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body table-responsive">
                <img src="" id="sampull" alt="" class="img-fluid rounded gambar mb-2" style="padding-left: 40%; padding-right: 40%">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width: 30%;">Judul</th>
                            <td><span id="judul_buku"></span></td>
                        </tr>
                        <tr>
                            <th>ISBN</th>
                            <td><span id="isbn"></span></td>
                        </tr>
                        <tr>
                            <th>Genre</th>
                            <td><span id="genre"></span></td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <td><span id="penulis"></span></td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <td><span id="penerbit"></span></td>
                        </tr>
                        <tr>
                            <th>Tahun Terbit</th>
                            <td><span id="tahun"></span></td>
                        </tr>
                        <tr>
                            <th>Jumlah Halaman</th>
                            <td><span id="halaman"></span></td>
                        </tr>
                        <tr>
                            <th>Jumlah Buku</th>
                            <td>
                                <span id="jumlah"></span>
                            </td>
                        </tr>
                </table>
                <div class="ms-2">
                    <h6><b>Peminjamanan</b></h6>
                </div>
                <div class="my-1 table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <thead>
                            <tr align="center" class="table-secondary">
                                <th scope="col">No</th>
                                <th scope="col">Eksemplar</th>
                                <th scope="col">Peminjam</th>
                                <th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Due Date</th>
                            </tr>
                            </thead>
                            <tr class="table-light">
                                <td scope="row"></td>
                                <td><span id="eksemplar"></span></td>
                                <td><span id="username"></span></td>
                                <td><span id="tglpinjam"></span></td>
                                <td><span id="tglkembali"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->

<?= $this->endSection(); ?>