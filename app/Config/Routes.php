<?php

namespace Config;
use App\Controllers\Barang;
use App\Controllers\User;
use App\Controllers\Transaksi_Keluar;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->get('/', 'Home::home');
$routes->get('/login', 'Home::index');
$routes->get('/register', 'Home::register');
$routes->get('/dashboard', 'Home::dashboard');

$routes->get('/barang/index', 'Barang::barang_index');
$routes->get('/barang/create', 'Barang::barang_create');
$routes->post('/barang/store', 'Barang::barang_store');
$routes->post('/barang/update_save', 'Barang::update_save');
$routes->get('/barang/delete/(:num)', [Barang::class, 'barang_delete']);
$routes->get('/barang/update/(:num)', [Barang::class, 'barang_update']);

$routes->get('/user/index', 'User::user_index');
$routes->get('/user/create', 'User::user_create');
$routes->post('/user/store', 'User::user_store');
$routes->post('/user/update_save', 'User::update_save');
$routes->get('/user/delete/(:num)', [User::class, 'user_delete']);
$routes->get('/user/update/(:num)', [User::class, 'user_update']);

$routes->get('/penjualan/index', 'Home::penjualan_index');
$routes->get('/pembayaran/index', 'Home::pembayaran_index');

$routes->get('/pembayaran/checkout', 'Transaksi_Keluar::checkout');
$routes->get('/pembayaran/delete_barang/(:num)', [Transaksi_Keluar::class, 'delete_barang']);
$routes->get('/pembayaran/bayar/', [Transaksi_Keluar::class, 'bayar']);
$routes->post('/pembayaran/tambah_barang', 'Transaksi_Keluar::tambah_barang');
$routes->get('/pembayaran/status/', 'Transaksi_Keluar::status');

$routes->post('/login', 'Home::login');
$routes->get('/logout', 'Home::logout');
$routes->post('/create_akun', 'Home::create_akun');

$routes->get('/qrcode/generate/(:segment)', 'Home::generate_qrcode/$1');

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