<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutInfo;
use App\Models\AboutInfo;
use Illuminate\Http\Request;

class AboutInfoController extends Controller
{
    public function index(){
        $about = AboutInfo::first();
        return view('Admin/about_info/index',compact('about'));
    }

    public function update(storeAboutInfo $request){
        try {
            $about_info = AboutInfo::first();
            $inputs = $request->except('_token');
            $about_info->update($inputs);
            toastr()->success('تم التعديل بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }
}
