<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-4">
                <h3>Tambah Siswa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/siswa">Siswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Siswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <form method="POST" action="/admin/laporan/tambah">
        <?= csrf_field(); ?>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <section class="card mb-3">
                        <div class="card-header">
                            <h4>Biodata Siswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="form form-horizontal">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="sekolah">Nama Sekolah</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select id="sekolah"
                                            class="form-control <?= ($validation->hasError('sekolah')) ? 'is-invalid' : ''; ?>"
                                            name="sekolah">
                                            <option value="" <?= old('sekolah') == '' ? 'selected' : '' ?>>Pilih Sekolah
                                            </option>
                                            <?php foreach ($sekolah as $row) : ?>
                                            <option value="<?= $row['id_sekolah'] ?>"
                                                <?= old('sekolah') == $row['id_sekolah'] ? 'selected' : '' ?>>
                                                <?= $row['nama_sekolah'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('sekolah'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="nama">Jenis Sarpras</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="nama"
                                            class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                            name="nama" value="<?= old('nama'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="tanggal_lahir">Tanggal Laporan Masuk</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="date" id="tanggal_lahir"
                                            class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>"
                                            name="tanggal_lahir" value="<?= old('tanggal_lahir'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tanggal_lahir'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="jenis_kelamin">Status Sarpras</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select id="jenis_kelamin"
                                            class="form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>"
                                            name="jenis_kelamin">
                                            <option value="" <?= old('jenis_kelamin') == '' ? 'selected' : '' ?>>Pilih
                                                Jenis Kelamin</option>
                                            <option value="L" <?= old('jenis_kelamin') == 'L' ? 'selected' : '' ?>>
                                                Laki-laki</option>
                                            <option value="P" <?= old('jenis_kelamin') == 'P' ? 'selected' : '' ?>>
                                                Perempuan</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenis_kelamin'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="nama">Foto</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="nama"
                                            class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                            name="nama" value="<?= old('nama'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama'); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="col-12 d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-primary mx-2">Submit</button>
                        <a href="/admin/siswa" class="btn btn-light-secondary">Kembali</a>
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