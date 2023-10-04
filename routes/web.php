<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\NicheController;
use App\Http\Controllers\NishmentController;
use App\Http\Controllers\PagesController;
use App\Http\Middleware\Authenticate;
use App\Models\Nishment;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// ------------------Pages Controller Here----------------------
Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'signin')->name('authentication.signin');
    Route::get('/forget', 'forget')->name('authenticaion.forget');
});
// ------------------Pages Controller Here----------------------
// ------------------Authenticaion Controller Here----------------------
Route::controller(AuthenticationController::class)->group(function () {
    Route::post('/signin', 'signin')->name('authentication.login');
    Route::post('/reset-link', 'resetLink')->name('authentication.resetLink');
    Route::get('/reset-password/{email}', 'resetPassword')->name('authenticaion.reset');
    Route::post('/update_password', 'updatePassword')->name('authenticaion.update');
});
Route::group(["middleware" => ["authsecurity"]], function () {
    // ------------------Pages Controller Here----------------------
    Route::controller(PagesController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard.dashboard');
    });
    // ------------------Pages Controller Here----------------------
    // ------------------Authentication Controller Here----------------------
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('/logout', 'logout')->name('authenticaion.logout');
    });
    // ------------------Authentication Controller Here----------------------
    Route::resources([
        '/niche' => NicheController::class,
        '/collection' => CollectionController::class,
    ]);
    Route::get('/add_niche',[NicheController::class,'add_niche']);
});
