<?php

Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function(){
  Route::get('/login', 'AuthController@loginView')->name('auth.login.view');
  Route::post('/login', 'AuthController@loginHandle')->name('auth.login.handle');
});



// ,'middleware' => 'auth'
Route::group(['prefix' => 'admin' ], function(){
  Route::get('/', 'MainController@index')->name('admin.index');
<<<<<<< HEAD
  Route::resource('direction','DirectionController');
=======

  Route::prefix('users')->group(function(){
    Route::get('/', 'UsersController@index')->name('admin.users.index');
  });



>>>>>>> 53bbcc65f1825b5490adee805fb505affbdcd4a5
});
