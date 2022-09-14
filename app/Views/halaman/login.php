<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Login - Sistem Informasi Data Sekolah Dinas Pendidikan Kota Banjarbaru</title>

  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo base_url("public/css/login.css"); ?>">
</head>

<body>
  <img class="imgbg" src="<?php echo base_url("public/asset/foto_login.png"); ?>">
  <div>
    <div class="logo">
      <img class="imgdisdik" src="<?php echo base_url("public/asset/logo_disdik_rounded.png"); ?>" width="150px">
      <link rel="stylesheet" href="">
    </div>
  </div>
  <div class="box">
    <div class="box1">
      <div class="org">
        <img class="imgorg-center" src="<?php echo base_url("public/asset/orgx.png"); ?>" width="80px">
        <link rel="stylesheet" href="">
      </div>

      <form method="POST" action="<?= base_url('/auth/process') ?>">
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="exampleInputUsername1" class="form-label">Username</label>
          <input type="username" class="form-control" id="exampleInputUsername1" name="username">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <div class="tombol">
          <button type="submit" class="btn btn-light">
            Login
          </button>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>