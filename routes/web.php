<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\PaiementController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('test', 'App\Http\Controllers\PaiementController@testDate');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');

	Route::get('paiements/add', function () {
		$now = Carbon::now(); 
		setlocale(LC_TIME, 'fr_FR');
        $month_name = date('F', mktime(0, 0, 0, $now->month));

		return view('paiement.add',['year'=>$now->year,'month'=>$month_name]);
	})->name('add-paiement');

});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
    Route::resource('zones', 'App\Http\Controllers\ZoneController');
    Route::resource('amplies', 'App\Http\Controllers\AmpliesController');
    Route::resource('abonnes', 'App\Http\Controllers\AbonnesController');
    Route::get('abonnes/amplies/{id}', 'App\Http\Controllers\AbonnesController@getAmpliesBySecteur');
    Route::get('paiement', 'App\Http\Controllers\PaiementController@getListPaiementMensuel');
    Route::post('paiements/mens/id', 'App\Http\Controllers\PaiementController@getIDPaiement');
    Route::get('paiements/{id}', 'App\Http\Controllers\PaiementController@getListPaiementAbonnes');
	Route::get('paiements/data/{id}', 'App\Http\Controllers\PaiementController@getLinePaiement');
	Route::post('save-paiement', 'App\Http\Controllers\PaiementController@savePayMens')->name('save-paiement');
});
