<?php

use App\Http\Controllers\Api\Frontend\ContactController;
use App\Http\Controllers\Api\Frontend\CountryController;
use App\Http\Controllers\Api\Frontend\Page\AboutController;
use App\Http\Controllers\Api\Frontend\Page\CommonController;
use App\Http\Controllers\Api\Frontend\DynamicPageController;
use App\Http\Controllers\Api\Frontend\LogicController;
use App\Http\Controllers\Api\Frontend\Page\FormController;
use App\Http\Controllers\Api\Frontend\Page\HomeController;
use App\Http\Controllers\Api\Frontend\PriceController;
use App\Http\Controllers\Api\Frontend\SettingsController;
use App\Models\Logic;
use Illuminate\Support\Facades\Route;


Route::middleware('api')->group(function () {
    Route::get('page/home', [HomeController::class, 'index']);
    Route::get('page/about', [AboutController::class, 'index']);
    Route::get('/page/form', [FormController::class, 'index']);
    Route::get('page/common', [CommonController::class, 'index']);
    
    Route::get('/settings', [SettingsController::class, 'index']);

    Route::get('/pages', [DynamicPageController::class, 'index']);
    Route::get('/page/single/{page_id}', [DynamicPageController::class, 'single']);

    Route::post('/contact/send', [ContactController::class, 'messageSend']);
    Route::get('/country/list', [CountryController::class, 'index']);

    Route::post('/price/list', [PriceController::class, 'getPrice']);

    Route::get('/logic/get', [LogicController::class, 'getLogic']);

    Route::post('/booking/form/submit', [FormController::class, 'store']);
});
