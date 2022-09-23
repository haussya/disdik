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
        <div class="ddsekolah">
            <select class="form-select" aria-label="Default select example">
                <option selected dis>Sekolah</option>
                <option value="SDN2LUB">SD NEGERI 2 LANDASAN ULIN BARAT</option>
                <option value="SDN1LUU">SD NEGERI 1 LANDASAN ULIN UTARA</option>
                <option value="SDN1LUT">SD NEGERI 1 LANDASAN ULIN TENGAH</option>
                <option value="SDN1LUS">SD NEGERI 1 LANDASAN ULIN SELATAN</option>
                <option value="SDN1LUB">SD NEGERI 1 LANDASAN ULIN BARAT</option>
                <option value="SDN3LUB">SD NEGERI 3 LANDASAN ULIN BARAT</option>
            </select>
        </div>
        <div class="tombol">
            <a href="#" class="btn btn-primary">Tambah Data</a>
        </div>

        <div class="box">
            <p class="headline"> TABEL DATA SISWA</p>
            <div class="box1">
                <table class="table table-info">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelamin</th>
                            <th scope="col">Tingkatan</th>
                            <th scope="col">Domisili</th>
                            <th scope="col">Status</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>1234567890</td>
                            <td>Otto hasibuan</td>
                            <td>L</td>
                            <td>2</td>
                            <td>Kota Banjarbaru</td>
                            <td>Aktif</td>
                            <td>-</td>
                            <td>tmbol</td>
                        </tr>

                        <tr>
                            <th scope="row">2</th>
                            <td>1234567891</td>
                            <td>Otto nasution</td>
                            <td>L</td>
                            <td>2</td>
                            <td>Kab. Banjar</td>
                            <td>Pindah</td>
                            <td>Pindah ke SD Negri 3 kotabaru</td>
                            <td>tombol</td>
                        </tr>

                        <tr>
                            <th scope="row">3</th>
                            <td>1234567892</td>
                            <td>Dian siahaan</td>
                            <td>p</td>
                            <td>2</td>
                            <td>Kab. Tanah Laut</td>
                            <td>Keluar</td>
                            <td>bantu ortu mining crypto</td>
                            <td>tombol</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

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