<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('slider','Api\IndexController@slider')->name('slider');

Route::post('login','Api\AuthController@login')->name('login');
Route::post('register','Api\AuthController@register')->name('register');
Route::post('update_profile','Api\AuthController@update_profile')->name('update_profile');
Route::Post('/inser_token','Api\AuthController@inser_token')->name('/inser_token');
Route::post('/logout','Api\AuthController@logout')->name('/logout');

Route::get('departments','Api\ClinicController@index')->name('clinics');
Route::get('doctor_department_id','Api\ClinicController@doctor_department_id')->name('doctor_department_id');
Route::get('doctor','Api\DoctorController@index')->name('doctor');
Route::get('all_doctors','Api\DoctorController@all_doctors')->name('all_doctors');

Route::post('reservation','Api\ReservationController@index')->name('reservation');
Route::post('update_reservation','Api\ReservationController@update_reservation')->name('update_reservation');
Route::get('my_reservations','Api\ReservationController@my_reservations')->name('my_reservations');
Route::get('delete_reservation','Api\ReservationController@delete_reservation')->name('delete_reservation');
Route::get('diseases','Api\ReservationController@diseases')->name('diseases');

Route::get('offers','Api\OfferController@index')->name('offers');
Route::get('offer_department_id','Api\OfferController@offer_department_id')->name('offer_department_id');
Route::get('one_offer','Api\OfferController@one_offer')->name('one_offer');
Route::post('offer_reservation','Api\OfferController@offer_reservation')->name('offer_reservation');
Route::get('my_offer_reservations','Api\OfferController@my_offer_reservations')->name('my_offer_reservations');
//Route::post('update_offer_reservation','Api\OfferController@update_offer_reservation')->name('update_offer_reservation');

Route::post('favourite_doctor','Api\FavouriteController@favourite_doctor')->name('favourite_doctor');
Route::post('favourite_offer','Api\FavouriteController@favourite_offer')->name('favourite_offer');
Route::get('favourite_doctors','Api\FavouriteController@favourite_doctors')->name('favourite_doctors');
Route::get('favourite_offers','Api\FavouriteController@favourite_offers')->name('favourite_offers');

Route::get('search_doctor','Api\SearchController@search_doctor')->name('search_doctor');
Route::get('search_department','Api\SearchController@search_department')->name('search_department');

Route::get('/notifications','Api\NotificationController@index')->name('/notification');
Route::Post('/delete_notification','Api\NotificationController@delete_notification')->name('/delete_notification');
Route::Post('/rate_doctor','Api\NotificationController@rate_doctor')->name('/rate_doctor');
Route::Post('/rate_offer','Api\NotificationController@rate_offer')->name('/rate_offer');

//=======================================================================================================

Route::post('/login_doctor','Api\AuthController@login_doctor')->name('/login_doctor');
Route::post('/logout_doctor','Api\AuthController@logout_doctor')->name('/logout_doctor');
Route::Post('/inser_token_doctor','Api\AuthController@inser_token_doctor')->name('/inser_token_doctor');

Route::get('reservations_dates','Api\ReservationController@reservations_dates')->name('reservations_dates');
Route::get('doctor_reservations','Api\ReservationController@doctor_reservations')->name('doctor_reservations');
Route::get('one_reservation','Api\ReservationController@one_reservation')->name('one_reservation');
Route::get('one_offer_reservation','Api\ReservationController@one_offer_reservation')->name('one_offer_reservation');
Route::post('/end_reservation','Api\ReservationController@end_reservation')->name('/end_reservation');
Route::post('/add_reservation_report','Api\ReservationController@add_reservation_report')->name('/add_reservation_report');

Route::get('/doctor_notification','Api\NotificationController@doctor_notification')->name('/doctor_notification');
Route::get('/patients','Api\DoctorController@patients')->name('/patients');
Route::get('/patient_details','Api\DoctorController@patient_details')->name('/patient_details');

Route::get('/terms','Api\TermsController@terms')->name('/terms');
Route::get('/about','Api\TermsController@about')->name('/about');
Route::post('/contact','Api\TermsController@contact')->name('/contact');

//--------------------------  firebase reservation times  ---------------------------------------------
Route::get('/reservation_time','Api\ReservationController@reservation_time')->name('/reservation_time');

