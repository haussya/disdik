<?= $this->extend('user/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
  <div class="page-title">
    <div class="row mb-4">
      <div class="col-12 col-md-6 order-md-1 order-2">
        <h3>Siswa DO & LTM</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-1">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/user">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Siswa DO & LTM</li>
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
        <h4>Siswa DO & LTM</h4>
      </div>

      <div class="card-body">
        <table class="table table-striped" id="table_siswa">
          <thead>
            <tr>
              <th>NISN</th>
              <th>Nama</th>
              <th>Sekolah</th>
              <th>Domisili</th>
              <th>Status</th>
              <th>Faktor</th>
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
                <td><?= $row['nama_faktor'] ?></td>
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

<div class="modal fade text-left" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <form class="modal-content" action="/user/faktor" method="POST">
      <?= csrf_field(); ?>
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Tambah Faktor</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="nama_faktor">Nama Faktor</label>
          <input type="text" class="form-control" name="nama_faktor" id="nama_faktor" required>
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
  let table_siswa = document.querySelector('#table_siswa');
  let dataTables = new simpleDatatables.DataTable(table_siswa);
</script>
<?= $this->endSection() ?>