<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>


<div class="card p-4">
  <div class="kartuall d-flex justify-content-between">
    <div class="kartusiswa">
      <div class="fotokartu">
        <img class="imgcard-center" src="<?= base_url("/asset/gambar_siswa.png"); ?>">
      </div>
      <div class="text">
        <p class="tulisankartu">Data Siswa</p>
        <a class="link" href="<?= base_url("/datasiswa"); ?>">Lihat Lebih Lanjut</a>
      </div>
    </div>
    <div class="kartusiswa">
      <div class="fotokartu">
        <img class="imgcard-center" src="<?= base_url("/asset/gambar_beasiswa.png"); ?>">
      </div>
      <div class="text">
        <p class="tulisankartu">Beasiswa</p>
        <a class="link" href="<?= base_url("/beasiswa"); ?>">Lihat Lebih Lanjut</a>
      </div>
    </div>
    <div class="kartusiswa">
      <div class="fotokartu">
        <img class="imgcard-center" src="<?= base_url("/asset/gambar_doltm.png"); ?>">
      </div>
      <div class="text">
        <p class="tulisankartu">DO & LTM</p>
        <a class="link" href="<?= base_url("/doltm"); ?>">Lihat Lebih Lanjut</a>
      </div>
    </div>
    <div class="kartuguru">
      <div class="fotokartu">
        <img class="imgcard-center" src="<?= base_url("/asset/gambar_guru.png"); ?>">
      </div>
      <div class="text">
        <p class="tulisankartu">Guru</p>
        <a class="link" href="<?= base_url("/tabelguru"); ?>">Lihat Lebih Lanjut</a>
      </div>
    </div>
    <div class="kartusarpras">
      <div class="fotokartu">
        <img class="imgcard-center" src="<?php echo base_url("/asset/gambar_sarpras.png"); ?>">
      </div>
      <div class="text">
        <p class="tulisankartu">Sarpras</p>
        <a class="link" href="<?= base_url("/tabelsarpras"); ?>">Lihat Lebih Lanjut</a>
      </div>
    </div>
  </div>
  
</div>
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Radial Gradient Chart</h4>
                    </div>
                    <div class="card-body">
                        <div id="candle"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/assets/js/pages/dashboard.js"></script>
<?= $this->endSection() ?>