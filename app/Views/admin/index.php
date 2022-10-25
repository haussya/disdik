<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <h3>Dashboard</h3>
</div>
<div class="page-content ">
    <section class="row">
        <div class="d-flex justify-content-between">
            <div class="justify">
                <div class="card ">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="imgcard-center" src="<?= base_url("/assets/gambar_siswa.png"); ?>">
                            </div>
                            <div class="text">
                                <p class="kartu">Data Siswa</p>
                                <a class="link" href="admin/datasiswa">Lihat Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="justify">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="imgcard-center" src="<?= base_url("/assets/gambar_beasiswa.png"); ?>">
                            </div>
                            <div class="text">
                                <p class="kartu">Beasiswa</p>
                                <a class="link" href="/admin/beasiswa">Lihat Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="justify">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="imgcard-center" src="<?= base_url("/assets/gambar_doltm.png"); ?>">
                            </div>
                            <div class="text">
                                <p class="kartu">DO & LTM</p>
                                <a class="link" href="/admin/doltm">Lihat Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="justify">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="imgcard-center" src="<?= base_url("/assets/gambar_guru.png"); ?>">
                            </div>
                            <div class="text">
                                <p class="kartu">Guru</p>
                                <a class="link" href="/admin/guru">Lihat Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="justify">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="imgcard-center" src="<?= base_url("/assets/gambar_sarpras.png"); ?>">
                            </div>
                            <div class="text">
                                <p class="kartu">Sarpras</p>
                                <a class="link" href="/admin/sarpras">Lihat Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="justify">
                        <div class="card ">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="imgcard-center" src="<?= base_url("/assets/gambar_siswa.png"); ?>">
                                    </div>
                                    <div class="text">
                                        <p class="kartu">Data Siswa</p>
                                        <a class="link" href="admin/datasiswasd">Lihat Lebih Lanjut</a>
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
                                        <img class="imgcard-center"
                                            src="<?= base_url("/assets/gambar_beasiswa.png"); ?>">
                                    </div>
                                    <div class="text">
                                        <p class="kartu">Beasiswa</p>
                                        <a class="link" href="/admin/beasiswa">Lihat Lebih Lanjut</a>
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
                                        <a class="link" href="/admin/doltm">Lihat Lebih Lanjut</a>
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
                                        <a class="link" href="/admin/guru">Lihat Lebih Lanjut</a>
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
                                        <img class="imgcard-center"
                                            src="<?= base_url("/assets/gambar_sarpras.png"); ?>">
                                    </div>
                                    <div class="text">
                                        <p class="kartu">Sarpras</p>
                                        <a class="link" href="/admin/sarpras">Lihat Lebih Lanjut</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        <!-- <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Chart Jumlah Siswa</h4>
                    </div>
                    <!-- <div class="card-body">
                        <div id="chart-profile-visit"></div>
                    </div> -->
                    <canvas id="datamurid" width="400" height="100" aria-label="Hello ARIA World" role="img"></canvas>
                </div>
            </div>
        </div>

    </section>
</div>





<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/assets/js/pages/dashboard.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<?= $this->endSection() ?>