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

Auth::routes();

// Homepage
Route::get('/')
	->uses('Homepage\ViewController@index')
	->name('home');

Route::prefix('/')->middleware(['auth'])->namespace('Dashboard')->group( function(){

	// Dashboard
	Route::get('/dashboard')
		->uses('Main\ViewController@index')
		->name('dashboard');

	// Users
	Route::get('/users')
		->uses('User\ViewController@index')
		->name('users');
	Route::get('/users/add')
		->uses('User\ViewController@add')
		->name('users.add');
	Route::get('/users/edit/{id}')
		->uses('User\ViewController@edit')
		->name('users.edit');

	Route::post('/users/add')
		->uses('User\CreateController@index')
		->name('users.add');

	Route::patch('/users/update/{id}')
		->uses('User\UpdateController@index')
		->name('users.update');
	Route::post('/users/status/{id}')
		->uses('User\UpdateController@status')
		->name('users.status');

	// Profile
	Route::get('/profile')
		->uses('Main\ViewController@profile')
		->name('profile');

	Route::post('/profile/update')
		->uses('Main\UpdateController@index')
		->name('profile.update');
});