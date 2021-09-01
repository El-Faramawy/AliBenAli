<?php

namespace App\Http\Controllers\Api;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Offer;
use App\Models\Rate;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => null, 'code' => 422, 'message' => $validator->errors()], 422);
        }
        if ($request->paginate == 'on') {
            $number = $request->page_num == null ? 10 : $request->page_num;
            $notification = Notification::where('user_id', $request->user_id)
                ->with('user', 'reservation.date', 'reservation.hour')
                ->orderBy('date', 'DESC')
                ->paginate($number);

            foreach ($notification as $message) {
                if ($message->reservation->type == 'online' && $message->reservation->status == 'ended') {
                    $count = Rate::where(['doctor_id' => $message->reservation->doctor_id, 'user_id' => $message->reservation->user_id])->count();
                    $message->can_rate = $count > 0 ? 'no' : 'yes';
                    $message->reservation->doctor = Admin::where('id',$message->reservation->doctor_id)->first();
                } elseif ($message->reservation->type == 'offer' && $message->reservation->status == 'ended') {
                    $count = Rate::where(['offer_id' => $message->reservation->offer_id, 'user_id' => $message->reservation->user_id])->count();
                    $message->can_rate = $count > 0 ? 'no' : 'yes';
                    $message->reservation->offer = Offer::with('first_image')->where('id',$message->reservation->offer_id)->first();
                } else {
                    $message->can_rate = 'no';
                }
            }
            $json = collect(["message" => "", "code" => 200]);
            $json = $json->merge($notification);

            return response()->json($json, 200);
        } else {
            $notification = Notification::where('user_id', $request->user_id)
                ->with('user', 'reservation.date', 'reservation.hour')
                ->orderBy('date', 'DESC')
                ->get();



            foreach ($notification as $message){
                if ($message->reservation->type == 'online' && $message->reservation->status == 'ended'){
                    $count = Rate::where(['doctor_id' => $message->reservation->doctor_id, 'user_id' => $message->reservation->user_id])->count();
                    $message->can_rate = $count>0?'no':'yes';
                    $message->reservation->doctor = Admin::where('id',$message->reservation->doctor_id)->first();
                }elseif($message->reservation->type == 'offer' && $message->reservation->status == 'ended'){
                    $count = Rate::where(['offer_id' => $message->reservation->offer_id, 'user_id' => $message->reservation->user_id])->count();
                    $message->can_rate = $count>0?'no':'yes';
                    $message->reservation->offer = Offer::with('first_image')->where('id',$message->reservation->offer_id)->first();
                }
                else {
                    $message->can_rate = 'no';
                }
            }

            return response()->json(['data' => $notification, 'message' => '', 'code' => 200], 200);
        }
    }

    //======================================================================================


    public function delete_notification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'notification_id' => ['required','exists:notifications,id'],
        ]);
        if ($validator->fails()) {
            return response()->json(['data'=>null, 'code' => 422, 'message' => $validator->errors()], 422);
        }
        $notification=Notification::find($request->notification_id)->delete();
        return response()->json(['data'=>null,'message'=>'notification deleted','code'=>200],200);
    }
    //======================================================================================


    public function rate_doctor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'doctor_id' => ['required', 'exists:admins,id'],
            'title' => ['required'],
            'rate' => ['required'],
        ]);
        if ($validator->fails()) {
            return response()->json(['data'=>null, 'code' => 422, 'message' => $validator->errors()], 422);
        }

        $res_count = Reservation::where(['status' => 'ended', 'offer_id' => $request->offer_id, 'user_id' => $request->user_id])->count();
        if ($res_count > 0) {

            $count = Rate::where(['doctor_id' => $request->doctor_id, 'user_id' => $request->user_id])->count();
            if ($count > 0) {
                $rate = Rate::with('user', 'doctor')
                    ->where(['doctor_id' => $request->doctor_id, 'user_id' => $request->user_id])->first();
                return response()->json(['data' => $rate, 'code' => 422, 'message' => 'user already rate before '], 200);
            } else {
                $rate = new Rate();
                $rate->user_id = $request->user_id;
                $rate->doctor_id = $request->doctor_id;
                $rate->title = $request->title;
                $rate->rate = $request->rate;
                $rate->save();

                $avg = Rate::where(['doctor_id' => $request->doctor_id])->pluck('rate')->avg();
                $doctor = Admin::where('id', $request->doctor_id)->first();
                $doctor->rate = $avg;
                $doctor->save();

                return response()->json(['data' => $rate, 'message' => 'rate saved successfully', 'code' => 200], 200);
            }
        } else {
            return response()->json(['data'=>null, 'code' => 422, 'message' => "user can't rate this offer "], 200);
        }

    }

    //======================================================================================


    public function rate_offer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'offer_id' => ['required', 'exists:offers,id'],
            'title' => ['required'],
            'rate' => ['required'],
        ]);
        if ($validator->fails()) {
            return response()->json(['data'=>null, 'code' => 422, 'message' => $validator->errors()], 422);
        }
        $res_count = Reservation::where(['status' => 'ended', 'offer_id' => $request->offer_id, 'user_id' => $request->user_id])->count();
        if ($res_count > 0) {
            $count = Rate::where(['offer_id' => $request->offer_id, 'user_id' => $request->user_id])->pluck('user_id')->count();
            if ($count > 0) {
                $rate = Rate::with('user', 'offer')->where(['offer_id' => $request->offer_id, 'user_id' => $request->user_id])->first();
                return response()->json(['data' => $rate, 'code' => 422, 'message' => 'user already rate before '], 200);
            } else {
                $rate = new Rate();
                $rate->user_id = $request->user_id;
                $rate->offer_id = $request->offer_id;
                $rate->title = $request->title;
                $rate->rate = $request->rate;
                $rate->save();

                $avg = Rate::where(['offer_id' => $request->offer_id])->pluck('rate')->avg();
//            return $avg;
                $doctor = Offer::where('id', $request->offer_id)->first();
                $doctor->rate = $avg;
                $doctor->save();

                return response()->json(['data' => $rate, 'message' => 'rate saved successfully', 'code' => 200], 200);
            }

        } else {
            return response()->json(['data'=>null, 'code' => 422, 'message' => "user can't rate this offer "], 200);
        }
    }

    //====================================================================================================

    public function doctor_notification(Request $request){
        $validator = Validator::make($request->all(), [
            'doctor_id' => ['required', 'exists:admins,id'],
        ]);
        if ($validator->fails()) {
            return response()->json(['data'=>null, 'code' => 422, 'message' => $validator->errors()], 422);
        }

        if ($request->paginate == 'on') {
            $number = $request->page_num == null ? 10 : $request->page_num;
            $notification = Notification::where('doctor_id', $request->doctor_id)
                ->with('doctor', 'reservation.date', 'reservation.hour')
                ->orderBy('date', 'DESC')
                ->paginate($number);
            $json = collect(["message" => "", "code" => 200]);
            $json = $json->merge($notification);
            return response()->json($json, 200);
        } else {
            $notification = Notification::where('doctor_id', $request->doctor_id)
                ->with('doctor', 'reservation.date', 'reservation.hour')
                ->orderBy('date', 'DESC')
                ->get();

            return response()->json(['data' => $notification, 'message' => '', 'code' => 200], 200);
        }
    }

}
