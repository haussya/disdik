<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Siswa</h3>
                <p class="text-subtitle text-muted">Data Siswa</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <?php if (session()->getFlashData('pesan')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashData('pesan') ?></div>
    <?php endif; ?>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4>Data Siswa</h4>
                <a href="/admin/datasiswasd/tambah">
                    <button class="btn btn-primary px-3">
                        Add
                    </button>
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Tingkat</th>
                            <th>Domisili</th>
                            <th>Nama Ibu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($dataSiswaSD as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row['nisn'] ?> </td>
                                <td><?php echo $row['nama'] ?></td>
                                <td><?php echo $row['kelamin'] ?></td>
                                <td><?php echo $row['tanggal_lahir'] ?></td>
                                <td><?php echo $row['tingkat'] ?></td>
                                <td><?php echo $row['domisili'] ?></td>
                                <td><?php echo $row['nama_ibu'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <td>
                                    <a href="<?php echo base_url() ?>/admin/datasiswasd/edit/<?php echo $row['nisn'] ?>" class="btn btn-info">📝</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() ?>/admin/datasiswasd/hapus/<?php echo $row['nisn'] ?>" class="btn btn-danger">🗑️</a>
                                </td>
                            </tr>
                        <?php } ?>
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
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?= $this->endSection() ?>