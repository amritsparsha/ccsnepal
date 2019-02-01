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

$route['default_controller'] = "home";
$route['404_override'] = 'error';
$route['packages/rel/(:any)'] = 'packages/related/$1';
$route['content/(:any)'] = 'content/detail/$1';
$route['service/(:any)'] = 'content/service/$1';
$route['content/captcha'] = 'content/captcha_setting/';
$route['content/plan_captcha_setting'] = 'content/plan_captcha_setting/';
$route['content/plan'] = 'content/plan/';
$route['forex/(:any)'] = 'forex/detail/$1';
$route['destination/(:any)'] = 'content/destination/$1';

$route['jobs/(:any)'] = 'jobs/jobs_detail/$1';
$route['jobs-list'] = 'jobs/all_jobs';
$route['jobs-list/(:any)'] = 'jobs/all_jobs/$1';
$route['jobs-category/(:any)'] = 'jobs/jobs_category/$1';
$route['jobs-level/(:any)'] = 'jobs/jobs_level/$1';
$route['jobs-type/(:any)'] = 'jobs/jobs_type/$1';
$route['jobs-skill/(:any)'] = 'jobs/jobs_skills_cat/$1';
$route['jobs-employer/(:any)'] = 'jobs/jobs_emps_cat/$1';
$route['jobs-location/(:any)'] = 'jobs/job_location/$1';
$route['jobs-availability/(:any)'] = 'jobs/jobs_availability/$1';

$route['career-resources/(:any)'] = 'career_resources/latest_resources/$1';
$route['career-resources-list'] = 'career_resources/all_resources';

$route['loksewa/(:any)'] = 'loksewa_resources/latest_resources/$1';
$route['loksewa-list'] = 'loksewa_resources/all_resources';

$route['news/(:any)'] = 'news/latest_news/$1';
$route['news-list'] = 'news/all_news';
//$route['paypal-hotel/(:any)'] = 'payment/hotel_paypal_process/$1';
//$route['atos-hotel/(:any)'] = 'payment/atos_request_hotel/$1';

//$route['booking'] = 'booking';
//$route['sansui-trek-&-expedition/(:any)'] = 'content/index/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
