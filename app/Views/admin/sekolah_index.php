<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-12 col-md-6 order-md-1 order-2">
                <h3>Sekolah</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-1">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sekolah</li>
                    </ol>
                </nav>
            </div>

            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success order-last mt-2" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger order-last mt-2" role="alert">
                <?= session()->getFlashdata('error'); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4>Data Sekolah</h4>
                <div>
                    <a href="/admin/sekolah/create">
                        <button class="btn btn-lg btn-primary px-3">
                            Tambah
                        </button>
                    </a>
                    <a href="/admin/sarpras/export">
                        <button class="btn btn-lg btn-info px-3 ml-2">
                            Print
                        </button>
                    </a>
                </div>
            </div>

                <div class="card-body">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>NPSN</th>
                                <th>Nama Sekolah</th>
                                <th>Status</th>
                                <th>Jenjang</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sekolah as $row) : ?>
                            <tr>
                                <td><?= $row['npsn'] ?></td>
                                <td><?= $row['nama_sekolah'] ?></td>
                                <td style="text-transform: capitalize;"><?= $row['status'] ?></td>
                                <td style="text-transform: uppercase;"><?= $row['jenjang'] ?></td>
                                <td>
                                    <a href="/admin/sekolah/<?= $row['id_sekolah'] ?>"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <a href="/admin/sekolah/<?= $row['id_sekolah'] ?>/sarpras"
                                        class="btn btn-sm btn-info">Sarpras</a>
                                    <a href="/admin/sekolah/<?= $row['id_sekolah'] ?>/delete"
                                        class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
// Simple Datatable
let table = document.querySelector('#table');
let dataTable = new simpleDatatables.DataTable(table);
</script>
<?= $this->endSection() ?>