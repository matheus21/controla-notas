<?php

Auth::routes();

Route::middleware(['auth'])
    ->prefix('cliente')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
    });

Route::group(['middleware' => 'auth'], function() {

    Route::group(['prefix' => 'cliente'], function() {
        Route::get('/form', 'ClienteController@form')->name('cliente.form');
        Route::delete('/{id}', 'ClienteController@delete')->name('cliente.delete');
        Route::post('/cadastrar', 'ClienteController@post')->name('cliente.cadastrar');
        Route::get('/', 'ClienteController@list')->name('cliente.list');
    });

    Route::group(['prefix' => 'produto'], function() {
        Route::get('/form', 'ProdutoController@form')->name('produto.form');
        Route::delete('/{id}', 'ProdutoController@delete')->name('produto.delete');
        Route::post('/cadastrar', 'ProdutoController@post')->name('produto.delete');
        Route::get('/', 'ProdutoController@list')->name('produto.list');
    });

    Route::group(['prefix' => 'nota'], function() {
        Route::get('/form', 'NotaController@form')->name('nota.form');
        Route::delete('/{id}', 'NotaController@delete')->name('nota.delete');
        Route::post('/cadastrar', 'NotaController@post')->name('nota.delete');
        Route::get('/', 'NotaController@list')->name('nota.list');
    });
});
