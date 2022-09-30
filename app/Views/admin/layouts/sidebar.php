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
                    <a href="/dashboard"><img src="/asset/logo_disdik_rounded.png" alt="Logo" srcset=""></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item <?= ($uri1 == 'index') ? 'active' : '' ?> ">
                    <a href="/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

               
                <li class="sidebar-item <?= ($uri1 == 'components') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Siswa</span>
                    </a>
                    <ul class="submenu <?= ($uri1 == 'Siswa') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($uri2 == 'alert') ? 'active' : '' ?>">
                            <a href="/mazer/components/alert">Data Siswa</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'badge') ? 'active' : '' ?>">
                            <a href="/mazer/components/badge">Beasiswa</a>
                        </li>
                        <li class="submenu-item <?= ($uri2 == 'breadcrumb') ? 'active' : '' ?>">
                            <a href="/mazer/components/breadcrumb">DO & LTM</a>
                        </li>
                 
                    </ul>
                </li>

                <li class="sidebar-item <?= ($uri1 == 'guru') ? 'active' : '' ?> ">
                    <a href="/admin/guru" class='sidebar-link'>
                        <i class="bi bi-cart-fill"></i>
                        <span>Guru</span>
                    </a>
                </li>

                <li class="sidebar-item <?= ($uri1 == 'sarpras') ? 'active' : '' ?> ">
                    <a href="/admin/sarpras" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Sarpras</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>