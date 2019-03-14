<?php

Auth::routes();


Route::group(['middleware' => 'auth'], function() {

    Route::group(['prefix' => 'cliente'], function() {
        Route::get('/{id?}', 'ClienteController@form')->name('cliente.form');
        //Route::delete('/{id}', 'ClienteController@delete')->name('cliente.delete');
        Route::post('/cadastrar', 'ClienteController@post')->name('cliente.cadastrar');
        //Route::put('/editar/{id}', 'ClienteController@put')->name('cliente.editar');
        //Route::get('/', 'ClienteController@list')->name('cliente.list');
    });

    Route::group(['prefix' => 'produto'], function() {
        Route::get('/{id?}', 'ProdutoController@form')->name('produto.form');
        //Route::delete('/{id}', 'ProdutoController@delete')->name('produto.delete');
        Route::post('/cadastrar', 'ProdutoController@post')->name('produto.cadastrar');
        //Route::put('/editar/{id}', 'ProdutoController@put')->name('produto.editar');
        //Route::get('/', 'ProdutoController@list')->name('produto.list');
    });

    Route::group(['prefix' => 'nota'], function() {
        Route::get('/{id?}', 'NotaController@form')->name('nota.form');
        //Route::delete('/{id}', 'NotaController@delete')->name('nota.delete');
        Route::post('/cadastrar', 'NotaController@post')->name('nota.cadastrar');
        //Route::get('/', 'NotaController@list')->name('nota.list');
    });
});
