<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-12 col-md-6 order-md-1 order-2">
                <h3>Siswa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-1">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Siswa</li>
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
                <div>
                    <h4>Data Siswa</h4>
                </div>
                <div>
                    <a href="/admin/siswa/create">
                        <button class="btn btn-lg btn-primary px-3">
                            Tambah
                        </button>
                    </a>
                    <a href="/admin/siswa/export">
                        <button class="btn btn-lg btn-info px-3 ml-2">
                            Print
                        </button>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 form-group px-3">
                        <select id="sekolah" class="form-control" name="sekolah">
                            <option value="" <?= isset($_GET['sekolah']) ? ($_GET['sekolah'] == '' ? 'selected' : '') : '' ?>>Pilih Sekolah</option>
                            <?php foreach ($sekolah as $row) : ?>
                                <option value="<?= $row['id_sekolah'] ?>" <?= isset($_GET['sekolah']) ? ($_GET['sekolah'] == $row['id_sekolah'] ? 'selected' : '') : '' ?>>
                                    <?= $row['nama_sekolah'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-3 form-group">
                        <select id="status" class="form-control" name="status">
                            <option value="" <?= isset($_GET['status']) ? ($_GET['status'] == '' ? 'selected' : '') : '' ?>>Pilih status</option>
                            <?php foreach ($status as $row) : ?>
                                <option value="<?= $row['id_status'] ?>" <?= isset($_GET['status']) ? ($_GET['status'] == $row['id_status'] ? 'selected' : '') : '' ?>>
                                    <?= $row['nama_status'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Sekolah</th>
                            <th>Domisili</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($siswa as $row) : ?>
                            <tr>
                                <td><?= $row['nisn'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['nama_sekolah'] ?></td>
                                <td><?= $row['nama_domisili'] ?></td>
                                <td><?= $row['nama_status'] ?></td>
                                <td>
                                    <a href="/admin/siswa/<?= $row['id_siswa'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="/admin/siswa/<?= $row['id_siswa'] ?>/delete" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </section>
</div>

<script>
    let sekolah = '<?= isset($_GET['sekolah']) ? $_GET['sekolah'] : '' ?>'
    let status = '<?= isset($_GET['status']) ? $_GET['status'] : '' ?>'
    document.getElementById('sekolah').addEventListener('change', (e) => {
        sekolah = e.target.value
        redirect()
    })
    document.getElementById('status').addEventListener('change', (e) => {
        status = e.target.value
        redirect()
    })

    function redirect() {
        location.replace(`?sekolah=${sekolah}&status=${status}`)
    }
</script>

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