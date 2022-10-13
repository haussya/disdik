<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Siswa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/datasiswasd">Data Siswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Siswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <form method="POST" action="<?= base_url('/admin/datasiswasd/update') . '/' . $dataEdit['nisn'] ?>">
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
                                                <input value="<?php echo $dataEdit['nisn'] ?>" type="text" id="nisn" class="form-control" placeholder="NISN" name="nisn">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama">Name</label>
                                                <input value="<?php echo $dataEdit['nama'] ?>" type="text" id="nama" class="form-control" placeholder="Nama Siswa" name="nama">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kelamin">Kelamin</label>
                                                <select class="form-control" id="kelamin" name="kelamin">
                                                    <option selected disabled value="">Pilih Kelamin ...</option>
                                                    <?php
                                                    foreach ($kelamin as $row) {
                                                    ?>
                                                        <option value="<?= $row['kelamin_id'] ?>" <?= ($row['kelamin_id'] == $dataEdit['kelamin_id']) ? 'selected' : ''; ?>><?= $row['kelamin'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input value="<?php echo $dataEdit['tanggal_lahir'] ?>" type="text" id="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir Siswa" name="tanggal_lahir">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tingkat">Tingkat</label>
                                                <select class="form-control" id="tingkat" name="tingkat">
                                                    <option selected disabled value="">Pilih Tingkat ...</option>
                                                    <?php
                                                    foreach ($tingkat as $row) {
                                                    ?>
                                                        <option value="<?= $row['tingkat_id'] ?>" <?= ($row['tingkat_id'] == $dataEdit['tingkat_id']) ? 'selected' : ''; ?>><?= $row['tingkat'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="domisili">Domisili</label>
                                                <select class="form-control" id="domisili" name="domisili">
                                                    <option selected disabled value="">Pilih Domisili ...</option>
                                                    <?php
                                                    foreach ($domisili as $row) {
                                                    ?>
                                                        <option value="<?= $row['domisili_id'] ?>" <?= ($row['domisili_id'] == $dataEdit['domisili_id']) ? 'selected' : ''; ?>><?= $row['domisili'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_ibu">Nama Ibu Kandung</label>
                                                <input value="<?php echo $dataEdit['nama_ibu'] ?>" type="text" id="nama_ibu" class="form-control" placeholder="Nama Ibu Kandung Siswa" name="nama_ibu">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option selected disabled value="">Pilih Status ...</option>
                                                    <?php
                                                    foreach ($status as $row) {
                                                    ?>
                                                        <option value="<?= $row['status_id'] ?>" <?= ($row['status_id'] == $dataEdit['status_id']) ? 'selected' : ''; ?>><?= $row['status'] ?></option>
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