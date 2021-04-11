<?php

Route::get('/', [
    'uses' => 'LangingController@index',
    'as' => 'index',
]);

Route::post('/contact', [
    'uses' => 'LangingController@contactUs',
    'as' => 'contactUs.store',
]);

Route::get('/admin-login', [
    'uses' => 'Admin\AuthController@showLoginForm',
    'as' => 'admin.get.login',
]);

Route::post('/admin-login', [
    'uses' => 'Admin\AuthController@login',
    'as' => 'admin.post.login',
]);

Route::post('/logout', [
    'uses' => 'Admin\AuthController@logout',
    'as' => 'logout',
]);

Route::get('/admin-forget-password', [
    'uses' => 'Admin\AuthController@showForgetPasswordForm',
    'as' => 'admin.get-forget-password',
]);

Route::group(['middleware' => 'admin', 'prefix' => 'dashboard', 'namespace' => 'Admin'], function () {
    Route::get('/', [
        'uses' => 'HomeController@dashboard',
        'as' => 'dashboard',
    ]);

    Route::get('/statistics', [
        'uses' => 'HomeController@statistics',
        'as' => 'dashboard-statistics',
    ]);

    Route::resource('admins', 'AdminController', ['except' => ['show', 'destroy']]);

    Route::resource('users', 'UserController', ['except' => ['show','destroy']]);

    Route::resource('cities', 'CitiesController');
    
    Route::resource('regions', 'RegionsController');

    Route::resource('sections', 'SectionsController');

    Route::resource('sub-sections', 'SubsectionController');

    Route::resource('items', 'ItemController', ['except' => ['destroy']]);

    Route::resource('advs', 'AdvsController', ['except' => ['destroy']]);

    Route::resource('about', 'AboutController', ['only' => ['create', 'store']]);

    Route::resource('contactUs', 'ContactUsController', ['only' => ['index', 'show']]);

    Route::get('/change-password', [
        'uses' => 'AdminController@editPassword',
        'as' => 'admins.editPassword',
        ]);

    Route::post('/change-password', [
        'uses' => 'AdminController@changePassword',
        'as' => 'admins.changePassword',
        ]);

    Route::get('/edit-profile', [
        'uses' => 'AdminController@editProfile',
        'as' => 'admins.editProfile',
        ]);

    Route::post('/edit-profile', [
        'uses' => 'AdminController@updateProfile',
        'as' => 'admins.updateProfile',
        ]);

    Route::get('settings/edit', [
        'uses' => 'SettingController@edit',
        'as' => 'settings.edit',
        ]);

    Route::patch('settings/edit', [
        'uses' => 'SettingController@update',
        'as' => 'settings.update',
        ]);

    Route::get('/notifications/{type}', [
        'uses' => 'NotificationController@create',
        'as' => 'notifications.create',
    ]);

    Route::post('/notifications/{type}', [
        'uses' => 'NotificationController@store',
        'as' => 'notifications.store',
    ]);

    Route::post('/users-change-status', [
        'uses' => 'UserController@changeStatus',
        'as' => 'changeStatus',
    ]);

    Route::post('/items-change-status', [
        'uses' => 'ItemController@changeStatus',
        'as' => 'changeStatus',
    ]);

    Route::post( '/cities/change-regions', [
        'uses' => 'CitiesController@changeRegions',
        'as'   => 'cities.changeRegions'
    ] );

    Route::post( '/sections/change-subsections', [
        'uses' => 'ItemController@changeSubsections',
        'as'   => 'sections.changeSubsections'
    ] );

    Route::post('/users-change-account-status', [
        'uses' => 'UserController@changeAccountStatus',
        'as' => 'changeAccountStatus',
    ]);

    Route::get('/users/{user}', [
        'uses' => 'UserController@show',
        'as' => 'users.show',
    ]);

    Route::post('/users/destroy', [
        'uses' => 'UserController@destroy',
        'as' => 'users.destroy',
    ]);

    Route::get('/section-subsections/{section}', [
        'uses' => 'SectionsController@subSections',
        'as' => 'sections.subsections',
    ]);

    Route::post('/contactUs/destroy', [
        'uses' => 'ContactUsController@destroy',
        'as' => 'contactUs.destroy',
    ]);

    Route::post('/contactUs/reply', [
        'uses' => 'ContactUsController@replyMessage',
        'as' => 'contactUs.reply',
    ]);

    Route::post('/cities/destroy', [
        'uses' => 'CitiesController@destroy',
        'as' => 'cities.destroy',
    ]);

    Route::post('/regions/destroy', [
        'uses' => 'regionsController@destroy',
        'as' => 'regions.destroy',
    ]);

    Route::post('/sections/destroy', [
        'uses' => 'sectionsController@destroy',
        'as' => 'sections.destroy',
    ]);

    Route::post('/sub-sections/destroy', [
        'uses' => 'SubsectionsController@destroy',
        'as' => 'subsections.destroy',
    ]);

    Route::post('/items/destroy', [
        'uses' => 'ItemController@destroy',
        'as' => 'items.destroy',
    ]);

    Route::post('/advs/destroy', [
        'uses' => 'AdvsController@destroy',
        'as' => 'advs.destroy',
    ]);

});
