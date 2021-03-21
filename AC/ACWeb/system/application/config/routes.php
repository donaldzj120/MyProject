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
| 	example.com/class/method/id/
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
| There are two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['scaffolding_trigger'] = 'scaffolding';
|
| This route lets you set a "secret" word that will trigger the
| scaffolding feature for added security. Note: Scaffolding must be
| enabled in the controller in which you intend to use it.   The reserved
| routes must come before any wildcard or regular expression routes.
|
*/

$route['default_controller'] = "welcome";
$route['scaffolding_trigger'] = "scaffolding";

$route['ctm_mis/(:num)'] = "ctm_mis/index/$1";
$route['ctm_mis/page/(:num)'] = "ctm_mis/index/$1";
$route['ctm_mis/(:num)/page/(:num)'] = "ctm_mis/index/$1";
$route['ctm_mis/(:num)/page'] = "ctm_mis/index/$1";
$route['ctm_mis/page'] = "ctm_mis/index/$1";
$route['ctm_mission_show/(:num)'] = "ctm_mission_show/index/$1";
$route['ctm_mis/deletemis/(:num)'] = "ctm_mis/deletemis/$1";
$route['ctm_mis_update/(:num)'] = "ctm_mis_update/index/$1";

$route['dl_mis/(:num)'] = "dl_mis/index/$1";
$route['dl_mis/misover/(:num)'] = "dl_mis/misover/$1";
$route['dl_mis/page/(:num)'] = "dl_mis/index/$1";
$route['dl_mis/(:num)/page/(:num)'] = "dl_mis/index/$1";
$route['dl_mis/(:num)/page'] = "dl_mis/index/$1";
$route['dl_mis/page'] = "dl_mis/index/$1";
$route['dl_mission_show/(:num)'] = "dl_mission_show/index/$1";
$route['dl_upload/(:num)'] = "dl_upload/index/$1";

$route['mgr_mission/(:num)'] = "mgr_mission/index/$1";
$route['mgr_mission/page'] = "mgr_mission/index/$1";
$route['mgr_mission/page/(:num)'] = "mgr_mission/index/$1";
$route['mgr_mission/(:num)/page'] = "mgr_mission/index/$1";
$route['mgr_mission/(:num)/page/(:num)'] = "mgr_mission/index/$1";
$route['mgr_dtb_mis_select/(:num)'] = "mgr_dtb_mis_select/index/$1";
$route['mgr_user/(:num)'] = "mgr_user/index/$1";
$route['mgr_dtb_mis_select/(:num)/(:any)'] = "mgr_dtb_mis_select/index/$1/$2";
$route['mgr_user_update/(:num)'] = "mgr_user_update/index/$1";
$route['mgr_mission_show/(:num)'] = "mgr_mission_show/index/$1";
$route['mgr_sagyo_meisai/(:num)/(:num)/(:num)'] = "mgr_sagyo_meisai/index/$1/$2/$3";
$route['mgr_sagyo_update/(:num)'] = "mgr_sagyo_update/index/$1";
$route['mgr_sagyo_delete/(:num)/(:num)/(:num)/(:num)'] = "mgr_sagyo_update/sagyo_delete/$1/$2/$3/$4";
$route['mgr_sagyo_nendo/(:num)'] = "mgr_sagyo/index/$1";
$route['mgr_seikyu_del/(:num)'] = "mgr_seikyusyo/index/$1";
//20091027 song
$route['mgr_mission/download/(:num)'] = "mgr_mission/download/$1";
$route['mgr_mission/deletemis/(:num)'] = "mgr_mission/deletemis/$1";
$route['mgr_mission/canceldelmis/(:num)'] = "mgr_mission/canceldelmis/$1";
//end
$route['mgr_nouhin/(:num)/(:num)'] = "mgr_nouhin/index/$1/$2";
$route['dl_nouhin/(:num)/(:num)'] = "dl_nouhin/index/$1/$2";
$route['mgr_kakunin/(:num)'] = "mgr_kakunin/index/$1";
$route['mgr_kakunin/page'] = "mgr_kakunin/index/$1";
$route['mgr_kakunin/page/(:num)'] = "mgr_kakunin/index/$1";
$route['mgr_kakunin/(:num)/page'] = "mgr_kakunin/index/$1";
$route['mgr_kakunin/(:num)/page/(:num)'] = "mgr_kakunin/index/$1";
$route['mgr_sagyo_update/(:num)/kakunin'] = "mgr_sagyo_update/index/$1";

$route['ctm_mitumori/(:num)'] = "ctm_mitumori/index/$1";
$route['mgr_mitumori_update/(:num)'] = "mgr_mitumori_update/index/$1";
$route['mgr_mitumori_confirm/(:num)'] = "mgr_mitumori_confirm/index/$1";
/* End of file routes.php */
/* Location: ./system/application/config/routes.php */