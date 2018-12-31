<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pages/view';
$route['pages/(:any)'] = 'pages/view/$1';
$route['user/logout'] = 'users/logout';
$route['user/register'] = 'users/register';
$route['user/edit'] = 'users/edit';
$route['user'] = 'users/index';
$route['posts'] = 'posts/index';
$route['post/delete/(:any)'] = 'posts/delete/$1';
$route['post/edit/(:any)'] = 'posts/edit/$1';
$route['post/create'] = 'posts/create';
$route['post/(:any)'] = 'posts/view/$1';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
