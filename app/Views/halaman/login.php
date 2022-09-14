<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login - Sistem Informasi Data Sekolah Dinas Pendidikan Kota Banjarbaru</title>
    <style>
        div.box{
            position: absolute;
            width: 500px;
            height: 100%;
            right: 0px;
            top: 0px;
            background: linear-gradient(160.63deg, rgba(1, 146, 213, 0) 0%, #0192D5 78.55%);
        }
        .box1{
            padding-top: 250px;
            padding-bottom: 250px;
            padding-left: 50px;
            padding-right: 50px;
        }
        .logo{
          position: absolute;  
          left: 30px;
          top: 30px;
        }
        .tombol {
          padding-left: 160px;
        }
        .org{
          padding-left: 150px;
          padding-bottom: 15px;
        }
        body{
          display: flex;  
        }
    </style>
  </head>
  <body>
    <img class="img" src="<?php echo base_url("public/asset/foto_login.png");?>" width="100%" height="80%">
    <div >
      <div class="logo">
        <img class="img" src="<?php echo base_url("public/asset/logo_disdik_rounded.png");?>" width="150px">
        <link rel="stylesheet" href="">
      </div>
    </div>
    <div class="box">
      <div class="box1">
        <div class="org">
          <img class="img" src="<?php echo base_url("public/asset/orgx.png");?>" width="80px">
          <link rel="stylesheet" href="">
        </div>
        <label class="label" for="password">User ID</label>
        <div class="input-group mb-3">
          <!-- <span class="input-group-text" id="basic-addon1" >User ID</span> -->
          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>        
        <label class="label" for="password">Password</label>
        <div class="input-group mb-3">
          <!-- <span class="input-group-text" id="basic-addon1">Password</span> -->
          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="tombol">
          <button type="button" class="btn btn-light">Login</button>
        </div>
        
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