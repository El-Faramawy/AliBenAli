<?php

namespace App\Http\Controllers\Site;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Models\DoctorDate;
use App\Models\DoctorHour;
use App\Models\Reservation;
use App\Models\ReservationReports;
use App\reservationfile;
use App\Models\OfferSlider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $current_date = carbon::now();
        $patiant_doctors = Reservation::where(['user_id' => auth()->user()->id, ['doctor_id', '!=', ''], ['type', 'online']])->with('doctor')->get();

        $patiant_doctors_offers = Reservation::where(['user_id' => auth()->user()->id, ['type', 'offer']])->get();
//return $patiant_doctors[10]->reports[0]->report ;
    $filees_images = ReservationReports::all();
//    return $filees_images[0]->reservation_id;
        $filees_pdf = ReservationReports::where('report', 'like', '%' . 'pdf' . '%')->get();

//======================================  Reservation Dates  ====================================
        foreach ($patiant_doctors as $reservation) {
            $reservation->all_dates = $reservation->available_date;

            $hour_id = $reservation->hour_id;
            $date_id = $reservation->date_id;
            $doctor_id = $reservation->doctor_id;
            $all_dates = DoctorDate::with('hour')->where(function ($query1) use ($date_id, $doctor_id) {
                $query1->where([['date', '>=', date('Y-m-d')], ['is_reserved', 'no'], ['doctor_id', $doctor_id]])
                    ->orwhere('id', $date_id);
            })
                ->whereHas('hour', function ($query) use ($hour_id) {
                    $query->where('is_reserved','no')
                        ->orwhere('id', $hour_id);
                })
                ->get();
            $reservation->all_dates = $all_dates;

            foreach ($reservation->all_dates as $da) {
                $date = $da->id;
                $da->available_hour = DoctorHour::where('date_id', $date)->where(function ($query) use ($hour_id,$date,$date_id){
                    $query->where('is_reserved', 'no')
                        ->orwhere('id',$hour_id);
                })->get();

                if ($da->id == $date_id)
                    $da->is_reserved = 'yes';
                else
                    $da->is_reserved = 'no';
            }

            foreach ($reservation->all_dates as $da) {
                if ($request->ajax()) {
//                    return $request->all();
                    if ($request->date_id == $da->id) {
                        $date = DoctorDate::where('id', $request->date_id)->first();
                        $date->available_hour = $da->available_hour;
                        $html = view('Site/parts/get_hour'
                            , compact('patiant_doctors', 'patiant_doctors_offers',  'filees_pdf', 'filees_images'), ['user' => auth()->user(), 'date' => $date])->render();
                        return response()->json(['html' => $html]);
                    }
                }
            }
        }

//======================================  Offer Reservation Dates  ====================================
        foreach ($patiant_doctors_offers as $reservation) {
            $reservation->all_dates = $reservation->available_date;

            $hour_id = $reservation->hour_id;
            $date_id = $reservation->date_id;
            $offer_id = $reservation->offer_id;
            $all_dates = DoctorDate::with('hour')->where(function ($query1) use ($date_id, $offer_id) {
                $query1->where([['date', '>=', date('Y-m-d')], ['is_reserved', 'no'], ['offer_id', $offer_id]])
                    ->orwhere('id', $date_id);
            })
                ->whereHas('hour', function ($query) use ($hour_id) {
                    $query->where('is_reserved','no')
                        ->orwhere('id', $hour_id);
                })
                ->get();
            $reservation->all_dates = $all_dates;

            foreach ($reservation->all_dates as $da) {
                $date = $da->id;
                $da->available_hour = DoctorHour::where('date_id', $date)->where(function ($query) use ($hour_id,$date,$date_id){
                    $query->where('is_reserved', 'no')
                        ->orwhere('id',$hour_id);
                })->get();

                if ($da->id == $date_id)
                    $da->is_reserved = 'yes';
                else
                    $da->is_reserved = 'no';
            }

            foreach ($reservation->all_dates as $da) {
                if ($request->ajax()) {
//                    return $request->all();
                    if ($request->date_id == $da->id) {
                        $date = DoctorDate::where('id', $request->date_id)->first();
                        $date->available_hour = $da->available_hour;
                        $html = view('Site/parts/get_hour'
                            , compact('patiant_doctors', 'patiant_doctors_offers',  'filees_pdf', 'filees_images'), ['user' => auth()->user(), 'date' => $date])->render();
                        return response()->json(['html' => $html]);
                    }
                }
            }
        }
//        return $patiant_doctors_offers;
        return view('Site/patient-profile', compact('patiant_doctors', 'patiant_doctors_offers',  'filees_pdf', 'filees_images'), ['user' => auth()->user(), 'date' => '']);
    }//end fun

    //==================================================================
    public function cancel_reservation(request $request)
    {
        try {
            $change_hour = DoctorHour::where('id', $request->hour)->first();
            $change_hour->is_reserved = 'no';
            $change_hour->save();
            $change_delete = Reservation::where('id', $request->id)->first();
            $change_delete->is_deleted = 'yes';
            $change_delete->save();
            Session::flash('massage', 'good');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'failed']);
        }

    }//end fun

    public function delete_reservations(request $request)
    {
        try {
            $delete_Reservation = Reservation::find($request->id);
            $delete_Reservation->delete();
            $delete_Reservation->save();
            $delete_slider = Reservation::find($request->id);
            $delete_slider->delete();
            Session::flash('massage', 'good');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'failed']);
        }
    }//end fun

    //=====================================================================
    public function update_date(request $request)
    {
//        return $request->all();
            $reservation = Reservation::where('id',$request->reservation_id)->first();
//            return $reservation;
                $old_date = DoctorHour::where('id',$reservation->hour_id)->first();
                $old_date->is_reserved = 'no';
                $old_date->save();
            $reservation->date_id = $request->date_id;
            $reservation->hour_id = $request->hour_id;
            $reservation->save();


            $date = DoctorHour::where('id',$request->hour_id)->first();
            $date->is_reserved = 'yes';
            $date->save();

            return response()->json(['type'=>'success']);

    }//end fun

}
