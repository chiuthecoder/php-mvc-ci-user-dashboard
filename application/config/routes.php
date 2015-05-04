<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//start over
$route['default_controller'] = 'dashboards';

$route['/'] = "dashboards/index";
$route['signin'] = "dashboards/signin";
$route['register'] = "dashboards/register";
$route['new_user'] = "dashboards/new_user";
$route['edit_user'] = "dashboards/edit_user";
$route['edit_profile'] = "dashboards/edit_profile";
$route['dashboard'] = "dashboards/dashboard";
$route['profile'] = "dashboards/profile";
$route['logout'] = "dashboards/logout";


$route['createNewUser'] = "dashboards/createNewUser";
$route['retrieveOneUser'] = "dashboards/retrieveOneUser";
$route['updateUserProfile'] = "dashboards/updateUserProfile";
$route['reloadProfile'] = "dashboards/reloadProfile";
$route['updateUser'] = "dashboards/updateUser";
$route['updatePassword'] = "dashboards/updatePassword";
$route['updateDescription'] = "dashboards/updateDescription";
$route['destroyUser'] = "dashboards/destroyUser";
$route['createMessage'] = "dashboards/createMessage";
// //producrs
// $route['default_controller'] = 'products/adminIndex';

// $route['products/new'] = 'products/newProduct';
// $route['productsCreate'] = 'products/create';
// $route['productsDestroyReview'] = 'products/destroyReview';
// $route['productsDestroy'] = 'products/destroy';
// $route['productsShowReview/show'] = 'products/showReview';
// $route['products/editReview/(:num)'] = 'products/editReview';
// $route['products/edit'] = 'products/edit';

// //login or registration
// $route['users'] = 'users';
// $route['login'] = 'users/login_view';
// $route['register'] = 'users/register_view';

// //shopping cart
// $route['productList'] = 'products/index';
// $route['shoppingcart'] = 'shoppingcart/viewcart';


// //dashboard
// $route['dashboard'] = 'users/dashboard_view';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
