<?php


Route::get('/', function () {
    return view('auth.login');  
});

Auth::routes();

Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('registration', 'CustomAuthController@registration')->name('register-user');
Route::post('custom', 'CustomAuthController@customRegistration')->name('custom');

Route::resource('loads','LoadController');
Route::resource('locations','LocationController');
Route::resource('stations','StationController');
Route::resource('tankers','TankerController');  

Route::resource('feeds','FeedController');

Route::get('feed','FeedController@feed')->name('feed');
Route::post('getfeed','FeedController@getfeed')->name('getfeed'); 

Route::get('details','FeedController@details')->name('details'); 

Route::resource('reports','ReportsController'); 


Route::group(['middleware' => ['auth']], function() {
    
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');

});


                             

Route::get('/{page}', 'AdminController@index');
