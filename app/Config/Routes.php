<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
$routes->get('/pages/bukuindex', 'Pages::bukuindex');

$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/admin', 'Admin::index', ['as' => '/admin']);
    $routes->get('/member', 'Member::index', ['as' => '/member']);
});

//member
$routes->get('/member', 'Member::index', ['filter' => 'role:member']);
$routes->get('/Member/(:any)', 'Member::index', ['filter' => 'role:member']);
$routes->get('/member/profile', 'Member::profile', ['filter' => 'role:member']);
$routes->get('/member/peminjamanIndex', 'Member::peminjamanIndex', ['filter' => 'role:member']);
$routes->get('/member/resensiIndex', 'Member::resensiIndex', ['filter' => 'role:member']);
$routes->get('/member/resensiTambah', 'Member::resensiTambah', ['filter' => 'role:member']);
$routes->get('/member/resensiIsi/(:num)', 'Member::resensiDetail/$1', ['filter' => 'role:member']);
$routes->get('/member/resensiEdit/(:num)', 'Member::resensiEdit/$1', ['filter' => 'role:member']);
$routes->post('/member/resensiEdit/(:num)', 'Member::update/$1', ['filter' => 'role:member']);
$routes->delete('/member/(:num)', 'Member::resensiDelete/$1', ['filter' => 'role:member']);

//admin
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/Admin/(:any)', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/profile', 'Admin::profile', ['filter' => 'role:admin']);
$routes->get('/buku', 'Buku::index', ['filter' => 'role:admin']);
$routes->get('/Buku/(:any)', 'Buku::index', ['filter' => 'role:admin']);
$routes->get('/genre', 'Genre::index', ['filter' => 'role:admin']);
$routes->get('/Genre/(:any)', 'Genre::index', ['filter' => 'role:admin']);
$routes->get('/penerbit', 'Penerbit::index', ['filter' => 'role:admin']);
$routes->get('/Penerbit/(:any)', 'Penerbit::index', ['filter' => 'role:admin']);
$routes->get('/copy', 'Copy::index', ['filter' => 'role:admin']);
$routes->get('/copy/(:any)', 'Copy::index', ['filter' => 'role:admin']);
$routes->get('/rekomendasi', 'Rekomendasi::index', ['filter' => 'role:admin']);
$routes->get('/rekomendasi/(:any)', 'Rekomendasi::index', ['filter' => 'role:admin']);
$routes->get('/peminjaman', 'Peminjaman::index', ['filter' => 'role:admin']);
$routes->get('/Peminjaman/(:any)', 'Peminjaman::index', ['filter' => 'role:admin']);
$routes->get('/admin/peminjaman/peminjamanRekap', 'Peminjaman::rekap', ['filter' => 'role:admin']);

// member routes(admin)
$routes->get('/admin/member/memberIndex', 'Admin::memberIndex', ['filter' => 'role:admin']);
$routes->get('/admin/member/(:num)', 'Admin::memberDetail/$1', ['filter' => 'role:admin']);
$routes->delete('/admin/member/(:num)', 'Admin::memberDelete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/member/memberEdit/(:segment)', 'Admin::memberEdit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/member/memberEdit/(:num)', 'Admin::memberUpdate/$1', ['filter' => 'role:admin']);

// buku routes
$routes->get('admin/buku/bukuTambah', 'Buku::create', ['filter' => 'role:admin']);
$routes->delete('/admin/buku/(:num)', 'Buku::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/buku/bukuEdit/(:segment)', 'Buku::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/buku/bukuEdit/(:num)', 'Buku::update/$1', ['filter' => 'role:admin']);

// genre routes
$routes->get('admin/genre/genreTambah', 'Genre::create', ['filter' => 'role:admin']);
$routes->delete('/admin/genre/(:num)', 'Genre::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/genre/genreEdit/(:segment)', 'Genre::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/genre/genreEdit/(:num)', 'Genre::update/$1', ['filter' => 'role:admin']);

// penerbit routes
$routes->get('admin/penerbit/penerbitTambah', 'Penerbit::create', ['filter' => 'role:admin']);
$routes->delete('/admin/penerbit/(:num)', 'Penerbit::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/penerbit/penerbitEdit/(:segment)', 'Penerbit::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/penerbit/penerbitEdit/(:num)', 'Penerbit::update/$1', ['filter' => 'role:admin']);

// copy routes
$routes->get('admin/copy/copyTambah', 'Copy::create', ['filter' => 'role:admin']);
$routes->delete('/admin/copy/(:num)', 'Copy::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/copy/copyEdit/(:segment)', 'Copy::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/copy/copyEdit/(:num)', 'Copy::update/$1', ['filter' => 'role:admin']);

// rekomendasi routes
$routes->get('/admin/rekomendasi/rekomendasiTambah', 'Rekomendasi::create', ['filter' => 'role:admin']);
$routes->delete('/admin/rekomendasi/(:num)', 'Rekomendasi::delete/$1', ['filter' => 'role:admin']);

// peminjaman routes
$routes->get('admin/peminjaman/export', 'Peminjaman::export', ['filter' => 'role:admin']);
$routes->get('admin/peminjaman/peminjamanTambah', 'Peminjaman::create', ['filter' => 'role:admin']);
$routes->delete('/admin/peminjaman/(:num)', 'Peminjaman::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/peminjaman/peminjamanEdit/(:segment)', 'Peminjaman::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/peminjaman/peminjamanEdit/(:num)', 'peminjaman::update/$1', ['filter' => 'role:admin']);

// resensi routes
$routes->get('/admin/resensi/resensiTambah', 'Resensi::create', ['filter' => 'role:admin']);
$routes->delete('/admin/resensi/(:num)', 'Resensi::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/resensi/resensiIsi/(:num)', 'Resensi::detail/$1', ['filter' => 'role:admin']);
$routes->get('/admin/resensi/resensiEdit/(:num)', 'Resensi::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/resensi/resensiEdit/(:num)', 'Resensi::update/$1', ['filter' => 'role:admin']);

$routes->get('/comics/create', 'Comics::create');
$routes->delete('/comics/(:num)', 'Comics::delete/$1');
$routes->get('/comics/(:any)', 'Comics::detail/$1');
$routes->get('/comics/edit/(:segment)', 'Comics::edit/$1');
$routes->post('/comics/edit/(:num)', 'Comics::update/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
