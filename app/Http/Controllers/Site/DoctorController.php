<?php

namespace App\Http\Controllers\Site;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Disease;
use App\Models\DoctorDate;
use App\Models\DoctorHour;
use App\Models\Offer;
use App\Models\Reservation;
use App\Models\ReservationDisease;
use App\reservationfile;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function index(Request $request){
        $clinics = Clinic::all();
        $doctors =Admin::where('type','doctor')->get();
        if ($request->ajax()){
            if ($request->clinic_id != 'all')
            $doctors =Admin::where(['type'=>'doctor','clinic_id'=>$request->clinic_id])->get();
            $HtmlView =view('Site/parts/doctor-search',['doctors'=>$doctors,'clinics'=>$clinics])->render();
            return response()->json(['html_here'=>$HtmlView],200);
        }
        return view('Site/doctor-search',['doctors'=>$doctors,'clinics'=>$clinics,'clinic_'=>'']);
    }//end fun
    //=====================================================================================
    public function search_by_clinic($id){
        $clinic = Clinic::where('id',$id)->first();
        $clinics = Clinic::all();
        $doctors =Admin::where(['type'=>'doctor','clinic_id'=>$id])->get();
        return view('Site/doctor-search',['doctors'=>$doctors,'clinics'=>$clinics,'clinic_'=>$clinic]);
    }//end fun
    //=====================================================================================
    public function doctor_profile(Request $request,$id){
        $doctor =Admin::with('available_date.available_hour')->where('id',$id)->first();
        if ($request->ajax()){
            $date = DoctorDate::where('id',$request->date_id)->first();
            $html = view('Site/parts/get_hour',['doctor'=>$doctor,'date'=>$date])->render();
            return response()->json(['html'=>$html]);
        }
//        return $doctor;
        return view('Site/doctor-profile',['doctor'=>$doctor,'date'=>'']);
    }
    //=====================================================================================
    public function chose_date(Request $request){

//        dd($request->all()) ;
        $validator = Validator::make($request->all(), [ // <---
            'hour_id' => ['required'],
        ]);
        if ($validator->fails()){
            $message = app()->getLocale()=='ar'?'قم بتحديد الوقت':'set a time';
            return redirect()->back()
                ->with(notification($message,'warning'));
        }else{
            $date_ = DoctorHour::where('id',$request->hour_id)->pluck('date_id')->first();
            $hour = DoctorHour::where('id',$request->hour_id)->first();
            $date = DoctorDate::where('id',$date_)->first();
            $doctor = Admin::where('id',$date->doctor_id)->first();
            $diseases = Disease::all();
            return view('Site/confirm-serve',[
                'type'   =>'success',
                'hour'   =>$hour,
                'date'   =>$date,
                'doctor' =>$doctor,
                'date_id'=>$date_,
                'diseases'=>$diseases,
            ]);

        }
    }
    //==============================================================
    public function store_reservation(Request $request){
//            return $request->image;

            $reservation = Reservation::create([
                'name'   => $request->name,
                'gender'    => $request->gender,
                'age'       => $request->age,
                'phone'     => $request->phone,
                'call_type' => $request->type,
                'date_id'   => $request->date_id,
                'hour_id'   => $request->hour_id,
                'doctor_id' => $request->doctor_id,
                'user_id'   =>auth()->user()->id ,
            ]);
        if ($request->diseases) {
            foreach ($request->diseases as $disease) {
                ReservationDisease::create([
                    'disease_id' => $disease,
                    'reservation_id' => $reservation->id,
            ]);
            }
        }
        $hour = DoctorHour::where('id',$request['hour_id'])->first();
        $hour->is_reserved = 'yes';
        $hour->save();

        if ($request->image)
            foreach ($request->image as $image) {
                $file_extension = $image -> getClientOriginalExtension();
                $file_name = time(). '.' . $file_extension;
                $path='uploads/Reservation/';
                $image->move($path , $file_name);
                ReservationFile::create([
                    'file' =>$path .  $file_name,
                    'reservation_id' => $reservation->id,
                ]);}
        return redirect('doctor-profile/'.$request->doctor_id)
            ->with(notification(app()->getLocale()=='ar'?'تم تأكيد الحجز':'Reservation Completed','success'));

    }


}
