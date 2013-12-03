<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There area two reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those provided
  | in the URL cannot be matched to a valid route.
  |
 */


/*
   * Backend Routing.
   * Backend Routing starts from here
*/
$route['default_controller'] = "front";
$route['admin/home'] = "home";

$route['admin/categories'] = "categories";
$route['admin/categories/aeddCategories'] = "categories/aeddCategories";
$route['admin/categories/aeddCategories/(:any)'] = "categories/aeddCategories/$1";

$route['admin/categories/subCategories'] = "categories/subCategories";
$route['admin/categories/aeddSCategories'] = "categories/aeddSCategories";
$route['admin/categories/aeddSCategories/(:any)'] = "categories/aeddSCategories/$1";

$route['admin/cms'] = "cms";
$route['admin/cms/aeddPages'] = "cms/aeddPages";
$route['admin/cms/aeddPages/(:any)'] = "cms/aeddPages/$1";
$route['admin/cms/subPages/(:any)'] = "cms/subPages/$1";
$route['admin/cms/addSubPages/(:any)'] = "cms/addSubPages/$1";
$route['admin/cms/editSubpage/(:any)'] = "cms/editSubpage/$1";

$route['admin/orientation'] = "orientation";
$route['admin/orientation/aeddOrientation'] = "orientation/aeddOrientation";
$route['admin/orientation/aeddOrientation/(:any)'] = "orientation/aeddOrientation/$1";

$route['admin/slider'] = "slider";
$route['admin/slider/addSlides'] = "slider/addSlides";
$route['admin/slider/editSlides/(:any)'] = "slider/editSlides/$1";

$route['admin/siteSettings'] = "siteSettings";
$route['admin/siteSettings/(:any)'] = "siteSettings/$1";


/*
   * Front Routing.
   * Front Routing starts from here
*/
//$route['front/(:any)'] = "front/pages/"; 
//$route['([^/]+)/?'] = 'front/pages/$1';
//$route['front/(:any)']  = 'front/$1';
/*$route['(:any)'] = 'front';
$route['front(:any)'] = 'front/$1';*/
//$route['front/en'] = 'front/';

$route['([^/]+)\.html?'] = 'front/pages/$1';
$route['404_override'] = '';

$route['sitemap\.xml'] = "sitemap";
/* End of file routes.php */
/* Location: ./application/config/routes.php */