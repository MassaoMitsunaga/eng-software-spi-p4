<?php

use Spatie\Cors\Cors;

Route::group(['middleware' => ['cors', Cors::class]], function () {
    Auth::routes();
});

Route::group(['middleware' => ['auth', 'revalidate']], function () {
    Route::group(['namespace' => 'Produto'], function () {
        Route::get('/', 'ProdutoController@index')->name('home');
        Route::get('create', 'ProdutoController@create')->name('create');
        Route::post('store', 'ProdutoController@store')->name('store');
        Route::get('edit/{id}', 'ProdutoController@edit')->name('edit');
        Route::put('update/{id}', 'ProdutoController@update')->name('update');
        Route::get('show/{id}', 'ProdutoController@show')->name('show');
        Route::delete('destroy/{id}', 'ProdutoController@destroy')->name('destroy');
        Route::get('/home', 'ProdutoController@index')->name('home');
    });
});

