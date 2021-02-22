<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BitcoinController;
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

// Route::get('bitcoindata', "BitcoinController@list");
Route::get('bitcoinview', "BitcoinController@view");

// Route::post('bitcoindata','BitcoinController@getDates');
Route::post('bitcoinview','BitcoinController@callApi');
