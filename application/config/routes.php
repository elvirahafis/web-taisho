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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'UserController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'UserController';
$route['Home'] = 'Welcome';
$route['Register'] = 'UserController/register';
$route['Register/createUser'] = 'UserController/createUser';
$route['Login'] = 'UserController/postLogin';


$route['ListProducts']='ProductController/viewProduct';
$route['getListProduct']='ProductController/getListProduct';
$route['AddProduct']='ProductController/viewAddProduct';
$route['ProductController/createProduct']='ProductController/createProduct';
$route['UpdateProduct/(:any)']='ProductController/UpdateProduct';
$route['getProductByKD']='ProductController/getProductByKD';
$route['getProductKode']='ProductController/getProductKode';
$route['ProductController/updateProduct']='ProductController/updateProductbyKode';
$route['ProductController/HapusProduct']='ProductController/HapusProduct';

$route['ListOutlet']='OutletController/viewOutlet';
$route['getListOutlet']='OutletController/getListOutlet';
$route['viewAddOutlet']='OutletController/viewAddOutlet';
$route['OutletController/createOutlet']='OutletController/createOutlet';
$route['UpdateOutlet/(:any)']='OutletController/viewUpdateOutlet';
$route['getOutletKode']='OutletController/UpdateOutletbyKode';
$route['OutletController/updateOutlet']='OutletController/updateOutlet';
$route['OutletController/HapusOutlet']='OutletController/HapusOutlet';

$route['ListPurchase']='PurchaseController/viewPurchase';
$route['getListPurchase']='PurchaseController/getListPurchase';
$route['viewAddPurchase']='PurchaseController/viewAddPurchase';
$route['PurchaseController/createPurchase']='PurchaseController/createPurchase';
$route['UpdatePurchase/(:any)']='PurchaseController/viewUpdatePurchase';
$route['getPurchaseKode']='PurchaseController/getPurchaseKode';
$route['PurchaseController/UpdatePurchase']='PurchaseController/UpdatePurchase';
$route['PurchaseController/HapusPurchase']='PurchaseController/HapusPurchase';

$route['ListSales']='SalesController/viewSales';
$route['viewAddSales']='SalesController/viewAddSales';
$route['getListSales']='SalesController/getListSales';
$route['SalesController/createSales']='SalesController/createSales';
$route['SalesController/HapusSales']='SalesController/HapusSales';
$route['UpdateSales/(:any)']='SalesController/viewUpdateSales';
$route['getSalesKode']='SalesController/getSalesKode';
$route['SalesController/updateSales']='SalesController/updateSales';

$route['ListUser']='UserController/viewUser';
$route['viewAddUser']='UserController/viewAddUser';
$route['getListUser']='UserController/getListUser';
$route['UserController/HapusUser']='UserController/HapusUser';
$route['UpdateUser/(:any)']='UserController/viewUpdateUser';
$route['getUserKode']='UserController/getUserKode';
$route['UserController/updateUser']='UserController/updateUser';