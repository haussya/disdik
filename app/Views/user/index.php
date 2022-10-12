<?= $this->extend('user/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <h3>Dashboard</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="imgcard-center" src="<?= base_url("/assets/gambar_siswa.png"); ?>">
                                </div>
                                <div class="text">
                                    <p class="kartu">Data Siswa</p>
                                    <a class="link" href="/user/datasiswa">Lihat Lebih Lanjut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="imgcard-center" src="<?= base_url("/assets/gambar_beasiswa.png"); ?>">
                                </div>
                                <div class="text">
                                    <p class="kartu">Beasiswa</p>
                                    <a class="link" href="/user/beasiswa">Lihat Lebih Lanjut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="imgcard-center" src="<?= base_url("/assets/gambar_doltm.png"); ?>">
                                </div>
                                <div class="text">
                                    <p class="kartu">DO & LTM</p>
                                    <a class="link" href="/user/doltm">Lihat Lebih Lanjut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="imgcard-center" src="<?= base_url("/assets/gambar_guru.png"); ?>">
                                </div>
                                <div class="text">
                                    <p class="kartu">Guru</p>
                                    <a class="link" href="/user/guru">Lihat Lebih Lanjut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="imgcard-center" src="<?= base_url("/assets/gambar_sarpras.png"); ?>">
                                </div>
                                <div class="text">
                                    <p class="kartu">Sarpras</p>
                                    <a class="link" href="/user/sarpras">Lihat Lebih Lanjut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Chart Jumlah Siswa</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/assets/js/pages/dashboard.js"></script>
<?= $this->endSection() ?>