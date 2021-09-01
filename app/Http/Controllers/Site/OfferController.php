<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\DoctorDate;
use App\Models\DoctorHour;
use App\Models\Offer;
use App\Models\Reservation;
use App\Models\ReservationDisease;
use App\reservationfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    public function index(){
        $offers = Offer::all();
        return view('Site.offers',compact('offers'));
    }

    public function details(Request $request,$id){
        $details = Offer::with('available_date.available_hour')->findOrFail($id);
        if ($request->ajax()){
            $date = DoctorDate::where('id',$request->date_id)->first();
            $html = view('Site/parts/get_hour',['doctor'=>$details,'date'=>$date])->render();
            return response()->json(['html'=>$html]);
        }
        $date= '';
        return view('Site.offer-detail',compact('details','date'));
    }


    //=====================================================================================
    public function chose_offer_date(Request $request){

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
            $offer = Offer::where('id',$date->offer_id)->first();
            $diseases = Disease::all();
            return view('Site/confirm-serve-offer',[
                'type'   =>'success',
                'hour'   =>$hour,
                'date'   =>$date,
                'offer' =>$offer,
                'date_id'=>$date_,
                'diseases'=>$diseases,
            ]);

        }
    }
    //==============================================================
    public function store_offer_reservation(Request $request){
//            return $request->image;

        $reservation = Reservation::create([
            'name'      => $request->name,
            'gender'    => $request->gender,
            'age'       => $request->age,
            'phone'     => $request->phone,
            'date_id'   => $request->date_id,
            'hour_id'   => $request->hour_id,
            'offer_id'  => $request->offer_id,
            'user_id'   => auth()->user()->id ,
            'type'      => 'offer'
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
                $path='uploads/Reservation';
                $image->move($path , $file_name);
                ReservationFile::create([
                    'file' => $file_name,
                    'reservation_id' => $reservation->id,
                ]);}
        return redirect('offer_details/'.$request->offer_id)
            ->with(notification(app()->getLocale()=='ar'?'تم تأكيد الحجز':'Reservation Completed','success'));

    }

}
