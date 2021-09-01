<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Traits\Notifications;
use App\Models\DoctorHour;
use App\Models\Notification;
use App\Models\Reservation;
use App\Models\ReservationDiseases;
use App\Models\ReservationFiles;
use App\Models\ReservationReports;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    use Notifications;
    public function index(){
        $new_reservations      = Reservation::where([['status','new'],['type','online']])->get();
        $accepted_reservations = Reservation::where([['status','accepted'],['type','online']])->get();
        $refused_reservations  = Reservation::where([['status','refused'],['type','online']])->get();
        $ended_reservations    = Reservation::where([['status','ended'],['type','online']])->get();
        $diseases              = ReservationDiseases::all();
        return view('Admin/reservations/index',compact('new_reservations','accepted_reservations','refused_reservations','ended_reservations','diseases'));
    }

    public function offerReservations(){
        $new_reservations      = Reservation::whereHas('offer')->where([['status','new'],['type','offer']])->get();
        $accepted_reservations = Reservation::whereHas('offer')->where([['status','accepted'],['type','offer']])->get();
        $refused_reservations  = Reservation::whereHas('offer')->where([['status','refused'],['type','offer']])->get();
        $ended_reservations    = Reservation::whereHas('offer')->where([['status','ended'],['type','offer']])->get();
        $diseases              = ReservationDiseases::all();
        return view('Admin/reservations/offer_reservations',compact('new_reservations','accepted_reservations','refused_reservations','ended_reservations','diseases'));
    }



    public function update(request $request){
        try {
            $reservation  = Reservation::findOrFail($request->id);
            $hour         = DoctorHour::where('id',$reservation->hour_id)->first();
            $notification = Notification::where('reservation_id',$request->id)->get();
            if ($request->status == 'accepted'){
                Notification::where(['reservation_id'=>$request->id,'doctor_id'=>$request->doctor_id])->delete();
                Notification::where(['reservation_id'=>$request->id,'user_id'=>$request->user_id])->delete();

                $notification = new Notification();
                $notification->title_ar = $request->id . 'حالة الحجز رقم ';
                $notification->title_en = 'status of reservation number ' . $request->id;
                $notification->message_ar = 'تم قبول حجزك';
                $notification->message_en = 'your reservation is accepted';
                $notification->reservation_id = $reservation->id;
                $notification->date = $reservation->date->date;
                $notification->user_id = $request->user_id;
                $notification->save();

                $no = new Notification();
                $no->title_ar = $request->id . 'حالة الحجز رقم ';
                $no->title_en = 'status of reservation number ' . $request->id;
                $no->message_ar = $reservation->date->date.'هناك حجز جديد يوم ';
                $no->message_en = 'There is a new reservation on '.$reservation->date->date;
                $no->reservation_id = $reservation->id;
                $no->date = $reservation->date->date;
                $no->doctor_id = $request->doctor_id;
                $no->save();

                $hour->update([
                    'is_reserved' => 'yes'
                ]);

                $this->doctor_notification($request->doctor_id,$no->title_ar,$no->message_ar);
                $this->notification($request->user_id,$notification->title_ar,$notification->message_ar);

            }
            if ($request->status == 'refused'){
                $notification = new Notification();
                $notification->title_ar = $request->id . 'حالة الحجز رقم ';
                $notification->title_en = 'status of reservation number ' . $request->id;
                $notification->message_ar = 'عذرا تم رفض حجزك';
                $notification->message_en = 'your reservation is accepted';
                $notification->reservation_id = $reservation->id;
                $notification->date = $reservation->date->date;
                $notification->user_id = $request->user_id;
                $notification->save();

                if ($notification->count() > 1) {
                    $no = new Notification();
                    $no->title_ar = $request->id . 'حالة الحجز رقم ';
                    $no->title_en = 'status of reservation number ' . $request->id;
                    $no->message_ar = $reservation->date->date . 'تم الغاء حجز يوم ';
                    $no->message_en = 'The reservation canceled on ' . $reservation->date->date;
                    $no->reservation_id = $reservation->id;
                    $no->date = $reservation->date->date;
                    $no->doctor_id = $request->doctor_id;
                    $no->save();

                    $this->doctor_notification($request->doctor_id,$no->title_ar,$no->message_ar);
                }
                $this->notification($request->user_id,$notification->title_ar,$notification->message_ar);

                $hour->update([
                    'is_reserved' => 'no'
                ]);
            }
            if ($request->status == 'ended') {
                $notification = new Notification();
                $notification->title_ar = $request->id . 'حالة الحجز رقم ';
                $notification->title_en = 'status of reservation number ' . $request->id;
                $notification->message_ar = 'تم انهاء الحجز بنجاح';
                $notification->message_en = 'your reservation ended successfully';
                $notification->reservation_id = $reservation->id;
                $notification->date = $reservation->date->date;
                $notification->user_id = $request->user_id;
                $notification->save();

                $no = new Notification();
                $no->title_ar = $request->id . 'حالة الحجز رقم ';
                $no->title_en = 'status of reservation number ' . $request->id;
                $no->message_ar = 'تم انهاء الحجز بنجاح';
                $no->message_en = 'your reservation ended successfully';
                $no->reservation_id = $reservation->id;
                $no->date = $reservation->date->date;
                $no->doctor_id = $request->doctor_id;
                $no->save();
//
                $this->doctor_notification($request->doctor_id, $no->title_ar, $no->message_ar);
                $this->notification($request->user_id, $notification->title_ar, $notification->message_ar);

            }
            $reservation->update([
                'status' => $request->status
            ]);
            toastr()->success('تم تحديث حالة الحجز بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    public function delete(Request $request){
        Reservation::findOrFail($request->id)->delete();
        toastr()->success('تم حذف الحجز بنجاح');
        return back();
    }
}
