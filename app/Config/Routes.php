<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/jurusan', 'Jurusan::index');
$routes->get('/jurusan/create', 'Jurusan::create');
$routes->get('/jurusan/save', 'Jurusan::save');

$routes->get('/jurusan/edit/(:segment)', 'Jurusan::edit/$1');
$routes->post('/jurusan/update/(:num)', 'Jurusan::update/$i');

$routes->delete('/jurusan/(:num)', 'Jurusan::delete/$1');

$routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);

// products merupakan nama groupnya
// $routes->group('products', ['filter' => 'ceklogin'], function($routes) {
//     $routes->get('/', 'Products::index');
//     $routes->get('products/add', 'Products::add');
//     $routes->post('products/store', 'Products::store');
// });


/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
