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
use Illuminate\Support\Facades\Route;

Auth::routes();

/////////////////////////////DashBoard
Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/contact', 'DashboardController@contact');




/////////////////////////////logout
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

////////////////////////////Systéme d'import des jeux
Route::get('importExportView', 'ExcelController@importExportView');
Route::get('export', 'ExcelController@export')->name('export');
Route::post('import', 'ExcelController@import')->name('import');


/////////////////////////// Route Jeux
Route::resource('jeux', 'JeuxController');
/* List des jeux */
Route::get('/jeux', 'JeuxController@index')->name('game_list');
/* suppression d'un jeu */
Route::get('jeux/delete/{id}', ['as' => 'jeux.delete', 'uses' => 'JeuxController@destroy']);
/* details d'un jeu */
Route::get('jeux/details/{id}', ['as' => 'jeux.show', 'uses' => 'JeuxController@show']);
/* Ajouter un jeu */
Route::get('jeux/ajouter','JeuxController@create')->name('addGame');