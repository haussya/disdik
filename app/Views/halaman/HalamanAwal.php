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
            width: 100%;
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

        .kartusiswa {
            position: absolute;
            width: 277px;
            height: 144px;
            left: 355px;
            top: 96px;
            background: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 12px 6px -3px rgba(0, 0, 0, 0.2);
        }

        .kartuguru {
            position: absolute;
            width: 277px;
            height: 144px;
            left: 680px;
            top: 96px;

            background: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 12px 6px -3px rgba(0, 0, 0, 0.2);
        }

        .kartusarpras {
            position: absolute;
            width: 277px;
            height: 144px;
            left: 1005px;
            top: 96px;

            background: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 12px 6px -3px rgba(0, 0, 0, 0.2);
        }

        p {
            font-size: 12px;
            font-weight: bold;
            padding-top: 7px;
            padding-right: 20px;
            color: #5A5B5A;
        }

        .fotokartu {
            position: absolute;
            width: 115px;
            height: 115px;
            left: 14px;
            top: 14px;

            background: #D9D9D9;
            border-radius: 3px;
        }

        .tulisankartu {
            font-size: 20px;
            padding-top: 12px;
            padding-left: 140px;
        }

      
    </style>
    
</head>

<body>

    <nav>
    
        <div class="org">
            <img class="imgorg-center" src="<?php echo base_url("public/asset/orgx.png"); ?>" width="25px">
        </div>

    </nav>

    <?= $this->include('layout/sidebar'); ?>

    <div class="content">
        <div class="kartuall">
            <div class="kartusiswa">
                <div class="fotokartu">
                </div>
                <p class="tulisankartu">SISWA</p>
                <a class="link_name" href="http://localhost/disdik/public/tabelguru">Lihat Lebih Lanjut</a>
            </div>
            <div class="kartuguru">
                <div class="fotokartu">
                </div>
                <p class="tulisankartu">GURU</p>
                <a class="link_name" href="http://localhost/disdik/public/tabelguru">Lihat Lebih Lanjut</a>
            </div>
            <div class="kartusarpras">
                <div class="fotokartu">
                </div>
                <p class="tulisankartu">SARPRAS</p>
                <a class="link_name" href="http://localhost/disdik/public/tabelsarpras">Lihat Lebih Lanjut</a>
            </div>
        </div>
    </div>
    <img class="imgbg" src="<?php echo base_url("public/asset/foto_dashboard.png"); ?>" width="25px">
  

</body>

<script>

    </script>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</html>