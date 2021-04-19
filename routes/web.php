<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Coba\BagianBrowse;
use App\Http\Livewire\Undangan\UndanganBrowse;
use App\Http\Livewire\Role\RoleBrowse;
use App\Http\Livewire\Dashboard;
// use Auth;
// use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Auth\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();

Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/', Dashboard::class)->name('home');

Route::middleware(['auth'])->group(function () {

    
Route::get('/pegawai', 'App\Http\Controllers\PegawaiController@index')->name('pegawai.index');
Route::get('pegawai/add', 'App\Http\Controllers\PegawaiController@create')->name('pegawai.create');
Route::post('pegawai/store', 'App\Http\Controllers\PegawaiController@store')->name('pegawai.store');
Route::get('pegawai/edit/{id}', 'App\Http\Controllers\PegawaiController@edit')->name('pegawai.edit');
Route::post('pegawai/update/{id}', 'App\Http\Controllers\PegawaiController@update')->name('pegawai.update');
Route::get('pegawai/delete/{id}', 'App\Http\Controllers\PegawaiController@destroy')->name('pegawai.delete');
Route::get('pegawai/show/{id}', 'App\Http\Controllers\PegawaiController@show')->name('pegawai.show');

Route::get('/bagian', 'App\Http\Controllers\BagianController@index')->name('bagian.index');
Route::get('bagian/add', 'App\Http\Controllers\BagianController@create')-> name('bagian.create');
Route::post('bagian/store', 'App\Http\Controllers\BagianController@store')-> name('bagian.store');
Route::get('bagian/edit/{id}', 'App\Http\Controllers\BagianController@edit')-> name('bagian.edit');
Route::post('bagian/update/{id}', 'App\Http\Controllers\BagianController@update')-> name('bagian.update');
Route::get('bagian/delete/{id}', 'App\Http\Controllers\BagianController@destroy')-> name('bagian.delete');
Route::get('bagian/show/{id}', 'App\Http\Controllers\BagianController@show')-> name('bagian.show');

Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user.index');
Route::get('user/add', 'App\Http\Controllers\UserController@create')-> name('user.create');
Route::post('user/store', 'App\Http\Controllers\UserController@store')-> name('user.store');
Route::get('user/edit/{id}', 'App\Http\Controllers\UserController@edit')-> name('user.edit');
Route::post('user/update/{id}', 'App\Http\Controllers\UserController@update')-> name('user.update');
Route::get('user/delete/{id}', 'App\Http\Controllers\UserController@destroy')-> name('user.delete');
Route::get('user/show/{id}', 'App\Http\Controllers\UserController@show')-> name('user.show');

Route::get('profile/edit', 'App\Http\Controllers\ProfileController@edit')-> name('profile.edit');
Route::post('profile/update', 'App\Http\Controllers\ProfileController@update')-> name('profile.update');

Route::get('/undangan', 'App\Http\Controllers\UndanganController@index')->name('undangan.index');
Route::get('undangan/add', 'App\Http\Controllers\UndanganController@create')-> name('undangan.create');
Route::post('undangan/store', 'App\Http\Controllers\UndanganController@store')-> name('undangan.store');
Route::get('undangan/edit/{id}', 'App\Http\Controllers\UndanganController@edit')-> name('undangan.edit');
Route::post('undangan/update/{id}', 'App\Http\Controllers\UndanganController@update')-> name('undangan.update');
Route::get('undangan/delete/{id}', 'App\Http\Controllers\UndanganController@destroy')-> name('undangan.delete');
Route::get('undangan/show/{id}', 'App\Http\Controllers\UndanganController@show')-> name('undangan.show');

Route::get('/undangan_pegawai', 'App\Http\Controllers\UndanganPegawaiController@index')->name('undangan_pegawai.index');
Route::get('undangan_pegawai/add', 'App\Http\Controllers\UndanganPegawaiController@create')-> name('undangan_pegawai.create');
Route::post('undangan_pegawai/store', 'App\Http\Controllers\UndanganPegawaiController@store')-> name('undangan_pegawai.store');
Route::get('undangan_pegawai/edit/{id}', 'App\Http\Controllers\UndanganPegawaiController@edit')-> name('undangan_pegawai.edit');
Route::post('undangan_pegawai/update/{id}', 'App\Http\Controllers\UndanganPegawaiController@update')-> name('undangan_pegawai.update');
Route::get('undangan_pegawai/delete/{id}', 'App\Http\Controllers\UndanganPegawaiController@destroy')-> name('undangan_pegawai.delete');
Route::get('undangan_pegawai/show/{id}', 'App\Http\Controllers\UndanganPegawaiController@show')-> name('undangan_pegawai.show');

Route::get('/undangan_bagian', 'App\Http\Controllers\UndanganBagianController@index')->name('undangan_bagian.index');
Route::get('undangan_bagian/add', 'App\Http\Controllers\UndanganBagianController@create')-> name('undangan_bagian.create');
Route::post('undangan_bagian/store', 'App\Http\Controllers\UndanganBagianController@store')-> name('undangan_bagian.store');
Route::get('undangan_bagian/edit/{id}', 'App\Http\Controllers\UndanganBagianController@edit')-> name('undangan_bagian.edit');
Route::post('undangan_bagian/update/{id}', 'App\Http\Controllers\UndanganBagianController@update')-> name('undangan_bagian.update');
Route::get('undangan_bagian/delete/{id}', 'App\Http\Controllers\UndanganBagianController@destroy')-> name('undangan_bagian.delete');
Route::get('undangan_bagian/show/{id}', 'App\Http\Controllers\UndanganBagianController@show')-> name('undangan_bagian.show');

Route::get('/coba-bagian', BagianBrowse::class)->name('bagian.browse');
Route::get('/data-undangan', UndanganBrowse::class)->name('undangan.browse');
Route::get('/data-role', RoleBrowse::class)->name('role.browse');
});



