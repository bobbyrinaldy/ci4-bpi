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
$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->get('/login', 'Login::index', ['as' => 'login.index']);
$routes->get('/logout', 'Login::logout', ['as' => 'logout']);
$routes->post('/login', 'Login::postAuth', ['as' => 'login.store']);
$routes->get('/register', 'Login::register', ['as' => 'register.index']);
$routes->post('/register', 'Login::postRegistration', ['as' => 'register.store']);
$routes->get('/rooms', 'Guess::roomList', ['as' => 'guess.room']);
$routes->get('/hotel_facilities', 'Guess::hotelList', ['as' => 'guess.hotel']);
$routes->post('/reservation', 'Guess::reservation', ['as' => 'guess.reservation']);

$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    $routes->get('dashboard', 'Admin\Dashboard::index', ['as' => 'dashboard.index']);
    $routes->group('rooms', function ($routes) {
        $routes->get('/', 'Admin\Room::index', ['as' => 'room.index']);
        $routes->get('create', 'Admin\Room::create', ['as' => 'room.create']);
        $routes->post('store', 'Admin\Room::store', ['as' => 'room.store']);
        $routes->get('edit/(:num)', 'Admin\Room::edit/$1', ['as' => 'room.edit']);
        $routes->post('update/(:num)', 'Admin\Room::update/$1', ['as' => 'room.update']);
        $routes->get('delete/(:num)', 'Admin\Room::delete/$1', ['as' => 'room.delete']);
    });

    $routes->group('facilities', function ($routes) {
        $routes->get('/', 'Admin\Facility::index', ['as' => 'facility.index']);
        $routes->get('create', 'Admin\Facility::create', ['as' => 'facility.create']);
        $routes->post('store', 'Admin\Facility::store', ['as' => 'facility.store']);
        $routes->get('edit/(:num)', 'Admin\Facility::edit/$1', ['as' => 'facility.edit']);
        $routes->post('update/(:num)', 'Admin\Facility::update/$1', ['as' => 'facility.update']);
        $routes->get('delete/(:num)', 'Admin\Facility::delete/$1', ['as' => 'facility.delete']);
    });

    $routes->group('hotel_facilities', function ($routes) {
        $routes->get('/', 'Admin\HotelFacility::index', ['as' => 'hotel_facility.index']);
        $routes->get('create', 'Admin\HotelFacility::create', ['as' => 'hotel_facility.create']);
        $routes->post('store', 'Admin\HotelFacility::store', ['as' => 'hotel_facility.store']);
        $routes->get('edit/(:num)', 'Admin\HotelFacility::edit/$1', ['as' => 'hotel_facility.edit']);
        $routes->post('update/(:num)', 'Admin\HotelFacility::update/$1', ['as' => 'hotel_facility.update']);
        $routes->get('delete/(:num)', 'Admin\HotelFacility::delete/$1', ['as' => 'hotel_facility.delete']);
    });

    $routes->group('reservations', function ($routes) {
        $routes->get('/', 'Admin\Reservation::index', ['as' => 'reservations.index']);
    });
});

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
