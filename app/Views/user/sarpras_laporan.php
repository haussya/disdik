<?= $this->extend('user/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last mb-4">
        <h3>Tambah Laporan Sarpras</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/user/sekolah">Sekolah</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Laporan Sarpras</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <form method="POST" action="<?= '/user/sarpras/' . $sarpras['id_sarpras'] ?>" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <section id="multiple-column-form">
      <div class="row match-height">
        <div class="col-12">
          <section class="card mb-3">
            <div class="card-body">
              <div class="form form-horizontal">
                <div class="row">
                  <div class="col-md-4">
                    <label for="sekolah">Nama Sekolah</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="text" id="sekolah" readonly class="form-control" value="<?= $sekolah['nama_sekolah'] ?>">
                  </div>

                  <div class="col-md-4">
                    <label for="sarpras">Jenis Sarpras</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="text" id="sarpras" readonly class="form-control" value="<?= $sarpras['nama_sarpras'] ?>">
                  </div>

                  <div class="col-md-4">
                    <label for="jumlah">Jumlah</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="number" id="jumlah" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" name="jumlah" value="<?= old('jumlah'); ?>">
                    <div class="invalid-feedback">
                      <?= $validation->getError('jumlah'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label for="tanggal_laporan">Tanggal Laporan Masuk</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="date" id="tanggal_laporan" class="form-control <?= ($validation->hasError('tanggal_laporan')) ? 'is-invalid' : ''; ?>" name="tanggal_laporan" value="<?= old('tanggal_laporan'); ?>">
                    <div class="invalid-feedback">
                      <?= $validation->getError('tanggal_laporan'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label for="keterangan">Keterangan</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <textarea id="keterangan" name="keterangan" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>"><?= old('keterangan') ?></textarea>
                    <div class="invalid-feedback">
                      <?= $validation->getError('keterangan'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label for="foto">Foto</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="file" accept="image/*" id="foto" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" name="foto" value="<?= old('foto'); ?>">
                    <div class="invalid-feedback">
                      <?= $validation->getError('foto'); ?>
                    </div>
                  </div>

                  <div class="col-12 d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary mx-2">Submit</button>
                    <a href="/user/sekolah/<?= $sekolah['id_sekolah'] ?>" class="btn btn-light-secondary">Kembali</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>
  </form>
</div>
<script>
  <?= $this->endSection() ?>

  <?= $this->section('javascript') ?>



  <?= $this->endSection() ?>