<?php

use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\CategoryCotroller;
use App\Http\Controllers\CropController;
use App\Http\Controllers\CropManagementProductController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\farmAssetsController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\farmCropController;
use App\Http\Controllers\farmRegisterController;
use App\Http\Controllers\farmToolsMappingController;
use App\Http\Controllers\farmUploadController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\NoteControlller;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\landingController;

use App\Http\Controllers\settingsController;



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
// Route::get('/', function () {
//     return view('login');
// })->name('login');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/', [landingController::class, 'landing'])->name("landing");

Route::post('/login', [CustomLoginController::class, 'login'])->name('farm.login');

Route::group(['middleware'=>['auth']] ,function(){
    



Route::get('/dashboard', [dashboardController::class, 'dashboard'])->name("dashboard");




Route::resource('staff', StaffController::class);

Route::resource('crop', CropController::class);



Route::resource('category', CategoryCotroller::class);

Route::resource('farm', FarmController::class);

Route::resource('note', NoteControlller::class);

Route::resource('lease', LeaseController::class);

Route::resource('assets', farmAssetsController::class);

Route::resource('farmUpload', farmUploadController::class);

Route::resource('farm-crop', farmCropController::class);

Route::resource('farm_register', farmRegisterController::class);

Route::resource('crop-management-products', CropManagementProductController::class);

Route::resource('farm-tools-mapping', farmToolsMappingController::class);

Route::get('crop-management-products/{id}/duplicate', [CropManagementProductController::class, 'duplicate'])->name('crop-management-products.duplicate');

Route::get('/get-duration/{farmCropId}', [FarmController::class, 'getInfo']);

Route::get('/get-assets-details/{assetid}', [FarmController::class, 'getAssets']);

Route::get('/get-farm-data', [FarmController::class, 'getFarmData']);

Route::get('/get-assets-data', [FarmController::class, 'getAssetsData']);

Route::get('/get-activities-data', [FarmController::class, 'getActivitiesData']);

Route::post('save/storeStock', [FarmController::class, 'storeStock'])->name('save.storeStock');


Route::post('farm/farm', [FarmController::class, 'staffrole'])->name('farm.staffrole');

//settings





// Route::resource('', settingsController::class);

Route::prefix('settings')->group(function () {

    Route::post('about-us', [settingsController::class, 'store'])->name('settings.about_us_post');
    Route::get('/about-us', [settingsController::class, 'about_index'])->name('settings.about_us');
    Route::get('/about-us/edit', [settingsController::class, 'edit'])->name('settings.edit_about_us');



    Route::post('team', [settingsController::class, 'team_store'])->name('settings.team_post');
    Route::get('/team', [settingsController::class, 'team_index'])->name('settings.team');
    Route::get('/team/create', [settingsController::class, 'team_create'])->name('settings.create_team');
    Route::get('/settings/edit_team_member/{id}', [SettingsController::class, 'editTeamMember'])->name('settings.edit_team_member');
    Route::put('/settings/update_team_member/{id}', [SettingsController::class, 'updateTeamMember'])->name('settings.update_team_member');


    Route::post('testimonial', [settingsController::class, 'testimonial_store'])->name('settings.testimonial_post');
    Route::get('/testimonial', [settingsController::class, 'testimonial_index'])->name('settings.testimonial');
    Route::get('/testimonial/create', [settingsController::class, 'testimonial_create'])->name('settings.create_testimonial');
    Route::get('/settings/edit_testimonial/{id}', [SettingsController::class, 'edittestimonial'])->name('settings.edit_testimonial');
    Route::put('/settings/update_testimonial/{id}', [SettingsController::class, 'updatetestimonial'])->name('settings.update_testimonial');




});


});

