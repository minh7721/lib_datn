<?php

use App\Http\Controllers\Auth\LoginFacebookController;
use App\Http\Controllers\Auth\LoginGoogleController;
use App\Http\Controllers\Frontend\DocumentController;
use App\Http\Controllers\Frontend\DownloadController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Frontend\UploadController;
use App\Http\Controllers\Frontend\UserController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;

Route::get('/', [DocumentController::class, 'index'])->name('document.home.index');

Route::get('auth/login', [LoginController::class, 'getLogin'])->name('frontend.auth.getLogin');
Route::post('auth/login/post', [LoginController::class, 'postLogin'])->name('frontend.auth.postLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('frontend.auth.logout');

Route::get('auth/register', [RegisterController::class, 'getRegister'])->name('frontend.auth.getRegister');
Route::post('auth/register/post', [RegisterController::class, 'postRegister'])->name('frontend.auth.postRegister');

// Login Facebook

Route::get('auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('frontend.login.facebook');

Route::get('auth/facebook/callback', [LoginFacebookController::class, 'index']);

Route::get('statics/policy', function () {
    return "Chinh sach rieng tu";
});

Route::get('statics/terms-of-use', function () {
    return "Dieu khoan dich vu";
});
// Google
Route::get('auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('frontend.login.google');

Route::get('auth/google/callback', [LoginGoogleController::class, 'index']);

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
    ->middleware('auth')
    ->group(function () {
        Route::get('{id}/profile', [UserController::class, 'profile'])->name('frontend_v4.users.profile');
        Route::post('{id}/profile', [UserController::class, 'UpdateProfile'])->name('frontend_v4.users.postProfile');
        Route::post('{id}/profile/password', [UserController::class, 'changePass'])->name('frontend_v4.users.postChangePass');

        //Upload
        Route::get('upload', [UploadController::class, 'getUpload'])->name('frontend_v4.users.getUpload');
        Route::post('upload', [UploadController::class, 'postUpload'])->name('frontend_v4.users.postUpload');

        Route::get('/document/{slug}/like', [DocumentController::class, 'like'])->name('frontend_v4.document.like');
        Route::get('/document/{slug}/dislike', [DocumentController::class, 'dislike'])->name('frontend_v4.document.dislike');

    });


Route::get('/vnpay/payment', [DocumentController::class, 'VNPayRedirectPayment'])->name('frontend_v4.postVNPay');
Route::get('/vnpay/payment/response', [DocumentController::class, 'VNPayGetResponse'])->name('frontend_v4.getVNPay');

Route::get('/download/{id}', [DownloadController::class, 'download'])->name('frontend_v4.document.download');
Route::get('/payment', [PaymentController::class, 'getPayment'])->name('frontend_v4.payment.get');
Route::post('/payment', [PaymentController::class, 'postPayment'])->name('frontend_v4.payment.post');
