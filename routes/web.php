<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//$router->pattern('id', '[0-9]+'); //所有id都是数字

$router->get('/', 'HomeController@index');

$router->post('home/query', 'HomeController@query');
$router->post('form/send-sms', 'HomeController@sendSms');

$router->get('news/{name}.html', 'NewsController@index')->where('name', '[a-z]+');
$router->get('news/show/{id}.html', 'NewsController@show')->where('id', '[0-9]+');

$router->group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'role:administrator']], function($router) {

    $router->get('company/test', 'CompanyController@test');
    $router->post('company/importQuery', 'CompanyController@import');
	$router->post('company/importService', 'CompanyController@importService');
	$router->crud([
		'member' => 'MemberController',
		'consult' => 'ConsultController',
	]);

    $router->crud([
        'article' => 'ArticleController',
    ]);

    $router->crud([
        'site' => 'SiteController',
    ]);
    $router->crud([
        'ad' => 'AdController',
    ]);

	$router->get('/', 'HomeController@index');
});

$router->actions([
	'auth' => ['index', 'login', 'logout', 'choose', 'authenticate-query'],
]);
