<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->add('/process', 'Auth::process');
$routes->add('/auth/(:any)', 'Auth::$1');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('/', 'Admin::index');

    $routes->group('datasiswasd', function ($routes) {
        $routes->get('/', 'Siswasd::index');
        $routes->get('edit/(:num)', 'Siswasd::edit/$1');
        $routes->post('update/(:num)', 'Siswasd::update/$1');
        $routes->delete('hapus/(:num)', 'Siswasd::hapus/$1');
    });

    $routes->group('datasiswasmp', function ($routes) {
        $routes->get('/', 'Siswasmp::index');
        $routes->get('edit/(:num)', 'Siswasmp::edit/$1');
        $routes->post('update/(:num)', 'Siswasmp::update/$1');
        $routes->delete('hapus/(:num)', 'Siswasmp::hapus/$1');
    });

    $routes->group('beasiswasd', function ($routes) {
        $routes->get('/', 'Beasiswasd::index');
        $routes->get('edit/(:num)', 'Beasiswasd::edit/$1');
        $routes->post('update/(:num)', 'Beasiswasd::update/$1');
        $routes->delete('hapus/(:num)', 'Beasiswasd::hapus/$1');
    });

    $routes->group('beasiswasmp', function ($routes) {
        $routes->get('/', 'Beasiswasmp::index');
        $routes->get('edit/(:num)', 'Beasiswasmp::edit/$1');
        $routes->post('update/(:num)', 'Beasiswasmp::update/$1');
        $routes->delete('hapus/(:num)', 'Beasiswasmp::hapus/$1');
    });

    $routes->group('doltmsd', function ($routes) {
        $routes->get('/', 'Doltmsd::index');
        $routes->get('edit/(:num)', 'Doltmsd::edit/$1');
        $routes->post('update/(:num)', 'Doltmsd::update/$1');
        $routes->delete('hapus/(:num)', 'Doltmsd::hapus/$1');
    });

    $routes->group('doltmsmp', function ($routes) {
        $routes->get('/', 'Doltmsmp::index');
        $routes->get('edit/(:num)', 'Doltmsmp::edit/$1');
        $routes->post('update/(:num)', 'Doltmsmp::update/$1');
        $routes->delete('hapus/(:num)', 'Doltmsmp::hapus/$1');
    });

    $routes->group('gurusd', function ($routes) {
        $routes->get('/', 'Gurusd::index');
        $routes->get('edit/(:num)', 'Gurusd::edit/$1');
        $routes->post('update/(:num)', 'Gurusd::update/$1');
        $routes->delete('hapus/(:num)', 'Gurusd::hapus/$1');
    });

    $routes->group('gurusmp', function ($routes) {
        $routes->get('/', 'Gurusmp::index');
        $routes->get('edit/(:num)', 'Gurusmp::edit/$1');
        $routes->post('update/(:num)', 'Gurusmp::update/$1');
        $routes->delete('hapus/(:num)', 'Gurusmp::hapus/$1');
    });

    $routes->group('sarprassd', function ($routes) {
        $routes->get('/', 'Sarprassd::index');
        $routes->get('edit/(:num)', 'Sarprassd::edit/$1');
        $routes->post('update/(:num)', 'Sarprassd::update/$1');
        $routes->delete('hapus/(:num)', 'Sarprassd::hapus/$1');
    });

    $routes->group('sarprassmp', function ($routes) {
        $routes->get('/', 'Sarprassmp::index');
        $routes->get('edit/(:num)', 'Sarprassmp::edit/$1');
        $routes->post('update/(:num)', 'Sarprassmp::update/$1');
        $routes->delete('hapus/(:num)', 'Sarprassmp::hapus/$1');
    });
});

$routes->group('user', ['namespace' => 'App\Controllers\User'], function ($routes) {
    $routes->get('/', 'User::index');

    $routes->group('datasiswa', function ($routes) {
        $routes->get('/', 'Siswa::index');
        $routes->get('tambah', 'Siswa::tambah');
        $routes->post('simpan', 'Siswa::simpan');
    });

    $routes->group('datasiswasmp', function ($routes) {
        $routes->get('/', 'Siswasmp::index');
        $routes->get('tambah', 'Siswasmp::tambah');
        $routes->post('simpan', 'Siswasmp::simpan');
    });

    $routes->group('beasiswasd', function ($routes) {
        $routes->get('/', 'Beasiswasd::index');
        $routes->get('tambah', 'Beasiswasd::tambah');
        $routes->post('simpan', 'Beasiswasd::simpan');
    });

    $routes->group('beasiswasmp', function ($routes) {
        $routes->get('/', 'Beasiswasmp::index');
        $routes->get('tambah', 'Beasiswasmp::tambah');
        $routes->post('simpan', 'Beasiswasmp::simpan');
    });

    $routes->group('doltmsd', function ($routes) {
        $routes->get('/', 'Doltmsd::index');
        $routes->get('tambah', 'Doltmsd::tambah');
        $routes->post('simpan', 'Doltmsd::simpan');
    });

    $routes->group('doltmsmp', function ($routes) {
        $routes->get('/', 'Doltmsmp::index');
        $routes->get('tambah', 'Doltmsmp::tambah');
        $routes->post('simpan', 'Doltmsmp::simpan');
    });

    $routes->group('gurusd', function ($routes) {
        $routes->get('/', 'Gurusd::index');
        $routes->get('tambah', 'Gurusd::tambah');
        $routes->post('simpan', 'Gurusd::simpan');
    });

    $routes->group('gurusmp', function ($routes) {
        $routes->get('/', 'Gurusmp::index');
        $routes->get('tambah', 'Gurusmp::tambah');
        $routes->post('simpan', 'Gurusmp::simpan');
    });

    $routes->group('sarprassd', function ($routes) {
        $routes->get('/', 'Sarprassd::index');
        $routes->get('tambah', 'Sarprassd::tambah');
        $routes->post('simpan', 'Sarprassd::simpan');
    });

    $routes->group('sarprassmp', function ($routes) {
        $routes->get('/', 'Sarprassmp::index');
        $routes->get('tambah', 'Sarprassmp::tambah');
        $routes->post('simpan', 'Sarprassmp::simpan');
    });

    $routes->group('datauser', function ($routes) {
        $routes->get('/', 'DataUser::index');
        $routes->get('tambah', 'DataUser::tambah');
        $routes->post('simpan', 'DataUser::simpan');
    });
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
