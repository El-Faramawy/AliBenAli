<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $auctions = User::with('department')->get();
        return view('Admin/User/index',compact('auctions'));
    }
//    =======================================================================
    public function store_user(Request $request){
//        return $request->all();
        $user = new User;
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->phone_code   = $request->phone_code;
        $user->phone        = $request->phone;
        $user->is_art       = $request->is_art;
        if (isset($request->image))
            $user->photo        = upload_image('user','image');
        $user->save();
        return redirect('admin/user')->with(notification('تم حفظ المستخدم','success'));
    }
//    =======================================================================
    public function update_user(Request $request){
//        return $request->all();
        $user = User::where('id',$request->id)->first();
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->phone_code   = $request->phone_code;
        $user->phone        = $request->phone;
        $user->is_art       = $request->is_art;
        if (isset($request->image))
        $user->photo        = upload_image('user','image',$request->image);
        $user->save();
        return redirect('admin/user')->with(notification('تم تعديل المستخدم','info'));
    }
//    =======================================================================
    public function user_edit($id){
        $user = User::where('id',$id)->first();
        return view('Admin/User/edit',compact('user'));
    }
//    =======================================================================
    public function delete_user(Request $request){
        $auction = User::where('id',$request->id)->delete();
        return redirect()->back();
    }
//    =======================================================================
    public function prefer_user(Request $request){
        $auction = User::where('id',$request->id)->first();
        $auction->is_better = $auction->is_better==0?1:0;
        $auction->save();
        return redirect()->back();
    }
}
