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
//$routes->resource('products');

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/products', 'ProductController::index');
$routes->get('/products/(:num)', 'ProductController::getProduct/$1');
$routes->get('/products/(:any)', 'ProductController::getProductName/$1');
$routes->post('/products/add', 'ProductController::create');
$routes->post('/products/update', 'ProductController::updateProduct');
$routes->delete('/products/delete/(:num)', 'ProductController::delete/$1');

// rutas de marcas
$routes->get('/marcas', 'MarcaController::index');
$routes->get('/marcas/(:num)', 'MarcaController::getMarca/$1');
$routes->get('/marcas/(:any)', 'MarcaController::getMarcaName/$1');
$routes->post('/marcas/add', 'MarcaController::create');
$routes->post('/marcas/update', 'MarcaController::updateMarca');
$routes->delete('/marcas/delete/(:num)', 'MarcaController::delete/$1');

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
