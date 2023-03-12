<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace'=> 'App\Http\Controllers\Todo', 'prefix' => 'todos'], function(){
    Route::post('/', 'StoreController')->name('todos.store');
    Route::get('/', 'IndexController')->name('todos.index');
    Route::patch('/{todo}', 'UpdateController')->name('todos.update');
    Route::delete('/{todo}', 'DeleteController')->name('todos.destroy');
});
