<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DoctorHour;
use App\Models\Notification;
use App\Models\Reservation;
use App\Models\ReservationDisease;
use App\Models\ReservationReports;
use App\Traits\Notifications;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorReservationsController extends Controller
{
    use PhotoTrait;
    use Notifications;
    public function index(){
        $reservations = Reservation::where('doctor_id',admin()->user()->id)->get();
        $diseases = ReservationDisease::all();
//        return $diseases;
        return view('Admin/my_reservations/index',compact('reservations','diseases'));
    }

    public function update(request $request){
        try {
            $reservation  = Reservation::findOrFail($request->id);
            $hour         = DoctorHour::where('id',$reservation->hour_id)->first();
            $notification = Notification::where('reservation_id',$request->id)->get();
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

    public function create(request $request){
        try {
            $reservation = Reservation::findOrFail($request->reservation_id);
            $reservation->update([
               'report_text' => $request->report_text,
            ]);
            if($request->has('image')) {
                foreach ($request->image as $image) {
                    $file = $this->saveImage($image,'uploads/reports');
                    ReservationReports::create([
                        'reservation_id' => $request->reservation_id,
                        'report' => 'uploads/reports/'.$file
                    ]);
                }
            }
            toastr()->success('تم اضافة تقرير بنجاح');
            return redirect()->route('doctor.reports');
        }
        catch (\Exception $e){
                return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
            }
    }

    public function edit($id){
        return $id;
    }

    public function upload_file($reservation_id){
        $report_text = Reservation::where('id',$reservation_id)->pluck('report_text')->first();
        return view('Admin/my_reports/upload_report',compact('report_text','reservation_id'));
    }
}
