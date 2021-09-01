<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReservationReports;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index(){
        $reports = ReservationReports::all();
        return view('Admin.all_reports.index',compact('reports'));
    }
}
