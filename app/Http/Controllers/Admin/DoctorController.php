<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutInfo;
use App\Http\Requests\StoreAboutUS;
use App\Models\Clinic;
use App\Models\Country;
use App\Models\Cv;
use App\Models\Rate;
use App\Notifications\DoctorAdded;
use Illuminate\Support\Facades\Notification;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    use PhotoTrait;

    public function index(){
        $doctors = Admin::where('type','doctor')->get();
        $rates   = Rate::all();
        return view('Admin/doctor/index',compact('doctors','rates'));
    }

    public function delete(request $request){
        Admin::findOrFail($request->id)->delete();
        toastr()->success('تم حذف الطبيب بنجاح');
        return back();
    }

    public function add(){
        $countries = Country::all();
        $clinics = Clinic::all();
        return view('Admin/doctor/add',compact('countries','clinics'));
    }

    public function create(request $request){
//        return $request;
        try{
            $doctor = new Admin();
            $file_name           = $this->saveImage($request->image,'uploads/doctors');
            $doctor->image       = 'uploads/doctors/'.$file_name;
            $doctor->email       = $request->email;
            $doctor->type        = 'doctor';
            $doctor->password    = Hash::make($request->password);
            $doctor->name_ar     = $request->name_ar;
            $doctor->name_en     = $request->name_en;
            $doctor->category_ar = $request->category_ar;
            $doctor->category_en = $request->category_en;
            $doctor->clinic_id   = $request->clinic_id;
            $doctor->country_id  = $request->country_id;
            $doctor->min_age     = $request->min_age;
            $doctor->max_age     = $request->max_age;
            $doctor->phone       = $request->phone;
            $doctor->price       = $request->price;
            if ($request->audio == 'on'){
                $doctor->audio  = 'yes';
            }else{
                $doctor->audio     = 'no';
            }
            if ($request->video == 'on'){
                $doctor->video = 'yes';
            }else{
                $doctor->video  = 'no';
            }
            if ($request->has('cv_image')) {
                $file_namee = $this->saveImage($request->cv_image, 'uploads/cv');
                $doctor->cv_image = 'uploads/cv/' . $file_namee;
            }
            $doctor->save();

            $iteration = 0;
            while ($iteration <= $request->count){
                    Cv::create([
                    'doctor_id' => $doctor->id,
                    'title_ar'  => $request['title_ar'.$iteration],
                    'title_en'  => $request['title_en'.$iteration],
                    'text_ar'   => $request['text_ar'.$iteration],
                    'text_en'   => $request['text_en'.$iteration],
                ]);
                $iteration++;
            }
//            $user = Admin::where('email',$request->email)->first();
//            Notification::send($user,new DoctorAdded());

            toastr()->success('تم اضافة الطبيب بنجاح');
            return redirect()->route('doctors');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    public function edit($id){
            $doctor = Admin::findOrFail($id);
            $countries = Country::all();
            $clinics = Clinic::all();
            $cvs = Cv::where('doctor_id', $id)->get();
            return view('Admin/doctor/edit', compact('doctor', 'countries', 'clinics', 'cvs'));
    }

    public function update(request $request){
        try {
            $doctor = Admin::findOrFail($request->id);
            if ($request->has('image')){
                // update doctor data
                $file_name = $this->saveImage($request->image, 'uploads/doctors');
                $doctor->image = 'uploads/doctors/' . $file_name;
            }
            if ($request->has('cv_image')) {
                $file_namee = $this->saveImage($request->cv_image, 'uploads/cv');
                $doctor->cv_image = 'uploads/cv/' . $file_namee;
            }
            else{
                $doctor->cv_image = null;
            }
            if ($request->has('password')){
                $doctor->password = Hash::make($request->password);
            }
            $doctor->email = $request->email;
            $doctor->name_ar = $request->name_ar;
            $doctor->name_en = $request->name_en;
            $doctor->category_ar = $request->category_ar;
            $doctor->category_en = $request->category_en;
            $doctor->clinic_id = $request->clinic_id;
            $doctor->country_id = $request->country_id;
            $doctor->min_age = $request->min_age;
            $doctor->max_age = $request->max_age;
            $doctor->phone = $request->phone;
            if ($request->audio == 'on'){
                $doctor->audio  = 'yes';
            }else{
                $doctor->audio      = 'no';
            }
            if ($request->video == 'on'){
                $doctor->video     = 'yes';
            }else{
                $doctor->video     = 'no';
            }
            $doctor->save();
            // update doctor cv
            $cvs = Cv::where('doctor_id', $request->id)->get();
            foreach($cvs as $cv){
                $cv->delete();
            }

            if($request->has('count')) {
                $count = count($request->count);
                for ($i = 1; $i <= $count; $i++) {
                    Cv::create([
                        'doctor_id' => $request->id,
                        'title_ar' => $request['title_ar' . $i],
                        'title_en' => $request['title_en' . $i],
                        'text_ar' => $request['text_ar' . $i],
                        'text_en' => $request['text_en' . $i],
                    ]);
                }
            }
            toastr()->success('تم تحديث بيانات الطبيب بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }
}
