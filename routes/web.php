<?php

use App\Http\Controllers;
use Illuminate\Http\Request;
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
require __DIR__.'/auth.php';

Route::get('/', [Controllers\ListingController::class, 'index'])
    ->name('listings.index');

Route::get('/user/{id}', [Controllers\UserController::class, 'show'])
    ->name('user.show');
Route::get('/user/{id}/edit', [Controllers\UserController::class, 'edit'])
    ->middleware('auth')
    ->name('user.edit');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function () {
    Route::get('/', [Controllers\DashboardController::class, 'index'])->name('index');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'role:Admin'], function () {
    Route::get('/', [Controllers\AdminController::class, 'index'])->name('index');
    Route::get('/users', [Controllers\AdminController::class, 'users'])->name('users');
    Route::get('/companies', [Controllers\AdminController::class, 'companies'])->name('companies');
    Route::get('/listings', [Controllers\AdminController::class, 'listings'])->name('listings');
});

Route::group(['prefix' => 'company', 'as' => 'company.', 'middleware' => 'auth'], function () {
    Route::get('/', [Controllers\CompanyController::class, 'index'])->name('index');
    Route::get('/listings', [Controllers\CompanyController::class, 'listings'])->name('listings');
});

Route::get('/new', [Controllers\ListingController::class, 'create'])
    ->name('listings.create');
Route::get('/{listing:slug}', [Controllers\ListingController::class, 'show'])
        ->name('listings.show');
Route::get('/{listing:slug}/edit', [Controllers\ListingController::class, 'edit'])
    ->name('listings.edit');
Route::put('/{listing:slug}/update', [Controllers\ListingController::class, 'update'])
    ->name('listings.update');

Route::get('/{listing:slug}/apply', [Controllers\ListingController::class, 'apply'])
    ->name('listings.apply');

Route::post('/new', [Controllers\ListingController::class, 'store'])
    ->middleware('role:Employer')
    ->name('listings.store');