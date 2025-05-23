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
$route['default_controller'] = 'welcome/beranda';
$route['dashboard'] = 'welcome/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['prestasi'] = 'welcome/prestasi';
$route['bem'] = 'welcome/bem';
$route['beritaa'] = 'welcome/beritaa';

// $route['detail/(:any)'] = 'Welcome/detail/$1';

$route['berita'] = 'Berita_controller';
$route['berita/create'] = 'Berita_controller/create';
$route['berita/create/action']['post'] = 'Berita_controller/store';
$route['berita/edit/(:any)'] = 'Berita_controller/edit/$1';
$route['berita/update/(:any)']['post'] = 'Berita_controller/update/$1';
$route['berita/delete/(:any)']['delete'] = 'Berita_controller/delete/$1';
$route['berita/detail/(:any)'] = 'Berita_controller/detail/$1';

$route['bemi'] = 'Bem_controller';
$route['bemi/create'] = 'Bem_controller/create';
$route['bemi/create/action']['post'] = 'Bem_controller/store';
$route['bemi/edit/(:any)'] = 'Bem_controller/edit/$1';
$route['bemi/update/(:any)']['post'] = 'Bem_controller/update/$1';
$route['bemi/delete/(:any)'] = 'Bem_controller/delete/$1';
// $route['bemi/detail/(:any)']['post'] = 'Bem_controller/detail/$1';
$route['bem/detail/(:any)'] = 'Bem_controller/detail/$1';

$route['bemi/anggota'] = 'Bem_controller/anggota';
$route['bemi/anggota/create'] = 'Bem_controller/create_anggota';
$route['bemi/anggota/create/action']['post'] = 'Bem_controller/store_anggota';
$route['bemi/anggota/edit/(:any)'] = 'Bem_controller/edit_anggota/$1';
$route['bemi/anggota/update/(:any)']['post'] = 'Bem_controller/update_anggota/$1';
$route['bemi/anggota/delete/(:any)']['delete'] = 'Bem_controller/delete_anggota/$1';

$route['mahasiswa'] = 'Mahasiswa_controller';
$route['mahasiswa/create'] = "Mahasiswa_controller/create";
$route['mahasiswa/create/action']['post'] = "Mahasiswa_controller/store";
$route['mahasiswa/edit/(:any)'] = "Mahasiswa_controller/edit/$1";
$route['mahasiswa/update/(:any)']['post'] = "Mahasiswa_controller/update/$1";
$route['mahasiswa/delete/(:any)']['delete'] = "Mahasiswa_controller/delete/$1";

$route['mandiri'] = 'Mandiri_controller';
$route['mandiri/create'] = "Mandiri_controller/create";
$route['mandiri/create/action']['post'] = "Mandiri_controller/store";
// $route['pkkmb/input/action']['post'] = "Mandiri_controller/store";

$route['jurusan'] = 'Jurusan_controller';
$route['jurusan/create'] = "Jurusan_controller/create";
$route['jurusan/create/action']['post'] = "Jurusan_controller/store";
$route['jurusan/edit/(:any)'] = "Jurusan_controller/edit/$1";
$route['jurusan/update/(:any)']['post'] = "Jurusan_controller/update/$1";
$route['jurusan/delete/(:any)']['delete'] = "Jurusan_controller/delete/$1";

$route['prodi'] = 'Prodi_controller';
$route['prodi/create'] = "Prodi_controller/create";
$route['prodi/create/action']['post'] = "Prodi_controller/store";
$route['prodi/edit/(:any)'] = "Prodi_controller/edit/$1";
$route['prodi/update/(:any)']['post'] = "Prodi_controller/update/$1";
$route['prodi/delete/(:any)']['delete'] = "Prodi_controller/delete/$1";

$route['fakultas'] = 'Fakultas_controller';
$route['fakultas/create'] = "Fakultas_controller/create";
$route['fakultas/create/action']['post'] = "Fakultas_controller/store";
$route['fakultas/edit/(:any)'] = "Fakultas_controller/edit/$1";
$route['fakultas/update/(:any)']['post'] = "Fakultas_controller/update/$1";
$route['fakultas/delete/(:any)']['delete'] = "Fakultas_controller/delete/$1";

$route['kegiatan'] = 'Kegiatan_controller';
$route['kegiatan/create'] = "Kegiatan_controller/create";
$route['kegiatan/create/action']['post'] = "Kegiatan_controller/store";
$route['kegiatan/edit/(:any)'] = "Kegiatan_controller/edit/$1";
$route['kegiatan/update/(:any)']['post'] = "Kegiatan_controller/update/$1";
$route['kegiatan/delete/(:any)']['delete'] = "Kegiatan_controller/delete/$1";

$route['mhs'] = 'Mhs_controller';
$route['mhs/create'] = "Mhs_controller/create";
$route['mhs/create/action']['post'] = "Mhs_controller/store";
$route['mhs/edit/(:any)'] = "Mhs_controller/edit/$1";
$route['mhs/update/(:any)']['post'] = "Mhs_controller/update/$1";
$route['mhs/delete/(:any)']['delete'] = "Mhs_controller/delete/$1";

$route['login'] = 'login_controller';
$route['login/login'] = 'login_controller/login';
$route['login/logout'] = 'login_controller/logout';
$route['login/register'] = 'login_controller/register';
$route['login/register/action']['post'] = 'login_controller/register';

$route['reset'] = 'Reset_controller'; 
$route['reset/search'] = 'Reset_controller/index'; 
$route['reset/reset_password/(:num)'] = 'Reset_controller/reset_password/$1'; 

$route['sk'] = 'Sk_controller';
$route['sk/create'] = "Sk_controller/create";
$route['sk/create/action']['post'] = "Sk_controller/store";
$route['sk/edit/(:any)'] = "Sk_controller/edit/$1";
$route['sk/update/(:any)']['post'] = "Sk_controller/update/$1";
$route['sk/delete/(:any)']['delete'] = "Sk_controller/delete/$1";
$route['sk/download/(:any)'] = "Sk_controller/download/$1";

$route['pkkmb'] = 'Pkkmb_controller';
$route['pkkmb/mhs'] = "Pkkmb_controller/create";
$route['pkkmb/mhs/action']['post'] = "Pkkmb_controller/store";
$route['pkkmb/edit/(:any)'] = "Pkkmb_controller/edit/$1";
$route['pkkmb/update/(:any)']['post'] = "Pkkmb_controller/update/$1";
$route['pkkmb/delete/(:any)']['delete'] = "Pkkmb_controller/delete/$1";
$route['pkkmb/download/(:any)'] = "Pkkmb_controller/download/$1";
$route['report/word/(:any)'] = "Report_controller/word/$1";
// $route['pkkmb/mhs'] = "Pkkmb_controller/mhs";
