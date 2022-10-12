<?= $this->extend('user/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="d-flex justify-content-between">
                <h3>Siswa</h3>
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
                <h4>Data Siswa</h4>
                <a href="/user/siswasd/tambah">
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
                        foreach ($datasiswasd as $row) {
                        ?>
                            <tr>
                                <td><?= $row['nisn'] ?> </td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['kelamin'] ?></td>
                                <td><?= $row['tanggal_lahir'] ?></td>
                                <td><?= $row['tingkat'] ?></td>
                                <td><?= $row['domisili'] ?></td>
                                <td><?= $row['nama_ibu'] ?></td>
                                <td><?= $row['status'] ?></td>
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