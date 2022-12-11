<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <h3>Dashboard</h3>
</div>
<div>
    <?php if ($notif = 1) : ?>
    <div class="alert alert-success order-last mt-2" role="alert">Tidak ada pembaruan data</div>
    <?php elseif ($notif = 2) :?>
    <div class="alert alert-danger">Data Sarpras dipebaharui</div>
    <?php endif; ?>

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
                                <a class="link" href="admin/siswa">Lihat Lebih Lanjut</a>
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
                                <a class="link" href="/admin/siswa/beasiswa">Lihat Lebih Lanjut</a>
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
                                <a class="link" href="/admin/siswa/do-ltm">Lihat Lebih Lanjut</a>
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
                                <p class="kartu">Sekolah</p>
                                <a class="link" href="/admin/sekolah">Lihat Lebih Lanjut</a>
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

        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Chart Status Siswa</h4>
                    </div>
                    <div class="container" style="max-width: 70%; height: auto;">
                        <canvas id="myChart" width="200" height="100"></canvas>
                    </div>
                    <div class="container" style="width: 20%; height: 10%;">
                        <canvas id="Chartsekolah" width="200" height="50"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Chart Jumlah Kelamin Siswa</h4>
                    </div>
                    <div class="container" style="max-width: 70%; height: auto;">
                        <canvas id="chart_kelamin" width="100px" height="100px"></canvas>
                    </div>
                    <div class="container" style="width: 10%; height: 10%;">
                        <canvas id="Chartsekolah" width="100" height="50"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<script>
const klm = document.getElementById('chart_kelamin');
new Chart(klm, {
    type: 'doughnut',
    data: {
        labels: [
            'Laki-Laki',
            'Perempuan',
        ],
        datasets: [{
            label: '# of Votes',
            data: [<?= $laki ?>, <?= $cewe ?>, ],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
            ],
            hoverOffset: 4
        }]
    }
});


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<?= $this->endSection() ?>