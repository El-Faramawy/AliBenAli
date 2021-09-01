<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\ReservationReports;
use Illuminate\Http\Request;

class DoctorReports extends Controller
{
    public function index(){
        $reports     = ReservationReports::all();
//        $reservation = Reservation::where([['doctor_id',admin()->user()->id] ,['report_text','!=','' ]])->get();
        return view('Admin.my_reports.index',compact('reports'));
    }

    public function report_text(){

    }
}
