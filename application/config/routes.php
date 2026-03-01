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
$route['default_controller'] = 'home';
$route['404_override'] = 'Page_404';
$route['translate_uri_dashes'] = FALSE;

$route['backend/(:any)/banner_header'] = 'backend/banner_header/index/$1';
$route['backend/(:any)/banner_header/(:any)'] = 'backend/banner_header/$2/$1';
$route['backend/(:any)/banner_header/(:any)/(:any)'] = 'backend/banner_header/$2/$1/$3';

// our_service

$route['backend/(:any)/our_service'] = 'backend/Products/Category/index/$1';
$route['backend/(:any)/our_service/(:any)'] = 'backend/Products/Category/$2/$1';
$route['backend/(:any)/our_service/(:any)/(:any)'] = 'backend/Products/Category/$2/$1/$3';

// $route['backend/(:any)/our_service'] = 'backend/Products/category/index/$1';
// $route['backend/(:any)/our_service/(:any)'] = 'backend/Products/category/$2/$1';
// $route['backend/(:any)/our_service/(:any)/(:any)'] = 'backend/Products/category/$2/$1/$3';

// product
$route['backend/(:any)/product'] = 'backend/Products/product/index/$1';
$route['backend/(:any)/product/(:any)'] = 'backend/Products/product/$2/$1';
$route['backend/(:any)/product/(:any)/(:any)'] = 'backend/Products/product/$2/$1/$3';

$route['backend/(:any)/product_image'] = 'backend/Products/product_image/index/$1';
$route['backend/(:any)/product_image/(:any)'] = 'backend/Products/product_image/$2/$1';
$route['backend/(:any)/product_image/(:any)/(:any)'] = 'backend/Products/product_image/$2/$1/$3';


// INDEX (detail)
$route['backend/(:any)/product_description/(:num)']
    = 'backend/Products/Product_description/index/$1/$2';

// LIST
$route['backend/(:any)/product_description/(:num)/lists']
    = 'backend/Products/Product_description/lists/$1/$2';

// CREATE
$route['backend/(:any)/product_description/(:num)/create']
    = 'backend/Products/Product_description/create/$1/$2';

// EDIT
$route['backend/(:any)/product_description/(:num)/edit/(:num)']
    = 'backend/Products/Product_description/edit/$1/$2/$3';

// DELETE
$route['backend/(:any)/product_description/(:num)/delete/(:num)']
    = 'backend/Products/Product_description/delete/$1/$2/$3';

// UPDATE
$route['backend/(:any)/product_description/(:num)/update_or_create']
    = 'backend/Products/Product_description/update_or_create/$1/$2';

// $route['backend/(:any)/product_description'] = 'backend/Products/product_description/index/$1';
// $route['backend/(:any)/product_description/(:any)'] = 'backend/Products/product_description/$2/$1';
// $route['backend/(:any)/product_description/(:any)/(:any)'] = 'backend/Products/product_description/$2/$1/$3';

// $route['backend/(:any)/product_description/(:any)/edit/(:any)'] = 'backend/Products/Product_description/$1/$2/$3/$4';
// $route['backend/(:any)/product_description/(:any)'] = 'backend/Products/Product_description/index/$1/$2';
// $route['backend/(:any)/product_description/(:any)/(:any)'] = 'backend/Products/Product_description/$1/$2/$3';


// $route['backend/(:any)/product_description/(:any)'] = 'backend/Products/product_description/index/$1/$2';
// $route['backend/(:any)/product_description/(:any)/(:any)'] = 'backend/Products/product_description/$1/$2/$3';
// $route['backend/(:any)/product_description/(:any)/(:any)/(:any)'] = 'backend/Products/product_description/$1/$2/$3/$4';

$route['backend/(:any)/news'] = 'backend/news/index/$1';
$route['backend/(:any)/news/(:any)'] = 'backend/news/$2/$1';
$route['backend/(:any)/news/(:any)/(:any)'] = 'backend/news/$2/$1/$3';

$route['backend/(:any)/review'] = 'backend/review/index/$1';
$route['backend/(:any)/review/(:any)'] = 'backend/review/$2/$1';
$route['backend/(:any)/review/(:any)/(:any)'] = 'backend/review/$2/$1/$3';

$route['backend/(:any)/faqs'] = 'backend/faqs/index/$1';
$route['backend/(:any)/faqs/(:any)'] = 'backend/faqs/$2/$1';
$route['backend/(:any)/faqs/(:any)/(:any)'] = 'backend/faqs/$2/$1/$3';

$route['backend/(:any)/consultation'] = 'backend/order/index/$1';
$route['backend/(:any)/consultation/(:any)'] = 'backend/order/$2/$1';
$route['backend/(:any)/consultation/(:any)/(:any)'] = 'backend/order/$2/$1/$3';

$route['backend/(:any)/contact_us'] = 'backend/contact_us/index/$1';
$route['backend/(:any)/contact_us/(:any)'] = 'backend/contact_us/$2/$1';
$route['backend/(:any)/contact_us/(:any)/(:any)'] = 'backend/contact_us/$2/$1/$3';

$route['backend/(:any)/subscribe'] = 'backend/subscribe/index/$1';
$route['backend/(:any)/subscribe/(:any)'] = 'backend/subscribe/$2/$1';
$route['backend/(:any)/subscribe/(:any)/(:any)'] = 'backend/subscribe/$2/$1/$3';

$route['backend/(:any)/overview'] = 'backend/overview/index/$1';
$route['backend/(:any)/overview/(:any)'] = 'backend/overview/$2/$1';
$route['backend/(:any)/overview/(:any)/(:any)'] = 'backend/overview/$2/$1/$3';

$route['backend/(:any)/did_you_know'] = 'backend/did_you_know/index/$1';
$route['backend/(:any)/did_you_know/(:any)'] = 'backend/did_you_know/$2/$1';
$route['backend/(:any)/did_you_know/(:any)/(:any)'] = 'backend/did_you_know/$2/$1/$3';

$route['backend/(:any)/did_you_know_point'] = 'backend/did_you_know_point/index/$1';
$route['backend/(:any)/did_you_know_point/(:any)'] = 'backend/did_you_know_point/$2/$1';
$route['backend/(:any)/did_you_know_point/(:any)/(:any)'] = 'backend/did_you_know_point/$2/$1/$3';

$route['backend/(:any)/benefit'] = 'backend/benefit/index/$1';
$route['backend/(:any)/benefit/(:any)'] = 'backend/benefit/$2/$1';
$route['backend/(:any)/benefit/(:any)/(:any)'] = 'backend/benefit/$2/$1/$3';

$route['backend/(:any)/adventage'] = 'backend/adventage/index/$1';
$route['backend/(:any)/adventage/(:any)'] = 'backend/adventage/$2/$1';
$route['backend/(:any)/adventage/(:any)/(:any)'] = 'backend/adventage/$2/$1/$3';

$route['backend/(:any)/why_choose_us'] = 'backend/why_choose_us/index/$1';
$route['backend/(:any)/why_choose_us/(:any)'] = 'backend/why_choose_us/$2/$1';
$route['backend/(:any)/why_choose_us/(:any)/(:any)'] = 'backend/why_choose_us/$2/$1/$3';

$route['backend/(:any)/water_treatment_plant'] = 'backend/water_treatment_plant/index/$1';
$route['backend/(:any)/about'] = 'backend/about/index/$1';
$route['backend/(:any)/about/(:any)'] = 'backend/about/$2/$1';

$route['admin'] = 'backend/auth';