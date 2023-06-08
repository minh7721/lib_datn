<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' =>
        array_merge(
            (array)config('backpack.base.web_middleware', 'web'),
            (array)config('backpack.base.middleware_key', 'admin'),
            array('super_admin'),
//            array('web')
        ),

    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('document', 'DocumentCrudController');
    Route::crud('download', 'DownloadCrudController');
    Route::crud('tag', 'TagCrudController');
    Route::crud('rating', 'RatingCrudController');
    Route::crud('comment', 'CommentCrudController');
    Route::crud('payment', 'PaymentCrudController');
    Route::crud('report', 'ReportCrudController');
}); // this should be the absolute last line of this file
