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

$route['default_controller'] = "account";
$route['404_override'] = '';

$route['account/detailCompany/(:any)'] = 'account/detailCompany/$1';
$route['account/detailType/(:any)'] = 'account/detailType/$1';
$route['account/(:any)'] = 'account/$1';
$route['account'] = 'account';

$route['d/dList/(:any)'] = 'd/dList/$1';			// list:	type id 
$route['d/showDDetailCreate/(:any)'] = 'd/showDDetailCreate/$1';		// create:	type id
$route['d/showDDetailEdit/(:any)/(:any)/(:any)'] = 'd/showDDetailEdit/$1/$2/$3';	// edit:   d id  /  type  id  /  action
$route['d/apiGetDocs/(:any)'] = 'd/apiGetDocs/$1';

$route['news/(:any)'] = 'news/$1';
$route['news'] = 'news';

$route['upload/doUpload'] = 'upload/doUpload';

$route['notice/showNoticeCreate'] = 'notice/showNoticeCreate';
$route['notice/showNoticeEdit/(:any)/(:any)'] = 'notice/showNoticeEdit/$1/$2';	//notice:	id  /  action 
$route['notice/noticeList'] = 'notice/noticeList';


$route['xml/downloadXml/(:any)'] = 'xml/downloadXml/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */