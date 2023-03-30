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
$routes->get('/', 'Home::index');

// Showing some count of news from category.
// http://news-api.loc/api/v1/language/en/news/count/5/category/footbol/
$routes->get('api/v1/language/(:any)/news/count/(:num)/category/(:any)/', 'NewsController::getCount/$1/$2/$3');


// Searching news by title-name from category
// http://news-api.loc/api/v1/language/en/news/title/post-title-name/category/footbol/
$routes->get('api/v1/language/(:any)/news/title/(:any)/category/(:any)/', 'NewsController::getByTitle/$1/$2/$3');



// Showing all news from all categories (it is my idea).
// http://news-api.loc/api/v1/language/en/news/all
$routes->get('api/v1/language/(:any)/news/all/', 'NewsController::index');



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
