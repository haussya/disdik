<?= $this->extend('user/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Data Siswa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/user">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/user/datasiswasmp">Data Siswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Siswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <form method="POST" action="/user/datasiswasmp/simpan">
        <?= csrf_field(); ?>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nisn">NISN</label>
                                                <input type="text" id="nisn" class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>" placeholder="NISN" name="nisn" autofocus value="<?= old('nisn'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nisn'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" id="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Nama Siswa" name="nama" value="<?= old('nama'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kelamin">Kelamin</label>
                                                <select id="kelamin" class="form-control" name="kelamin" required>
                                                    <option selected disabled value="">Pilih Kelamin ...</option>
                                                    <?php
                                                    foreach ($kelamin as $row) {
                                                    ?>
                                                        <option value="<?= $row['kelamin_id'] ?>"> <?= $row['kelamin'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="text" id="tanggal_lahir" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" placeholder="Tanggal Lahir Siswa" name="tanggal_lahir" value="<?= old('tanggal_lahir'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tanggal_lahir'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tingkat">Tingkat</label>
                                                <select id="tingkat" class="form-control" name="tingkat" required>
                                                    <option selected disabled value="">Pilih Tingkat ...</option>
                                                    <?php
                                                    foreach ($tingkat as $row) {
                                                    ?>
                                                        <option value="<?= $row['tingkat_id'] ?>"> <?= $row['tingkat'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="domisili">Domisili</label>
                                                <select id="domisili" class="form-control" name="domisili" required>
                                                    <option selected disabled value="">Pilih Domisili ...</option>
                                                    <?php
                                                    foreach ($domisili as $row) {
                                                    ?>
                                                        <option value="<?= $row['domisili_id'] ?>"> <?= $row['domisili'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_ibu">Nama Ibu Kandung</label>
                                                <input type="text" id="nama_ibu" class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>" placeholder="Nama Ibu Kandung Siswa" name="nama_ibu" value="<?= old('nama_ibu'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama_ibu'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select id="status" class="form-control" name="status" required>
                                                    <option selected disabled value="">Pilih Status ...</option>
                                                    <?php
                                                    foreach ($status as $row) {
                                                    ?>
                                                        <option value="<?= $row['status_id'] ?>"> <?= $row['status'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
<?= $this->endSection() ?>