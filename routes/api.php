<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'Api'], function () {
    
    Route::group(['prefix' => '/{language}'], function () {

        Route::get('/get-cities', [
            'uses' => 'ApiController@getCities',
            'as' => 'get-cities',
        ]);
        
            
        Route::get('/get-regions/{city_id}', 'ApiController@getRegions');
        
        Route::post('/search/{pageNumber}', 'ItemController@search');
    
    
        Route::get('/about', [
            'uses' => 'ApiController@getAbout',
            'as' => 'about',
        ]);        
        
        Route::get('/terms-conditions', [
            'uses' => 'ApiController@getTermsConditions',
            'as' => 'terms-conditions',
        ]);
        
        Route::get('/sections','SectionController@index');
        
        Route::post('/section-search','SectionController@search');
        //subsections
        Route::get('/sub_sections/{section_id}','SubSectionController@index');
        
        Route::get('/get-items/{pageNumber}','ItemController@allItems');
        
        Route::post('/subsection-items/{sub}/{pageNumber}','ItemController@itemsOfSubsction');
    
        Route::get('/city-items/{city}/{pageNumber}','ItemController@itemsOfSCity');
        
        Route::post('/latest-items/{subSection}/{pageNumber}','ItemController@latestItem');
        
        Route::post('/oldest-items/{subSection}/{pageNumber}','ItemController@oldestItems');
        
        Route::post('/less-price-items/{subSection}/{pageNumber}','ItemController@lessPriceItems');
        
        Route::post('/more-price-items/{subSection}/{pageNumber}','ItemController@morePriceItems');
        
        Route::resource('items', 'ItemController', ['except' => ['index','store','update']]);
        
        Route::post('/login', [
            'uses' => 'AuthController@login',
            'as' => 'login',
        ]);
    
        Route::post('/register', [
            'uses' => 'AuthController@register',
            'as' => 'register',
    ]);
    
    });
    Route::post('/updateViewCount','ItemController@updateViewCount');
   
    Route::get('/get-advs', 'ApiController@advs');

    Route::post('/forget-password', [
        'uses' => 'AuthController@forgetPassword',
        'as' => 'forget-password',
    ]);

    Route::post('/resend-reset-code', [
        'uses' => 'AuthController@forgetPassword',
        'as' => 'resend-reset-code',
    ]);

    Route::post('/confirm-reset-code', [
        'uses' => 'AuthController@confirmResetCode',
        'as' => 'confirm-reset-code',
    ]);

    Route::post('/reset-password', [
        'uses' => 'AuthController@resetPassword',
        'as' => 'reset-password',
    ]);

    Route::post('/contact-us', [
        'uses' => 'ApiController@contactUs',
        'as' => 'contact-us',
    ]);
    
    Route::get('/contact-data','ApiController@contactData');

});

Route::middleware('auth:api')->namespace('Api')->group(function () {
    
    Route::group(['prefix' => '/{language}'], function () {
        
        Route::post('/get-user', [
            'uses' => 'UserController@getUser',
            'as' => 'get-user',
        ]);
        
         Route::post('/edit-personal-info', [
            'uses' => 'UserController@editPersonalInfo',
            'as' => 'edit-personal-info',
        ]);
        
        //items
        Route::get('/user-items/{pageNumber}','ItemController@index');
        

    });
    
    Route::post('/delete-item','ItemController@destroy');
    
    Route::post('/items','ItemController@store');
        
    Route::post('/items/{item}','ItemController@update');
    
    //users
    Route::post('/update-city','AuthController@updateCity');
    
    // Route::post('/change-email', [
    //     'uses' => 'AuthController@changeEmail',
    //     'as' => 'change-email',
    // ]);

    // Route::post('/confirm-change-email-code', [
    //     'uses' => 'AuthController@confirmChangeEmailCode',
    //     'as' => 'confirm-change-email-code',
    // ]);

    // Route::post('/change-password', [
    //     'uses' => 'AuthController@changePassword',
    //     'as' => 'change-password',
    // ]);

    // Route::post('/change-phone', [
    //     'uses' => 'UserController@changePhone',
    //     'as' => 'change-phone',
    // ]);

    Route::post('/update-changed-phone', [
        'uses' => 'UserController@updateChangedPhone',
        'as' => 'update-changed-phone',
    ]);

    Route::post('/refresh-token', [
        'uses' => 'AuthController@refreshToken',
        'as' => 'refresh-token',
    ]);

    Route::post('/logout', [
        'uses' => 'AuthController@logout',
        'as' => 'logout',
    ]);

    Route::get('/list-notifications', [
        'uses' => 'ApiController@listNotifications',
        'as' => 'list-notifications',
    ]);

    Route::post('/enable-notification', [
        'uses' => 'AuthController@enableNotification',
        'as' => 'enable-notification',
    ]);
    
});
