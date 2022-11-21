<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\HTTP\Controllers\LoginController@index')->name('login');
Route::post('/connexion', 'App\HTTP\Controllers\LoginController@connexion')->name('connexion');
Route::get('/logout','App\HTTP\Controllers\LoginController@logout')->name('logout');


Route::middleware(['auth'])->group(function(){
    Route::get('/gestion-de-mon-wallet', 'App\HTTP\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/Changer-mot-de-passe', 'App\HTTP\Controllers\LoginController@changePassword')->name('password-default');
    Route::post('/change-password','App\HTTP\Controllers\LoginController@store')->name('store-paswword');
    Route::get('/utilisateurs', 'App\HTTP\Controllers\UtilisateurController@index')->name('user');
    Route::get('/create-user', 'App\HTTP\Controllers\UtilisateurController@create')->name('create-user');
    Route::get('/edit-user/{ref}','App\HTTP\Controllers\UtilisateurController@edit')->name('edit-user');
    Route::post('/store-user', 'App\HTTP\Controllers\UtilisateurController@store')->name('store-user');
    Route::post('/update-user', 'App\HTTP\Controllers\UtilisateurController@update')->name('update-user');

    //Create categorie de depense
    Route::get('/categorie','App\HTTP\Controllers\CategorieController@index')->name('liste-categorie');
    Route::get('/create-categorie','App\HTTP\Controllers\CategorieController@create')->name('create-categorie');
    Route::get('/edit-categorie/{ref}','App\HTTP\Controllers\CategorieController@edit')->name('edit-categorie');
    Route::get('/delete-categorie/{ref}','App\HTTP\Controllers\CategorieController@destroy')->name('delete-categorie');
    Route::post('/store-categorie','App\HTTP\Controllers\CategorieController@store')->name('store-categorie');
    Route::post('/update-categorie','App\HTTP\Controllers\CategorieController@update')->name('update-categorie');

    //Route de budget
    Route::get('/budget','App\HTTP\Controllers\BudgetController@index')->name('liste-budget');
    Route::get('/create-budget','App\HTTP\Controllers\BudgetController@create')->name('create-budget');
    Route::get('/edit-budget/{ref}','App\HTTP\Controllers\BudgetController@edit')->name('edit-budget');
    Route::post('/store-budget','App\HTTP\Controllers\BudgetController@store')->name('store-budget');
    Route::post('/update-budget','App\HTTP\Controllers\BudgetController@update')->name('update-budget');
    Route::get('/delete-budget/{ref}','App\HTTP\Controllers\BudgetController@destroy')->name('delete-budget');

    //Route des Dépenses
    Route::get('/liste-depenses','App\HTTP\Controllers\DepenseController@index')->name('liste-depense');
    Route::get('/ajouter-depenses/{ref}','App\HTTP\Controllers\DepenseController@create')->name('ajoute-depense');
    Route::get('/annuler-depenses/{ref}','App\HTTP\Controllers\DepenseController@annulerDepense')->name('annule-depense');
    Route::get('/cloture-depenses/{ref}','App\HTTP\Controllers\DepenseController@clotureDepense')->name('cloture-depense');
    Route::post('/ajoute-depenses','App\HTTP\Controllers\DepenseController@store')->name('ajout-depense');

    //Route des revenu
    Route::get('/liste-revenu','App\HTTP\Controllers\RevenuController@index')->name('liste-revenu');
    Route::get('/ajouter-revenu','App\HTTP\Controllers\RevenuController@create')->name('ajoute-revenu');
    Route::post('/ajoute-revenu','App\HTTP\Controllers\RevenuController@store')->name('ajout-revenu');

});
//les routes des utilisateurs

