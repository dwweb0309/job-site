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

Route::get('/mailable', function () {
    $user = App\Models\User::find(1);
    
    return new App\Mail\CandidateRegistered($user);
});

Route::get('/', [Controllers\ListingController::class, 'index'])
    ->name('listings.index');

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'role:Candidate'], function () {
    Route::get('/show', [Controllers\UserController::class, 'show'])
        ->name('show');
    Route::get('/edit', [Controllers\UserController::class, 'edit'])
        ->name('edit');
    Route::put('/update', [Controllers\UserController::class, 'update'])
        ->name('update');
});

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function () {
    Route::get('/', [Controllers\DashboardController::class, 'index'])->name('index');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'role:Admin'], function () {
    Route::get('/', [Controllers\AdminController::class, 'index'])->name('index');
    Route::get('/users', [Controllers\AdminController::class, 'users'])->name('users');
    Route::post('/users/search', [Controllers\AdminController::class, 'searchUsers'])->name('users.search');
    Route::get('/companies', [Controllers\AdminController::class, 'companies'])->name('companies');
    Route::post('/companies/search', [Controllers\AdminController::class, 'searchCompanies'])->name('companies.search');
    Route::get('/listings', [Controllers\AdminController::class, 'listings'])->name('listings');
    Route::post('/listings/search', [Controllers\ListingController::class, 'search'])->name('listings.search');
    Route::get('/tags', [Controllers\TagController::class, 'index'])->name('tags');
    Route::post('/tags/search', [Controllers\TagController::class, 'search'])->name('tags.search');
    Route::get('/industries', [Controllers\IndustryController::class, 'index'])->name('industries');
    Route::post('/industries/search', [Controllers\IndustryController::class, 'search'])->name('industries.search');
    Route::get('/categories', [Controllers\CategoryController::class, 'index'])->name('categories');
    Route::post('/categories/search', [Controllers\CategoryController::class, 'search'])->name('categories.search');
});

Route::group(['prefix' => 'company', 'as' => 'company.', 'middleware' => 'role:Employer'], function () {
    Route::get('/', [Controllers\CompanyController::class, 'dashboard'])->name('dashboard');
    Route::get('/listings', [Controllers\CompanyController::class, 'listings'])->name('listings');
    Route::get('/edit', [Controllers\CompanyController::class, 'edit'])->name('edit');
    Route::put('/update', [Controllers\CompanyController::class, 'update'])->name('update');
});

Route::resource('tags', Controllers\TagController::class)->middleware('role:Admin');
Route::resource('industries', Controllers\IndustryController::class)->middleware('role:Admin');
Route::resource('categories', Controllers\CategoryController::class)->middleware('role:Admin');

Route::get('/new', [Controllers\ListingController::class, 'create'])
    ->name('listings.create');
Route::get('/{listing:slug}', [Controllers\ListingController::class, 'show'])
        ->name('listings.show');
Route::get('/{listing:slug}/edit', [Controllers\ListingController::class, 'edit'])
    ->name('listings.edit');
Route::put('/{listing:slug}/update', [Controllers\ListingController::class, 'update'])
    ->name('listings.update');
Route::delete('/listings/{listing:slug}', [Controllers\ListingController::class, 'destroy'])
    ->name('listings.destroy');

Route::get('/{listing:slug}/apply', [Controllers\ListingController::class, 'apply'])
    ->name('listings.apply');

Route::post('/new', [Controllers\ListingController::class, 'store'])
    ->middleware('role:Employer')
    ->name('listings.store');
