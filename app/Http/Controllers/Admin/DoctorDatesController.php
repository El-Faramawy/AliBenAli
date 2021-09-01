<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddDateRequest;
use App\Models\DoctorDate;
use App\Models\DoctorHour;
use Illuminate\Http\Request;

class DoctorDatesController extends Controller
{
    public function index(){
        $doctors = Admin::where('type','doctor')->whereHas('date')->get();
//        return $doctors[0]['date'][1]['available_hour'];
//        $dates = DoctorDate::all();
        return view('Admin/dates/index',compact('doctors'));
    }

    public function showAvailable($id){
        $doctor = Admin::where('id',$id)->first();
        $dates =  $doctor['available_date'];
        return view('Admin/dates/index',compact('doctor','dates'));
    }

    public function add($id){

        $doctors=Admin::findOrFail($id);
        return view('Admin/dates/add',compact('doctors'));
    }


    public function date_cc(request $request)
    {
//return $request;

        try {
//            $date = new DoctorDate;
//            $date->doctor_id = $request->id;
//            $date->date = $request->day;
//            $date->save();

            $hours = $request['hours'];
            $dates = $request['date'];

            foreach ($dates as $date) {
                $date_ids = DoctorDate::create([
                    'doctor_id' => $request->id,
                    'date' => $date,
                ]);

                foreach ($hours as $hour) {
                    DoctorHour::create([
                        'date_id' => $date_ids->id,
                        'hour' => $hour,
                    ]);

                }

            }
            toastr()->success('تم اضافة موعد الطبيب بنجاح');
            return redirect()->route('admin.doctors_dates');
        }
        catch
        (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy(request $request){
        DoctorDate::findOrFail($request->id)->delete();
        toastr()->success('تم حذف اليوم بنجاح');
        return back();
    }
}
