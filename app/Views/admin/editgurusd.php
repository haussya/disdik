<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Guru</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/gurusd">Guru</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Guru</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <form method="POST" action="<?= base_url('/admin/gurusd/update') . '/' . $dataEdit['nip'] ?>">
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
                                                <input value="<?php echo $dataEdit['nip'] ?>" type="text" id="nip" class="form-control" placeholder="NIP" name="nip">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama">Name</label>
                                                <input value="<?php echo $dataEdit['nama'] ?>" type="text" id="nama" class="form-control" placeholder="Nama Guru" name="nama">
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
                                                <input value="<?php echo $dataEdit['tanggal_lahir'] ?>" type="text" id="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir Guru" name="tanggal_lahir">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pangkat_gol">Pangkat/Gol</label>
                                                <input value="<?php echo $dataEdit['pangkat_gol'] ?>" type="text" id="pangkat_gol" class="form-control" placeholder="Pangkat/Gol Guru" name="pangkat_gol">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="eselon">Eselon</label>
                                                <input value="<?php echo $dataEdit['eselon'] ?>" type="text" id="eselon" class="form-control" placeholder="Eselon Guru" name="eselon">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pendidikan">Pendidikan</label>
                                                <input value="<?php echo $dataEdit['pendidikan'] ?>" type="text" id="pendidikan" class="form-control" placeholder="Pendidikan Guru" name="pendidikan">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input value="<?php echo $dataEdit['nik'] ?>" type="text" id="nik" class="form-control" placeholder="NIK Guru" name="nik">
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