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

// Ruta de Productos LISTO
$routes->get('/products', 'ProductController::index');
$routes->get('/products/(:num)', 'ProductController::getProduct/$1');
$routes->get('/products/all', 'ProductController::getHome');
$routes->get('/products/(:any)', 'ProductController::getProductName/$1');
$routes->post('/products/add', 'ProductController::create');
$routes->post('/products/update', 'ProductController::updateProduct');
$routes->delete('/products/delete/(:num)', 'ProductController::delete/$1');

// Rutas de Marcas LISTO
$routes->get('/marcas', 'MarcaController::index');
$routes->get('/marcas/(:num)', 'MarcaController::getMarca/$1');
$routes->get('/marcas/(:any)', 'MarcaController::getMarcaName/$1');
$routes->post('/marcas/add', 'MarcaController::create');
$routes->post('/marcas/update', 'MarcaController::updateMarca');
$routes->post('/marcas/delete', 'MarcaController::deleteM');

// Rutas Proveedores LISTO
$routes->get('/proveedores', 'ProveedoresController::index');
$routes->get('/proveedores/(:num)', 'ProveedoresController::getProveedores/$1');
$routes->get('/proveedores/(:any)', 'ProveedoresController::getProveedoresName/$1');
$routes->post('/proveedores/add', 'ProveedoresController::create');
$routes->post('/proveedores/update', 'ProveedoresController::updateProveedores');
$routes->delete('/proveedores/delete/(:num)', 'ProveedoresController::delete/$1');

// Rutas Roles LISTO
$routes->get('/rol', 'RolController::index');
$routes->get('/rol/(:num)', 'RolController::getRol/$1');
$routes->get('/rol/(:any)', 'RolController::getRolName/$1');
$routes->post('/rol/add', 'RolController::create');
$routes->post('/rol/update', 'RolController::updateRol');
$routes->delete('/rol/delete/(:num)', 'RolController::delete/$1');

// Rutas Clientes LISTO
$routes->get('/clientes', 'ClientesController::index');
$routes->get('/clientes/(:num)', 'ClientesController::getClientes/$1');
$routes->get('/clientes/(:any)', 'ClientesController::getClientesName/$1');
$routes->post('/clientes/add', 'ClientesController::create');
$routes->post('/clientes/update', 'ClientesController::updateClientes');
$routes->delete('/clientes/delete/(:num)', 'ClientesController::delete/$1');

// Rutas Usuarios LISTO
$routes->post('/usuario/login', 'AuthController::login'); 
$routes->get('/usuarios', 'AuthController::index');
$routes->get('/usuarios/(:num)', 'AuthController::getUsuarios/$1');
$routes->get('/usuarios/(:any)', 'AuthController::getUsuariosName/$1');
$routes->post('/usuarios/add', 'AuthController::create');
$routes->post('/usuarios/update', 'AuthController::updateUsuarios');
$routes->delete('/usuarios/delete/(:num)', 'AuthController::delete/$1');


// Rutas Ventas EN PROCESO (any,add)
$routes->get('/Ventas', 'VentasController::index');
$routes->get('/Ventas/(:num)', 'VentasController::getVentas/$1');
$routes->get('/Ventas/(:any)', 'VentasController::getVentasName/$1');
$routes->post('/Ventas/add', 'VentasController::create');
$routes->post('/Ventas/update', 'VentasController::updateVentas');
$routes->delete('/Ventas/delete/(:num)', 'VentasController::delete/$1');





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
