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

$routes->get('/', 'Auth::index');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::signin');
$routes->add('/logout', 'Auth::logout');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'admin'], function ($routes) {
    $routes->get('/', 'Dashboard::index');

    $routes->group('user', function ($routes) {
        $routes->get('/', 'User::index');
        $routes->get('create', 'User::create');
        $routes->post('create', 'User::save');
        $routes->get('(:num)', 'User::edit/$1');
        $routes->post('(:num)', 'User::update/$1');
        $routes->add('(:num)/delete', 'User::delete/$1');
    });

    $routes->group('sekolah', function ($routes) {
        $routes->get('/', 'Sekolah::index');
        $routes->get('create', 'Sekolah::create');
        $routes->post('create', 'Sekolah::save');
        $routes->get('(:num)', 'Sekolah::edit/$1');
        $routes->get('(:num)/sarpras', 'Sekolah::sarpras/$1');
        $routes->post('(:num)/sarpras', 'Sekolah::sarpras_edit/$1');
        $routes->post('(:num)', 'Sekolah::update/$1');
        $routes->add('(:num)/delete', 'Sekolah::delete/$1');
    });

    $routes->group('siswa', function ($routes) {
        $routes->get('/', 'Siswa::index');
        $routes->get('do-ltm', 'Siswa::ltm');
        $routes->get('beasiswa', 'Siswa::beasiswa');
        $routes->get('create', 'Siswa::create');
        $routes->post('create', 'Siswa::save');
        $routes->get('(:num)', 'Siswa::edit/$1');
        $routes->post('(:num)', 'Siswa::update/$1');
        $routes->add('(:num)/delete', 'Siswa::delete/$1');
        $routes->add('export', 'Siswa::export');
    });

    $routes->group('faktor', function ($routes) {
        $routes->post('/', 'Faktor::create');
        $routes->add('(:num)/delete', 'Faktor::delete/$1');
    });

    $routes->group('sarpras', function ($routes) {
        $routes->get('/', 'Sarpras::index');
        $routes->post('/', 'Sarpras::create');
        $routes->add('(:num)/delete', 'Sarpras::delete/$1');
    });
});

$routes->group('user', ['namespace' => 'App\Controllers\User', 'filter' => 'user'], function ($routes) {
    $routes->get('/', 'Dashboard::index');

    $routes->group('siswa', function ($routes) {
        $routes->get('/', 'Siswa::index');
        $routes->get('do-ltm', 'Siswa::ltm');
        $routes->get('beasiswa', 'Siswa::beasiswa');
        $routes->get('create', 'Siswa::create');
        $routes->post('create', 'Siswa::save');
        $routes->get('(:num)', 'Siswa::edit/$1');
        $routes->post('(:num)', 'Siswa::update/$1');
        $routes->add('(:num)/delete', 'Siswa::delete/$1');
    });

    $routes->get('sarpras', 'Sarpras::index');
    $routes->post('sarpras', 'Sarpras::save');
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
