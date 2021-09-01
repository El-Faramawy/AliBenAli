<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Models\DoctorDate;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index(){
        $dates = DoctorDate::where('date' ,'<=' , date('Y-m-d H:i'))->get();
        $doctors = Admin::whereHas('date')->get();
        return view('Admin/archive/index',compact('dates','doctors'));
    }

    public function delete_day(request $request){
        DoctorDate::where('id',$request->id)->delete();
        toastr()->success('تم حذف اليوم بنجاح');
        return back();
    }

    public function show(){
        $new_reservations = Reservation::where('status','new')->get();
        $accepted_reservations = Reservation::where('status','accepted')->get();
        $refused_reservations = Reservation::where('status','refused')->get();
        $doctors = Admin::whereHas('date')->get();
        return view('Admin/archive/reservations',compact('new_reservations','accepted_reservations','refused_reservations','doctors'));
    }

    public function delete_reservation(request $request){
        reservation::where('id',$request->id)->delete();
        toastr()->success('تم حذف الحجز من الارشيف بنجاح');
        return back();
    }
}
