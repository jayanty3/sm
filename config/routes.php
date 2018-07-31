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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


///////////////////////////////// Backend START ////////////////////////////

$route['admin']			                            = 'backend/auth/login';
$route['forgot-password']			                = 'backend/auth/forgot_password';
$route['reset-password/(:any)']			            = 'frontend/auth_login/reset_password';
$route['forgot-passwords']			                = 'backend/auth/mailling';



/////////////////////////////// backend end ///////////////////////////////







///////////////////////////////// Web START ////////////////////////////

$route['home']			                            = 'frontend/auth_login/main';
$route['home/(:num)']			                    = 'frontend/auth_login/main';
$route['home-search/(:any)']                        = 'frontend/auth_login/search';
$route['home-search']                               = 'frontend/auth_login/search';
$route['signup'] 	                                = 'frontend/auth_login/signup';
$route['signup-individual']                         = 'frontend/auth_login/individual';
$route['signup-individuals']                        = 'frontend/auth_login/individuals';


$route['register-individual'] 	                    = 'frontend/register/individual_register';
$route['register-individuals'] 	                    = 'frontend/register/individual_registers';

$route['register-teacher']                          = 'frontend/register/teacher_register';
$route['register-teachers']                         = 'frontend/register/teacher_registers';

$route['signup-teacher'] 	                        = 'frontend/auth_login/forign_fee';
$route['signup-teachers'] 	                        = 'frontend/auth_login/forign_fees';

$route['signup-institute'] 	                        = 'frontend/auth_login/institute_fee';
$route['signup-institutes'] 	                    = 'frontend/auth_login/institute_fees';

$route['register-institute'] 	                    = 'frontend/register/institution_register';
$route['register-institutes'] 	                    = 'frontend/register/institution_registers';

$route['individual']                                = 'frontend/auth_login/indiprofile';
$route['institute-edit-profile']                    = 'frontend/auth_login/insti_edit_profile';
$route['teacher-profile']                           = 'frontend/auth_login/teacherprofile';
$route['institute-profile']                         = 'frontend/auth_login/instiprofile';
$route['teacher-edit-profile']                      = 'frontend/auth_login/edit_forign_fee_registration';
$route['individual-edit-profile']                   = 'frontend/auth_login/editindiprofile';
$route['teacher-list']                              = 'frontend/auth_login/student_list';
$route['teacher-lists']                             = 'frontend/auth_login/teacher_list';
$route['search-list/(:any)']					    = 'frontend/auth_login/search_teacher_list';
$route['teacher-details/(:num)']                    = 'calenderview/teachersdetail';