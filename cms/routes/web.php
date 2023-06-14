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
use App\Http\Controllers\TransferController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CaseTodayController;
use App\Http\Controllers\CaseTypeController;
use App\Http\Controllers\Auth\OTPVerificationController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RegistrationController;
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
// Route::get('/case-list', function () {
//     return view('case-list');
// });
Route::get('/case-list',[PublicController::class,'caseList']);
Route::get('/case-list-search',[PublicController::class,'searchList'])->name('searchCase');
Route::get('/file-your-case',[PublicController::class,'index']);
Route::post('/case-added-byuser',[PublicController::class,'storeCase'])->name('casestored');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('otp/verify', 'Auth\OTPVerificationController@showVerifyForm')->name('otp.verify');
// Route::post('otp/verify', 'Auth\OTPVerificationController@verify')->name('otp.verify.verify');
Route::get('otp/verify', [OTPVerificationController::class,'showVerifyForm'])->name('otp.verify');
Route::post('otp/verify', [OTPVerificationController::class,'verify'])->name('otp.verify.verify');
Route::group(['middleware' => ['auth']], function () { 
    // registration
    Route::get('/registration', [RegistrationController::class, 'index']);
    Route::post('/registration-done', [RegistrationController::class, 'store'])->name('adduser');
    // 
    Route::get('/role', [RoleController::class, 'index']);
    Route::get('/user-list', [RoleController::class, 'userList']);
    Route::post('/role-created', [RoleController::class, 'store'])->name('role'); 
    Route::get('/user/{id}', [RoleController::class, 'editRole']);
    Route::post('/role-added', [RoleController::class, 'addRole'])->name('add-role');
    Route::post('/permission-added', [RoleController::class, 'permission'])->name('permission');
    // dasboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/add-case', [AddCaseController::class, 'index']);
    // Route::get('/get-value', [AddCaseController::class, 'getValue']);
    Route::post('/get-value', 'AddCaseController@getValue');
    Route::post('/case-added', [AddCaseController::class, 'store'])->name('case.store');
    // case-list
    Route::get('/view-case-list', [ViewCaseListController::class, 'index']);
    Route::get('/searchcaselist', [ViewCaseListController::class, 'searchcaselist'])->name('searchcaselist');
    
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
    // transfer case
    Route::post('/case-transfered',[TransferController::class,'transfer'])->name('transfer');
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