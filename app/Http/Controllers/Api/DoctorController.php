<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Admin;
use App\Models\DoctorDate;
use App\Models\DoctorHour;
use App\Models\Favourite;
use App\Models\Reservation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function index(Request $request){
        $rules = [
//            'user_id'        => 'required',
            'doctor_id'      => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
        }

        else {
            $doctor = Admin::with('clinic', 'country', 'rates.user', 'available_date.available_hour')
                ->where(['type' => 'doctor', 'id' => $request->doctor_id])->first();
// to return date and hour in update reservation
            if ($request->reservation_id) {
                $reservation = Reservation::with('date', 'hour')->where('id', $request->reservation_id)->first();
                $dates = $doctor->available_date->pluck('id')->toArray();

                $doctor->all_dates = $doctor->available_date->toArray();

//            if (!in_array($reservation->date_id,$dates)){
//                $doctor->all_dates =  array_merge([$reservation->date],$doctor->all_dates);
//                $dates_ = $doctor->all_dates->toArray();
//                array_push($dates_,$reservation->date);
//            }
                $hour_id = $reservation->hour_id;
                $date_id = $reservation->date_id;
                $doctor_id = $request->doctor_id;
                $all_dates = DoctorDate::with('hour')->where(function ($query1) use ($date_id, $doctor_id) {
                    $query1->where([['date', '>=', date('Y-m-d')], ['is_reserved', '=', 'no'], ['doctor_id', $doctor_id]])
                        ->orwhere('id', $date_id);
                })
                    ->whereHas('hour', function ($query) use ($hour_id) {
                        $query->where([['hour', '>=', date('h:i:s')], ['is_reserved', '=', 'no']])
                            ->orwhere('id', $hour_id);
                    })
                    ->get();
                $doctor->all_dates = $all_dates;
                foreach ($doctor->all_dates as $da) {
                    $av_date = DoctorDate::where('id',$da->id)->first();
                    $da->available_hour =  DoctorHour::where([['hour', '>=', date('h:i:s')], ['is_reserved', 'no'], ['date_id', $da->id]])
                    ->orwhere('id', $hour_id)->get();
//                    $da->available_hour = $da->hour;
                    if ($da->id == $date_id)
                        $da->is_reserved = 'yes';
                    else
                        $da->is_reserved = 'no';
                }
            }
//            $doctor->all_dates->available_hour = $all_dates->hour;
//            return $doctor;
//            $date = DoctorDate::where('id',$reservation->date_id)->first();
//            $da =$doctor['available_date']->pluck('available_hour')->flatten()->pluck('id')->toArray();
//            return $doctor->all_dates;
//            $date['all_hours'] =  $date['available_hour'];
//            if (!in_array($reservation->hour_id, $da)){
//
//                $date['all_hours'] =  array_merge([$reservation->hour],$date['available_hour']);
//
//            }
////
////                $da['all_hours'] =  array_merge([$reservation->hour],$da['available_hour']);
//
//            foreach ($doctor->all_dates as $date){
//                if ($date['id'] == $reservation->date_id) {
//                   // $date['all_hours'] =  $date['available_hour'];
////                    $hours = $date['all_hours'];
////                    return $hours;
////                    if (!in_array($reservation->hour, $date['available_hour'])){
//                        $date['all_hours'] =  array_merge([$reservation->hour],$date['available_hour']);
////                        $av_hour = $date->available_hour->toArray();
////                        $av_hour[] = $reservation->hour;
////                        $date->available_hour = $av_hour;
//                   // }
//                }
////                return  $date;
////                return $date->available_hour;
//
//            }
//            return  $doctor->all_dates;
////            return $doctor->available_date[]['available_hour'];

            if ($request->user_id && $request->user_id!= '') {
                $ids = Favourite::where('doctor_id', $doctor->id)->pluck('user_id')->toArray();
                $doctor->is_favourate = in_array($request->user_id, $ids) ? 'yes' : 'no';
            }

            return response()->json(['data'=>$doctor,'code'=>200,'message'=>''],200);
        }

    }
    //=======================================================================================
    public function all_doctors(Request $request){
//        $rules = [
//            'user_id' => 'required|exists:users,id',
//        ];

//        $validator = Validator::make($request->all(), $rules);
//        if ($validator->fails()) {
//            return response()->json(['data'=>null, 'code' => 422, 'message' => $validator->errors()], 422);
//        }
//        else {
            if ($request->paginate == 'on') {
                $number = $request->page_num == null ? 10 : $request->page_num;
                $doctors = Admin::with('clinic', 'country', 'rates.user', 'available_date.available_hour')
                    ->where([ 'type' => 'doctor'])->paginate($number);
                if ($request->user_id && $request->user_id!= '') {
                    foreach ($doctors as $doctor) {
                        $ids = Favourite::where('doctor_id', $doctor->id)->pluck('user_id')->toArray();

                        $doctor->is_favourate = in_array($request->user_id, $ids) ? 'yes' : 'no';

                    }
                }
                $json = collect(["message" => "", "code" => 200]);
                $json = $json->merge($doctors);
                return response()->json($json, 200);
            }
            else {
                $doctors = Admin::with('clinic', 'country', 'rates.user', 'available_date.available_hour')
                    ->where(['type' => 'doctor'])->get();

                if ($request->user_id && $request->user_id!= '') {
                    foreach ($doctors as $doctor) {
                        $ids = Favourite::where('doctor_id', $doctor->id)->pluck('user_id')->toArray();

                        $doctor->is_favourate = in_array($request->user_id, $ids) ? 'yes' : 'no';
                    }
                }
                return response()->json(['data' => $doctors, 'code' => 200, 'message' => ''], 200);
            }

//        }
    }
    //=======================================================================================

    public function patients(Request $request)
    {
        $rules = [
            'doctor_id' => 'required|exists:admins,id',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['data' => null, 'code' => 422, 'message' => $validator->errors()], 422);
        }

        $user_ids = Reservation::with('user')
            ->where(['status' => 'ended', 'doctor_id' => $request->doctor_id])
            ->pluck('user_id')->toArray();
        $user_ids = array_unique($user_ids);

        $doctor_id = $request->doctor_id;
        if ($request->word && $request->word != '' && $request->word != 'all')
            $users = User::whereIn('id', $user_ids)->where('name','like','%'.$request->word.'%')->get();

        if ( $request->word == '' || $request->word == 'all')
            $users = User::whereIn('id', $user_ids)->get();
//          ->with('last_reservation')
//          ->whereHas('last_reservation', function ($query) use ($doctor_id) {
//              $query->where('status', 'ended')->where('doctor_id', $doctor_id)
//                  ->whereHas('date', function ($query2) {
//                      $query2->orderBy('date', 'DESC');
//                  });
//          })
//        return $users;
        foreach ($users as $user) {
            $reservation = Reservation::where(['user_id' => $user->id, 'doctor_id' => $doctor_id, 'status' => 'ended'])
                ->with('doctor', 'user', 'date', 'hour', 'reservation_diseases.diseases', 'files','reports')
                ->whereHas('date', function ($query2) {
                    $query2->orderBy('date', 'DESC');
                })->get();
            $last_date = Reservation::where(['user_id' => $user->id, 'doctor_id' => $doctor_id, 'status' => 'ended'])
                ->with('doctor', 'user', 'date', 'hour', 'reservation_diseases.diseases', 'files','reports')
                ->whereHas('date', function ($query2) {
                    $query2->orderBy('date', 'DESC');
                })->first();
            $user['last_reservation'] = $reservation;
            $user['last_date'] = $last_date->date;
        }

        return response()->json(['data' => $users, 'code' => 200, 'message' => ''], 200);

    }
    //=======================================================================================

    public function patient_details(Request $request)
    {
        $rules = [
            'doctor_id' => 'required|exists:admins,id',
            'user_id' => 'required|exists:users,id',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['data' => null, 'code' => 422, 'message' => $validator->errors()], 422);
        }

            $reservation = Reservation::where(['user_id' => $request->user_id, 'doctor_id' => $request->doctor_id, 'status' => 'ended'])
                ->with('doctor', 'user', 'date', 'hour', 'reservation_diseases.diseases', 'files','reports')
                ->whereHas('date', function ($query2) {
                    $query2->orderBy('date', 'DESC');
                })->get();

        return response()->json(['data' => $reservation, 'code' => 200, 'message' => ''], 200);

    }

}
