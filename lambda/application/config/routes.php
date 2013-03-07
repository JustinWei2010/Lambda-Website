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
//edit_album
$route['edit_album/get_album_photos/(:any)'] = 'edit_album/get_album_photos/$1';
//$route['edit_album/add_photos']  = 'edit_album/add_photos';
//$route['edit_album/add_album']  = 'edit_album/add_album';
$route['edit_album/ajax'] = 'edit_album/index/ajax';
$route['edit_album/(:any)']  = 'edit_album/$1';


//pages
$route['rush'] = 'pages/rush';
$route['lil_sis_rush'] = 'pages/rush/lil_sis_rush';
$route['brothers'] = 'pages/brothers';
$route['chapters'] = 'pages/brothers/chapters';
$route['about'] = 'pages/define/about';
$route['history'] = 'pages/define/history';
$route['convention'] = 'pages/define/convention';
$route['philanthropy'] = 'pages/define/philanthropy';
$route['alumni'] = 'pages/legacy/alumni';
$route['photos'] = 'pages/legacy/photos';
$route['news/(:any)'] = 'pages/news/$1';
$route['news'] = 'pages/news';

//photos ajax
$route['legacy/photo_list_ajax'] = 'pages/legacy/photo_list_ajax';
$route['legacy/album_list_ajax'] = 'pages/legacy/album_list_ajax';

//edit news
$route['edit_news'] = 'edit_news/index';
$route['edit_news/add'] = 'edit_news/add';
$route['edit_news/update'] = 'edit_news/update';
$route['edit_news/delete'] = 'edit_news/delete';
$route['edit_news/ajax'] = 'edit_news/index/ajax';

//edit events
$route['edit_events'] = 'edit_events/index';
$route['edit_events/ajax'] = 'edit_events/index/ajax';
$route['edit_events/attendance/(:any)'] = 'edit_events/attendance/$1';

//$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'home';
//$route['news/create'] = 'news/create';
//$route['(:any)'] = 'News/view/$1';
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */