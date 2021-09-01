<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutDetails;
use Illuminate\Http\Request;

class AboutDetailsController extends Controller
{
    public function index(){
        $abouts = AboutDetails::all();
        return view('Admin/about/details',compact('abouts'));
    }

    public function add(){
        return view('Admin.about.add_details');
    }

    public function create(request $request){
        try {
            $inputs = $request->all();
            AboutDetails::create($inputs);
            toastr()->success('تم اضافة رؤية جديدة');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    public function delete(request $request){
        AboutDetails::findOrFail($request->id)->delete();
        toastr()->success('تم الحذف بنجاح');
        return back();
    }


    public function show($id){
        $about = AboutDetails::where('id',$id)->first();
        return view('Admin.about.edit_details',compact('about'));
    }

    public function update(request $request){
        $details = AboutDetails::findOrFail($request->id);
        try {
            $inputs = $request->all();
            $details->update($inputs);
            toastr()->success('تم التحديث بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

}
