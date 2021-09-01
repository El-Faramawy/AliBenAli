<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use PhotoTrait;

    public function index(){
        $sliders = Slider::all();
        return view('Admin/slider/index',compact('sliders'));
    }

    public function create(request $request): \Illuminate\Http\RedirectResponse
    {
        try{
            $file_name = $this->saveImage($request->image,'uploads/slider');
            Slider::create([
                'image'    => 'uploads/slider/'.$file_name,
            ]);
            toastr()->success('تم اضافة معرض جديد');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    public function delete_one(request $request): \Illuminate\Http\RedirectResponse
    {
        Slider::findOrFail($request->id)->delete();
        toastr()->success('تم حذف المعرض بنجاح');
        return back();
    }

    public function delete_all(): \Illuminate\Http\RedirectResponse
    {
        Slider::truncate();
        toastr()->success('تم حذف كل بيانات المعرض بنجاح');
        return back();
    }
}
