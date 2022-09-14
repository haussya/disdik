<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;1,400&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url("public/css/sidebar.css"); ?>">

</head>

<body>
    <div class="sidebar">
        <div class="header">
            <div class="logo-details">
                <img src="<?php echo base_url("/public/asset/logo_disdik_rounded.png"); ?>" width="159px" alt="">
            </div>
        </div>
        <div class="content">
            <div class="item">
                <a href="#">
                    <img src="<?php echo base_url("/public/asset/home.png"); ?>" alt="" class="icon">
                    <span class="description">Dashboard</span>
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="<?php echo base_url("/public/asset/siswa.png"); ?>" alt="" class="icon">
                    <span class="description">Siswa</span>
                    <div class="dropdown-content">
                        <div> <a href="">Data Siswa</a> </div>
                        <div> <a href="">Beasiswa</a> </div>
                        <div> <a href="">DO dan LTM</a> </div>
                    </div>
                </a>
            </div>
            <div class="item">
                <div class="dropdown">
                    <img src="<?php echo base_url("/public/asset/guru.png"); ?>" alt="" class="icon">
                    <span class="description">Guru</span>
                </div>
            </div>
            <div class="item">
                <a href="#">
                    <img src="<?php echo base_url("/public/asset/sarpras.png"); ?>" alt="" class="icon">
                    <span class="description">Sarpras</span>
                </a>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">

        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
</body>

</html>