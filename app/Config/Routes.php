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

$routes->get('dashboard/(:any)', 'Home::index/$1');
// Login and Register routing
// $routes->add('Home', 'Index::index');
$routes->add('/', 'Login::index');
$routes->add('register', 'Register::index');
// $routes->add('identify/(:any)', 'Register::identify');
$routes->post('reg/save', 'Register::save');
$routes->post('identitas/save', 'Register::identitas');
$routes->post('edit/kk/(:num)', 'Penduduk::edit_kk/$1');
$routes->add('cek/user', 'Login::cek');
$routes->add('login/auth', 'Login::Auth');
$routes->add('logout/(:any)', 'Login::logout');

// kk
$routes->add('penduduk/all', 'Penduduk::index');
$routes->add('user/all', 'User::index');
$routes->post('user/save/(:num)', 'User::save/$1');
$routes->post('penduduk/user/(:num)', 'Penduduk::save_user/$1');
$routes->post('penduduk/add_kk', 'Penduduk::add_kk');
$routes->get('penduduk/(:num)', 'Penduduk::delete/$1');

// contact
$routes->post('save/contact', 'Contact::save_contact');
$routes->add('contact', 'Contact::index');
$routes->post('edit/contact/(:num)', 'Contact::edit_contact/$1');
$routes->get('contact/delete/(:num)', 'Contact::contact_delete/$1');
$routes->get('profile', 'Profile::index');
$routes->get('profile/delete/(:num)', 'Profile::delete/$1');
$routes->get('del/(:num)', 'User::delete/$1');
// profil
$routes->post('img/upload', 'Profile::upload');

// surat
$routes->add('surat', 'Request_surat::index');
$routes->add('format', 'Format_surat::index');
$routes->add('add/format', 'Format_surat::tambah_surat');
$routes->add('delete/format/(:num)', 'Format_surat::delete/$1');
$routes->add('surat_keluar', 'Surat_keluar::index');
$routes->add('list_surat/all', 'List_surat::index');
$routes->add('Print/doc', 'List_surat::print_surat');
$routes->add('save/ttd', 'List_surat::add_ttd');
$routes->get('pdf/(:num)', 'Format::print/$1');
// request
$routes->get('surat/accept/(:num)', 'List_surat::terima/$1');
$routes->post('surat/ttd/(:num)', 'List_surat::ttd/$1');
$routes->get('done/(:num)', 'Surat_keluar::selesai/$1');
$routes->get('surat/rejected/(:num)', 'List_surat::tolak/$1');
$routes->post('request/(:any)', 'Request_surat::request');
$routes->post('text/(:num)', 'List_surat::text/$1');
$routes->post('cek/kk', 'Request_surat::cek_kk');
$routes->post('text/(:num)', 'List_surat::keterangan/$1');


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
