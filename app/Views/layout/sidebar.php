<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url("/css/sidebar.css");?>">

</head>

<body>
    <div class="sidebar">
        <div class="header">
            <div class="logo-details">
                <img src="<?php echo base_url("/asset/disdik.png");?>" width="159px" alt="">
            </div>
        </div>
        <div class="content">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        </div>

        <!-- <ul class="nav-links">
        <li>
            <a href="<?= base_url('/') ?>">
                <i class='bx bxs-home-alt-2'></i>
                <span class="link_name">Dashboard</span>
            </a>
        <li>
            <a href="<?= base_url('/BerandaSiswa') ?>">
                <i class='bx bxs-archive'></i>
                <span class="link_name">Siswa</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Data Siswa</a></li>
            </ul>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Beasiswa</a></li>
            </ul>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">DO dan LTM</a></li>
            </ul>
        </li>
        <li>
            <a href="<?= base_url('/BerandaGuru') ?>">
                <i class='bx bxs-archive'></i>
                <span class="link_name">Guru</span>
            </a>
        </li>
        <li>
            <a href="<?= base_url('/BerandaSarpras') ?>">
                <i class='bx bxs-archive'></i>
                <span class="link_name">Sarpras</span>
            </a>
        </li>
    </ul>
</div> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
</body>

</html>