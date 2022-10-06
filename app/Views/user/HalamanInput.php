<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Input Data - Sistem Informasi Data Sekolah Dinas Pendidikan Kota Banjarbaru</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url("/css/halamaninput.css"); ?>">
</head>

<body>
    <div class="content">
        <div class="box">
            <p class="headline">INPUT DATA</p>
            <div class="inputan1">
                <div class="kolom">
                    <p class="jenis">NISN</p>
                    <input type="nisn" class="form-control" id="exampleInputUsername1" name="nisn" placeholder="Masukkan NISN...">
                </div>

                <div class="kolom">
                    <p class="jenis">Nama</p>
                    <input type="nama" class="form-control" id="exampleInputUsername1" name="nama" placeholder="Masukkan Nama...">
                </div>

                <div class="kolom">
                    <p class="jenis">Tempat\Tanggal Lahir</p>
                </div>

                <div class="kolom">
                    <p class="jenis">Gender</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelamin" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">Laki-Laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelamin" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Perempuan</label>
                    </div>
                </div>

                <div class="form-group">
                <label for="domisili">Domisili</label>
                <select class="form-control" id="domisili" name="domisili">
                    <option selected disabled value="">Masukkan Domisili ...</option>
                    <?php
                    foreach ($dataDomisili as $row) {
                    ?>
                        <option value="<?= $row['domisili_id'] ?>"> <?= $row['domisili'] ?></option>
                    <?php } ?>
                </select>
                </div>

                <div class="kolom">
                    <p class="jenis">Keterangan Lulus</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="lulus" id="flexRadioDefault1" class="lulus">
                        <label class="form-check-label" for="flexRadioDefault1">Lulus</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="lulus" id="flexRadioDefault2" class="lulus">
                        <label class="form-check-label" for="flexRadioDefault2">Tidak Lulus</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="lulus" id="flexRadioDefault3" class="lulus" checked>
                        <label class="form-check-label" for="flexRadioDefault3">Aktif</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="lulus" id="flexRadioDefault3" class="lulus" checked>
                        <label class="form-check-label" for="flexRadioDefault3">Pindah</label>
                    </div>
                </div>

            </div>
            <div class="inputan2">
                <div class="kolom">
                    <p class="jenis">Tingkatan</p>
                    <select class="form-select" aria-label="Default select example">
                        <option selected dis>Masukkan Tingkatan...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>

                    <p class="jenis">Sekolah Tujuan</p>
                    <select class="form-select" aria-label="Default select example">
                        <option selected dis>Masukkan Sekolah Tujuan...</option>
                        <option value="SDN5SU">SD NEGERI 5 SUNGAI ULIN</option>
                        <option value="SDN3K">SD NEGERI 3 KOMET</option>
                    </select>
                </div>
                <div class="botton">
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </div>


        </div>
    </div>
    <img class="imgbg" src="<?php echo base_url("/asset/foto_dashboard.png"); ?>" width="25px">


</body>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</html>