<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last mb-4">
        <h3>Sarana Prasarana Sekolah</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/sekolah">Sekolah</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sarpras Sekolah</li>
          </ol>
        </nav>
      </div>

      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success order-last mb-4" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card mb-5">
          <div class="card-content">
            <div class="card-body">
              <div class="form form-horizontal">
                <div class="row">
                  <h5 class="mb-4">Data Sarana Prasarana</h5>
                  <?php foreach ($sarpras as $row) : ?>
                    <div class="col-md-4">
                      <label for="<?= $row['slug'] ?>"><?= $row['nama_sarpras'] ?></label>
                    </div>
                    <div class="col-md-8 form-group d-flex">
                      <input type="text" readonly id="<?= $row['slug'] ?>" class="form-control" name="<?= $row['slug'] ?>" value="<?= $row['jumlah'] ?>">
                      <a href="<?= base_url('/admin/sekolah/' . $sekolah['id_sekolah'] . "/sarpras/" . $row['id_sarpras']) ?>">
                        <button class="btn btn-primary mx-3">Edit</button>
                      </a>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-5">
          <div class="card-content">
            <div class="card-body">
              <div class="form form-horizontal">
                <div class="row">
                  <h5 class="mb-4">Laporan Sarana Prasarana</h5>
                  <?php foreach ($sarpras as $row) : ?>
                    <div class="col-md-4">
                      <label for="<?= $row['slug'] ?>"><?= $row['nama_sarpras'] ?></label>
                    </div>
                    <div class="col-md-8 form-group d-flex">
                      <input type="text" readonly id="<?= $row['slug'] ?>" class="form-control" name="<?= $row['slug'] ?>" value="<?= $row['jumlah'] ?>">
                      <button class="btn btn-primary mx-3">Edit</button>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?= $this->endSection() ?>