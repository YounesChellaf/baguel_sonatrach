<?php

Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function(){
  Route::get('/login', 'AuthController@loginView')->name('auth.login.view');
  Route::post('/login', 'AuthController@loginHandle')->name('auth.login.handle');
});



// ,'middleware' => 'auth'
Route::group(['prefix' => 'admin' ], function(){
  Route::get('/', 'MainController@index')->name('admin.index');

  Route::prefix('users')->group(function(){
    Route::get('/', 'UsersController@index')->name('admin.users.index');
  });



});
