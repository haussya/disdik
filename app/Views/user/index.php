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
                                    <a class="link" href="user/siswa">Lihat Lebih Lanjut</a>
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
                                    <a class="link" href="/user/siswa/beasiswa">Lihat Lebih Lanjut</a>
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
                                    <a class="link" href="/user/siswa/do-ltm">Lihat Lebih Lanjut</a>
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
            <!-- <div class="row">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Chart Status Siswa</h4>
                        </div>
                        <div class="container" style="width: 40%; height: 30%;">
                            <canvas id="myChart" width="200" height="100"></canvas>
                        </div>
                        <div class="container" style="width: 40%; height: 30%;">
                            <canvas id="Chartsekolah" width="200" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div> -->

    </section>
</div>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['DO', 'Lulus', 'LTM', 'Aktif'],
        datasets: [{
            label: '# of Votes',
            data: [<?= $do ?>, <?= $lulus ?>, <?= $ltm ?>, <?= $aktif ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',

            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {

        }
    }
});
</script>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/assets/js/pages/dashboard.js"></script>
<?= $this->endSection() ?>