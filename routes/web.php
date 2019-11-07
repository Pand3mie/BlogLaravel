<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\DashboardController;

Auth::routes();
Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/contact', 'DashboardController@contact');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});
Route::resource('jeux', 'JeuxController');

Route::get('/jeux', 'JeuxController@index')->name('game_list');

Route::get('importExportView', 'ExcelController@importExportView');
Route::get('export', 'ExcelController@export')->name('export');
Route::post('import', 'ExcelController@import')->name('import');
Route::get('jeux/delete/{id}', ['as' => 'jeux.delete', 'uses' => 'JeuxController@destroy']);
Route::get('jeux/details/{id}', ['as' => 'jeux.show', 'uses' => 'JeuxController@show']);