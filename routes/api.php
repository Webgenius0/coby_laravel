<?php

use App\Http\Controllers\Api\Frontend\AffiliateController;
use App\Http\Controllers\Api\Frontend\Booking\BookingController;
use App\Http\Controllers\Api\Frontend\Booking\PriceController;
use App\Http\Controllers\Api\Frontend\Booking\LogicController;
use App\Http\Controllers\Api\Frontend\Booking\CountryController;
use App\Http\Controllers\Api\Frontend\ContactController;
use App\Http\Controllers\Api\Frontend\Page\AboutController;
use App\Http\Controllers\Api\Frontend\Page\CommonController;
use App\Http\Controllers\Api\Frontend\DynamicPageController;
use App\Http\Controllers\Api\Frontend\Page\FormController;
use App\Http\Controllers\Api\Frontend\Page\HomeController;
use App\Http\Controllers\Api\Frontend\SettingsController;
use App\Models\Logic;
use Illuminate\Support\Facades\Route;


Route::middleware('api')->group(function () {
    // Page
    Route::get('page/home', [HomeController::class, 'index']);
    Route::get('page/about', [AboutController::class, 'index']);
    Route::get('/page/form', [FormController::class, 'index']);
    Route::get('page/common', [CommonController::class, 'index']);
    
    Route::get('/settings', [SettingsController::class, 'index']);

    Route::get('/pages', [DynamicPageController::class, 'index']);
    Route::get('/page/single/{page_id}', [DynamicPageController::class, 'single']);

    // Contact
    Route::post('/contact/send', [ContactController::class, 'messageSend']);
    
    Route::get('/affiliate/{code}', [AffiliateController::class, 'getData'])->name('affiliate');
    
    // Booking
    Route::get('/country/list', [CountryController::class, 'index']);
    Route::get('/logic/get', [LogicController::class, 'getLogic']);
    Route::post('/price/list', [PriceController::class, 'getPrice']);
    Route::post('/booking/form/submit', [BookingController::class, 'store']);
});
