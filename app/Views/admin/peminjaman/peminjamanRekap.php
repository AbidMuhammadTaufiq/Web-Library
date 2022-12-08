<?= $this->extend('admin/templateAdmin'); ?>

<?= $this->section('content'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">
                Rekap Daftar Peminjaman <a href="/admin/peminjaman/export" class="mb-2 btn btn-success"><i class="fa-solid fa-print"></i> Print</a>
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Buku</th>
                            <th>Eksemplar</th>
                            <th>Peminjam</th>
                            <th>Instansi</th>
                            <th>Tanggal Pinjam</th>
                            <th>Due Date</th>
                            <th>Tanggal Pengembalian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($peminjaman as $p) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td><?= $p['judul_buku']; ?></td>
                                <td><?= $p['eksemplar']; ?></td>
                                <td><?= $p['fullname']; ?></td>
                                <td><?= $p['instansi']; ?></td>
                                <td><?= $p['tanggal_pinjam']; ?></td>
                                <td><?= $p['tanggal_kembali']; ?></td>
                                <td><?= $p['deleted_at']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->




<?= $this->endSection(); ?>