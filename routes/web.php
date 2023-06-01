<?php

use App\Http\Controllers\Frontend\DocumentController;
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


Route::get('/', function () {
    return view('frontend_v4.index');
});

Route::get('/home', function () {
    return "HOME_2";
});

//Route::get('/document', function () {
//    return view('frontend_v4.pages.document.detail');
//});
Route::get('/document/{slug}', [DocumentController::class, 'view'])->name('document.detail');
//Route::get('/search', function (){
//    return view('frontend_v4.pages.search.search');
//});

Route::get('/search', [DocumentController::class, 'search'])->name('document.search');


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

Route::get('/', function () {
    return view('frontend_v4.pages.components');
});
