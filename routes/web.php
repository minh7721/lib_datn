<?php

use App\Http\Controllers\Auth\LoginFacebookController;
use App\Http\Controllers\Auth\LoginGoogleController;
use App\Http\Controllers\Frontend\DocumentController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\UserController;
use Laravel\Socialite\Facades\Socialite;

//use App\Http\Controllers\ViewerController;
//use Illuminate\Support\Facades\Route;
//
///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|
//*/
//
//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get( '/viewer/{filename}', [ViewerController::class, 'view'])->name('viewer.index');
//Route::get( '/document/{filename}', [DocumentController::class, 'view'])->name('document.detail');
//

Route::get('/', [DocumentController::class, 'index'])->name('document.home.index');

Route::get('auth/login', [LoginController::class, 'getLogin'])->name('frontend.auth.getLogin');
Route::post('auth/login/post', [LoginController::class, 'postLogin'])->name('frontend.auth.postLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('frontend.auth.logout');

// Login Facebook

Route::get('auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('frontend.login.facebook');

Route::get('auth/facebook/callback', [LoginFacebookController::class, 'index']);

Route::get('policy', function () {
    return "Chinh sach rieng tu";
});

Route::get('terms', function () {
    return "Dieu khoan dich vu";
});
// Google
Route::get('auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('frontend.login.google');

Route::get('auth/google/callback', [LoginGoogleController::class, 'index']);

Route::get('/document', function () {
    return view('frontend_v4.pages.document.detail');
});

Route::get('/home', function () {
    return view('frontend_v4.pages.home.home');
});


Route::get('/document/{slug}', [DocumentController::class, 'view'])->name('document.detail');

Route::get('/search', [DocumentController::class, 'search'])->name('frontend.document.search');


Route::get('/institution', function () {
    return view('frontend_v4.pages.university.index');
});

Route::get('/institution/university_detail', function () {
    return view('frontend_v4.pages.university.detail');
});
Route::get('/institution/university_detail/questions', function () {
    return view('frontend_v4.pages.university.question');
});
Route::get('/institution/university_detail/students', function () {
    return view('frontend_v4.pages.university.students');
});
Route::get('/institution/university_detail/subjects', function () {
    return view('frontend_v4.pages.university.subjects');
});
Route::get('/institution/university_detail/major', function () {
    return view('frontend_v4.pages.university.major');
});

Route::get('/course', function () {
    return "Course";
});

Route::prefix('/')
    ->middleware('web')
    ->group(function () {
        Route::get('{id}/profile', [UserController::class, 'profile'])->name('frontend_v4.users.profile');
        Route::post('{id}/profile', [UserController::class, 'UpdateProfile'])->name('frontend_v4.users.postProfile');
        Route::post('{id}/profile/password', [UserController::class, 'changePass'])->name('frontend_v4.users.postChangePass');
    });
