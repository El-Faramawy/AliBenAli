<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorProfileController extends Controller
{
    public function index(){
        
        $doctor = Admin::findOrFail(admin()->user()->id);
        $rate_value = 0;
        for ($i = 0 ; $i < $doctor->rates->count(); $i++) {
            $rate_value = $rate_value + $doctor->rates[$i]->rate;
        }
        if($doctor->rates->count() == 0){
            $doctor_rate = 0;
        }
        else {
            $doctor_rate = number_format($rate_value / $doctor->rates->count(), 0);
        }
//        return $doctor->reservation[0]->user;
        $doctor_reservation_ok  = $doctor->reservation->where('status','accepted')->count();
        $doctor_reservation_all = $doctor->reservation->count();
        return view('Admin/doctor_profile/index',compact('doctor','doctor_rate','doctor_reservation_ok','doctor_reservation_all'));
    }
}
