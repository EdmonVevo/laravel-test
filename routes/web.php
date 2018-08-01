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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/companies','CompanyController@showCompanies')->name('companies');
Route::get('/addCompany','CompanyController@addCompany')->name('addCompany');


Route::get('/employees','EmployerController@showEmployees')->name('employees');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
