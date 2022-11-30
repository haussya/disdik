<?= $this->extend('user/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Siswa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/user">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
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
                <h4>Data Siswa</h4>
                <a href="/user/siswa/tambah">
                    <button class="btn btn-primary px-3">
                        Tambah
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($siswa as $row) : ?>
                            <tr>
                                <td><?= $row['nisn'] ?> </td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['kelamin'] ?></td>
                                <td><?= $row['tanggal_lahir'] ?></td>
                                <td><?= $row['tingkat'] ?></td>
                                <td><?= $row['domisili'] ?></td>
                                <td><?= $row['nama_ibu'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td>
                                    <a href="/user/siswa/<?= $row['id_siswa'] ?>">
                                        <button class="btn btn-primary">Detail</button>
                                    </a>

                                    <a href="/user/siswa/<?= $row['id_siswa'] ?>/delete">
                                        <button class="btn btn-danger">Hapus</button>
                                    </a>
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
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?= $this->endSection() ?>