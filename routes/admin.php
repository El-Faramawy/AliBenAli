<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::group(['prefix' => 'admin'], function () {
    Route::get('login',function (){
        if (Auth::guard('admin')->check()){
            return redirect('admin/home');
        }
        return view('Admin/auth/login');
    });
    Route::post('do-log','AuthController@login')->name('do-log');


    //******* after login *******
    Route::group(['middleware' => ['admin:admin',\App\Http\Middleware\OnlyAdmins::class]], function () {

        Route::get('log-out','AuthController@logout')->name('log-out');

        Route::get('/',function (){
            return redirect('admin/home');
        })->name('/');
        Route::get('home','HomeController@index')->name('home');


//        ======================================== Admin ====================================
        Route::get('show-admins','AdminController@get')->name('show-admins');
        Route::get('add-admin',function (){return view('Admin/Admin/create');})->name('add-admin');
        Route::post('store.admin','AdminController@store_admin')->name('store.admin');
        Route::post('admin_delete','AdminController@admin_delete')->name('admin_delete');
        Route::post('admin_edit/{id}','AdminController@admin_edit')->name('admin_edit');
        Route::post('admin_check.delete','AdminController@admin_check_delete')->name('admin_check.delete');
        Route::post('store.admin_update','AdminController@store_admin_update')->name('store.admin_update');
        Route::get('my_profile','AdminController@my_profile')->name('my_profile');
        Route::post('store-profile','AdminController@save_profile')->name('store-profile');


        ###################### Doctors ##########################
        Route::get('doctors',[\App\Http\Controllers\Admin\DoctorController::class,'index'])->name('doctors');
        Route::post('delete_doctor',[\App\Http\Controllers\Admin\DoctorController::class,'delete'])->name('delete_doctor');
        Route::get('add_doctor',[\App\Http\Controllers\Admin\DoctorController::class,'add'])->name('add_doctor');
        Route::post('create_doctor',[\App\Http\Controllers\Admin\DoctorController::class,'create'])->name('create_doctor');
        Route::get('edit_doctor/{id}',[\App\Http\Controllers\Admin\DoctorController::class,'edit'])->name('edit_doctor');
        Route::post('update_doctor',[\App\Http\Controllers\Admin\DoctorController::class,'update'])->name('update_doctor');


        ###################### Offers ##########################
        Route::get('offers',[\App\Http\Controllers\Admin\OfferController::class,'index'])->name('admin.offers');
        Route::post('delete_offer',[\App\Http\Controllers\Admin\OfferController::class,'delete'])->name('admin.delete_offer');
        Route::get('offer_add',[\App\Http\Controllers\Admin\OfferController::class,'add'])->name('admin.offer_add');
        Route::post('offer_create',[\App\Http\Controllers\Admin\OfferController::class,'create'])->name('admin.create.offer');
        Route::get('edit_offer/{id}',[\App\Http\Controllers\Admin\OfferController::class,'edit'])->name('admin.edit.offer');
        Route::post('update_offer',[\App\Http\Controllers\Admin\OfferController::class,'update'])->name('admin.update.offer');
        Route::get('offer_date/{id}',[\App\Http\Controllers\Admin\OfferController::class,'offerDate'])->name('admin.offer_date');
        Route::post('offer_cancel_day',[\App\Http\Controllers\Admin\OfferController::class,'cancel_day'])->name('admin.offer.cancel.day');
        Route::post('offer_cancel_hour',[\App\Http\Controllers\Admin\OfferController::class,'cancel_hour'])->name('admin.offer.cancel.hour');
        Route::post('offer_add_hour',[\App\Http\Controllers\Admin\OfferController::class,'add_hour'])->name('admin.offer.add.hour');

        ###################### Reports ##########################
        Route::get('all_reports',[\App\Http\Controllers\Admin\AdminReportController::class,'index'])->name('admin.reports');
//        Route::get('delete_report_admin',[\App\Http\Controllers\Admin\AdminReportController::class,'delete'])->name('admin.delete.report');



        ###################### Doctors Dates ##########################
        Route::get('doctors_dates',[\App\Http\Controllers\Admin\DoctorDatesController::class,'index'])->name('admin.doctors_dates');
        Route::get('available_date/{id}',[\App\Http\Controllers\Admin\DoctorDatesController::class,'showAvailable'])->name('showAvailable');
        Route::get('add_date/{id}',[\App\Http\Controllers\Admin\DoctorDatesController::class,'add'])->name('add_date');
        Route::post('date_cc',[\App\Http\Controllers\Admin\DoctorDatesController::class,'date_cc'])->name('date_cc');
        Route::post('destroy_date',[\App\Http\Controllers\Admin\DoctorDatesController::class,'destroy'])->name('destroy_date');


        ###################### Reservations ##########################
        Route::get('reservations',[\App\Http\Controllers\Admin\ReservationController::class,'index'])->name('admin.reservations');
        Route::post('edit/reservations',[\App\Http\Controllers\Admin\ReservationController::class,'update'])->name('admin.reservation.edit');
        Route::post('delete/reservations',[\App\Http\Controllers\Admin\ReservationController::class,'delete'])->name('admin.reservation.delete');
        Route::get('offer_reservations',[\App\Http\Controllers\Admin\ReservationController::class,'offerReservations'])->name('admin.offer_reservations');


        ###################### Sliders ##########################
        Route::get('slider',[\App\Http\Controllers\Admin\SliderController::class,'index'])->name('sliders');
        Route::post('create_slider',[\App\Http\Controllers\Admin\SliderController::class,'create'])->name('create_slider');
        Route::post('delete_one_slider',[\App\Http\Controllers\Admin\SliderController::class,'delete_one'])->name('delete_slider');
        Route::post('delete_all_sliders',[\App\Http\Controllers\Admin\SliderController::class,'delete_all'])->name('delete_all_sliders');




        ###################### About Details ##########################
        Route::get('About_details',[\App\Http\Controllers\Admin\AboutDetailsController::class,'index'])->name('About_details');
        Route::get('add_About_details',[\App\Http\Controllers\Admin\AboutDetailsController::class,'add'])->name('add_About_details');
        Route::get('edit_About_details/{id}',[\App\Http\Controllers\Admin\AboutDetailsController::class,'show'])->name('edit_About_details');
        Route::post('update_details',[\App\Http\Controllers\Admin\AboutDetailsController::class,'update'])->name('update_details');
        Route::post('create_new_details',[\App\Http\Controllers\Admin\AboutDetailsController::class,'create'])->name('create_new_details');
        Route::post('delete_about_details',[\App\Http\Controllers\Admin\AboutDetailsController::class,'delete'])->name('delete_about_details');

        ###################### About US ##########################
        Route::get('about_us',[\App\Http\Controllers\Admin\AboutController::class,'index'])->name('about_us');
        Route::post('create_about_us',[\App\Http\Controllers\Admin\AboutController::class,'create'])->name('create_about_us');
        Route::post('edit_about_us',[\App\Http\Controllers\Admin\AboutController::class,'update'])->name('edit_about_us');
        Route::post('delete_about_us',[\App\Http\Controllers\Admin\AboutController::class,'delete'])->name('delete_about_us');

        ###################### About Info ##########################
        Route::get('about_info',[\App\Http\Controllers\Admin\AboutInfoController::class,'index'])->name('about_info');
        Route::post('update_info',[\App\Http\Controllers\Admin\AboutInfoController::class,'update'])->name('update_info');


        ###################### Clinics ##########################
        Route::get('Clinics',[\App\Http\Controllers\Admin\ClinicController::class,'index'])->name('Clinics');
        Route::post('add_clinic',[\App\Http\Controllers\Admin\ClinicController::class,'create'])->name('add_clinic');
        Route::post('delete_clinic',[\App\Http\Controllers\Admin\ClinicController::class,'delete_one'])->name('delete_clinic');
        Route::post('edit_clinic',[\App\Http\Controllers\Admin\ClinicController::class,'update'])->name('edit_clinic');


        ###################### Counter ##########################
        Route::get('Counter',[\App\Http\Controllers\Admin\CounterController::class,'index'])->name('Counter');
        Route::post('delete_counter',[\App\Http\Controllers\Admin\CounterController::class,'delete'])->name('delete_counter');
        Route::get('add_new_counter',[\App\Http\Controllers\Admin\CounterController::class,'add'])->name('add_new_counter');
        Route::post('create_new_counter',[\App\Http\Controllers\Admin\CounterController::class,'create'])->name('create_new_counter');


        ###################### Mobile Slider ##########################
        Route::get('Mobile_sliders',[\App\Http\Controllers\Admin\MobileSlidersController::class,'index'])->name('admin/mobile_slider');
        Route::post('add_mobile_sliders',[\App\Http\Controllers\Admin\MobileSlidersController::class,'create'])->name('admin.add_mobile_sliders');
        Route::post('delete_mobile_sliders',[\App\Http\Controllers\Admin\MobileSlidersController::class,'delete'])->name('admin.delete.mobile_slider');
        Route::post('delete.all.mobile',[\App\Http\Controllers\Admin\MobileSlidersController::class,'deleteAll'])->name('admin.delete.all.mobile');


        ###################### Setting ##########################
        Route::get('info',[\App\Http\Controllers\Admin\InfoController::class,'index'])->name('info');
        Route::post('edit_info',[\App\Http\Controllers\Admin\InfoController::class,'update'])->name('edit_info');

        ###################### Second_section ##########################
        Route::get('Welcome_Section',[\App\Http\Controllers\Admin\WelcomeController::class,'index'])->name('welcome');
        Route::post('edit_welcome',[\App\Http\Controllers\Admin\WelcomeController::class,'update'])->name('edit_welcome');


        ###################### Contacts ##########################
        Route::get('contact',[\App\Http\Controllers\Admin\ContactController::class,'index'])->name('contact');
        Route::post('delete_all_contacts',[\App\Http\Controllers\Admin\ContactController::class,'delete_all'])->name('delete_all_contacts');
        Route::post('delete_one_contact',[\App\Http\Controllers\Admin\ContactController::class,'delete_one'])->name('delete_one_contact');

        ###################### Jobs ##########################
        Route::get('Join_us',[\App\Http\Controllers\Admin\JoinController::class,'index'])->name('Join_us');
        Route::post('edit_join',[\App\Http\Controllers\Admin\JoinController::class,'update'])->name('edit_join');

        ###################### Jobs-ADS ##########################
        Route::get('Join_ِDetails',[\App\Http\Controllers\Admin\JoinController::class,'showAds'])->name('Join_ِDetails');
        Route::post('Add_Join_ِDetails',[\App\Http\Controllers\Admin\JoinController::class,'create'])->name('Add_Join_ِDetails');
        Route::post('edit_join_ِdetails',[\App\Http\Controllers\Admin\JoinController::class,'edit_details'])->name('edit_join_ِdetails');
        Route::post('Delete_ِDetails',[\App\Http\Controllers\Admin\JoinController::class,'delete_details'])->name('Delete_ِDetails');
        Route::post('delete_all_details',[\App\Http\Controllers\Admin\JoinController::class,'delete_all_details'])->name('delete_all_details');


//            <<<<<<<<<<<<<<<<<<<<<<<media center>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
               //        <<<<<news>>>>>>>.
    Route::get('Media_Center/News',[\App\Http\Controllers\Admin\NewsController::class,'index'])->name('admin/Media_Center/News');
    Route::post('Media_Center/Delete_News',[\App\Http\Controllers\Admin\NewsController::class,'destroy'])->name('admin/Media_Center/Delete_News');
    Route::post('Media_Center/Delete_AllNews',[\App\Http\Controllers\Admin\NewsController::class,'deleteAll'])->name('admin/Media_Center/Delete_AllNews');
    Route::post('Media_Center/Add_News',[\App\Http\Controllers\Admin\NewsController::class,'create'])->name('admin/Media_Center/Add_News');
    Route::post('Media_Center/Edit_News',[\App\Http\Controllers\Admin\NewsController::class,'update'])->name('admin/Media_Center/Edit_News');

               //        <<<<<image>>>>>>>.
    Route::get('Media_Center/Image',[\App\Http\Controllers\Admin\ImageController::class,'index'])->name('admin/Media_Center/Image');
    Route::post('Media_Center/Add_Image',[\App\Http\Controllers\Admin\ImageController::class,'create'])->name('admin/Media_Center/Add_Image');
    Route::post('Media_Center/delete_image',[\App\Http\Controllers\Admin\ImageController::class,'destroy'])->name('admin/Media_Center/delete_image');

               //        <<<<<videos>>>>>>>.
    Route::get('Media_Center/Videos',[\App\Http\Controllers\Admin\VideosController::class,'index'])->name('admin/Media_Center/Videos');
    Route::post('Media_Center/Add_Videos',[\App\Http\Controllers\Admin\VideosController::class,'create'])->name('admin/Media_Center/Add_Videos');
    Route::post('Media_Center/Edit_Videos',[\App\Http\Controllers\Admin\VideosController::class,'update'])->name('admin/Media_Center/Edit_Videos');
    Route::post('Media_Center/Delete_Videos',[\App\Http\Controllers\Admin\VideosController::class,'destroy'])->name('admin/Media_Center/Delete_Videos');


    ###################### Country ##########################
    Route::get('Country',[\App\Http\Controllers\Admin\CountryController::class,'index'])->name('admin/Country');
    Route::post('Add_Country',[\App\Http\Controllers\Admin\CountryController::class,'create'])->name('admin/Add_Country');
    Route::post('Delete_Country',[\App\Http\Controllers\Admin\CountryController::class,'destroy'])->name('admin/Delete_Country');
    Route::post('Delete_All_Country',[\App\Http\Controllers\Admin\CountryController::class,'deleteAll'])->name('admin/Delete_All_Country');



        ###################### About Slider ##########################
        Route::get('About_sliders',[\App\Http\Controllers\Admin\AboutSliderController::class,'index'])->name('admin/About_sliders');
        Route::post('Add_sliders',[\App\Http\Controllers\Admin\AboutSliderController::class,'create'])->name('admin/Add_sliders');
        Route::post('Delete_sliders',[\App\Http\Controllers\Admin\AboutSliderController::class,'destroy'])->name('admin/Delete_sliders');
        Route::post('Delete_All_sliders',[\App\Http\Controllers\Admin\AboutSliderController::class,'deleteAll'])->name('admin/Delete_All_sliders');

        ###################### Apply Jobs ##########################
        Route::get('Apply_jobs',[\App\Http\Controllers\Admin\ApplyJobController::class,'index'])->name('admin/Apply_jobs');
        Route::post('Add_jobs',[\App\Http\Controllers\Admin\ApplyJobController::class,'create'])->name('admin/Add_jobs');
        Route::post('delete_jobs',[\App\Http\Controllers\Admin\ApplyJobController::class,'destroy'])->name('admin/delete_jobs');
        Route::post('Delete_All_jobs',[\App\Http\Controllers\Admin\ApplyJobController::class,'deleteAll'])->name('admin/Delete_All_jobs');

        ###################### Diseases ##########################
        Route::get('diseases',[\App\Http\Controllers\Admin\DiseasesController::class,'index'])->name('admin/diseases');
        Route::post('Delete_diseases',[\App\Http\Controllers\Admin\DiseasesController::class,'destroy'])->name('admin/Delete_diseases');
        Route::post('Delete_All_diseases',[\App\Http\Controllers\Admin\DiseasesController::class,'deleteAll'])->name('admin/Delete_All_diseases');
        Route::post('Create_diseases',[\App\Http\Controllers\Admin\DiseasesController::class,'create'])->name('admin/Create_diseases');
        Route::post('Edit_diseases',[\App\Http\Controllers\Admin\DiseasesController::class,'update'])->name('admin/Edit_diseases');


        ###################### Archive ##########################
        Route::get('archive_days',[\App\Http\Controllers\Admin\ArchiveController::class,'index'])->name('admin/archive-days');
        Route::post('delete_doctor_day',[\App\Http\Controllers\Admin\ArchiveController::class,'delete_day'])->name('admin/delete_doctor_day');
        Route::get('archive_reservations',[\App\Http\Controllers\Admin\ArchiveController::class,'show'])->name('admin/archive_reservations');
        Route::post('archive_reservation_delete',[\App\Http\Controllers\Admin\ArchiveController::class,'delete_reservation'])->name('admin/archive_reservation_delete');

    });//end Middleware Admin

     // ################################################################################################################//
    ########################################## Doctor Routes ############################################################

    ###################### Profile ##########################
    Route::get('doctor',[\App\Http\Controllers\Admin\DoctorProfileController::class,'index'])->name('home_doctor');

    ###################### Reservations ##########################
    Route::get('my_reservations',[\App\Http\Controllers\Admin\DoctorReservationsController::class,'index'])->name('doctor.my.reservations');
    Route::post('edit_my_reservations',[\App\Http\Controllers\Admin\DoctorReservationsController::class,'update'])->name('doctor.reservation.edit');

    ###################### Reports ##########################
    Route::get('reports',[\App\Http\Controllers\Admin\DoctorReports::class,'index'])->name('doctor.reports');
    Route::get('reports_text',[\App\Http\Controllers\Admin\DoctorReports::class,'report_text'])->name('report_text');
    Route::post('delete_report',[\App\Http\Controllers\Admin\ReportController::class,'delete'])->name('delete_report');
    Route::get('upload_file/{id}',[\App\Http\Controllers\Admin\DoctorReservationsController::class,'upload_file'])->name('doctor.upload_file');
    Route::post('create_report',[\App\Http\Controllers\Admin\DoctorReservationsController::class,'create'])->name('doctor.create.report');
    Route::get('edit_files/{id}',[\App\Http\Controllers\Admin\DoctorReservationsController::class,'edit'])->name('doctor.edit_file');
    Route::get('log-out','AuthController@logout')->name('log-out');

});//end Prefix
