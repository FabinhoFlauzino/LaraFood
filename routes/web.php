<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->namespace('Admin')->group(function() {

    /**
     * Rotas de Planos
     */
    Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::get('plans', 'PlanController@index')->name('plans.index');
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::post('plans', 'PlanController@store')->name('plans.store');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');

    Route::get('/', 'Plancontroller@index')->name('admin.index');
});




Route::get('/', function () {
    return view('welcome');
});
