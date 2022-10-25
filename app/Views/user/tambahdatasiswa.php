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
                        <li class="breadcrumb-item"><a href="/user/datasiswasd">Data Siswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Siswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <form method="POST" action="/user/datasiswa/simpan">
        <?= csrf_field(); ?>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nisn">NISN</label>
                                                <input type="text" id="nisn"
                                                    class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>"
                                                    placeholder="NISN" name="nisn" autofocus
                                                    value="<?= old('nisn'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nisn'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" id="nama"
                                                    class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                                    placeholder="Nama Siswa" name="nama" value="<?= old('nama'); ?>">
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
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" id="tanggal_lahir"
                                                    class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>"
                                                    placeholder="Tanggal Lahir Siswa" name="tanggal_lahir"
                                                    value="<?= old('tanggal_lahir'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tanggal_lahir'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tingkat">Tingkat</label>
                                                <input type="number" id="tingkat"
                                                    class="form-control <?= ($validation->hasError('tingkat')) ? 'is-invalid' : ''; ?>"
                                                    placeholder="tingkat" name="tingkat" value="<?= old('tingkat'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tingkat'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" id="alamat"
                                                    class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"
                                                    placeholder="alamat" name="alamat" value="<?= old('alamat'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('alamat'); ?>
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
                                                    <option value="<?= $row['domisili_id'] ?>"> <?= $row['domisili'] ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_ibu">Nama Ibu Kandung</label>
                                                <input type="text" id="nama_ibu"
                                                    class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>"
                                                    placeholder="Nama Ibu Kandung Siswa" name="nama_ibu"
                                                    value="<?= old('nama_ibu'); ?>">
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
                                                    <option value="<?= $row['status_id'] ?>"> <?= $row['status'] ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- keterangan -->
        <section id="kentut">

        </section>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
        </div>
    </form>

</div>

<script>
var opal = `<input type="hidden" name="isDO" value="ket">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="faktor">Faktor</label>
                                                <select id="faktor" class="form-control" name="faktor" required>
                                                    <option value="">Pilih ...</option>
                                                    <option value="putus sekolah">Putus Sekolah</option>
                                                    <option value="berkerja">Berkerja</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="rencana_melanjutkan">Rencana Melanjutkan</label>
                                                <select id="rencana_melanjutkan" class="form-control"
                                                    name="rencana_melanjutkan" required>
                                                    <option value="">Pilih ...</option>
                                                    <option value="ya">Ya</option>
                                                    <option value="tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="alasan_tidak_melanjutkan">Alasan Tidak Melanjutkan</label>
                                                <input type="text" id="alasan_tidak_melanjutkan"
                                                    class="form-control <?= ($validation->hasError('alasan_tidak_melanjutkan')) ? 'is-invalid' : ''; ?>"
                                                    placeholder="faktor" name="alasan_tidak_melanjutkan" autofocus
                                                    value="<?= old('alasan_tidak_melanjutkan'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('alasan_tidak_melanjutkan'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
document.getElementById('status').addEventListener('change', (e) => {
    console.log(e.target.value)
    if (e.target.value == 0) {
        console.log('dsadasdasdsadasd');
        document.getElementById('kentut').innerHTML = opal;
    } else {
        document.getElementById('kentut').innerHTML = '';
    }
})
</script>
<?= $this->endSection() ?>