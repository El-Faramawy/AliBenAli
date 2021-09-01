<?php

namespace App\Http\Controllers\Site;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Models\AboutDetails;
use App\Models\AboutInfo;
use App\Models\AboutSlider;
use App\Models\AboutUs;
use App\Models\Clinic;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function index(Request $request){
        $about_us       = AboutUs::all();
        $about_info     = AboutInfo::first();
        $about_details  = AboutDetails::all();
        $about_sliders  = AboutSlider::all();
        return view('Site/about',compact('about_details','about_info','about_sliders','about_us'));
    }//end fun
    //==================================================================
    public function search_all(Request $request)
    {
        $data = '';
        $number = '';
        $word = $request->word;
//        $lang = app()->getLocale()=='ar'?'ar':'en';
        $clinics = Clinic::where('name_ar', 'like', '%' . $word . '%')->
        orwhere('name_en', 'like', '%' . $word . '%')->get();

        $doctors = Admin::where('type', 'doctor')->where(function ($query) use ($word) {
            $query->where('name_ar', 'like', '%' . $word . '%')->
            orwhere('name_en', 'like', '%' . $word . '%');
        })->get();
        foreach ($clinics as $clinic){
            $number = count($clinic->doctor);
            if ($number>0){
                $data .= '<a href="' . url("doctor-search/".$clinic->id) . '" style="color:#212529">
                        <li style="font-size:larger;font-weight:bold">
                       ' . $clinic['name_'.app()->getLocale()] .'
                       <span>('.$number.')</span>
                       </li></a>';
            }
        }
        foreach ($doctors as $doctor){
            $data .= '<a href="' . url("doctor-profile/".$doctor->id) . '" style="color:#212529">
                    <li>' .$doctor['name_'.app()->getLocale()] . '</li></a>';
        }
        return response()->json($data);

    }



}
