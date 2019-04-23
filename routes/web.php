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

  Route::resource('divisions','DirectionController');
  Route::resource('services','DepartementController');
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
    Route::get('/{id?}', 'UsersController@singleUser')->name('admin.users.single');
    Route::post('/delete', 'UsersController@deleteUser')->name('admin.users.delete');
    Route::get('/getSecuredPassword', 'UsersController@getSecuredPassword')->name('admin.users.create.getSecuredPassword');
  });


  Route::prefix('activities')->group(function(){
    Route::get('/getSingleActivityChanges', 'UsersController@getSingleActivityChanges')->name('admin.users.getSingleActivityChanges');
  });

  Route::prefix('suppliers')->group(function(){
    Route::get('/', 'SupplierController@index')->name('admin.suppliers.index');
    Route::get('/create', 'SupplierController@createView')->name('admin.suppliers.create');
    Route::post('/create', 'SupplierController@createPost')->name('admin.suppliers.create.post');
    Route::get('/edit/{id?}', 'SupplierController@editView')->name('admin.suppliers.edit');
    Route::post('/edit', 'SupplierController@editPost')->name('admin.suppliers.edit.post');
    Route::post('/detele', 'SupplierController@deleteSupplier')->name('admin.suppliers.delete');
    Route::get('/{id?}/subSuppliers', 'SupplierController@subSuppliersView')->name('admin.suppliers.subSuppliers');
    Route::get('/{id?}/subSuppliers/create', 'SupplierController@subSupplierCreate')->name('admin.suppliers.subSuppliers.create');
    Route::post('/{id?}/subSuppliers/create', 'SupplierController@subSupplierCreatePost')->name('admin.suppliers.subSuppliers.create.post');
    Route::post('/import', 'SupplierController@import')->name('admin.suppliers.import');
  });

  Route::prefix('notations')->group(function(){
    Route::get('/', 'NotationController@index')->name('admin.notations.index');
    Route::get('/{type?}', 'NotationController@indexPerType')->name('admin.notations.index.type');
    Route::get('/{type?}/view/{ref?}', 'NotationController@viewControl')->name('admin.notations.view');
    Route::get('/{type?}/create', 'NotationController@createPerType')->name('admin.notations.type.create');
    Route::post('/{type?}/create', 'NotationController@save')->name('admin.notations.type.save');
  });

  Route::prefix('products')->group(function(){
    Route::get('/', 'ProductController@index')->name('admin.products.index');
    Route::post('/create', 'ProductController@create')->name('admin.products.create');
    Route::post('/import', 'ProductController@import')->name('admin.products.import');
  });

  Route::prefix('projects')->group(function(){
    Route::get('/', 'ProjectController@index')->name('admin.projects.index');
    Route::post('/create', 'ProjectController@create')->name('admin.projects.create');
  });

  Route::prefix('budget')->group(function(){
    Route::get('/', 'BudgetController@index')->name('admin.budget.index');
  });

  Route::prefix('visit/')->group(function (){
    Route::get('','VisitController@index')->name('admin.visits.index');
    Route::get('create','VisitController@createView')->name('admin.visit.create');
    Route::post('create','VisitController@store')->name('admin.visit.store');
    Route::get('validate/{id}','VisitController@aprouve')->name('admin.visit.approve');
    Route::get('reject/{id}','VisitController@reject')->name('admin.visit.reject');
  });

  Route::prefix('exit_permissions')->group(function(){
    Route::get('/', 'ExitPermissionController@index')->name('admin.ExitPermissions.index');
    Route::get('/create', 'ExitPermissionController@createView')->name('admin.ExitPermissions.index.create');
    Route::post('/create', 'ExitPermissionController@createPost')->name('admin.ExitPermissions.index.create.post');
    Route::get('/single/{id?}', 'ExitPermissionController@singleExitPermission')->name('admin.ExitPermissions.single');
    Route::post('/approve/{ref?}', 'ExitPermissionController@approve')->name('admin.ExitPermission.approve');
    Route::post('/approve/{ref?}', 'ExitPermissionController@reject')->name('admin.ExitPermission.reject');
  });

  Route::prefix('system_config')->group(function(){
    Route::get('/', 'SystemConfigController@index')->name('admin.SystemConfig.index');
    Route::get('/{page?}', 'SystemConfigController@page')->name('admin.SystemConfig.subPage');
    Route::post('/updateMultiLifeBaseParam', 'SystemConfigController@updateMultiLifeBaseParam')->name('admin.lifebase.updateMultiLifeBaseParam');
    Route::post('/save', 'SystemConfigController@save')->name('admin.SystemConfig.save');

    Route::prefix('notationCriterias')->group(function(){
      Route::post('/{type?}/save', 'NotationCriteriaController@save')->name('admin.SystemConfig.notationCriterias.save');
    });
  });

  Route::prefix('roles')->group(function(){
    Route::get('/', 'RolesController@rolesIndex')->name('admin.roles.index');
  });

  Route::prefix('lifebases')->group(function(){
    Route::post('/save', 'LifeBaseController@save')->name('admin.lifebase.save');
  });

  Route::prefix('administrations')->group(function(){
    Route::post('/save', 'AdministrationController@save')->name('admin.administration.save');
  });

  Route::prefix('employees')->group(function(){
    Route::get('/', 'EmployeeController@index')->name('admin.employees.index');
    Route::get('/create', 'EmployeeController@createView')->name('admin.employees.create');
    Route::post('/create', 'EmployeeController@createPost')->name('admin.employees.create.post');
    Route::post('/delete', 'EmployeeController@deleteEmployee')->name('admin.employees.delete');
    Route::post('/import', 'EmployeeController@import')->name('admin.employees.import');
  });

  Route::prefix('notification')->group(function(){
    Route::get('/{id?}', 'NotificationController@handleNotificationClick')->name('admin.notifications.handleClick');
  });

});
