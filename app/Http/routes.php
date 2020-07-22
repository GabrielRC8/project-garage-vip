<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {

    // Site
    Route::get      ('/',              [ 'as' => 'site.index',           'uses' => 'Auth\AuthController@showLoginForm' ]);
    Route::get      ('/404',           [ 'as' => 'site.notfound',           'uses' => 'SiteController@notfound' ]);
    


    // Home - Para não dar erro no app.blade.php
    Route::get      ('/home', [ 'as' => 'home.index',   'uses' => 'HomeAdminController@index' ]);


    // Login
    Route::get      ('/login',  [ 'as' => 'auth.showLoginForm',  'uses' => 'Auth\AuthController@showLoginForm' ]);
    Route::post     ('/login',  [ 'as' => 'auth.login',          'uses' => 'Auth\AuthController@login'         ]);
    Route::get      ('/logout', [ 'as' => 'auth.logout',         'uses' => 'Auth\AuthController@logout'        ]);


    // Registration
    Route::get      ('/register', [ 'as' => 'auth.showRegistrationForm',  'uses' => 'Auth\AuthController@showRegistrationForm' ]);
    Route::post     ('/register', [ 'as' => 'auth.register',              'uses' => 'Auth\AuthController@register'             ]);


    // Password Reset Routes
    Route::get      ('/password/reset/{token?}', [ 'as' => 'password.showResetForm',        'uses' => 'Auth\PasswordController@showResetForm'       ]);
    Route::post     ('/password/email',          [ 'as' => 'password.sendResetLinkEmail',   'uses' => 'Auth\PasswordController@sendResetLinkEmail'  ]);
    Route::post     ('/password/reset',          [ 'as' => 'password.reset',                'uses' => 'Auth\PasswordController@reset'               ]);


    // Group
    Route::get      ('/group',              [ 'as' => 'group.index',     'uses' => 'GroupController@index'   ]);
    Route::get      ('/group/create',       [ 'as' => 'group.create',    'uses' => 'GroupController@create'  ]);
    Route::post     ('/group',              [ 'as' => 'group.store',     'uses' => 'GroupController@store'   ]);
    Route::get      ('/group/{group}/edit', [ 'as' => 'group.edit',      'uses' => 'GroupController@edit'    ]);
    Route::patch    ('/group/{group}',      [ 'as' => 'group.update',    'uses' => 'GroupController@update'  ]);
    Route::delete   ('/group/{group}',      [ 'as' => 'group.destroy',   'uses' => 'GroupController@destroy' ]);


    // Page
    Route::get      ('/page',              [ 'as' => 'page.index',     'uses' => 'PageController@index'   ]);
    Route::get      ('/page/create',       [ 'as' => 'page.create',    'uses' => 'PageController@create'  ]);
    Route::post     ('/page',              [ 'as' => 'page.store',     'uses' => 'PageController@store'   ]);
    Route::get      ('/page/{page}/edit',  [ 'as' => 'page.edit',      'uses' => 'PageController@edit'    ]);
    Route::patch    ('/page/{page}',       [ 'as' => 'page.update',    'uses' => 'PageController@update'  ]);
    Route::delete   ('/page/{page}',       [ 'as' => 'page.destroy',   'uses' => 'PageController@destroy' ]);


    // Current User
    Route::get      ('/current-user',         [ 'as' => 'currentUser.index',    'uses' => 'UserController@currentUser'   ]);
    Route::patch    ('/current-user/{user}',  [ 'as' => 'currentUser.update',   'uses' => 'UserController@currentUserUpdate' ]);
    Route::patch    ('/current-user/image/{user}',  [ 'as' => 'currentUser.updateImage',   'uses' => 'UserController@currentUserUpdateImage' ]);


    // User
    Route::get      ('/user',                      [ 'as' => 'user.index',           'uses' => 'UserController@index'          ]);
    Route::get      ('/user/create',               [ 'as' => 'user.create',          'uses' => 'UserController@create'         ]);
    Route::post     ('/user',                      [ 'as' => 'user.store',           'uses' => 'UserController@store'          ]);
    Route::get      ('/user/{user}/edit',          [ 'as' => 'user.edit',            'uses' => 'UserController@edit'           ]);
    Route::patch    ('/user/{user}',               [ 'as' => 'user.update',          'uses' => 'UserController@update'         ]);
    Route::delete   ('/user/{user}',               [ 'as' => 'user.destroy',         'uses' => 'UserController@destroy'        ]);


    // Configuration
    Route::get      ('/configuration',                       [ 'as' => 'configuration.index',     'uses' => 'ConfigurationController@index'   ]);
    Route::get      ('/configuration/{configuration}/edit',  [ 'as' => 'configuration.edit',      'uses' => 'ConfigurationController@edit'    ]);
    Route::patch    ('/configuration/{configuration}',       [ 'as' => 'configuration.update',    'uses' => 'ConfigurationController@update'  ]);


    // Home User 
    Route::get      ('/home-user',                     [ 'as' => 'homeUser.index',           'uses' => 'HomeUserController@index'   ]);
    
    
    // Home Admin
    Route::get      ('/home-admin', [ 'as' => 'homeAdmin.index',  'uses' => 'HomeAdminController@index' ]);


    //Clientes
    Route::get      ('/customer',           [ 'as' => 'customer.index',     'uses' => 'CustomerController@index'    ]);
    Route::post     ('/customer/store',     [ 'as' => 'customer.store',     'uses' => 'CustomerController@store'    ]);
    Route::post     ('/customer/search',    [ 'as' => 'customer.search',    'uses' => 'CustomerController@search'   ]);
    

    
});