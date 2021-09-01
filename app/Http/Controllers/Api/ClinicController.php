<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Admin;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClinicController extends Controller
{
    public function index(Request $request){

//        return response()->json(['data'=> language(),'code'=>200,'message'=>''],200);

        if ($request->paginate=='on') {
            $number = $request->page_num==null?10:$request->page_num;
            $clinics = Clinic::with('doctor')->paginate($number);
            $json = collect(["message" => "","code" => 200]) ;
            $json =  $json->merge($clinics);
            return response()->json($json,200);
        }else{
            $clinics = Clinic::with('doctor')->get();
        }
    //        if ($request->language){
    //            foreach ($clinics as $clinic){
    //                $clinic->name = $clinic->name($request->language);
    //            }
    //        }

        return response()->json(['data'=>$clinics,'code'=>200,'message'=>''],200);
    }
    //=======================================================================================
    public function doctor_department_id(Request $request)
    {
        $rules = [
            'department_id' => 'required|exists:clinics,id',
//            'name' => 'required',
//            'user_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['data'=>null, 'code' => 422, 'message' => $validator->errors()], 422);
        } else {
            $name = $request->name;
            if ($request->paginate == 'on') {
                $number = $request->page_num == null ? 10 : $request->page_num;

                if ($request->name && $request->name != '' && $request->name != 'all'){
                    $doctors = Admin::with('clinic', 'country', 'rates.user', 'available_date.available_hour')
                    ->where(function ($query) use ($name) {
                        $query->where('name_ar', 'like', '%' . $name . '%')->orwhere('name_en', 'like', '%' . $name . '%');
                    })
                    ->where(['clinic_id' => $request->department_id, 'type' => 'doctor'])->paginate($number);
                }

                if (!$request->name && $request->name == '' || $request->name == 'all'){
                    $doctors = Admin::with('clinic', 'country', 'rates.user', 'available_date.available_hour')
                    ->where(['clinic_id' => $request->department_id, 'type' => 'doctor'])->paginate($number);
                }

                if ($request->user_id) {
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
                    if ($request->name && $request->name != '' && $request->name != 'all') {

                        $doctors = Admin::with('clinic', 'country', 'rates.user', 'available_date.available_hour')
                            ->where(function ($query) use ($name) {
                                $query->where('name_ar', 'like', '%' . $name . '%')->orwhere('name_en', 'like', '%' . $name . '%');
                            })
                            ->where(['clinic_id' => $request->department_id, 'type' => 'doctor'])->get();
                    }

                    if (!$request->name && $request->name == '' || $request->name == 'all'){

                        $doctors = Admin::with('clinic', 'country', 'rates.user', 'available_date.available_hour')
                            ->where(['clinic_id' => $request->department_id, 'type' => 'doctor'])->get();
                    }

                    if ($request->user_id) {
                        foreach ($doctors as $doctor) {
                            $ids = Favourite::where('doctor_id', $doctor->id)->pluck('user_id')->toArray();

                            $doctor->is_favourate = in_array($request->user_id, $ids) ? 'yes' : 'no';
                        }
                    }
                    return response()->json(['data' => $doctors, 'code' => 200, 'message' => ''], 200);
            }
        }

    }

}
