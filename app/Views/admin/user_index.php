<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
  <div class="page-title">
    <div class="row mb-4">
      <div class="col-12 col-md-6 order-md-1 order-2">
        <h3>User</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-1">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">User</li>
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
        <h4>Data User</h4>
        <a href="/admin/user/create">
          <button class="btn btn-primary px-3">
            Tambah
          </button>
        </a>
      </div>

      <div class="card-body">
        <table class="table table-striped" id="table1">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($user as $row) : ?>
              <tr>
                <td><?= $row['id_user'] ?> </td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['role'] ?></td>
                <td>
                  <a href="/admin/user/<?= $row['id_user'] ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="/admin/user/<?= $row['id_user'] ?>/delete" class="btn btn-sm btn-danger">Hapus</a>
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