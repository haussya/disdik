<?= $this->extend('user/layouts/app') ?>

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
            <li class="breadcrumb-item"><a href="/user">Dashboard</a></li>
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
        <h4>Data Siswa</h4>
        <a href="/user/siswa/create">
          <button class="btn btn-primary px-3">
            Tambah
          </button>
        </a>
      </div>

      <div class="card-body">
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
                  <a href="/user/siswa/<?= $row['id_siswa'] ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="/user/siswa/<?= $row['id_siswa'] ?>/delete" class="btn btn-sm btn-danger">Hapus</a>
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