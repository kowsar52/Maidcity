<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BioDataShortlistController;
use App\Http\Controllers\EmployerMDWRequirementController;
use App\Http\Controllers\EmployerQuestionAnswerController;
use App\Http\Controllers\FdwBioDataController;
use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\JoinUsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WebsiteController;
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
Route::name('website.')->group(function () {
    Route::get('/', [WebsiteController::class, 'homePage'])->name('home-page');
    Route::get('/about-us', [WebsiteController::class, 'about'])->name('about-us');
    Route::get('/contact-us', [WebsiteController::class, 'contactUs'])->name('contact-us');
    Route::post('/contact-us-store', [WebsiteController::class, 'contactUsStore'])->name('contact-us-store');
    Route::get('/jobs', [WebsiteController::class, 'jobs'])->name('jobs');
    Route::get('/caregiver', [WebsiteController::class, 'caregiver'])->name('caregiver');
    Route::get('/aps', [WebsiteController::class, 'aps'])->name('aps');
    Route::get('/transfer-mdw', [WebsiteController::class, 'transferMDW'])->name('transfer-mdw');
    Route::resource('/job-apply', JobApplyController::class,['names' => 'job-apply']);
    Route::get('/job-detail/{id}',[WebsiteController::class,'jobDetail'])->name('job-detail');
    Route::resource('/services', ServiceController::class);
    // bio data
    Route::resource('/bio-data', FdwBioDataController::class);
    Route::get('/maidcity/upload/print/pdf/{id}',[FdwBioDataController::class,'printPdf'])->name('print-pdf');
    Route::get('/maidcity/upload/mom/pdf/{id}',[FdwBioDataController::class,'momPdf'])->name('mom-pdf');
    Route::post('/data-type/modal/show',[FdwBioDataController::class, 'dataTypeModalShow'])->name('data-type.modal.show');

    Route::get('/register',[RegisteredUserController::class,'create'])->name('register');
    Route::post('/register-user',[RegisteredUserController::class,'store'])->name('register-user');
    Route::get('/login',[LoginUserController::class,'create'])->name('login')->middleware('guest');
    Route::post('/login-user',[LoginUserController::class,'store'])->name('login-user')->middleware('guest');
    Route::post('/logout',[LoginUserController::class,'destroy'])->name('logout')->middleware('auth');
    Route::resource('/employer-mdw-requirement', EmployerMDWRequirementController::class,['names' => 'employer-mdw-requirement']);
    Route::get('/profile',[ProfileController::class,'edit'])->name('profile.edit');
    Route::post('/profile/update',[ProfileController::class, 'update'])->name('profile.update');
    Route::get('/bio-data-shortlist/{fwd_bio_data_id}', [BioDataShortlistController::class,'save'])->name('bio-data-shortlist.save');
    Route::get('/bio-data-shortlist-remove/{id}', [BioDataShortlistController::class,'remove'])->name('bio-data-shortlist.remove');
    Route::get('/bio-data-shortlist',[BioDataShortlistController::class,'list'])->name('bio-data-shortlist.list');
    Route::post('/join-us-store',[WebsiteController::class,'joinUsStore'])->name('join-us-store');
    //Email Verification
    Route::get('/email-verify/{id}/',[WebsiteController::class,'emailVerify'])->name('email-verify');
    //Forgot Password
    Route::get('/forgot-password',[ForgotPasswordController::class,'create'])->name('password.request');
    Route::post('/forgot-password-store',[ForgotPasswordController::class,'store'])->name('password.email');
    Route::get('/reset-password/{token}',[ForgotPasswordController::class,'resetPassword'])->name('password.reset');
    Route::post('reset-password',[ForgotPasswordController::class,'resetPasswordUpdate'])->name('password.update');
    Route::get('/user-import',[WebsiteController::class,'userImport'])->name('user-import');
    Route::post('/user-import-store',[WebsiteController::class,'userImportStore'])->name('user-import-store');
    Route::get('/job-share-social-media/{job_id}',[JobApplyController::class,'jobShareSocialMedia'])->name('job-share-social-media');
    Route::get('/job-share-detail/{job_id}',[JobApplyController::class,'jobShareDetail'])->name('job-share-detail');
    Route::get('/mdw-biodata-import', [WebsiteController::class, 'mdwBiodataImport'])->name('mdw-biodata-import');
    Route::post('/mdw-biodata-import-store', [WebsiteController::class, 'mdwBiodataImportStore'])->name('mdw-biodata-import-store');
});
