<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
  <div class="page-title">
    <div class="row mb-4">
      <div class="col-12 col-md-6 order-md-1 order-2">
        <h3>Sarana Prasarana</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-1">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sarana Prasarana</li>
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
        <h4>Sarana Prasarana Sekolah</h4>
        <button class="btn btn-primary px-3" data-bs-toggle="modal" data-bs-target="#modal-create">
          Tambah
        </button>
      </div>

      <div class="card-body">
        <table class="table table-striped" id="table_faktor">
          <thead>
            <tr>
              <td>ID</td>
              <th>Nama Sarpras</th>
              <th>Slug</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sarpras as $row) : ?>
              <tr>
                <td><?= $row['id_sarpras'] ?></td>
                <td><?= $row['nama_sarpras'] ?></td>
                <td><?= $row['slug'] ?></td>
                <td>
                  <a href="/admin/sarpras/<?= $row['id_sarpras'] ?>/delete" class="btn btn-sm btn-danger">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<div class="modal fade text-left" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <form class="modal-content" action="/admin/sarpras" method="POST">
      <?= csrf_field(); ?>
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Tambah Sarana Prasarana</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="nama_sarpras">Nama Sarpras</label>
          <input type="text" class="form-control" name="nama_sarpras" id="nama_sarpras" required>
        </div>
        <div class="form-group">
          <label for="slug">Slug (Kode Unik)</label>
          <input type="text" class="form-control" name="slug" id="slug" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">
          <i class="bx bx-x d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Batal</span>
        </button>
        <button type="submit" class="btn btn-primary ml-1">
          <i class="bx bx-check d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Submit</span>
        </button>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
  // Simple Datatable
  let table_faktor = document.querySelector('#table_faktor');
  let dataTable = new simpleDatatables.DataTable(table_faktor);

  let table_siswa = document.querySelector('#table_siswa');
  let dataTables = new simpleDatatables.DataTable(table_siswa);
</script>
<?= $this->endSection() ?>