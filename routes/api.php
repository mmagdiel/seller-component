<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;

/*
use app\Http\Controllers\ContactController
use App\Contact;
use app\Http\Controllers\ContactController
*/
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/seller', [SellerController::class, 'listSellers']);

Route::get('/seller/{id}', [SellerController::class, 'listDatesSeller'])->name('id');

Route::get('/seller/{id}/{date}', [SellerController::class, 'listCordinatesDateSeller'])->name('id')->name('date');
