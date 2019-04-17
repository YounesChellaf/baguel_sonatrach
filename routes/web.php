<?php

Route::get('/', function(){return redirect(route('admin.index'));})->name('webroot.index');

Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function(){
  Route::get('/login', 'AuthController@loginView')->name('auth.login.view');
  Route::post('/login', 'AuthController@loginHandle')->name('auth.login.handle');
});

Route::get('/auth/logout', 'AuthController@handleLogout')->name('auth.logout');

Route::group(['prefix' => 'system', 'middleware' => 'auth' ], function(){
  Route::get('/switchDataSource', 'SystemController@switchDataSource')->name('admin.system.switchDataSource');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth' ], function(){
  Route::get('/', 'MainController@index')->name('admin.index');
  Route::resource('direction','DirectionController');
  Route::resource('departement','DepartementController');
  Route::resource('bloc','BlocController');
  Route::resource('office','OfficeController');
  Route::resource('room','RoomController');
  Route::resource('equipement','EquipementController');
    Route::resource('visiteur','VisitorController');
  Route::prefix('users')->group(function(){
    Route::get('/', 'UsersController@index')->name('admin.users.index');
    Route::get('/create', 'UsersController@createView')->name('admin.users.create');
    Route::post('/create', 'UsersController@createPost')->name('admin.users.create.post');
    Route::get('/edit/{id?}', 'UsersController@editView')->name('admin.users.edit');
    Route::post('/edit/{id?}', 'UsersController@editPost')->name('admin.users.edit.post');
    Route::post('/delete', 'UsersController@deleteUser')->name('admin.users.delete');
    Route::get('/getSecuredPassword', 'UsersController@getSecuredPassword')->name('admin.users.create.getSecuredPassword');
  });

  Route::prefix('suppliers')->group(function(){
    Route::get('/', 'SupplierController@index')->name('admin.suppliers.index');
    Route::get('/create', 'SupplierController@createView')->name('admin.suppliers.create');
    Route::post('/create', 'SupplierController@createPost')->name('admin.suppliers.create.post');
    Route::get('/edit/{id?}', 'SupplierController@editView')->name('admin.suppliers.edit');
    Route::post('/edit', 'SupplierController@editPost')->name('admin.suppliers.edit.post');
    Route::post('/detele', 'SupplierController@deleteSupplier')->name('admin.suppliers.delete');
  });

  Route::prefix('visit/')->group(function (){
      Route::get('','VisitController@index');
      Route::get('create','VisitController@createView');
      Route::post('create','VisitController@store');
      Route::get('validate/{id}','VisitController@aprouve');
      Route::get('reject/{id}','VisitController@reject');
  });
  Route::prefix('exit_permissions')->group(function(){
    Route::get('/', 'ExitPermissionController@index')->name('admin.ExitPermissions.index');
    Route::get('/create', 'ExitPermissionController@createView')->name('admin.ExitPermissions.index.create');
    Route::post('/create', 'ExitPermissionController@createPost')->name('admin.ExitPermissions.index.create.post');
    Route::post('/approve/{ref?}', 'ExitPermissionController@approve')->name('admin.ExitPermission.approve');
    Route::post('/approve/{ref?}', 'ExitPermissionController@reject')->name('admin.ExitPermission.reject');
  });

  Route::prefix('system_config')->group(function(){
    Route::get('/', 'SystemConfigController@index')->name('admin.SystemConfig.index');
    Route::get('/{page?}', 'SystemConfigController@page')->name('admin.SystemConfig.subPage');
    Route::post('/updateMultiLifeBaseParam', 'SystemConfigController@updateMultiLifeBaseParam')->name('admin.lifebase.updateMultiLifeBaseParam');
    Route::post('/save', 'SystemConfigController@save')->name('admin.SystemConfig.save');
  });

  Route::prefix('lifebases')->group(function(){
    Route::post('/save', 'LifeBaseController@save')->name('admin.lifebase.save');
  });

});
