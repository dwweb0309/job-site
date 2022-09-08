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

Route::get('/', [Controllers\ListingController::class, 'index'])
    ->name('listings.index');

Route::get('/new', [Controllers\ListingController::class, 'create'])
->name('listings.create');

Route::post('/new', [Controllers\ListingController::class, 'store'])
    ->name('listings.store');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function () {
    Route::get('/', [Controllers\DashboardController::class, 'index'])->name('index');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/', [Controllers\AdminController::class, 'index'])->name('index');
    Route::get('/users', [Controllers\AdminController::class, 'users'])->name('users');
    Route::get('/companies', [Controllers\AdminController::class, 'companies'])->name('companies');
    Route::get('/listings', [Controllers\AdminController::class, 'listings'])->name('listings');
});

Route::group(['prefix' => 'company', 'as' => 'company.', 'middleware' => 'auth'], function () {
    Route::get('/', [Controllers\CompanyController::class, 'index'])->name('index');
    Route::get('/listings', [Controllers\CompanyController::class, 'listings'])->name('listings');
});

require __DIR__.'/auth.php';

Route::get('/{listing:slug}', [Controllers\ListingController::class, 'show'])
    ->name('listings.show');

Route::get('/{listing:slug}/apply', [Controllers\ListingController::class, 'apply'])
    ->name('listings.apply');