<?php

namespace Config;

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

$routes->get('login', 'AuthController::index', ['filter' => 'guestfilter']);
$routes->post('login', 'AuthController::login', ['filter' => 'guestfilter']);
$routes->get('logout', 'AuthController::logout', ['filter' => 'authfilter']);

$routes->get('/', 'DashboardController::index', ['filter' => 'authfilter']);
$routes->get('/profile', 'ProfileController::index', ['filter' => 'authfilter']);
$routes->post('/profile', 'ProfileController::save', ['filter' => 'authfilter']);
$routes->post('/profile/change-password', 'ProfileController::changePassword', ['filter' => 'authfilter']);

// menu categories
$routes->get('master/menu-categories', 'MenuCategoryController::index', ['filter' => 'authfilter']);
$routes->post('master/menu-categories', 'MenuCategoryController::store', ['filter' => 'authfilter']);
$routes->post('master/menu-categories/update/(:segment)', 'MenuCategoryController::update/$1', ['filter' => 'authfilter']);
$routes->get('master/menu-categories/delete/(:segment)', 'MenuCategoryController::delete/$1', ['filter' => 'authfilter']);

// menu
$routes->get('master/menus', 'MenuController::index', ['filter' => 'authfilter']);
$routes->get('master/menus/create', 'MenuController::create', ['filter' => 'authfilter']);
$routes->post('master/menus/create', 'MenuController::store', ['filter' => 'authfilter']);
$routes->get('master/menus/edit/(:segment)', 'MenuController::edit/$1', ['filter' => 'authfilter']);
$routes->post('master/menus/update/(:segment)', 'MenuController::update/$1', ['filter' => 'authfilter']);
$routes->get('master/menus/set-status/(:segment)', 'MenuController::setStatus/$1', ['filter' => 'authfilter']);
$routes->get('master/menus/set-best-seller/(:segment)', 'MenuController::setBestSeller/$1', ['filter' => 'authfilter']);
$routes->get('master/menus/delete/(:segment)', 'MenuController::delete/$1', ['filter' => 'authfilter']);


// tables
$routes->get('master/tables', 'TableController::index', ['filter' => 'authfilter']);
$routes->post('master/tables', 'TableController::store', ['filter' => 'authfilter']);
$routes->post('master/tables/update/(:segment)', 'TableController::update/$1', ['filter' => 'authfilter']);
$routes->get('master/tables/delete/(:segment)', 'TableController::delete/$1', ['filter' => 'authfilter']);


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
