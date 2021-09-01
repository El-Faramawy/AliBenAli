<?php

namespace App\Http\Controllers\Api;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Models\PhoneToken;
use App\Models\PhoneTokenDoctor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        $rules = [
            'phone'     => 'required',
            'password'  => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()){
                return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
            }
        $rememberme = request('rememberme') == 1?true:false;
        if (Auth::attempt(['phone' => request('phone'), 'password' => request('password')],$rememberme)) {
             auth()->user()->is_login = 'yes';
             auth()->user()->save();
            return response()->json(['data'=>auth()->user(),'code'=>200,'message'=>''],200);
        }else{
            return response()->json(['data'=>null,'code'=>404,'message'=>'phone or password is incorrect'],200);
        }
    }

    //==============================================================================
    public function register(Request $request){
        $rules = [
            'phone'             => 'required',
            'phone_code'        => 'required',
            'name'              => 'required',
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password'
        ];

        $user_phones = User::get()->pluck('phone')->toArray();
        if (in_array($request->phone,$user_phones))
            return response()->json(['data'=>null,'code'=>409,'message'=>'this phone number is already exist'],200);

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
        }


        else{
            $user = new User;
            $user->phone        = $request->phone;
            $user->phone_code   = $request->phone_code;
            $user->name         = $request->name;
            $user->password     = Hash::make($request->password);
            $user->is_login     = 'yes';
            $user->save();
            return response()->json(['data'=>$user,'code'=>200,'message'=>''],200);
        }

    }
    //==============================================================================
    public function update_profile(Request $request){
        $rules1 = $rules2 = [];
        $rules1 = [
            'user_id'           => 'required|exists:users,id',
            'name'              => 'required',
        ];
        if ($request->password){
            $rules2 = [
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password'
            ];
        }
        $rules = array_merge($rules1,$rules2);

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()){
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
        }

        else{
            $user = User::where('id',$request->user_id)->first();
            $user->name         = $request->name;
            $user->password     = Hash::make($request->password);
            $user->save();
            return response()->json(['data'=>$user,'code'=>200,'message'=>''],200);
        }

    }

    //==============================================================================
    public function inser_token(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'firebase_token' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],'422');
        }
        $token=PhoneToken::updateOrCreate([
            'user_id'=>$request->user_id,
            'phone_token'=>$request->firebase_token,
            'type'=>$request->type,
        ]);
        return response()->json(['data'=>$token,'code'=>200,'message'=>''],200);
    }

    //=======================================================================================================

    public function logout(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            'user_id' => 'required|exists:users,id',
            'token' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],'422');
        }
        $user = User::where('id', $request->user_id)->first();
        $user->is_login = 'no';
        $user->save();
        auth()->logout();
        $token = PhoneToken::where(['user_id' => $request->user_id, 'phone_token' => $request->token])->delete();

        return response()->json(['data'=>$user , 'message' => 'loged out', 'code' => 200], '200');
    }

    //===================================================================================
    //===================================================================================
    //===================================================================================
    //===============================  Doctor  ==============================================
    //===================================================================================
    //===================================================================================

    public function login_doctor(Request $request){
        $rules = [
            'phone'     => 'required',
            'password'  => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
        }
        $rememberme = request('rememberme') == 1?true:false;
        if (admin()->attempt(['phone' => request('phone'), 'password' => request('password')],$rememberme)) {
//            auth()->user()->is_login = 'yes';
//            auth()->user()->save();
            $user = Admin::where('id',admin()->user()->id)
                ->with('clinic','country','rates.user','available_date.available_hour')
                ->first();
            return response()->json(['data'=>$user,'code'=>200,'message'=>''],200);
        }else{
            return response()->json(['data'=>null,'code'=>404,'message'=>'phone or password is incorrect'],200);
        }
    }

    //===============================================================================

    public function logout_doctor(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            'doctor_id' => 'required|exists:admins,id',
            'token' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],'422');
        }
        $user = Admin::where('id', $request->doctor_id)->first();
//        $user->is_login = 'no';
//        $user->save();
        admin()->logout();
        $token = PhoneTokenDoctor::where(['doctor_id' => $request->doctor_id, 'phone_token' => $request->token])->delete();

        return response()->json(['data'=>$user , 'message' => 'loged out', 'code' => 200], '200');
    }

    //===============================================================================================

    public function inser_token_doctor(Request $request){
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:admins,id',
            'firebase_token' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],'422');
        }
        $token=PhoneTokenDoctor::updateOrCreate([
            'doctor_id'=>$request->doctor_id,
            'phone_token'=>$request->firebase_token,
            'type'=>$request->type,
        ]);
        return response()->json(['data'=>$token,'code'=>200,'message'=>''],200);
    }

}
