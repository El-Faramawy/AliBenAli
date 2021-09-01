<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditJoin;
use App\Models\JoinUs;
use App\Models\JoinUsDetails;
use Illuminate\Http\Request;

class JoinController extends Controller
{
    public function index(){
        $join = JoinUs::first();
        return view('Admin.join_us.newindex',compact('join'));
    }

    public function update(EditJoin $request){
        try{
            $join = JoinUs::first();
            $join->update([
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'text_ar'  => $request->text_ar,
                'text_en'  => $request->text_en,
            ]);
            toastr()->success('تم تحديث الوصف بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }


    public function showAds(){
        $joins = JoinUsDetails::all();
        return view('Admin.join_us.details',compact('joins'));
    }

    public function create(EditJoin $request){
        try {
            JoinUsDetails::create([
                'title_ar'    => $request->title_ar,
                'title_en'    => $request->title_en,
                'category_ar' => $request->category_ar,
                'category_en' => $request->category_en,
                'content_ar'  => $request->content_ar,
                'content_en'  => $request->content_en,
                'address_ar'  => $request->address_ar,
                'address_en'  => $request->address_en,
            ]);
            toastr()->success('تم اضافة الاعلان بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    public function edit_details(EditJoin $request){
        try {
            $JoinUsDetails = JoinUsDetails::findOrFail($request->id);
            $inputs = $request->all();
            $JoinUsDetails->update($inputs);
            toastr()->success('تم تحديث الاعلان بنجاح');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    public function delete_details(request $request){
        JoinUsDetails::findOrFail($request->id)->delete();
        toastr()->success('تم حذف الاعلان بنجاح');
        return back();
    }

    public function delete_all_details(){
        JoinUsDetails::query()->delete();
        toastr()->success('تم حذف جميع الاعلانات بنجاح');
        return back();
    }

}
