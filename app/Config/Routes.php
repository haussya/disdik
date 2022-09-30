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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->add('/', 'Home::index');

//login
$routes->add('/process', 'Home::process');
$routes->add('/auth/(:any)', 'Home::$1');

$routes->group('auth', function ($routes) {
    $routes->post('process', 'Auth::process');
    $routes->add('login', 'Auth::login');
});

//admin
$routes->get('/index', 'Admin::index');
$routes->get('/datasiswa', 'Admin::datasiswa');
$routes->get('/beasiswa', 'Admin::beasiswa');
$routes->get('/do&ltm', 'Admin::doltm');
$routes->get('/tabelguru', 'Admin::tabelguru');
$routes->get('/tabelsarpras', 'Admin::tabelsarpras');


//
$routes->get('/sidebar', 'Login::sidebar');
$routes->get('/dashboard', 'Login::dash');
$routes->get('/input', 'Login::input');
$routes->get('/tabelsiswa', 'Login::tabelsiswa');
$routes->get('/tabelguru', 'Login::tabelguru');
$routes->get('/tabelsarpras', 'Login::tabelsarpras');
$routes->get('/InputSiswaSD', 'InputSiswaSD::index');



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
