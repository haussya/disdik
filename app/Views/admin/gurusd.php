<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Guru</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Guru</li>
                    </ol>
                </nav>
            </div>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4>Data Guru</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Pangkat/Gol</th>
                            <th>Eselon</th>
                            <th>Pendidikan</th>
                            <th>NIK</th>
                            <th>Domisili</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($gurusd as $row) {
                        ?>
                            <tr>
                                <td><?= $row['nip'] ?> </td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['kelamin'] ?></td>
                                <td><?= $row['tanggal_lahir'] ?></td>
                                <td><?= $row['pangkat_gol'] ?></td>
                                <td><?= $row['eselon'] ?></td>
                                <td><?= $row['pendidikan'] ?></td>
                                <td><?= $row['nik'] ?></td>
                                <td><?= $row['domisili'] ?></td>
                                <td>
                                    <a href="/admin/gurusd/edit/<?php echo $row['nip'] ?>" class="btn btn-info">📝</a>
                                </td>
                                <td>
                                    <form action="/admin/gurusd/hapus/<?= $row['nip']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin');">🗑️</button>
                                    </form>
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