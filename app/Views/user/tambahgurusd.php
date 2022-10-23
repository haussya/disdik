<?= $this->extend('user/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Data Guru</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/user">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/user/gurusd">Data Guru</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Guru</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <form method="POST" action="/user/gurusd/simpan">
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
                                                <label for="nip">NIP</label>
                                                <input type="text" id="nip" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" placeholder="NIP" name="nip" autofocus value="<?= old('nip'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nip'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" id="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Nama Guru" name="nama" value="<?= old('nama'); ?>">
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
                                                <input type="text" id="tanggal_lahir" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" placeholder="Tanggal Lahir Guru" name="tanggal_lahir" value="<?= old('tanggal_lahir'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tanggal_lahir'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pangkat_gol">Pangkat/Gol</label>
                                                <input type="text" id="pangkat_gol" class="form-control <?= ($validation->hasError('pangkat_gol')) ? 'is-invalid' : ''; ?>" placeholder="Pangkat/Gol Guru" name="pangkat_gol" value="<?= old('pangkat_gol'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('pangkat_gol'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="eselon">Eselon</label>
                                                <input type="text" id="eselon" class="form-control <?= ($validation->hasError('eselon')) ? 'is-invalid' : ''; ?>" placeholder="Eselon Guru" name="eselon" value="<?= old('eselon'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('eselon'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pendidikan">Pendidikan</label>
                                                <input type="text" id="pendidikan" class="form-control <?= ($validation->hasError('pendidikan')) ? 'is-invalid' : ''; ?>" placeholder="Pendidikan Guru" name="pendidikan" value="<?= old('pendidikan'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('pendidikan'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input type="text" id="nik" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" placeholder="NIK Guru" name="nik" value="<?= old('nik'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nik'); ?>
                                                </div>
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