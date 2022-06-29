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

Auth::routes();
Route::get('', 'HomeController@index')->name('home');
//    Route::group(['middleware' => ['auth']], function() {

        //frontend route for public//

        Route::resource('/', 'HomeController');
        Route::resource('publicgeneralslips', 'PublicgeneralslipController');
        Route::resource('publicchoiceslips', "PublicchoiceslipController");
        Route::get('/center_name', 'PublicchoiceslipController@getCenter');  //city name thaka center name pawar jonno//
        Route::resource('publicmsgs', "PublicmsgController");
        Route::get('/searches', 'SlipsendController@searches');

        Route::get('/services', function () {
            return view('front-end.pages.services');
        });

        Route::get('/about_us', function () {
            return view('front-end.pages.about_us');
        });

        Route::get('/contact_us', function () {
            return view('front-end.pages.contact_us');
        });


//    });

//backend route for users//

Route::group(['middleware'=>['auth']], function(){
    Route::resource('users','UserController');
    Route::resource('roles','RoleController');
    Route::resource('permissions','PermissionController');
    Route::resource('jobs', "JobController");
//    Route::resource('city_names', "CityController");
//    Route::resource('center_names', "CenterController");
    Route::resource('cities', "CityController");
    Route::resource('centers', "CenterController");
    Route::resource('generalslips', 'GeneralslipController');
    Route::get('/searchgen', 'GeneralslipController@search');
    Route::resource('choiceslips', "ChoiceslipController");
    Route::get('/centre_name', 'ChoiceslipController@getCentre');  //city name thaka centre name pawar jonno//
    Route::get('/searchchoice', 'ChoiceslipController@search');
    Route::resource('slipsends', "SlipsendController");
    Route::get('/searchslip', 'SlipsendController@search');
    Route::resource('messages', "MessageController");
    Route::get('/searchmsg', 'MessageController@search');
});




