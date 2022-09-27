<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Siswa - Sistem Informasi Data Sekolah Dinas Pendidikan Kota Banjarbaru</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url("public/css/halamantabelsiswa.css"); ?>">

    <!-- boxicon -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
    <div class="content">
        <div class="tombol">
            <a href="#" class="btn btn-primary">Tambah Data</a>
        </div>

        <div class="box">
            <p class="headline">TABEL DATA SISWA</p>
            <div class="box1">
                <table class="table table-info">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelamin</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Tingkatan</th>
                            <th scope="col">Domisili</th>
                            <th scope="col">nama Orangtua</th>
                            <th scope="col">Status</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($datasiswaSD as $sd) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $sd['nisn']; ?></td>
                                <td><?= $sd['nama']; ?></td>
                                <td><?= $sd['kelamin']; ?></td>
                                <td><?= $sd['tanggal_lahir']; ?></td>
                                <td><?= $sd['tingkat']; ?></td>
                                <td><?= $sd['domisili_id']; ?></td>
                                <td><?= $sd['nama_ibu']; ?></td>
                                <td><?= $sd['status']; ?></td>
                                <td><?= $sd['keterangan']; ?></td>
                                <td>
                                    <box-icon name='edit'></box-icon>
                                </td>
                            </tr>
                            <?php $no++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <img class="imgbg" src="<?php echo base_url("public/asset/foto_dashboard.png"); ?>">
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