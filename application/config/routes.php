<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'home';
$route['mehsul/(:any)'] = 'home/product/$1';
$route['kateqoriya/(:any)'] = 'home/category/$1';
$route['kateqoriya/(:any)/(:any)'] = 'home/subcategory/$1/$2';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
