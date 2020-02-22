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
|	http://codeigniter.com/user_guide/general/routing.html
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

$route['index'] = 'home/index';
$route['location'] = 'home/location';
$route['login'] = 'home/login';
$route['logout'] = 'home/logout';
$route['social_signup'] = 'home/social_signup';

$route['atm'] = 'home/atm';
$route['restaurant'] = 'home/restaurant';
$route['hotels'] = 'home/hotels';
$route['medical'] = 'home/medical';
$route['hardware_store'] = 'home/hardware_store';
$route['movie_theater'] = 'home/movie_theater';
$route['petrol_pump'] = 'home/petrol_pump';
$route['railway_station'] = 'home/railway_station';
$route['doctor'] = 'home/doctor';
$route['parking'] = 'home/parking';
$route['animal_store'] = 'home/animal_store';
$route['animal_hospital'] = 'home/animal_hospital';




$route['set_position'] = 'home/set_position';


$route['show_session'] = 'home/show_session';
$route['remove_session'] = 'home/remove_session';








$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
