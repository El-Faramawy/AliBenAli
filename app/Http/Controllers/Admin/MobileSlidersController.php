<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutSliderRequest;
use App\Models\MobileSlider;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class MobileSlidersController extends Controller
{
    use PhotoTrait;
    public function index(){
        $sliders = MobileSlider::all();
        return view('Admin.mobile_sliders.index' ,compact('sliders'));
    }


    public function create(AboutSliderRequest $request){
        try {
            $file_name = $this->saveImage($request->image,'uploads/mobile_slider');
            MobileSlider::create([
                'image' => 'uploads/mobile_slider/'.$file_name,
            ]);
            toastr()->success('تم اضافه الصوره للمعرض بنجاح ');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }

    public function delete(request $request){
        MobileSlider::findOrFail($request->id)->delete();
        toastr()->success('تم الحذف بنجاح');
        return back();
    }

    public function deleteAll(){
        MobileSlider::truncate();
        toastr()->success('تم الحذف بنجاح');
        return back();
    }
}
