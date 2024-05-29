<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageViewController;


Route::get('/',[PageViewController::class,'anasayfa'])->name('anasayfa');

Route::prefix('/NPanel')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::match(['get','post'],'login','AdminController@login');

    Route::group(['middleware'=>['admin']],function(){
        Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {\UniSharp\LaravelFilemanager\Lfm::routes();});
        Route::get('dashboard','AdminController@dashboard');
        Route::match(['get','post'],'update-password','AdminController@updatePassword');
        Route::match(['get','post'],'update-admin','AdminController@updateAdmin');
        Route::post('checkPassword','AdminController@checkPassword');
        Route::get('logout','AdminController@logout');

        // pages
        Route::prefix('pages')->group(function () {
            Route::get('/','PagesController@index');
            Route::post('update-pages-status','PagesController@update');
            Route::match(['get','post'],'add-edit-pages/{id?}','PagesController@edit');
            Route::get('delete-pages/{id?}','PagesController@destroy');
        });

        // menus
        Route::prefix('menus')->group(function () {
            Route::get('/','MenusController@index');
            Route::post('add', 'MenusController@add');
            Route::post('updateOrder', 'MenusController@updateOrder');

            Route::prefix('types')->group(function () {
                Route::get('/','MenusController@type');
                Route::match(['get','post'],'crud/{id?}','MenusController@crudType');
                Route::get('delete/{id?}','MenusController@typeDestroy');
            });
        });

        // sliders
        Route::prefix('sliders')->group(function () {
            Route::get('/','SlidersController@index');
            Route::match(['get','post'],'crud/{id?}','SlidersController@edit');
            Route::get('delete/{id?}','SlidersController@destroy');
        });

        // settings
        Route::prefix('settings')->group(function () {
            Route::match(['get','post'],'update/{id?}','SettingsController@edit');
        });

        // products
        Route::prefix('products')->group(function () {
            Route::get('/','ProductsController@index');
            Route::match(['get','post'],'crud/{id?}','ProductsController@edit');
            Route::get('delete/{id?}','ProductsController@destroy');

            Route::prefix('categories')->group(function () {
                Route::get('/','ProductsController@categoryIndex');
                Route::get('subcategories/{id}','ProductsController@categorySubcategories');
                Route::match(['get','post'],'crud/{id?}','ProductsController@categoryCrud');
                Route::get('delete/{id?}','ProductsController@categoryDestroy');
            });
            Route::prefix('images')->group(function () {
                Route::post('delete/{id?}','ProductsController@imagesDestroy');
            });
        });

        // Blogs
        Route::prefix('blogs')->group(function () {
            Route::get('/','BlogsController@index');
            Route::match(['get','post'],'crud/{id?}','BlogsController@edit');
            Route::get('delete/{id?}','BlogsController@typeDestroy');
            Route::prefix('categories')->group(function () {
                Route::get('/','BlogsController@categoryIndex');
                Route::match(['get','post'],'crud/{id?}','BlogsController@categoryCrud');
                Route::get('delete/{id?}','BlogsController@categoryDestroy');
            });
        });

        // activities
        Route::prefix('activities')->group(function () {
            Route::match(['get','post'],'update/{id?}','ActivitiesController@edit');
            Route::prefix('images')->group(function () {
                Route::post('delete/{id?}','ActivitiesController@imagesDestroy');
            });
        });

        // users
        Route::prefix('users')->group(function () {
            Route::get('/','UserController@index');
            Route::match(['get','post'],'crud/{id?}','UserController@edit');
            Route::get('delete/{id?}','UserController@destroy');
        });
        // homepage
        Route::prefix('homepage')->group(function () {
            Route::get('/','HomepageController@index');
            Route::match(['get','post'],'crud/{id?}','HomepageController@edit');
            Route::get('delete/{id?}','HomepageController@destroy');
        });

        // homepage
        Route::prefix('certificates')->group(function () {
            Route::get('/','CertificatesController@index');
            Route::match(['get','post'],'crud/{id?}','CertificatesController@edit');
            Route::get('delete/{id?}','CertificatesController@destroy');
        });
    });
});
