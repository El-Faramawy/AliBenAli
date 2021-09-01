<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutInfo;
use App\Models\Setting;
use Illuminate\Http\Request;

class InfoController extends Controller
{

    public function index(){
        $info = Setting::first();
        return view('Admin.info.info',compact('info'));
    }

    public function update(StoreAboutInfo $request){
        try {
            $info = Setting::first();
            $inputs = $request->all();
            $info->update($inputs);
            toastr()->success('تم تحديث البيانات بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }
}
