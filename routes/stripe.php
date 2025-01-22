<?php
use App\Http\Controllers\Api\StripeController;
use Illuminate\Support\Facades\Route;

//stripe
Route::controller(StripeController::class)->prefix('payment/stripe')->name('payment.stripe.')->group(function () {
    Route::post('/intent', [StripeController::class, 'intent']);
    Route::post('/webhook', [StripeController::class, 'webhook']);

    /* Route::post('/intent', [StripeController::class, 'checkout']);
    Route::post('/cancel', [StripeController::class, 'cancel'])->name('cancel');
    Route::post('/success', [StripeController::class, 'success'])->name('success'); */
});