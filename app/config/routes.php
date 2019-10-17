<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['^(en|th)/home']                          = 'home';
$route['^(en|th)/home/(:any)']                   = 'home/index/$2';
$route['^(en|th)/home/(:any)/(:any)']            = 'home/index/$2/$3';

$route['^(en|th)/register']                      = 'register';
$route['^(en|th)/register/(:any)']               = 'register/index/$2';
$route['^(en|th)/register/(:any)/(:any)']        = 'register/index/$2/$3';

$route['^(en|th)/carts']                         = 'carts';
$route['^(en|th)/carts/(:any)']                  = 'carts/index/$2';
$route['^(en|th)/carts/(:any)/(:any)']           = 'carts/index/$2/$3';

$route['^(en|th)/member']                        = 'member';
$route['^(en|th)/member/(:any)']                 = 'member/index/$2';
$route['^(en|th)/member/(:any)/(:any)']          = 'member/index/$2/$3';

$route['^(en|th)/articles_detail/(:any)']        = 'articles_detail/index/$2';
$route['^(en|th)/contact/(:any)']                = 'contact/index/$2';
$route['^(en|th)/contact/(:any)/(:any)']         = 'contact/index/$2/$3';
$route['^(en|th)/testimonial/(:any)/(:any)']     = 'testimonial/index/$2/$3';

$route['^(en|th)/news/(:any)']                   = 'news/index/$2';
$route['^(en|th)/news/(:any)/(:any)']            = 'news/index/$2/$3';

$route['^(en|th)/products']                      = 'products';
$route['^(en|th)/products/(:any)']               = 'products/index/$2';
$route['^(en|th)/products/(:any)/(:any)']        = 'products/index/$2/$3';

$route['^(en|th)/articles']                      = 'articles';
$route['^(en|th)/articles/(:any)']               = 'articles/index/$2';
$route['^(en|th)/articles/(:any)/(:any)']        = 'articles/index/$2/$3';

$route['^(en|th)/paymentconfirm']                = 'paymentconfirm';
$route['^(en|th)/paymentconfirm/(:any)']         = 'paymentconfirm/index/$2';
$route['^(en|th)/paymentconfirm/(:any)/(:any)']  = 'paymentconfirm/index/$2/$3';


$route['^(en|th)/event/(:any)']                   = 'event/index/$2';
$route['^(en|th)/event/(:any)/(:any)']            = 'event/index/$2/$3';
$route['^(en|th)/blog/(:any)']                   = 'blog/index/$2';
$route['^(en|th)/blog/(:any)/(:any)']            = 'blog/index/$2/$3';

$route['^(en|th)/vdo/(:any)']                   = 'vdo/index/$2';
$route['^(en|th)/vdo/(:any)/(:any)']            = 'vdo/index/$2/$3';

$route['default_controller']        = 'home';
$route['404_override']              = '';
$route['translate_uri_dashes']      = FALSE;

$route['^(en|th)/(.+)$']            = "$2";
$route['^th/(.+)$'] 				= "$1";
$route['^en/(.+)$'] 				= "$1";

$route['^th$'] 	                    = $route['default_controller'];
$route['^en$'] 	                    = $route['default_controller'];