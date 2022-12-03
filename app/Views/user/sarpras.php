<?= $this->extend('user/layouts/app') ?>

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
            <li class="breadcrumb-item"><a href="/user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/user/sekolah">Sekolah</a></li>
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

  <form method="POST" action="/user/sarpras">
    <?= csrf_field(); ?>
    <section id="multiple-column-form">
      <div class="row match-height">
        <div class="col-12">
          <div class="card mb-5">
            <div class="card-content">
              <div class="card-body">
                <div class="form form-horizontal">
                  <div class="row">
                    <?php foreach ($sarpras as $row) : ?>
                      <div class="col-md-4">
                        <label for="<?= $row['slug'] ?>"><?= $row['nama_sarpras'] ?></label>
                      </div>
                      <div class="col-md-8 form-group">
                        <input type="text" id="<?= $row['slug'] ?>" class="form-control" name="<?= $row['slug'] ?>" value="<?= $row['jumlah'] ?>">
                      </div>
                    <?php endforeach; ?>

                    <div class="col-12 d-flex justify-content-end mt-3">
                      <button type="submit" class="btn btn-primary mx-2">Submit</button>
                      <a href="/user" class="btn btn-light-secondary">Kembali</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>
<?= $this->endSection() ?>