<?php

use App\Http\Controllers\Api\Frontend\ContactController;
use App\Http\Controllers\Api\Frontend\Page\AboutController;
use App\Http\Controllers\Api\Frontend\Page\CommonController;
use App\Http\Controllers\Api\Frontend\DynamicPageController;
use App\Http\Controllers\Api\Frontend\Page\HomeController;
use App\Http\Controllers\Api\Frontend\SettingsController;
use Illuminate\Support\Facades\Route;


Route::middleware('api')->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/about', [AboutController::class, 'index']);
    Route::get('/common', [CommonController::class, 'index']);
    
    Route::get('/settings', [SettingsController::class, 'index']);

    Route::get('/pages', [DynamicPageController::class, 'index']);
    Route::get('/page/single/{page_id}', [DynamicPageController::class, 'single']);

    Route::post('/contact/send', [ContactController::class, 'messageSend']);
    
});