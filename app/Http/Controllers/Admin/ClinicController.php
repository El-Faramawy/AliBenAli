<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClinic;
use App\Models\Clinic;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClinicController extends Controller
{
    use PhotoTrait;
    public function index(){
        $clinics = Clinic::all();
        return view('Admin/clinic/index',compact('clinics'));
    }

    public function create(StoreClinic $request){
        try {
            $file_name = $this->saveImage($request->image,'uploads/clinic');
            Clinic::create([
                'image'   => 'uploads/clinic/'.$file_name,
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
            ]);
            toastr()->success('تم اضافة عيادة جديدة بنجاح');
//            Session::flash('message', 'تم الاضافة بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    public function update(StoreClinic $request){
        try {
            $Clinic = Clinic::where('id' , $request->id);

            // check if the images are changed
            if ($request->has('image')){
                $file_name = $this->saveImage($request->image, 'uploads/clinic');
                $Clinic->update([
                    'image' => 'uploads/clinic/'.$file_name,
                ]);
            }
            $inputs = $request->except('_token','image','avatar_remove','num');
            $Clinic->update($inputs);
            toastr()->success('تم تحديث بيانات العيادة بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    public function delete_one(request $request){
        Clinic::findOrFail($request->id)->delete();
        toastr()->success('تم حذف العيادة بنجاح');
        return back();
    }
}
