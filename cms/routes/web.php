<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AddCaseController;
use App\Http\Controllers\ViewCaseListController;
use App\Http\Controllers\ApproveCaseController;
use App\Http\Controllers\LawController;



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
    return view('front');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () { 
    Route::get('/role', [RoleController::class, 'index']);
    Route::post('/role-created', [RoleController::class, 'store'])->name('role'); 
    // dasboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/add-case', [AddCaseController::class, 'index']);
    // Route::get('/get-value', [AddCaseController::class, 'getValue']);
    Route::post('/get-value', 'AddCaseController@getValue');
    Route::post('/case-added', [AddCaseController::class, 'store'])->name('case.store');
    Route::get('/view-case-list', [ViewCaseListController::class, 'index']);
    Route::get('/approve-case', [ApproveCaseController::class, 'index']);
    Route::post('/case-approved', [ApproveCaseController::class, 'approveCase'])->name('approveCase');
    Route::get('/laws', [LawController::class, 'index']);
    Route::post('/law-added', [LawController::class, 'store'])->name('law');
});