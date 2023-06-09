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
$routes->get('logout', 'AuthController::logout', ['filter' => 'authuserfilter']);

$routes->get('/', 'DashboardController::index', ['filter' => 'authuserfilter']);
$routes->get('/profile', 'ProfileController::index', ['filter' => 'authuserfilter']);
$routes->post('/profile', 'ProfileController::save', ['filter' => 'authuserfilter']);
$routes->post('/profile/change-password', 'ProfileController::changePassword', ['filter' => 'authuserfilter']);

// menu categories
$routes->get('master/menu-categories', 'MenuCategoryController::index', ['filter' => 'authusermanajerfilter']);
$routes->post('master/menu-categories', 'MenuCategoryController::store', ['filter' => 'authusermanajerfilter']);
$routes->post('master/menu-categories/update/(:segment)', 'MenuCategoryController::update/$1', ['filter' => 'authusermanajerfilter']);
$routes->get('master/menu-categories/delete/(:segment)', 'MenuCategoryController::delete/$1', ['filter' => 'authusermanajerfilter']);
// menu
$routes->get('master/menus', 'MenuController::index', ['filter' => 'authusermanajerfilter']);
$routes->get('master/menus/create', 'MenuController::create', ['filter' => 'authusermanajerfilter']);
$routes->post('master/menus/create', 'MenuController::store', ['filter' => 'authusermanajerfilter']);
$routes->get('master/menus/edit/(:segment)', 'MenuController::edit/$1', ['filter' => 'authusermanajerfilter']);
$routes->post('master/menus/update/(:segment)', 'MenuController::update/$1', ['filter' => 'authusermanajerfilter']);
$routes->get('master/menus/set-status/(:segment)', 'MenuController::setStatus/$1', ['filter' => 'authusermanajerfilter']);
$routes->get('master/menus/set-best-seller/(:segment)', 'MenuController::setBestSeller/$1', ['filter' => 'authusermanajerfilter']);
$routes->get('master/menus/delete/(:segment)', 'MenuController::delete/$1', ['filter' => 'authusermanajerfilter']);
// reservation tables
$routes->get('master/reservation-tables', 'ReservationTableController::index', ['filter' => 'authusermanajerfilter']);
$routes->post('master/reservation-tables', 'ReservationTableController::store', ['filter' => 'authusermanajerfilter']);
$routes->post('master/reservation-tables/update/(:segment)', 'ReservationTableController::update/$1', ['filter' => 'authusermanajerfilter']);
$routes->get('master/reservation-tables/delete/(:segment)', 'ReservationTableController::delete/$1', ['filter' => 'authusermanajerfilter']);
// payment methods
$routes->get('master/payment-methods', 'PaymentMethodController::index', ['filter' => 'authusermanajerfilter']);
$routes->post('master/payment-methods', 'PaymentMethodController::store', ['filter' => 'authusermanajerfilter']);
$routes->post('master/payment-methods/update/(:segment)', 'PaymentMethodController::update/$1', ['filter' => 'authusermanajerfilter']);
$routes->get('master/payment-methods/delete/(:segment)', 'PaymentMethodController::delete/$1', ['filter' => 'authusermanajerfilter']);
// transactions
$routes->get('transactions', 'TransactionController::index', ['filter' => 'authuserfilter']);
$routes->get('transactions/(:segment)', 'TransactionController::show/$1', ['filter' => 'authuserfilter']);
$routes->get('transactions/(:segment)/print', 'TransactionController::print/$1', ['filter' => 'authuserfilter']);
$routes->post('transactions/done/(:segment)', 'TransactionController::done/$1', ['filter' => 'authuserfilter']);
$routes->get('transactions/serve/(:segment)', 'TransactionController::serve/$1', ['filter' => 'authuserfilter']);
$routes->get('transactions/cancel/(:segment)', 'TransactionController::cancel/$1', ['filter' => 'authuserfilter']);
// user
$routes->get('users', 'UserController::index', ['filter' => 'authusermanajerfilter']);
$routes->get('users/create', 'UserController::create', ['filter' => 'authusermanajerfilter']);
$routes->post('users/create', 'UserController::store', ['filter' => 'authusermanajerfilter']);
$routes->get('users/edit/(:segment)', 'UserController::edit/$1', ['filter' => 'authusermanajerfilter']);
$routes->post('users/update/(:segment)', 'UserController::update/$1', ['filter' => 'authusermanajerfilter']);
$routes->post('users/update-password/(:segment)', 'UserController::updatePassword/$1', ['filter' => 'authusermanajerfilter']);
$routes->get('users/delete/(:segment)', 'UserController::delete/$1', ['filter' => 'authusermanajerfilter']);

// customer routes
// order
$routes->get('order/login', 'AuthCustomerController::index', ['filter' => 'guestcustomerfilter']);
$routes->post('order/login', 'AuthCustomerController::login', ['filter' => 'guestcustomerfilter']);
$routes->get('order/login/(:segment)', 'AuthCustomerController::loginAuto/$1');
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
