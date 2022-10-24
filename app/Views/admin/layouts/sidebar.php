<?php
$uri = service('uri')->getSegments();
$uri1 = $uri[1] ?? 'index';
$uri2 = $uri[2] ?? '';
$uri3 = $uri[3] ?? '';
?>

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="#"><img src="/assets/logo_disdik_rounded.png" alt="Logo" srcset=""></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item <?= ($uri1 == 'index') ? 'active' : '' ?> ">
                    <a href="/admin" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri1 == 'user') ? 'active' : '' ?> ">
                    <a href="/admin/user" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>User</span>
                    </a>
                </li>

                <li class="sidebar-title">Sekolah SD</li>

                <li class="sidebar-item <?= ($uri1 == 'siswa') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Siswa</span>
                    </a>
                    <ul class="submenu <?= ($uri1 == 'siswa') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($uri2 == 'datasiswa') ? 'active' : '' ?>">
                            <a href="/admin/datasiswasd">Data Siswa</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'beasiswa') ? 'active' : '' ?>">
                            <a href="/admin/beasiswasd">Beasiswa</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'doltm') ? 'active' : '' ?>">
                            <a href="/admin/doltmsd">DO & LTM</a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item <?= ($uri1 == 'guru') ? 'active' : '' ?> ">
                    <a href="/admin/gurusd" class='sidebar-link'>
                        <i class="bi bi-cart-fill"></i>
                        <span>Guru</span>
                    </a>
                </li>

                <li class="sidebar-item <?= ($uri1 == 'sarpras') ? 'active' : '' ?> ">
                    <a href="/admin/sarprassd" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Sarpras</span>
                    </a>
                </li>

                <li class="sidebar-title">Sekolah SMP</li>

                <li class="sidebar-item <?= ($uri1 == 'siswa') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Siswa</span>
                    </a>
                    <ul class="submenu <?= ($uri1 == 'siswa') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($uri2 == 'datasiswa') ? 'active' : '' ?>">
                            <a href="/admin/datasiswasmp">Data Siswa</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'beasiswa') ? 'active' : '' ?>">
                            <a href="/admin/beasiswasmp">Beasiswa</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'doltm') ? 'active' : '' ?>">
                            <a href="/admin/doltmsmp">DO & LTM</a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item <?= ($uri1 == 'guru') ? 'active' : '' ?> ">
                    <a href="/admin/gurusmp" class='sidebar-link'>
                        <i class="bi bi-cart-fill"></i>
                        <span>Guru</span>
                    </a>
                </li>

                <li class="sidebar-item <?= ($uri1 == 'sarpras') ? 'active' : '' ?> ">
                    <a href="/admin/sarprassmp" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Sarpras</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>