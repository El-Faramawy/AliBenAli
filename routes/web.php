<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
////Clear Cache facade value:
//Route::get('/clear-cache', function() {
//    $exitCode = Artisan::call('cache:clear');
//    return '<h1>Cache facade value cleared</h1>';
//});
//
////Reoptimized class loader:
//Route::get('/optimize', function() {
//    $exitCode = Artisan::call('optimize');
//    return '<h1>Reoptimized class loader</h1>';
//});
//
////Route cache:
//Route::get('/route-cache', function() {
//    $exitCode = Artisan::call('route:cache');
//    return '<h1>Routes cached</h1>';
//});
//
////Clear Route cache:
//Route::get('/route-clear', function() {
//    $exitCode = Artisan::call('route:clear');
//    return '<h1>Route cache cleared</h1>';
//});
//
////Clear View cache:
//Route::get('/view-clear', function() {
//    $exitCode = Artisan::call('view:clear');
//    return '<h1>View cache cleared</h1>';
//});
//
////Clear Config cache:
//Route::get('/config-cache', function() {
//    $exitCode = Artisan::call('config:cache');
//    return '<h1>Clear Config cleared</h1>';
//});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {
//    Route::get('firebase-phone-authentication', function () {
//        return view('firebase');
//    });

    //    <<<<<<<<<<<<<<<<<<site routes>>>>>>>>>>>>>>    //
    Route::get('/',[\App\Http\Controllers\Site\IndexController::class,'index'])->name('/');
    Route::post('footer_massage',[\App\Http\Controllers\Site\IndexController::class,'footer_massages'])->name('footer_massage');


    //<<<<<<<<<<<<<<<<<<<<contact>>>>>>>>>>>>>>>>>>>>>>>>
    Route::post('contact_us',[\App\Http\Controllers\Site\ContactController::class,'Contact_massage'])->name('contact_us');
    Route::get('contact',[\App\Http\Controllers\Site\ContactController::class,'index'])->name('contact');

    //<<<<<<<<<<<<<<<<<<<<media center>>>>>>>>>>>>>>>>>>>>>>>>
    Route::get('Media-Center',[\App\Http\Controllers\Site\MediaCenterController::class,'index'])->name('Media-Center');

    //<<<<<<<<<<<<<<<<<<<<join us>>>>>>>>>>>>>>>>>>>>>>>>
    Route::get('Join-Us',[\App\Http\Controllers\Site\JoinUsController::class,'index'])->name('Join-Us');
    Route::post('apply_job',[\App\Http\Controllers\Site\JoinUsController::class,'store'])->name('apply_job');


//=======================================================================================
    Route::get('clinics','Site\ClinicController@index')->name('clinics');

    Route::get('doctor-search','Site\DoctorController@index')->name('doctor-search');
    Route::get('doctor-search/{id}','Site\DoctorController@search_by_clinic');
    Route::get('doctor-profile/{id}','Site\DoctorController@doctor_profile');

    Route::get('about','Site\AboutController@index');
    Route::get('search_all','Site\AboutController@search_all')->name('search_all');

    Route::get('login','Site\PatientController@login')->name('login');
    Route::get('register','Site\PatientController@register')->name('register');
    Route::post('register_user','Site\PatientController@register_user')->name('register_user');

    Route::post('post_login', 'Site\PatientController@post_login')->name('post_login');
    Route::post('check_phone', 'Site\PatientController@check_phone')->name('check_phone');

//    ====================================  Terms  ===============================================
    Route::get('terms', function (){
        return view('Site/terms');
    })->name('terms');

//    ====================================  Offers  ===============================================
    Route::get('offers','Site\OfferController@index')->name('offers');
    Route::get('offer_details/{id}','Site\OfferController@details')->name('offer.details');

    Route::group(['middleware'=>'auth'],function (){
        Route::get('logout','Site\PatientController@logout');
        Route::get('profile','Site\ProfileController@index')->name('profile');

        Route::POST('chose_date','Site\DoctorController@chose_date')->name('chose_date');
        Route::POST('store_reservation','Site\DoctorController@store_reservation')->name('store_reservation');

        Route::POST('chose_offer_date','Site\OfferController@chose_offer_date')->name('chose_offer_date');
        Route::POST('store_offer_reservation','Site\OfferController@store_offer_reservation')->name('store_offer_reservation');

        Route::POST('check_phone_update','Site\PatientController@check_phone_update')->name('check_phone_update');
        Route::POST('update_user','Site\PatientController@update_user')->name('update_user');
        Route::POST('cancel_Reservation',[\App\Http\Controllers\Site\ProfileController::class,'cancel_reservation'])->name('cancel_Reservation');
        Route::post('delete_reservations',[\App\Http\Controllers\Site\ProfileController::class,'delete_reservations'])->name('delete_reservations');
        Route::post('update_date','Site\ProfileController@update_date')->name('update_date');

        Route::get('update_reservation_date','Site\PatientController@update_reservation_date')->name('update_reservation_date');
    });




});



//require __DIR__.'/ali.php';
