<div class="sidebar close">
    <div class="logo-details">
        <img src= "<?php echo base_url("/asset/disdik.png");?>" width="159px" alt="">
    </div>
    <ul class="nav-links">
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
</div>