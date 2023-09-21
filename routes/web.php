<?php

use App\Http\Controllers\CategoryCotroller;
use App\Http\Controllers\CropController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\farmCropController;
use App\Http\Controllers\farmRegisterController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\NoteControlller;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\CropManagementProductController;
use App\Http\Controllers\farmToolsMappingController;
use App\Http\Controllers\farmUploadController;
use App\Http\Controllers\Auth\CustomLoginController;
use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/farm/login', function () {
    return view('login');
})->name('login');

Route::resource('crop', CropController::class);

Route::resource('category', CategoryCotroller::class);

Route::resource('farm', FarmController::class);

Route::resource('note', NoteControlller::class);

Route::resource('lease', LeaseController::class);

Route::resource('farmUpload', farmUploadController::class);

Route::resource('farm-crop', farmCropController::class);

Route::resource('register', farmRegisterController::class);

Route::resource('crop-management-products', CropManagementProductController::class);

Route::resource('farm-tools-mapping', farmToolsMappingController::class);

Route::get('crop-management-products/{id}/duplicate', [CropManagementProductController::class, 'duplicate'])->name('crop-management-products.duplicate');

Route::get('/get-duration/{farmCropId}', [FarmController::class, 'getInfo']);

Route::get('/get-assets-details/{assetid}', [FarmController::class, 'getAssets']);

Route::get('get-farm-data', [FarmController::class, 'getFarmData']);

Route::get('get-assets-data', [FarmController::class, 'getAssetsData']);

Route::get('get-activities-data', [FarmController::class, 'getActivitiesData']);

Route::post('save/storeStock', [FarmController::class, 'storeStock'])->name('save.storeStock');

Route::post('/login', [CustomLoginController::class, 'login'])->name('farm.login');

Route::group(['middleware'=>['auth']] ,function(){

});

