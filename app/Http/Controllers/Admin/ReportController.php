<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReservationReports;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $reports = ReservationReports::all();
        return view('Admin.my_reports.index',compact('reports'));
    }





    public function delete(request $request){
        ReservationReports::findOrFail($request->id)->delete();
        toastr()->success('تم حذف التقرير بنجاح');
        return back();
    }
}
