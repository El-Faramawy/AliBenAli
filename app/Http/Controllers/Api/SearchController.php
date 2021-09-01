<?php

namespace App\Http\Controllers\Api;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{

    public function distance($lat1, $lon1, $lat2, $lon2) {
        $pi80 = M_PI / 180;
        $lat1 *= $pi80;
        $lon1 *= $pi80;
        $lat2 *= $pi80;
        $lon2 *= $pi80;
        $r = 6372.797; // mean radius of Earth in km
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $km = $r * $c;
//echo ' '.$km;
        return $km;
    }

    public function search_doctor(Request $request)
    {
        $validator = validator::make($request->all(), [
//            'user_id' => 'required|exists:users,id',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['data'=>null, 'code' => 422, 'message' => $validator->errors()], 422);
        }

        $name = $request->name;
        if ($request->paginate == 'on') {
            $number = $request->page_num == null ? 10 : $request->page_num;
            $doctors = Admin::with('clinic', 'country', 'rates.user', 'available_date.available_hour','cv')
                ->where(['type' => 'doctor'])
                ->where(function ($query) use ($name) {
                    $query->where('name_ar', 'like', '%' . $name . '%')->orwhere('name_en', 'like', '%' . $name . '%');
                })
                ->paginate($number);

            if ($request->name == 'all'){
                $doctors = Admin::with('clinic', 'country', 'rates.user', 'available_date.available_hour','cv')
                    ->where(['type' => 'doctor'])->paginate($number);
            }

            if ($request->user_id && $request->user_id != '') {
                foreach ($doctors as $doctor) {

                    $ids = Favourite::where('doctor_id', $doctor->id)->pluck('user_id')->toArray();

                    $doctor->is_favourate = in_array($request->user_id, $ids) ? 'yes' : 'no';
                }
            }



            $json = collect(["message" => "", "code" => 200]);
            $json = $json->merge($doctors);
            return response()->json($json, 200);
        } else {
            $doctors = Admin::with('clinic', 'country', 'rates.user', 'available_date.available_hour','cv')
                ->where(['type' => 'doctor'])
                ->where(function ($query) use ($name) {
                    $query->where('name_ar', 'like', '%' . $name . '%')->orwhere('name_en', 'like', '%' . $name . '%');
                })
                ->get();

            if ($request->name == 'all'){
                $doctors = Admin::with('clinic', 'country', 'rates.user', 'available_date.available_hour','cv')
                    ->where(['type' => 'doctor'])->get();
            }

            if ($request->user_id && $request->user_id != '') {
                foreach ($doctors as $doctor) {
                    $ids = Favourite::where('doctor_id', $doctor->id)->pluck('user_id')->toArray();

                    $doctor->is_favourate = in_array($request->user_id, $ids) ? 'yes' : 'no';
                }
            }


            return response()->json(['data' => $doctors, 'code' => 200, 'message' => ''], 200);
        }

    }
    //=======================================================================================
    public function search_department(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['data'=>null, 'code' => 422, 'message' => $validator->errors()], 422);
        }

        $name = $request->name;
        if ($request->paginate == 'on') {
            $number = $request->page_num == null ? 10 : $request->page_num;
            $clinics = Clinic::with('doctor')
                ->where(function ($query) use ($name) {
                    $query->where('name_ar', 'like', '%' . $name . '%')->orwhere('name_en', 'like', '%' . $name . '%');
                })
                ->paginate($number);

            if ($request->name == 'all')
                $clinics = Clinic::with('doctor')->paginate($number);

            $json = collect(["message" => "", "code" => 200]);
            $json = $json->merge($clinics);
            return response()->json($json, 200);

        } else {
            $clinics = Clinic::with('doctor')
                ->where(function ($query) use ($name) {
                    $query->where('name_ar', 'like', '%' . $name . '%')->orwhere('name_en', 'like', '%' . $name . '%');
                })
                ->get();

            if ($request->name == 'all')
                $clinics = Clinic::with('doctor')->get();

            return response()->json(['data' => $clinics, 'code' => 200, 'message' => ''], 200);
        }

    }
    //=======================================================================================


}
