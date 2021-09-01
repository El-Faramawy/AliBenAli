<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutUS;
use App\Models\AboutUs;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use PhotoTrait;
    public function index(){
        $abouts = AboutUs::all();
        return view('Admin/about_us/index',compact('abouts'));
    }

    public function create(StoreAboutUS $request){
        try{
            $file_name = $this->saveImage($request->image,'uploads/about_us');
            AboutUs::create([
                'image'    => 'uploads/about_us/'.$file_name,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'text_ar' => $request->text_ar,
                'text_en' => $request->text_en,
                'job_ar' => $request->job_ar,
                'job_en' => $request->job_en,
            ]);
            toastr()->success('تم الاضافة بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    public function update(StoreAboutUS $request){
        try{
            $About = AboutUs::findOrFail($request->id);

            // check if the images are changed
            if ($request->has('image')){
                $file_name = $this->saveImage($request->image, 'uploads/about_us');
                $About->update([
                    'image' => 'uploads/about_us/'.$file_name,
                ]);
            }
            // update
            $About->update([
                'title_ar'    => $request->title_ar,
                'title_en'    => $request->title_en,
                'text_ar'    => $request->text_ar,
                'text_en'    => $request->text_en,
                'job_ar'    => $request->job_ar,
                'job_en'    => $request->job_en,
            ]);
            toastr()->success('تم التحديث بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }


    public function delete(request $request){
        AboutUs::findOrFail($request->id)->delete();
        toastr()->success('تم الحذف بنجاح');
        return back();
    }
}
