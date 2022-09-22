<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Dashboard - Sistem Informasi Data Sekolah Dinas Pendidikan Kota Banjarbaru</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url("public/css/halamanawal.css"); ?>">
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
        <div class="kartuall">
            <div class="kartusiswa">
                <div class="fotokartu">
                </div>
                <p class="tulisankartu">SISWA</p>
                <a class="link_name" href="http://localhost/disdik/public/tabelsiswa">Lihat Lebih Lanjut</a>
            </div>
            <div class="kartuguru">
                <div class="fotokartu">
                </div>
                <p class="tulisankartu">GURU</p>
                <a class="link_name" href="#">Lihat Lebih Lanjut</a>
            </div>
            <div class="kartusarpras">
                <div class="fotokartu">
                </div>
                <p class="tulisankartu">SARPRAS</p>
                <a class="link_name" href="#">Lihat Lebih Lanjut</a>
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