<?= $this->extend('admin/templateAdmin'); ?>

<?= $this->section('content'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Daftar Penerbit</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <a href="/admin/penerbit/penerbitTambah" class="btn btn-primary my-3">Tambah Penerbit</a>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <tr>
                            <th>Nama penerbit</th>
                            <th>Alamat penerbit</th>
                            <th>Nomor penerbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($penerbit as $p) : ?>
                            <tr>
                                <td><?= $p['nama_penerbit']; ?></td>
                                <td><?= $p['alamat_penerbit']; ?></td>
                                <td><?= $p['tlp_penerbit']; ?></td>
                                <td>
                                    <a href="/admin/penerbit/penerbitEdit/<?= $p['id_penerbit']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>

                                    <form action="/admin/penerbit/<?= $p['id_penerbit']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure to delete?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                    <br><br>
                                </td>
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