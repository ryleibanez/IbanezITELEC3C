<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'viewDash'])->name('dashboard');
    Route::get('/category', [CategoryController::class, 'viewCategory'])->name('category');

    Route::get('/searchCategory', [CategoryController::class, 'searchCategoryPage'])->name('searchCategoryPage');
    Route::get('/category', [CategoryController::class, 'viewCategory'])->name('category');
    Route::get('/addCategory', [CategoryController::class, 'addCategoryPage'])->name('addCategory');
    Route::post('/addCategoryPost', [CategoryController::class, 'addCategory'])->name('addCategory.post');
    Route::get('/deleteCategory', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
    Route::get('/editCategory', [CategoryController::class, 'editCategory'])->name('editCategory');
    Route::post('/editCategoryPost', [CategoryController::class, 'editCategoryPost'])->name('editCategory.post');
});
