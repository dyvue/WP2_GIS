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
// reservation tables
$routes->get('master/reservation-tables', 'ReservationTableController::index', ['filter' => 'authfilter']);
$routes->post('master/reservation-tables', 'ReservationTableController::store', ['filter' => 'authfilter']);
$routes->post('master/reservation-tables/update/(:segment)', 'ReservationTableController::update/$1', ['filter' => 'authfilter']);
$routes->get('master/reservation-tables/delete/(:segment)', 'ReservationTableController::delete/$1', ['filter' => 'authfilter']);
// payment methods
$routes->get('master/payment-methods', 'PaymentMethodController::index', ['filter' => 'authfilter']);
$routes->post('master/payment-methods', 'PaymentMethodController::store', ['filter' => 'authfilter']);
$routes->post('master/payment-methods/update/(:segment)', 'PaymentMethodController::update/$1', ['filter' => 'authfilter']);
$routes->get('master/payment-methods/delete/(:segment)', 'PaymentMethodController::delete/$1', ['filter' => 'authfilter']);
// transactions
$routes->get('transactions', 'TransactionController::index', ['filter' => 'authfilter']);
$routes->get('transactions/(:segment)', 'TransactionController::show/$1', ['filter' => 'authfilter']);
$routes->get('transactions/(:segment)/print', 'TransactionController::print/$1', ['filter' => 'authfilter']);
$routes->post('transactions/done/(:segment)', 'TransactionController::done/$1', ['filter' => 'authfilter']);
$routes->get('transactions/serve/(:segment)', 'TransactionController::serve/$1', ['filter' => 'authfilter']);
$routes->get('transactions/cancel/(:segment)', 'TransactionController::cancel/$1', ['filter' => 'authfilter']);

// customer routes
// order
$routes->get('order/login', 'AuthCustomerController::index', ['filter' => 'guestcustomerfilter']);
$routes->post('order/login', 'AuthCustomerController::login', ['filter' => 'guestcustomerfilter']);
$routes->get('order/logout', 'AuthCustomerController::logout', ['filter' => 'authcustomerfilter']);

$routes->get('order', 'OrderController::index', ['filter' => 'authcustomerfilter']);
$routes->post('order', 'OrderController::store', ['filter' => 'authcustomerfilter']);
$routes->get('order/cart', 'OrderCartController::index', ['filter' => 'authcustomerfilter']);
$routes->post('order/cart', 'OrderCartController::store', ['filter' => 'authcustomerfilter']);
$routes->post('order/cart/(:segment)/plus', 'OrderCartController::plus/$1', ['filter' => 'authcustomerfilter']);
$routes->post('order/cart/(:segment)/minus', 'OrderCartController::minus/$1', ['filter' => 'authcustomerfilter']);
$routes->post('order/cart/(:segment)/delete', 'OrderCartController::delete/$1', ['filter' => 'authcustomerfilter']);
$routes->get('order/transaction/(:segment)', 'OrderTransactionController::index/$1', ['filter' => 'authcustomerfilter']);
$routes->get('order/transaction/(:segment)/print', 'OrderTransactionController::print/$1', ['filter' => 'authcustomerfilter']);


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
