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

// default route
$route['default_controller'] = "fe_home";
// route admin
$route['e-admin'] = "login";
// route edit user
$route['edit_asisten/(:num)'] = "edit_asisten";
$route['edit_dosen/(:num)'] = "edit_dosen";
// route delete user
$route['delete_user/([a-z]+)/(\d+)'] = "delete_user";
// route add lesson
$route['add_lesson/([1-7]+)'] = "add_lesson";
// route edit lesson
$route['edit_lesson/([1-7]+)'] = "edit_lesson";
// route delete lesson
$route['delete_lesson/(:num)'] = "delete_lesson";
// block redirect login
$route['login'] = "error/page_missing";
$route['login/index'] = "error/page_missing";
// route 404 page
$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */