<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AddCaseController;
use App\Http\Controllers\ViewCaseListController;
use App\Http\Controllers\ApproveCaseController;
use App\Http\Controllers\LawController;
use App\Http\Controllers\SettingController;

use App\Http\Controllers\CaseProfileController;
use App\Http\Controllers\InvestigationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CaseTodayController;
use App\Http\Controllers\CaseTypeController;
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
    // case-list
    Route::get('/view-case-list', [ViewCaseListController::class, 'index']);
    Route::post('/transfered', [ViewCaseListController::class, 'transfer'])->name('transfer');
    // 
    Route::get('/approve-case', [ApproveCaseController::class, 'index']);
    Route::post('/case-approved', [ApproveCaseController::class, 'approveCase'])->name('approveCase');
    Route::get('/laws', [LawController::class, 'index']);
    Route::post('/law-added', [LawController::class, 'store'])->name('law');
    Route::get('/setting',[SettingController::class,'index']);
    Route::post('/courtCat-added',[SettingController::class,'courtCat'])->name('courtCat');
    Route::post('/hearingfor-added',[SettingController::class,'hearingfor'])->name('hearingfor');
    // case profile
    Route::get('/case/{id}',[CaseProfileController::class,'index'])->name('caseProfile');
    Route::post('/hearing-date',[CaseProfileController::class,'store'])->name('hearingDate');
    Route::post('/investigation-evidence',[CaseProfileController::class,'investigation'])->name('investigation');
    Route::post('/presence-update',[CaseProfileController::class,'presence'])->name('presence');
    // InvestigationController
    Route::get('/investigation',[InvestigationController::class,'index']);
    Route::post('/investigation-order-sent',[InvestigationController::class,'store'])->name('investigate');
    // setting 
    Route::post('/area-added',[SettingController::class,'area'])->name('area');
    Route::post('/iarea-added',[SettingController::class,'i_area'])->name('i_area');
    Route::post('/bdcourt-added',[SettingController::class,'bdcourt'])->name('bdcourt');
    Route::post('/court-added',[SettingController::class,'addcourt'])->name('addcourt');
    Route::post('/jurisdriction-added',[SettingController::class,'jurisdriction'])->name('jurisdriction'); 
    Route::get('/register/{id}',[RegisterController::class,'index']);
    Route::post('/search',[RegisterController::class,'search'])->name('search');
    // castoday
    Route::get('/case-today',[CaseTodayController::class,'index']);
    // CaseTypeController
    Route::get('/case-type/{type}',[CaseTypeController::class,'index']);
    Route::post('/case-type-result',[CaseTypeController::class,'search'])->name('typeSearch');
});