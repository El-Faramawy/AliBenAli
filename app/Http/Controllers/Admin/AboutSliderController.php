<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutSliderRequest;
use App\Models\AboutSlider;
use Illuminate\Http\Request;

class AboutSliderController extends Controller
{
    public function index()
    {
        $show_about_sliders=AboutSlider::all();
        return view('Admin/about/slider' , compact('show_about_sliders'));
    }

    public function create(AboutSliderRequest $request){
        try {
            $file_extension = $request -> image -> getClientOriginalExtension();
            $file_name = time(). '.' . $file_extension;
            $path='uploads/about/slider/';
            $request->image->move($path , $file_name);
            $add_image=new AboutSlider();
            $add_image->icon=$path .$file_name;
            $add_image->save();

//            $validated = $request->validated();
            toastr()->success('تم اضافه الصوره للمعرض بنجاح ');
            return back();


        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }


    }

    public function destroy(request $request){
        AboutSlider::findOrFail($request->id)->delete();
        toastr()->success('تم حذف الصوره بنجاح');
        return back();
    }

    public function deleteAll(){
        AboutSlider::query()->delete();
        toastr()->success('تم حذف جميع الصور بنجاح');
        return back();
    }


}
