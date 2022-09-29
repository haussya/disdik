<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>


<div class="card p-4">
  <div class="kartuall d-flex justify-content-between">
    <div class="kartusiswa">
      <div class="fotokartu">
        <img class="imgcard-center" src="<?= base_url("/asset/gambar_siswa.png"); ?>">
      </div>
      <div class="text">
        <p class="tulisankartu">SISWA</p>
        <a class="link" href="<?= base_url("/InputSiswaSD"); ?>">Lihat Lebih Lanjut</a>
      </div>
    </div>
    <div class="kartuguru">
      <div class="fotokartu">
        <img class="imgcard-center" src="<?= base_url("/asset/gambar_guru.png"); ?>">
      </div>
      <div class="text">
        <p class="tulisankartu">GURU</p>
        <a class="link" href="<?= base_url("/tabelguru"); ?>">Lihat Lebih Lanjut</a>
      </div>
    </div>
    <div class="kartusarpras">
      <div class="fotokartu">
        <img class="imgcard-center" src="<?php echo base_url("/asset/gambar_sarpras.png"); ?>">
      </div>
      <div class="text">
        <p class="tulisankartu">SARPRAS</p>
        <a class="link" href="http://localhost/disdik//tabelsarpras">Lihat Lebih Lanjut</a>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/assets/js/pages/dashboard.js"></script>
<?= $this->endSection() ?>