<?php

Route::get('/', function(){echo 'server root';})->name('webroot.index');

Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function(){
  Route::get('/login', 'AuthController@loginView')->name('auth.login.view');
  Route::post('/login', 'AuthController@loginHandle')->name('auth.login.handle');
});



// ,'middleware' => 'auth'
Route::group(['prefix' => 'admin' ], function(){
  Route::get('/', 'MainController@index')->name('admin.index');

  Route::resource('direction','DirectionController');
  Route::resource('departement','DepartementController');

  Route::prefix('users')->group(function(){
    Route::get('/', 'UsersController@index')->name('admin.users.index');
    Route::get('/create', 'UsersController@createView')->name('admin.users.create');
    Route::post('/create', 'UsersController@createPost')->name('admin.users.create.post');

    //helpers
    Route::get('/getSecuredPassword', 'UsersController@getSecuredPassword')->name('admin.users.create.getSecuredPassword');
  });

});
