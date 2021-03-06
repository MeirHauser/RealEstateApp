<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

$route['default_controller'] = "houses";
$route['all_houses'] = "houses/index";
$route['new'] = "houses/new_house";
$route['add_house'] = "houses/add_house";
$route['house/(:any)'] = "houses/house/$1";
$route['delete/(:any)'] = "houses/delete/$1";
$route['angular'] = "houses/angular";
$route['angularhouses'] = "houses/angularhouses";
$route['angular/delete/(:any)'] = "houses/angularDelete/$1";
$route['welcome'] = "logins";
$route['login'] = "logins/login";
$route['sign_up'] = "logins/sign_up";
$route['log_off'] = "logins/sign_out";
$route['user_info'] = "logins/user_info";
$route['get_user_info'] = "logins/get_user_info";
$route['edit_user_info'] = "logins/edit_user_info";
$route['error'] = 'houses/error';
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */