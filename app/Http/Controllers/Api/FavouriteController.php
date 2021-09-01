<?php

namespace App\Http\Controllers\Api;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Models\Favourite;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FavouriteController extends Controller
{
    public function favourite_doctor(Request $request)
    {
        $validator = validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:admins,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['data'=>null, 'code' => 422, 'message' => $validator->errors()], 422);
        }
        $count = Favourite::where(['user_id' => $request->user_id, 'doctor_id' => $request->doctor_id])->count();
        if ($count > 0) {
            Favourite::where(['user_id' => $request->user_id, 'doctor_id' => $request->doctor_id])->delete();
            return response()->json(['data'=>null, 'code' => 200, 'message' => 'deleted'], 200);
        } else {
            $new_fav = new Favourite();
            $new_fav->user_id = $request->user_id;
            $new_fav->doctor_id = $request->doctor_id;
            $new_fav->save();
            return response()->json(['data'=>null, 'code' => 200, 'message' => 'saved'], 200);
        }

    }

    //=======================================================================================
    public function favourite_offer(Request $request)
    {
        $validator = validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'offer_id' => 'required|exists:offers,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['data'=>null, 'code' => 422, 'message' => $validator->errors()], 422);
        }
        $count = Favourite::where(['user_id' => $request->user_id, 'offer_id' => $request->offer_id])->count();
        if ($count > 0) {
            Favourite::where(['user_id' => $request->user_id , 'offer_id' => $request->offer_id])->delete();
            return response()->json(['data'=>null, 'code' => 200, 'message' => 'deleted'], 200);
        } else {
            $new_fav = new Favourite();
            $new_fav->user_id = $request->user_id;
            $new_fav->offer_id = $request->offer_id;
            $new_fav->save();
            return response()->json(['data'=>null, 'code' => 200, 'message' => 'saved'], 200);
        }

    }

    //=======================================================================================
    public function favourite_doctors(Request $request){
        $validator = validator::make($request->all(),[
            'user_id'        => 'required|exists:users,id',
        ]);
        if ($validator->fails()){
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
        }
        $ids = Favourite::where('user_id',$request->user_id)->pluck('doctor_id')->toarray();
        if ($request->paginate=='on') {
            $number = $request->page_num==null?10:$request->page_num;
            $doctor = Admin::with('clinic','country','rates.user','available_date.available_hour')
                ->where(['type'=>'doctor'])
                ->whereIn('id',$ids)
                ->paginate($number);
            $json = collect(["message" => "","code" => 200]) ;
            $json =  $json->merge($doctor);
            return response()->json($json,200);
        }else{
            $doctor = Admin::with('clinic','country','rates.user','available_date.available_hour')
                ->where(['type'=>'doctor'])
                ->whereIn('id',$ids)
                ->get();
        }

        return response()->json(['data'=>$doctor,'code'=>200,'message'=>''],200);

    }
    //=======================================================================================
    public function favourite_offers(Request $request){
        $validator = Validator::make($request->all(),[
            'user_id'        => 'required|exists:users,id',
        ]);
        if ($validator->fails()){
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
        }

        $ids = Favourite::where('user_id',$request->user_id)->pluck('offer_id')->toArray();
        if ($request->paginate=='on') {
            $number = $request->page_num==null?10:$request->page_num;
            $offers = Offer::with('images','clinic','first_image','rates.user','available_date.available_hour')
                ->whereIn('id',$ids)
                ->paginate($number);
            $json = collect(["message" => "","code" => 200]) ;
            $json =  $json->merge($offers);
            return response()->json($json,200);
        }else{
            $offers = Offer::with('images','clinic','first_image','rates.user','available_date.available_hour')
                ->whereIn('id',$ids)
                ->get();
        }
        return response()->json(['data'=>$offers,'code'=>200,'message'=>''],200);

    }
    //=======================================================================================


}
