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
                    <a href="/user" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item <?= ($uri1 == 'siswa') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Siswa</span>
                    </a>

                    <ul class="submenu <?= ($uri1 == 'siswa') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($uri2 == '' && $uri1 == 'siswa') ? 'active' : '' ?>">
                            <a href="/user/siswa">Data Siswa</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'beasiswa') ? 'active' : '' ?>">
                            <a href="/user/siswa/beasiswa">Beasiswa</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'do-ltm') ? 'active' : '' ?>">
                            <a href="/user/siswa/do-ltm">DO & LTM</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item <?= ($uri1 == 'sarpras') ? 'active' : '' ?>">
                    <a href="/logout" class='sidebar-link text-danger'>
                        <i class="bi bi-box-arrow-left text-danger"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>