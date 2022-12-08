<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-0">

    <!-- banner -->
    <div class="container-fluid banner">
        <div class="container text-center">
            <h3 class="display-2" style="font-weight: 400;font-family:Source Sans Variable">Selamat Datang!</h3>
            <h3 class="display-5 mb-4" style="font-family:Source Sans Variable">Perpustakaan Warna Aksara</h4>
                <a href="/pages/bukuindex">
                    <button type="button" class="btn btn-danger">View More!</button>
                </a>
        </div>
    </div>

    <!-- tentang -->
    <div class="container-fluid pt-5 pb-5">
        <div class="container">
            <h2 class="display-3 text-center" id="tentang">Tentang</h2>
            <p class="text-center">
                Perpustakaan Warna Aksara PK IMM Adam Malik FKI UMS
            </p>
            <div class="clearfix pt-5">
                <img src="<?= base_url(); ?>/img/content/perpustakaan.jpg" class="col-md-6 float-md-end mb-3 crop-img" width="350px" height="270px" />
                <p>
                    Perpustakaan Warna Aksara merupakan perpustakaan yang dimiliki oleh Pimpinan Komisariat IMM Adam Malik yang dimana perpustakaan tersebut di pegang oleh bidang Riset dan Pengembangan Keilmuan Komisariat Adam Malik.
                </p>
                <p>
                    Perpustakaan ini terletak di depan sekretariat IMM Adam Malik yang berada di Gedung J lantai 3 Fakultas Komunikasi dan Informatika bersebelahan dengan sekretariat ormawa lainnya.
                </p>
                <p>
                    Perpustakaan ini mempunyai lebih dari 250 koleksi buku. adapun koleksi buku ini terdiri dari berbagai genre, diantaranya yang menunjang kompetensi mahasiswa FKI, wawasan umum, ilmu agama, dan kemuhammadiyahan.
                </p>
            </div>
        </div>
    </div>

    <!-- section rekomendasi buku -->
    <div class="container-fluid bg-image mt-5">
        <div class="text-center my-4">
            <br>
            <h2 class="title" style="color: white;"> Rekomendasi Buku</h2>
            <span class="underline1 left"></span>
        </div>
        <div class="row mb-5">
            <div class="owl-carousel owl-theme">
                <?php foreach ($rekomendasi as $r) : ?>
                    <div class="ms-1 me-1">
                        <div class="card" style="height: 300px; width: 150px; border-radius:1em">
                            <div class="row h-100">
                                <img src="/img/<?= $r['sampul']; ?>" class="img-fluid owl-lazy gambar-owl" style="border-top-left-radius: 16px;border-top-right-radius: 16px">
                            </div>
                            <div class="row">
                                <div class="card-body">
                                    <h6 class="card-title text-center figure-caption"><?= $r['judul_buku']; ?></h6>
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <a href="/pages/bukudetail/<?= $r['id_judul']; ?>" class="btn btn-danger btn-sm">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>