<?= $this->extend('user/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last mb-4">
        <h3>Edit Sekolah</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/user">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/user/sekolah">Sekolah</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Sekolah</li>
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

  <form method="POST" action="/user/sekolah">
    <?= csrf_field(); ?>
    <section id="multiple-column-form">
      <div class="row match-height">
        <div class="col-12">
          <div class="card mb-5">
            <div class="card-content">
              <div class="card-body">
                <div class="form form-horizontal">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="nama_sekolah">Nama Sekolah</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <input type="text" id="nama_sekolah" class="form-control <?= ($validation->hasError('nama_sekolah')) ? 'is-invalid' : ''; ?>" name="nama_sekolah" value="<?= $sekolah['nama_sekolah'] ?>">
                      <div class="invalid-feedback">
                        <?= $validation->getError('nama_sekolah'); ?>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label for="npsn">NPSN</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <input type="text" id="npsn" class="form-control <?= ($validation->hasError('npsn')) ? 'is-invalid' : ''; ?>" name="npsn" value="<?= $sekolah['npsn'] ?>">
                      <div class="invalid-feedback">
                        <?= $validation->getError('npsn'); ?>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label for="jenjang">Jenjang</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select id="jenjang" class="form-control <?= ($validation->hasError('jenjang')) ? 'is-invalid' : ''; ?>" name="jenjang">
                        <option value="" <?= $sekolah['jenjang'] == '' ? 'selected' : '' ?>>Pilih Jejang</option>
                        <option value="SD" <?= $sekolah['jenjang'] == 'SD' ? 'selected' : '' ?>>SD</option>
                        <option value="SMP" <?= $sekolah['jenjang'] == 'SMP' ? 'selected' : '' ?>>SMP</option>
                      </select>
                      <div class="invalid-feedback">
                        <?= $validation->getError('jenjang'); ?>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label for="status">Status</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select id="status" class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" name="status">
                        <option value="" <?= $sekolah['status'] == '' ? 'selected' : '' ?>>Pilih Status</option>
                        <option value="negeri" <?= $sekolah['status'] == 'negeri' ? 'selected' : '' ?>>Negeri</option>
                        <option value="swasta" <?= $sekolah['status'] == 'swasta' ? 'selected' : '' ?>>Swasta</option>
                      </select>
                      <div class="invalid-feedback">
                        <?= $validation->getError('status'); ?>
                      </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end mt-3">
                      <button type="submit" class="btn btn-primary mx-2">Submit</button>
                      <a href="/user/sekolah" class="btn btn-light-secondary">Kembali</a>
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