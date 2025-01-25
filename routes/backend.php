<?php

use App\Http\Controllers\Web\Backend\Access\PermissionController;
use App\Http\Controllers\Web\Backend\Access\RoleController;
use App\Http\Controllers\Web\Backend\Access\UserController;
use App\Http\Controllers\Web\Backend\CategoryController;
use App\Http\Controllers\Web\Backend\CMS\AuthPageController;
use App\Http\Controllers\Web\Backend\CMS\About\AboutArticleOneController;
use App\Http\Controllers\Web\Backend\CMS\About\AboutArticleTwoController;
use App\Http\Controllers\Web\Backend\CMS\About\AboutCoreValueController;
use App\Http\Controllers\Web\Backend\CMS\About\AboutMissionVisionController;
use App\Http\Controllers\Web\Backend\CMS\CommonFooterController;
use App\Http\Controllers\Web\Backend\CMS\FormPageControler;
use App\Http\Controllers\Web\Backend\CMS\Home\HomeBannerController;
use App\Http\Controllers\Web\Backend\CMS\Home\HomeFaqController;
use App\Http\Controllers\Web\Backend\CMS\Home\HomeHowItWorksController;
use App\Http\Controllers\Web\Backend\CMS\Home\HomeMarqueeController;
use App\Http\Controllers\Web\Backend\CMS\Home\HomeQouteController;
use App\Http\Controllers\Web\Backend\CMS\Home\HomeTestimonialController;
use App\Http\Controllers\Web\Backend\ContactController;
use App\Http\Controllers\Web\Backend\NotificationController;
use App\Http\Controllers\Web\Backend\Settings\FirebaseController;
use App\Http\Controllers\Web\Backend\Settings\ProfileController;
use App\Http\Controllers\Web\Backend\Settings\MailSettingController;
use App\Http\Controllers\Web\Backend\Settings\SettingController;
use App\Http\Controllers\Web\Backend\Settings\SocialController;
use App\Http\Controllers\Web\Backend\Settings\StripeController;
use App\Http\Controllers\Web\Backend\Settings\GoogleMapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\DashboardController;
use App\Http\Controllers\Web\Backend\PageController;
use App\Http\Controllers\Web\Backend\Settings\LogicController;

Route::controller(DashboardController::class)->group(function () {
    Route::get('dashboard', 'index')->name('dashboard');
});

Route::resource('users', UserController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class);

Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('destroy');
    Route::get('/status/{id}', 'status')->name('status');
});

Route::controller(PageController::class)->prefix('page')->name('page.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('destroy');
    Route::get('/status/{id}', 'status')->name('status');
});

/*
*settings
*/

//! Route for Profile Settings
Route::controller(ProfileController::class)->group(function () {
    Route::get('setting/profile', 'index')->name('setting.profile.index');
    Route::put('setting/profile/update', 'UpdateProfile')->name('setting.profile.update');
    Route::put('setting/profile/update/Password', 'UpdatePassword')->name('setting.profile.update.Password');
    Route::post('setting/profile/update/Picture', 'UpdateProfilePicture')->name('update.profile.picture');
});

//! Route for Mail Settings
Route::controller(MailSettingController::class)->group(function () {
    Route::get('setting/mail', 'index')->name('setting.mail.index');
    Route::patch('setting/mail', 'update')->name('setting.mail.update');
});

//! Route for Stripe Settings
Route::controller(StripeController::class)->prefix('setting/stripe')->name('setting.stripe.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::patch('/update', 'update')->name('update');
});

//! Route for Firebase Settings
Route::controller(FirebaseController::class)->prefix('setting/firebase')->name('setting.firebase.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::patch('/update', 'update')->name('update');
});

//! Route for Firebase Settings
Route::controller(SocialController::class)->prefix('setting/social')->name('setting.social.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::patch('/update', 'update')->name('update');
});

//! Route for Stripe Settings
Route::controller(SettingController::class)->group(function () {
    Route::get('setting/general', 'index')->name('setting.general.index');
    Route::patch('setting/general', 'update')->name('setting.general.update');
});

Route::controller(LogicController::class)->group(function () {
    Route::get('setting/logic', 'index')->name('setting.logic.index');
    Route::post('setting/logic', 'update')->name('setting.logic.update');
});

//! Route for Google Map Settings
Route::controller(GoogleMapController::class)->group(function () {
    Route::get('setting/google/map', 'index')->name('setting.google.map.index');
    Route::patch('setting/google/map', 'update')->name('setting.google.map.update');
});

//CMS


Route::prefix('cms')->name('cms.')->group(function () {

    Route::controller(AuthPageController::class)->prefix('page/auth')->name('page.auth.')->group(function () {
        Route::get('/section/bg', 'index')->name('section.bg.index');
        Route::patch('/section/bg', 'update')->name('section.bg.update');
    });

    Route::controller(HomeBannerController::class)->group(function () {
        Route::get('/banner', 'index')->name('home.banner.index');
        Route::get('/banner/create', 'create')->name('home.banner.create');
        Route::post('/banner', 'store')->name('home.banner.store');
        Route::get('/banner/{id}', 'show')->name('home.banner.show');
        Route::get('/banner/{id}/edit', 'edit')->name('home.banner.edit');
        Route::patch('/banner/{id}', 'update')->name('home.banner.update');
        Route::delete('/banner/{id}', 'destroy')->name('home.banner.destroy');
        Route::get('/banner/{id}/status', 'status')->name('home.banner.status');

        Route::put('/banner/content', 'content')->name('home.banner.content');    
    });

    Route::controller(HomeTestimonialController::class)->group(function () {
        Route::get('/testimonial', 'index')->name('home.testimonial.index');
        Route::get('/testimonial/create', 'create')->name('home.testimonial.create');
        Route::post('/testimonial', 'store')->name('home.testimonial.store');
        Route::get('/testimonial/{id}', 'show')->name('home.testimonial.show');
        Route::get('/testimonial/{id}/edit', 'edit')->name('home.testimonial.edit');
        Route::patch('/testimonial/{id}', 'update')->name('home.testimonial.update');
        Route::delete('/testimonial/{id}', 'destroy')->name('home.testimonial.destroy');
        Route::get('/testimonial/{id}/status', 'status')->name('home.testimonial.status');   
    });

    Route::controller(HomeMarqueeController::class)->group(function () {
        Route::get('/marquee', 'index')->name('home.marquee.index');
        Route::get('/marquee/create', 'create')->name('home.marquee.create');
        Route::post('/marquee', 'store')->name('home.marquee.store');
        Route::get('/marquee/{id}', 'show')->name('home.marquee.show');
        Route::get('/marquee/{id}/edit', 'edit')->name('home.marquee.edit');
        Route::patch('/marquee/{id}', 'update')->name('home.marquee.update');
        Route::delete('/marquee/{id}', 'destroy')->name('home.marquee.destroy');
        Route::get('/marquee/{id}/status', 'status')->name('home.marquee.status');   
    });

    Route::controller(HomeHowItWorksController::class)->group(function () {
        Route::get('/howitwork', 'index')->name('home.howitwork.index');
        Route::get('/howitwork/create', 'create')->name('home.howitwork.create');
        Route::post('/howitwork', 'store')->name('home.howitwork.store');
        Route::get('/howitwork/{id}', 'show')->name('home.howitwork.show');
        Route::get('/howitwork/{id}/edit', 'edit')->name('home.howitwork.edit');
        Route::patch('/howitwork/{id}', 'update')->name('home.howitwork.update');
        Route::delete('/howitwork/{id}', 'destroy')->name('home.howitwork.destroy');
        Route::get('/howitwork/{id}/status', 'status')->name('home.howitwork.status');  
        
        Route::put('/howitwork/content', 'content')->name('home.howitwork.content');
    });

    Route::controller(HomeFaqController::class)->group(function () {
        Route::get('/faq', 'index')->name('home.faq.index');
        Route::get('/faq/create', 'create')->name('home.faq.create');
        Route::post('/faq', 'store')->name('home.faq.store');
        Route::get('/faq/{id}', 'show')->name('home.faq.show');
        Route::get('/faq/{id}/edit', 'edit')->name('home.faq.edit');
        Route::patch('/faq/{id}', 'update')->name('home.faq.update');
        Route::delete('/faq/{id}', 'destroy')->name('home.faq.destroy');
        Route::get('/faq/{id}/status', 'status')->name('home.faq.status');  
        
        Route::put('/faq/content', 'content')->name('home.faq.content');
    });

    Route::controller(HomeQouteController::class)->group(function () {
        Route::get('/qoute', 'index')->name('home.qoute.index');
        Route::put('/home/qoute', 'update')->name('home.qoute.update');
    });



    Route::controller(AboutArticleOneController::class)->group(function () {
        Route::get('/articleone', 'index')->name('about.articleone.index');
        Route::put('/about/articleone', 'update')->name('about.articleone.update');
    });

    Route::controller(AboutArticleTwoController::class)->group(function () {
        Route::get('/articletwo', 'index')->name('about.articletwo.index');
        Route::put('/about/articletwo', 'update')->name('about.articletwo.update');
    });

    Route::controller(AboutMissionVisionController::class)->group(function () {
        Route::get('/missionvision', 'index')->name('about.missionvision.index');
        Route::get('/missionvision/create', 'create')->name('about.missionvision.create');
        Route::post('/missionvision', 'store')->name('about.missionvision.store');
        Route::get('/missionvision/{id}', 'show')->name('about.missionvision.show');
        Route::get('/missionvision/{id}/edit', 'edit')->name('about.missionvision.edit');
        Route::patch('/missionvision/{id}', 'update')->name('about.missionvision.update');
        Route::delete('/missionvision/{id}', 'destroy')->name('about.missionvision.destroy');
        Route::get('/missionvision/{id}/status', 'status')->name('about.missionvision.status');  
        
        Route::put('/missionvision/content', 'content')->name('about.missionvision.content');
    });

    Route::controller(AboutCoreValueController::class)->group(function () {
        Route::get('/corevalue', 'index')->name('about.corevalue.index');
        Route::get('/corevalue/create', 'create')->name('about.corevalue.create');
        Route::post('/corevalue', 'store')->name('about.corevalue.store');
        Route::get('/corevalue/{id}', 'show')->name('about.corevalue.show');
        Route::get('/corevalue/{id}/edit', 'edit')->name('about.corevalue.edit');
        Route::patch('/corevalue/{id}', 'update')->name('about.corevalue.update');
        Route::delete('/corevalue/{id}', 'destroy')->name('about.corevalue.destroy');
        Route::get('/corevalue/{id}/status', 'status')->name('about.corevalue.status');  
        
        Route::put('/corevalue/content', 'content')->name('about.corevalue.content');
    });


    Route::controller(CommonFooterController::class)->group(function () {
        Route::get('/footer', 'index')->name('common.footer.index');
        Route::put('/common/footer', 'update')->name('common.footer.update');
    });


    Route::controller(FormPageControler::class)->group(function () {
        Route::get('/form/pdf', 'index')->name('form.pdf.index');
        Route::get('/form/pdf/create', 'create')->name('form.pdf.create');
        Route::post('/form/pdf', 'store')->name('form.pdf.store');
        Route::get('/form/pdf/{id}', 'show')->name('form.pdf.show');
        Route::get('/form/pdf/{id}/edit', 'edit')->name('form.pdf.edit');
        Route::patch('/form/{id}', 'update')->name('form.pdf.update');
        Route::delete('/form/pdf/{id}', 'destroy')->name('form.pdf.destroy');
        Route::get('/form/pdf/{id}/status', 'status')->name('form.pdf.status');   
    });


});


Route::controller(ContactController::class)->prefix('contact')->name('contact.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/single/{id}', 'single')->name('single');
});



//Users
Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/status/{id}', 'status')->name('status');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::patch('/update/{id}', 'update')->name('update');
    Route::get('/new', 'new')->name('new.index');
    Route::get('/ajax/new/count', 'newCount')->name('ajax.new.count');
});

Route::controller(NotificationController::class)->prefix('notification')->name('notification.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('read/single/{id}', 'readSingle')->name('read.single');
    Route::POST('read/all', 'readAll')->name('read.all');
});