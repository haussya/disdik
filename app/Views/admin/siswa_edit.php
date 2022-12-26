<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-4">
                <h3>Edit Siswa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/siswa">Siswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Siswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <form method="POST" action="/admin/siswa/create">
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
                                            <option value="" <?= $siswa['id_sekolah'] == '' ? 'selected' : '' ?>>Pilih
                                                Sekolah</option>
                                            <?php foreach ($sekolah as $row) : ?>
                                            <option value="<?= $row['id_sekolah'] ?>"
                                                <?= $siswa['id_sekolah'] == $row['id_sekolah'] ? 'selected' : '' ?>>
                                                <?= $row['nama_sekolah'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('sekolah'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="nama">Nama</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="nama"
                                            class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                            name="nama" value="<?= $siswa['nama']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="nisn">NISN</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="nisn"
                                            class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>"
                                            name="nisn" value="<?= $siswa['nisn']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nisn'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select id="jenis_kelamin"
                                            class="form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>"
                                            name="jenis_kelamin">
                                            <option value="" <?= $siswa['jenis_kelamin'] == '' ? 'selected' : '' ?>>
                                                Pilih Jenis Kelamin</option>
                                            <option value="L" <?= $siswa['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>
                                                Laki-laki</option>
                                            <option value="P" <?= $siswa['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>
                                                Perempuan</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenis_kelamin'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="date" id="tanggal_lahir"
                                            class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>"
                                            name="tanggal_lahir" value="<?= $siswa['tanggal_lahir'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tanggal_lahir'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="nama_ibu">Nama Ibu</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="nama_ibu"
                                            class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>"
                                            name="nama_ibu" value="<?= $siswa['nama_ibu'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_ibu'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="tingkat">Tingkat</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="number" placeholder="1-9" min="1" max="12" id="tingkat"
                                            class="form-control <?= ($validation->hasError('tingkat')) ? 'is-invalid' : ''; ?>"
                                            name="tingkat" value="<?= $siswa['tingkat'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tingkat'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="domisili">Domisili</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select id="domisili"
                                            class="form-control <?= ($validation->hasError('domisili')) ? 'is-invalid' : ''; ?>"
                                            name="domisili">
                                            <option value="" <?= $siswa['id_domisili'] == '' ? 'selected' : '' ?>>Pilih
                                                Domisili</option>
                                            <?php foreach ($domisili as $row) : ?>
                                            <option value="<?= $row['id_domisili'] ?>"
                                                <?= $siswa['id_domisili'] == $row['id_domisili'] ? 'selected' : '' ?>>
                                                <?= $row['nama_domisili'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('domisili'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="alamat">Alamat</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <textarea id="alamat"
                                            class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"
                                            name="alamat"><?= $siswa['alamat'] ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('alamat'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="card mb-3">
                        <div class="card-header">
                            <h4>Status Siswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="form form-horizontal">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="status">Status</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select id="status"
                                            class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>"
                                            name="status">
                                            <option value="" <?= $siswa['id_status'] == '' ? 'selected' : '' ?>>Pilih
                                                status</option>
                                            <?php foreach ($status as $row) : ?>
                                            <option value="<?= $row['id_status'] ?>"
                                                <?= $siswa['id_status'] == $row['id_status'] ? 'selected' : '' ?>>
                                                <?= $row['nama_status'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('status'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-none" id="status_rencana">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="rencana_melanjutkan">Rencana Melanjutkan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select id="rencana_melanjutkan"
                                                class="form-control <?= ($validation->hasError('rencana_melanjutkan')) ? 'is-invalid' : ''; ?>"
                                                name="rencana_melanjutkan">
                                                <option value="ya"
                                                    <?= $keterangan == null ? 'selected' : ($keterangan['rencana_melanjutkan'] == 'ya' ? 'selected' : '') ?>>
                                                    Ya</option>
                                                <option value="tidak"
                                                    <?= $keterangan == null ? '' : ($keterangan['rencana_melanjutkan'] == 'tidak' ? 'selected' : '') ?>>
                                                    Tidak</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('rencana_melanjutkan'); ?>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="faktor">Faktor</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select id="faktor"
                                                class="form-control <?= ($validation->hasError('faktor')) ? 'is-invalid' : ''; ?>"
                                                name="faktor">
                                                <option value="" <?= old('faktor') == '' ? 'selected' : '' ?>>Pilih
                                                    faktor</option>
                                                <?php foreach ($faktor as $row) : ?>
                                                <option value="<?= $row['id_faktor'] ?>"
                                                    <?= $keterangan == null ? '' : ($keterangan['id_faktor'] == $row['id_faktor'] ? 'selected' : '') ?>>
                                                    <?= $row['nama_faktor'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('faktor'); ?>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="alasan_tidak_melanjutkan">Alasan Tidak Melanjutkan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea id="alasan_tidak_melanjutkan"
                                                class="form-control <?= ($validation->hasError('alasan_tidak_melanjutkan')) ? 'is-invalid' : ''; ?>"
                                                name="alasan_tidak_melanjutkan"><?= $keterangan == null ? '' : $keterangan['alasan_tidak_melanjutkan'] ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('alasan_tidak_melanjutkan'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="card mb-3">
                        <div class="card-header">
                            <h4>Beasiswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="form form-horizontal">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="beasiswa">Penerima Beasiswa?</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select id="beasiswa" class="form-control" name="beasiswa">
                                            <option value="tidak" <?= $beasiswa == null ? 'selected' : '' ?>>Tidak
                                            </option>
                                            <option value="ya" <?= $beasiswa != null ? 'selected' : '' ?>>Ya</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row d-none" id="status_beasiswa">
                                    <div class="col-md-4">
                                        <label for="nama_beasiswa">Nama Beasiswa</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="nama_beasiswa"
                                            class="form-control <?= ($validation->hasError('nama_beasiswa')) ? 'is-invalid' : ''; ?>"
                                            name="nama_beasiswa"
                                            value="<?= $beasiswa == null ? '' : $beasiswa['nama_beasiswa'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_beasiswa'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="besaran">Besaran</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="number" id="besaran"
                                            class="form-control <?= ($validation->hasError('besaran')) ? 'is-invalid' : ''; ?>"
                                            name="besaran" value="<?= $beasiswa == null ? '' : $beasiswa['besaran'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('besaran'); ?>
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
    <div class="card-body">

        <table class="table table-striped" id="table">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Sekolah</th>
                    <th>Domisili</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($riwayat as $row) : ?>
                <tr>
                    <td><?= $row['nisn'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['nama_sekolah'] ?></td>
                    <td><?= $row['nama_domisili'] ?></td>
                    <td><?= $row['nama_status'] ?></td>
                    <td>
                        <a href="/admin/siswa/<?= $row['id_siswa'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="/admin/siswa/<?= $row['id_siswa'] ?>/delete" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
<script>
const siswa_status = document.getElementsByName('status')[0]
const siswa_beasiswa = document.getElementsByName('beasiswa')[0]

const status_rencana = document.getElementById('status_rencana')
const status_beasiswa = document.getElementById('status_beasiswa')


if (!['3', '4'].includes(siswa_status.value)) {
    status_rencana.classList.add('d-none')
} else {
    status_rencana.classList.remove('d-none')
}


if (siswa_beasiswa.value == 'ya') {
    status_beasiswa.classList.remove('d-none')
} else {
    status_beasiswa.classList.add('d-none')
}

siswa_status.addEventListener('change', (e) => {
    if (!['3', '4'].includes(e.target.value)) {
        status_rencana.classList.add('d-none')
    } else {
        status_rencana.classList.remove('d-none')
    }
})

siswa_beasiswa.addEventListener('change', (e) => {
    if (e.target.value == 'ya') {
        status_beasiswa.classList.remove('d-none')
    } else {
        status_beasiswa.classList.add('d-none')
    }
})
</script>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>



<?= $this->endSection() ?>