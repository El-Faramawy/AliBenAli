<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Models\AboutDetails;
use App\Models\Clinic;
use App\Models\Contact;
use App\Models\Reservation;
use App\Models\SecondSection;
use App\Models\Setting;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $our_doctores=Admin::where('type' , 'doctor')->inRandomOrder()->paginate(4);
        $contacts=Setting::first();
        $doctor_num=Admin::where('type' , 'doctor')->count();
        $patiant_num=User::all()->count();
        $clinics=Clinic::all()->take('8');
        $clinic_num=Admin::all()->count();
        $contacts_massages=Contact::inRandomOrder()->limit(4)->get();
        $our_visions=AboutDetails::all()->last();
        $our_goals=AboutDetails::all()->first();
        $secound_section=SecondSection::all()->first();
        $sett_info=Setting::all()->first();
        $our_Reservations=Reservation::where('doctor_id','!=','')->with('doctor')->inRandomOrder()->paginate(5);

        return view('Admin/index' , compact('our_doctores' ,'patiant_num','our_Reservations','sett_info','secound_section','clinics','our_goals', 'our_visions','contacts' ,'contacts_massages', 'doctor_num', 'clinic_num'));
    }


}
