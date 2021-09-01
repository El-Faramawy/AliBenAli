<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DoctorDate;
use App\Models\DoctorHour;
use App\Models\Favourite;
use App\Models\Offer;
use App\Models\Reservation;
use App\Models\ReservationDiseases;
use App\Models\ReservationFiles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    public function index(Request $request){
        $validator = Validator::make($request->all(),[
//            'user_id'  => 'required|exists:users,id',
        ]);
        if ($validator->fails()){
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
        }

        if ($request->paginate=='on') {
            $number = $request->page_num==null?10:$request->page_num;
            $offers = Offer::with('images','clinic','first_image','rates.user','available_date.available_hour')->paginate($number);
            $json = collect(["message" => "","code" => 200]) ;
            $json =  $json->merge($offers);
            return response()->json($json,200);
        }else{
            $offers = Offer::with('images','clinic','first_image','rates.user','available_date.available_hour')->get();
        }
        if ($request->user_id && $request->user_id != '') {
            foreach ($offers as $offer) {
                $ids = Favourite::where('offer_id', $offer->id)->pluck('user_id')->toArray();

                $offer->is_favourate = in_array($request->user_id, $ids) ? 'yes' : 'no';
            }
        }

            return response()->json(['data'=>$offers,'code'=>200,'message'=>''],200);
    }
    //=======================================================================================
    public function offer_department_id(Request $request){
        $validator = Validator::make($request->all(),[
            'department_id'  => 'required|exists:clinics,id',
//            'user_id'  => 'required|exists:users,id',
        ]);
        if ($validator->fails()){
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
        }
        if ($request->paginate=='on') {
            $number = $request->page_num==null?10:$request->page_num;
            $offers = Offer::with('images','clinic','first_image','rates.user','available_date.available_hour')
                ->where('clinic_id',$request->department_id)->paginate($number);
            $json = collect(["message" => "","code" => 200]) ;
            $json =  $json->merge($offers);
            return response()->json($json,200);
        }else{
            $offers = Offer::with('images','clinic','first_image','rates.user','available_date.available_hour')
                ->where('clinic_id',$request->department_id)->get();
        }
        if ($request->user_id && $request->user_id != '') {
            foreach ($offers as $offer) {
                $ids = Favourite::where('offer_id', $offer->id)->pluck('user_id')->toArray();

                $offer->is_favourate = in_array($request->user_id, $ids) ? 'yes' : 'no';
            }
        }

        return response()->json(['data'=>$offers,'code'=>200,'message'=>''],200);

    }
    //=======================================================================================
    public function one_offer(Request $request){
        $validator = Validator::make($request->all(),[
            'offer_id'  => 'required|exists:offers,id',
//            'user_id'  => 'required|exists:users,id',
        ]);
        if ($validator->fails()){
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
        }

            $offer = Offer::with('images','clinic','first_image','rates.user','available_date.available_hour')
                ->where('id',$request->offer_id)->first();

        if ($request->reservation_id) {
            $reservation = Reservation::with('date', 'hour')->where('id', $request->reservation_id)->first();

            $offer->all_dates = $offer->available_date->toArray();

            $hour_id = $reservation->hour_id;
            $date_id = $reservation->date_id;
            $offer_id = $request->offer_id;
            $all_dates = DoctorDate::with('hour')->where(function ($query1) use ($date_id, $offer_id) {
                $query1->where([['date', '>=', date('Y-m-d')], ['is_reserved', '=', 'no'], ['offer_id', $offer_id]])
                    ->orwhere('id', $date_id);
            })
                ->whereHas('hour', function ($query) use ($hour_id) {
                    $query->where([['hour', '>=', date('h:i:s')], ['is_reserved', '=', 'no']])
                        ->orwhere('id', $hour_id);
                })
                ->get();
            $offer->all_dates = $all_dates;
            foreach ($offer->all_dates as $da) {
                $av_date = DoctorDate::where('id',$da->id)->first();
                $da->available_hour =  DoctorHour::where([['hour', '>=', date('h:i:s')], ['is_reserved', 'no'], ['date_id', $da->id]])
                    ->orwhere('id', $hour_id)->get();
//                $da->available_hour = $da->hour;
                if ($da->id == $date_id)
                    $da->is_reserved = 'yes';
                else
                    $da->is_reserved = 'no';
            }
        }
        if ($request->user_id && $request->user_id!= '') {
            $ids = Favourite::where('offer_id', $offer->id)->pluck('user_id')->toArray();
            $offer->is_favourate = in_array($request->user_id, $ids) ? 'yes' : 'no';
        }
        return response()->json(['data'=>$offer,'code'=>200,'message'=>''],200);

    }
    //=======================================================================================
    public function offer_reservation(Request $request){
        $rules = [
            'user_id'       => 'required',
            'offer_id'     => 'required',
            'date_id'       => 'required',
            'hour_id'       => 'required',
            'name'          => 'required',
            'phone'         => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
        }

        else{
            $data = $request->only('date_id','offer_id','user_id','hour_id','name','phone','gender','age');
            $data['type']='offer';
            $reservation = Reservation::create($data);

            if($request->reservation_diseases && $request->reservation_diseases != ''){
                foreach ($request->reservation_diseases as $disease){
                    $new_disease = new ReservationDiseases ;
                    $new_disease->disease_id        = $disease;  // $disease['disease_id'];
                    $new_disease->reservation_id    = $reservation->id;
                    $new_disease->save();
                }
            }

            if($request->reservation_files && $request->reservation_files != ''){
                foreach ($request->reservation_files as $files){
                    $new_file = new ReservationFiles();
                    $new_file->file              =  'storage/'.$files->store('offer_reservation_files','public');  //$files['file'];
                    $new_file->reservation_id    = $reservation->id;
                    $new_file->save();
                }
            }

            $date = DoctorHour::where('id',$request->hour_id)->first();
            $date->is_reserved = 'yes';
            $date->save();

            $offer = Reservation::with('offer.first_image','offer.images','offer.clinic','date','hour','reservation_diseases.diseases','files')
                ->where(['id'=>$reservation->id])->first();

                $ids = Favourite::where('offer_id',$offer->id)->pluck('user_id')->toArray();
                $offer->is_favourate = in_array($request->user_id,$ids)? 'yes':'no';

            return response()->json(['data'=>$offer,'code'=>200,'message'=>''],200);
        }

    }

    //========================================================================================

    public function my_offer_reservations(Request $request){
        $rules = [
            'user_id'       => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
        }

        else{

            if ($request->paginate=='on') {
                $number = $request->page_num==null?10:$request->page_num;
                $doctor = Reservation::with('offer.first_image','offer.images','offer.clinic','date','hour','reservation_diseases.diseases','files')
                    ->where(['user_id'=>$request->user_id,'type'=>'offer'])->paginate($number);
                $json = collect(["message" => "","code" => 200]) ;
                $json =  $json->merge($doctor);
                return response()->json($json,200);
            }else{
                $doctor = Reservation::with('offer.first_image','offer.images','offer.clinic','date','hour','reservation_diseases.diseases','files')
                    ->where(['user_id'=>$request->user_id,'type'=>'offer'])->get();
            }

            return response()->json(['data'=>$doctor,'code'=>200,'message'=>''],200);
        }

    }



    //=======================================================================================

//    public function update_offer_reservation(Request $request){
//        $rules = [
//            'reservation_id'=> 'required|exists:reservations,id',
//            'date_id'       => 'required',
//            'hour_id'       => 'required',
//            'name'          => 'required',
//            'phone'         => 'required',
//        ];
//
//        $validator = Validator::make($request->all(),$rules);
//        if ($validator->fails()){
//            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
//        }
//
//        else{
//            $data = $request->only('date_id','hour_id','name','phone');
////            $data['type'] = 'offer';
//            $reservation = Reservation::find($request->reservation_id);
//
//            $old_date = DoctorHour::where('id',$reservation->hour_id)->first();
//            $old_date->is_reserved = 'no';
//            $old_date->save();
//
//            $date = DoctorHour::where('id',$request->hour_id)->first();
//            $date->is_reserved = 'yes';
//            $date->save();
//
//            $reservation->update($data);
//
//            $doctor = Reservation::with('doctor','date','hour','reservation_diseases.diseases','files')
//                ->where(['id'=>$reservation->id])->first();
//
//            return response()->json(['data'=>$doctor,'code'=>200,'message'=>''],200);
//        }
//
//    }


}
