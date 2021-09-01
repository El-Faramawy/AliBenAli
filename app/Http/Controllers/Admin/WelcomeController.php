<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditWelcome;
use App\Models\SecondSection;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    use PhotoTrait;
    public function index(){
        $element = SecondSection::first();
        return view('Admin.second_section.index',compact('element'));
    }

    public function update(EditWelcome $request)
    {
        try{
            $section = SecondSection::first();
            if($request->image != null){
                $filename = $this->saveImage($request->image, 'uploads/second_section');
               $section->update([
                   'image'      => 'uploads/second_section/'.$filename,
                   'title_ar'   => $request->title_ar,
                   'title_en'   => $request->title_en,
                   'content_ar' => $request->content_ar,
                   'content_en' => $request->content_en,
               ]);
           }
           else{
               $section->update([
                   'title_ar'   => $request->title_ar,
                   'title_en'   => $request->title_en,
                   'content_ar' => $request->content_ar,
                   'content_en' => $request->content_en,
               ]);
           }
            toastr()->success('تم التحديث بنجاح');
           return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }
}
