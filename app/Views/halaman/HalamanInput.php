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

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            position: relative;
            min-height: 100vh;
            display: flex;
            justify-content: flex-end;
        }

        nav {
            display: flex;
            justify-content: flex-end;
            height: 50px;
            width: 80%;
            min-width: 80%;
            background: #FFFFFF;
            box-shadow: 0px 12px 6px -3px rgba(0, 0, 0, 0.25);
            position: absolute;
            right: 0;
        }

        .imgbg {
            display: flex;
            justify-content: space-between 20;
            height: 100vh;
            width: 100%;
        }

        .org {
            padding-top: 12px;
            padding-right: 12px;
            display: flex-end;

        }

        .orgx {

            padding-right: 15px;
            padding-top: 12px;
            padding-bottom: 25px;
            border: 1px;
        }

        p {
            font-size: 12px;
            font-weight: bold;
            padding-top: 7px;
            padding-right: 20px;
            color: #5A5B5A;
        }

        .box {
            position: absolute;
            width: 76%;
            height: 85%;
            margin-top: 5%;
            margin-left: 22%;


            background-color: #ffffff;
            box-shadow: 0px 12px 6px -3px rgba(0, 0, 0, 0.2);
        }

        .headline {
            font-size: 22px;
            font-weight: bold;
            padding-top: 20px;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 5px;
        }

        .jenis {
            font-size: 14px;
        }

        .kolom {
            padding-left: 20px;
            padding-right: 20px;
        }
    </style>
</head>

<body>
    <nav>
        <p>Admin Dinas Pendidikan <br>
            Muhammad Hanan Ababil S.Kom
        </p>
        <div class="org">
            <img class="imgorg-center" src="<?php echo base_url("public/asset/orgx.png"); ?>" width="25px">
        </div>

    </nav>

    <div class="content">
        <div class="box">
            <p class="headline"> INPUT DATA</p>
            <div class="kolom">
                <p class="jenis">NISN</p>
                <input type="nisn" class="form-control" id="exampleInputUsername1" name="nisn" placeholder="Masukkan NISN...">
            </div>

            <div class="kolom">
                <p class="jenis">Nama</p>
                <input type="nama" class="form-control" id="exampleInputUsername1" name="nama" placeholder="Masukkan Nama...">
            </div>

            <div class="kolom">
                <p class="jenis">Tempat \ Tanggal Lahir</p>
            </div>

            <div class="kolom">
                <p class="jenis">Gender</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" class="kelamin">
                    <label class="form-check-label" for="flexRadioDefault1">Laki-Laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" class="kelamin" checked>
                    <label class="form-check-label" for="flexRadioDefault2">Perempuan</label>
                </div>
            </div>

            <div class="kolom">
                <p class="jenis">Domisili</p>
                <select class="form-select" aria-label="Default select example">
                    <option selected dis>Masukkan Domisili...</option>
                    <option value="Kota Banjarmasin">Kota Banjarmasin</option>
                    <option value="Kota Banjarbaru">Kota Banjarbaru</option>
                    <option value="Kab. Balangan">Kab. Balangan</option>
                    <option value="Kab. Banjar">Kab. Banjar</option>
                    <option value="Kab. Barito Kuala">Kab. Barito Kuala</option>
                    <option value="Kab. Hulu Sungai Selatan">Kab. Hulu Sungai Selatan</option>
                    <option value="Kab. Hulu Sungai Tengah">Kab. Hulu Sungai Tengah</option>
                    <option value="Kab. Hulu Sungai Utara">Kab. Hulu Sungai Utara</option>
                    <option value="Kab. Kotabaru">Kab. Kotabaru</option>
                    <option value="Kab. Tabalong">Kab. Tabalong</option>
                    <option value="Kab. Tanah Bumbu">Kab. Tanah Bumbu</option>
                    <option value="Kab. Tanah Laut">Kab. Tanah Laut</option>
                    <option value="Kab. Tapin">Kab. Tapin</option>
                </select>
            </div>

            <div class="kolom">
                <p class="jenis">Keterangan Lulus</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" class="lulus">
                    <label class="form-check-label" for="flexRadioDefault1">Lulus</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" class="lulus">
                    <label class="form-check-label" for="flexRadioDefault2">Tidak Lulus</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" class="lulus" checked>
                    <label class="form-check-label" for="flexRadioDefault3">Pindah</label>
                </div>
            </div>
            <div class="kolom">
                <p class="jenis">Sekolah Tujuan</p>
            </div>
        </div>
    </div>
    <img class="imgbg" src="<?php echo base_url("public/asset/foto_dashboard.png"); ?>" width="25px">


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