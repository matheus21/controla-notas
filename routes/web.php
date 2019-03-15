<?php

Auth::routes();


Route::group(['middleware' => 'auth'], function() {


    Route::get('/', 'HomeController@index')->name('dashboard');

    Route::group(['prefix' => 'cliente'], function() {
        Route::get('/cadastro/{id?}', 'ClienteController@form')->name('cliente.form');
        Route::post('/cadastrar', 'ClienteController@post')->name('cliente.post');
        Route::post('/editar/{id}', 'ClienteController@put')->name('cliente.edit');
        Route::get('/lista', 'ClienteController@list')->name('cliente.list');
    });

    Route::group(['prefix' => 'produto'], function() {
        Route::get('/cadastro/{id?}', 'ProdutoController@form')->name('produto.form');
        Route::post('/cadastrar', 'ProdutoController@post')->name('produto.post');
        Route::post('/editar/{id}', 'ProdutoController@put')->name('produto.edit');
        Route::get('/lista', 'ProdutoController@list')->name('produto.list');
    });

    Route::group(['prefix' => 'nota'], function() {
        Route::get('/cadastro/{id?}', 'NotaController@form')->name('nota.form');
        Route::post('/cadastrar', 'NotaController@post')->name('nota.post');
        Route::get('/deletar/{id}', 'NotaController@delete')->name('nota.delete');
        Route::post('/editar/{id}', 'NotaController@put')->name('nota.edit');
        Route::get('/lista', 'NotaController@list')->name('nota.list');
        Route::get('/pdf', 'NotaController@pdf')->name('nota.pdf');
    });
});
